<?php
namespace app\shop\models\repositories;
use \app\shop\models\User as User;
use \app\shop\models\Order as Order;

class UserRepository extends Repository {
    public function getTableName() {
        return 'user';
    }

    public function getEntityClass() {
        return User::class;
    }

    public function getException() {
        return ['db', 'exception', 'id', 'gender'];
    }

    public function getCurrentUser() {
        $sql = 'select * from `current_user`';
        $id = static::getDb()->queryOne($sql)['id_user'];
        if ($id) {
            $sql = 'SELECT A.*, gender.name AS `gender`  FROM (SELECT * FROM user WHERE id = :id) AS A INNER JOIN
            gender ON gender.id=A.id_gender';
            return static::getDb()->queryOne($sql, [':id' => $id]);
        }
        return new User();
    }

    public function deleteCurrentUser($userId) {
        $sql = 'DELETE FROM `current_user` WHERE id_user=:id_user AND id IS NOT NULL';
        static::getDb()->execute($sql, [':id_user' => $userId]);

        $sql = 'SELECT * FROM basket WHERE id_user = :idUser';
        $idBasket = static::getDb()->queryOne($sql, [':idUser' => $userId])['id'];
        $sql = 'DELETE FROM `current_basket` WHERE id_basket=:idBasket AND id IS NOT NULL';
        static::getDb()->execute($sql, [':idBasket' => $idBasket]);
        return $idBasket;
    }

    public function addCurrentUser($userId) {
        $sql = 'INSERT `current_user` (id_user) VALUES (:userId)';
        static::getDb()->execute($sql, [':userId' => $userId]);

        $sql = 'SELECT * FROM `current_basket`';
        $idCurrentBasket = static::getDb()->queryOne($sql)['id_basket'];

        $sql = 'SELECT * FROM `basket` WHERE id_user = :userId';
        $idBasketUser = static::getDb()->queryOne($sql, [':userId' => $userId])['id'];

        if ($idCurrentBasket && $idBasketUser) {
            return true;
        }

        if ($idCurrentBasket) {
            $sql = 'UPDATE `basket` SET id_user = :userId WHERE id= :id';
            static::getDb()->execute($sql, [
                ':userId' => $userId,
                ':id' => $idCurrentBasket
            ]);

            $sql = 'UPDATE `basket_product` SET id_user = :userId WHERE id_basket = :id';
            static::getDb()->execute($sql, [
                ':userId' => $userId,
                ':id' => $idCurrentBasket
            ]);
        } 

        if (idBasketUser) {
            $sql = 'INSERT `current_basket` (id_basket) VALUES (:basketId)';
            static::getDb()->execute($sql, [':basketId' => $idBasketUser]);
        }

        return false;
    }

    private function createUser($user) {
        if ($user->gender == 'Female') {
            $user->id_gender = 1;
        } else {
            $user->id_gender = 2;
        }

        $userObj = new User();
        $userObj->id = $user->id;
        $userObj->username = $user->username;
        $userObj->password = $user->password;
        $userObj->email = $user->email;
        $userObj->credit_cart = $user->credit_cart;
        $userObj->id_gender = $user->id_gender;

        return $userObj;
    }

    public function changeUser($user) {
        $userObj = $this->createUser($user);
        return $this->save($userObj);
    }

    public function addUser($user) {
        $userObj = $this->createUser($user);
        $this->save($userObj);
        return $userObj->id;
    }
}
?>