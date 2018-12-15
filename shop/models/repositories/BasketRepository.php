<?php
namespace app\shop\models\repositories;
use \app\shop\models\Basket as Basket;
use \app\shop\models\Product as Product;
use \app\shop\models\DataEntity as DataEntity;
use \app\shop\base\App as App;

class BasketRepository extends Repository {
    public function getTableName() {
        return 'basket';
    }

    public function getEntityClass() {
        return Basket::class;
    }

    public function getException() {
        return ['db', 'exception', 'id', 'image', 'name', 'price', 'cost'];
    }

    private function getIdCurrentBasket() {
        $sql = 'select * from `current_basket`';
        return static::getDb()->queryOne($sql)['id_basket'];
    }

    public function getCurrentBasket() {
        $id = $this->getIdCurrentBasket();

        if ($id) {
            $sql = 'SELECT D.*, size.name AS `size` FROM
            (SELECT C.*, color.name as `color` FROM 
            (SELECT B.*, products.name, products.path_img, products.cost FROM 
            (SELECT basket_product.* FROM 
            (SELECT * FROM basket WHERE id = :id) AS A
            INNER JOIN basket_product
            ON A.id = basket_product.id_basket) AS B
            INNER JOIN products
            ON products.id = B.id_product) AS C
            INNER JOIN color
            ON C.id_color = color.id) AS D
            INNER JOIN size
            ON size.id = D.id_size';
            return static::getDb()->queryAll($sql, [':id' => $id]);
        }

        return [];
    }

    private function getIdSize($size) {
        $sql = 'SELECT * FROM size WHERE `name`=:sizeName';
        return static::getDb()->queryOne($sql, [':sizeName' => $size])['id'];
    }

    private function getIdColor($color) {
        $sql = 'SELECT * FROM color WHERE `name`=:colorName';
        return static::getDb()->queryOne($sql, [':colorName' => $color])['id'];
    }

    public function addProductFromCurrentBasket($idProduct, $quantity, $size, $color) {
        $idCurrentBasket = $this->getIdCurrentBasket();

        if (!$idCurrentBasket) {
            $sql = 'INSERT INTO `basket` (id_user) VALUES (null)';
            static::getDb()->execute($sql);
            $idCurrentBasket = static::getDb()->lastInsertId();

            $sql = 'INSERT INTO `current_basket` (id_basket) VALUES (:idBasket)';
            static::getDb()->execute($sql, [':idBasket' => $idCurrentBasket]);
        }

        $sql = 'SELECT * FROM `basket` WHERE id = :idBasket';
        $idUser = static::getDb()->queryOne($sql, [':idBasket' => $idCurrentBasket])['id_user'];

        $idColor = $this->getIdColor($color);
        $idSize = $this->getIdSize($size);

        $sql = 'SELECT * FROM basket_product WHERE id_basket=:idBasket AND id_product=:idProduct AND id_color=:idColor
        AND id_size=:idSize';
        $idBasketProduct = static::getDb()->queryOne($sql, [
            ':idBasket' => $idCurrentBasket,
            ':idProduct' => $idProduct,
            ':idColor' => $idColor,
            ':idSize' => $idSize
        ])['id'];

        if ($idBasketProduct) {
            $sql = 'UPDATE basket_product SET `quantity` = `quantity` + :quantity WHERE id = :id';
            static::getDb()->execute($sql, [
                ':quantity' => $quantity,
                ':id' => $idBasketProduct
            ]);
        } else {
            $sql = 'INSERT INTO basket_product (id_user, id_product, quantity, id_color, id_size, id_basket) 
                VALUES (:idUser, :idProduct, :quantity, :idColor, :idSize, :idBasket)';
            static::getDb()->execute($sql, [
                ':idUser' => $idUser,
                ':idProduct' => $idProduct,
                ':quantity' => $quantity,
                ':idColor' => $idColor,
                ':idSize' => $idSize,
                ':idBasket' => $idCurrentBasket
            ]);
        }
    }

