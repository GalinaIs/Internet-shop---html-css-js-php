<?php
namespace app\shop\controllers;
use \app\shop\base\App as App;

class ProductController extends SiteController {
    protected $defaultAction = 'index';

    public function actionIndex() {
        echo $this->render('products');
    }

    public function actionMan() {
        echo $this->render('man_products', [], true);
    }

    public function actionCard() {
        $id = App::call()->request->getParam('id');

        echo $this->render('card', ['id' => $id], true);
    }

    /*public function actionChange() {
        $userId = App::call()->session->get('user_id');
        if ($userId == 1) {
            $error = false;
            $products = App::call()->repository->product->getAll();
        } else {
            $error = true;
            $products = [];
        }

        echo $this->render('changeProduct', [
            'error' => $error,
            'products' => $products
        ]);
    }*/

    /*public function actionAddProduct() {
        $request = App::call()->request;
        $name = $request->getParam('name');
        $price = $request->getParam('price');
        $shortDesc = $request->getParam('short_desc');
        $fullDesc = $request->getParam('full_desc');
    
        App::call()->repository->product->addNewProduct($name, $price, $shortDesc, $fullDesc);
        
        $this->redirect($_SERVER['HTTP_REFERER']);
    }*/

    /*public function actionChangeProduct() {
        $request = App::call()->request;
        $name = $request->getParam('name');
        $price = $request->getParam('price');
        $shortDesc = $request->getParam('short_desc');
        $fullDesc = $request->getParam('full_desc');
        $idProduct = $request->getParam('id_product');

        App::call()->repository->product->changeProduct($name, $price, $shortDesc, $fullDesc, $idProduct);
    
        $this->redirect($_SERVER['HTTP_REFERER']);
    }*/

    /*public function actionDeleteProduct() {
        $idProduct = App::call()->request->getParam('id_product');
    
        App::call()->repository->product->deleteProduct($idProduct);
    
        $this->redirect($_SERVER['HTTP_REFERER']);
    }*/

    public function actionGetProducts() {
        $products = App::call()->repository->product->getAllProducts();

        echo json_encode(['success' => 'ok', 'products' => $products]);
    }

    public function actionGetOneProduct() {
        $id = App::call()->request->getParam('id');
        $product = App::call()->repository->product->getOneProduct($id);

        echo json_encode(['success' => 'ok', 'product' => $product]);
    }
}
?>
