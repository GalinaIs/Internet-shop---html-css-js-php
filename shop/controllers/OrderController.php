<?php
namespace app\shop\controllers;
use \app\shop\base\App as App;

class OrderController extends SiteController {
    protected $defaultAction = 'checkout';

    public function actionCheckout() {
        echo $this->render('checkout', [], true);
    }
}
?>