    public function deleteProductFromCurrentBasket($idProduct, $quantity, $size, $color) {
        $id = $this->getIdCurrentBasket();
        $idColor = $this->getIdColor($color);
        $idSize = $this->getIdSize($size);

        if ($quantity == 0) {
            $sql = 'DELETE FROM basket_product WHERE id_basket = :id AND id_product = :idProduct AND id_size = :idSize 
            AND id_color = :idColor AND id IS NOT NULL';
            static::getDb()->execute($sql, [
                ':id' => $id, 
                ':idProduct' => $idProduct,
                ':idSize' => $idSize,
                ':idColor' => $idColor
            ]);
        } else {
            $sql = 'UPDATE basket_product SET quantity = :quantity WHERE id_basket = :id AND id_product = :idProduct
                AND id_size = :idSize AND id_color = :idColor';
            static::getDb()->execute($sql, [
                ':id' => $id, 
                ':idProduct' => $idProduct,
                ':quantity' => $quantity,
                ':idSize' => $idSize,
                ':idColor' => $idColor
            ]);
        }
    }

    public function deleteAllFromCurrentBasket() {
        $id = $this->getIdCurrentBasket();
        $sql = 'DELETE FROM basket_product WHERE id_basket=:id AND id IS NOT NULL';
        static::getDb()->execute($sql, [':id' => $id]);
    }

    public function changeCurrentBasket($idUser) {//удаляем текущую и читаем из БД
        $sql = 'SELECT * FROM basket WHERE id_user = :idUser';
        $idBasket = static::getDb()->queryOne($sql, [':idUser' => $idUser])['id'];

        $sql = 'SELECT * FROM `current_basket`';
        $idCurrentBasket = static::getDb()->queryOne($sql)['id_basket'];

        $sql = 'DELETE FROM `current_basket` WHERE id_basket = :idCurrentBasket AND id IS NOT NULL';
        static::getDb()->execute($sql, [':idCurrentBasket' => $idCurrentBasket]);
        $sql = 'DELETE FROM `basket_product` WHERE id_basket = :idCurrentBasket AND id IS NOT NULL';
        static::getDb()->execute($sql, [':idCurrentBasket' => $idCurrentBasket]);
        $sql = 'DELETE FROM `basket` WHERE id = :idCurrentBasket';
        static::getDb()->execute($sql, [':idCurrentBasket' => $idCurrentBasket]);

        $sql = 'INSERT INTO `current_basket` (id_basket) VALUES (:idBasket)';
        static::getDb()->execute($sql, [':idBasket' => $idBasket]);
    }

    public function changeUserBasket($idUser) {//удаляем из БД и записываем текущую
        $sql = 'SELECT * FROM basket WHERE id_user = :idUser';
        $idBasket = static::getDb()->queryOne($sql, [':idUser' => $idUser])['id'];

        $sql = 'DELETE FROM `basket_product` WHERE id_basket = :idBasket AND id IS NOT NULL';
        static::getDb()->execute($sql, [':idBasket' => $idBasket]);
        $sql = 'DELETE FROM `basket` WHERE id = :idBasket';
        static::getDb()->execute($sql, [':idBasket' => $idBasket]);

        $sql = 'SELECT * FROM `current_basket`';
        $idCurrentBasket = static::getDb()->queryOne($sql)['id_basket'];
        $sql = 'UPDATE `basket` SET id_user = :idUser WHERE id = :idCurrentBasket';
        static::getDb()->execute($sql, [
            ':idUser' => $idUser,
            ':idCurrentBasket' => $idCurrentBasket
        ]);
        $sql = 'UPDATE `basket_product` SET id_user = :idUser WHERE id_basket = :idCurrentBasket';
        static::getDb()->execute($sql, [
            ':idUser' => $idUser,
            ':idCurrentBasket' => $idCurrentBasket
        ]);
    }


