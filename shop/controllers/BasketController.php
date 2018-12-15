<?php
namespace app\shop\controllers;
use \app\shop\models\Basket as Basket;
use \app\shop\base\App as App;

class BasketController extends SiteController {
    protected $defaultAction = 'index';

    public function actionIndex() {
        echo $this->render('basket', [], true);
    }

    public function actionGetCurrent() {
        $basket = App::call()->repository->basket->getCurrentBasket();

        echo json_encode(['success' => 'ok', 'basket' => $basket]);
    }

    public function actionAddProduct() {
        $idProduct = App::call()->request->getParam('id');
        $quantity = App::call()->request->getParam('count');
        $size = App::call()->request->getParam('size');
        $color = App::call()->request->getParam('color');
        App::call()->repository->basket->addProductFromCurrentBasket($idProduct, $quantity, $size, $color);

        echo json_encode(['success' => 'ok', 'idProduct' => $idProduct, 'quantity' => $quantity]);
    }

    public function actionDeleteProduct() {
        $idProduct = App::call()->request->getParam('id');
        $quantity = App::call()->request->getParam('count');
        $size = App::call()->request->getParam('size');
        $color = App::call()->request->getParam('color');
        App::call()->repository->basket->deleteProductFromCurrentBasket($idProduct, $quantity, $size, $color);

        echo json_encode(['success' => 'ok', 'idProduct' => $idProduct, 'quantity' => $quantity]);
    }

    public function actionDeleteAll() {
        App::call()->repository->basket->deleteAllFromCurrentBasket();

        echo json_encode(['success' => 'ok']);
    }

    public function actionChangeCurrent() {
        $idUser = App::call()->request->getParam('id');
        App::call()->repository->basket->changeCurrentBasket($idUser);

        echo json_encode(['success' => 'ok']);
    }

    public function actionChangeUserBacket() {
        $idUser = App::call()->request->getParam('id');
        App::call()->repository->basket->changeUserBasket($idUser);

        echo json_encode(['success' => 'ok']);
    }

}
?>
