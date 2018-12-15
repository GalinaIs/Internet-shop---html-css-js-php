<?php
namespace app\shop\controllers;

class ErrorController extends SiteController {
    protected $defaultAction = 'index';

    public function actionIndex($error = '') {
        if ($error === '') {
            $error = 'Ошибка! Запрашиваемая страница не найдена!';
        }
        
        echo $this->render('error', ['error' => $error]);
    }
}
?>