    /*public function getOneIdProduct($idProduct, $idUser) {
        $sql = "select * from basket where id_product=:id AND id_user=:id_user";
        return static::getDb()->queryObject($sql, [
            ':id' => $idProduct,
            ':id_user' => $idUser
        ], $this->getEntityClass());
    }

    private function addItem($idProduct, $count, $idUser) {
        if (isset($idUser)) {
            $item = $this->getOneIdProduct($idProduct, $idUser);
            if ($item) {
                $item->count += $count;
            } else {
                $item = new Basket();
                $item->id_product = $idProduct;
                $item->id_user = $idUser;
                $item->count = $count;
            }
            $this->save($item);
        } else {
            if (App::call()->session->get('basket') == null) {
                App::call()->session->set('basket', []);
            }

            $basket = App::call()->session->get('basket');
            $key = array_search($idProduct, array_column($basket, 'id'));

            if ($key === FALSE) {
                $basket[] =  ['id' => $idProduct, 'qty' => $count];
            } else {
                $basket[$key]['qty'] += (int)$count;
            }
            App::call()->session->set('basket', $basket);
        }
    }

    private function changeItem($idProduct, $count, $idUser) {
        if (isset($idUser)) {
            $item = $this->getOneIdProduct($idProduct, $idUser);
            $item->count = $count;
            $this->save($item);
        } else {
            $basket = App::call()->session->get('basket');
            $key = array_search($idProduct, array_column($basket, 'id'));

            $basket[$key]['qty'] = (int)$count;
            App::call()->session->set('basket', $basket);
        }
        
    }

    private function deleteItem($idProduct, $idUser) {
        if (isset($idUser)){
            $sql = 'delete from basket where id_product=:id AND id_user=:id_user';
            static::getDb()->execute($sql, [
                ':id' => $idProduct,
                ':id_user' => $idUser
            ]);
            } else {
                $basket = App::call()->session->get('basket');
                $key = array_search($idProduct, array_column($basket, 'id'));
                array_splice($basket, $key, 1);
                App::call()->session->set('basket', $basket);
            }
    }

    public function changeBasket($action, $idProduct, $count, $idUser) {
        switch ($action) {
            case 'add': 
                $this->addItem($idProduct, $count, $idUser);
                break;
            case 'change':
                $this->changeItem($idProduct, $count, $idUser);
                break;
            case 'delete':
                $this->deleteItem($idProduct, $idUser);    
                break;
        }
    }

    public function getBasket($idUser) {
        if (isset($idUser)) {
            $sql = 'select * from basket where id_user=:id_user';
            return static::getDb()->queryAllObject($sql, [':id_user' => $idUser], $this->getEntityClass());
        } else {
            if ($basket = App::call()->session->get('basket')) {
                $basketModelArray = [];
                foreach ($basket as $oneItem) {
                    $oneBasket = new Basket();
                    $oneBasket->id_product = $oneItem['id'];
                    $oneBasket->count = $oneItem['qty'];
                    $basketModelArray[] = $oneBasket;
                }
                return $basketModelArray;
            } else {
                App::call()->session->set('basket', []);
                return [];
            }
        }
    }

    public function getFullBasket($idUser) {
        $cart = $this->getBasket($idUser);
        
        foreach($cart as $oneProductCart) {
            $sql = 'select* from products where id=:id';
            $oneProduct = static::getDb()->queryObject($sql, [':id' => $oneProductCart->id_product], Product::class);
            $oneProduct = App::call()->repository->product->getOneImage($oneProduct);

            $oneProductCart->image = $oneProduct->image;
            $oneProductCart->name = $oneProduct->name;
            $oneProductCart->price = $oneProduct->price;
            $oneProductCart->calculateCost();
        }
    
        return $cart;
    }

    public function getCost($cart) {
        $cost = 0;
        foreach($cart as $oneProductCart) {
            $cost += $oneProductCart->getCost();
        }
        return $cost;
    }

    public function clearBasket($idUser) {
        $sql = 'delete from basket where id_user=:id_user';
        static::getDb()->execute($sql, [':id_user' => $idUser]);
    }

    public function createBasketNewUser($idUser) {
        $basket = App::call()->session->get('basket');
        foreach ($basket as $oneItem) {
            $sql = 'insert into basket (id_product, count, id_user) values (:id_product, :count, :id_user)';
            static::getDb()->execute($sql, [
                ':id_product' => $oneItem['id'],
                ':count' => $oneItem['qty'],
                ':id_user' => $idUser
            ]);
        }
        App::call()->session->set('basket', []);
    }*/
}
?>