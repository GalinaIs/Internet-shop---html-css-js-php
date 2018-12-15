<?php
namespace app\shop\controllers;
use \app\shop\base\App as App;

class UserController extends SiteController {
    protected $defaultAction = 'index';

    public function actionIndex() {
        echo $this->render('user', [], true);
    }

    public function actionGetCurrentUser() {
        $user = App::call()->repository->user->getCurrentUser();

        echo json_encode(['success' => 'ok', 'user' => $user]);
    }

    public function actionChangeInfo() {
        $jsonString = $_POST['json'];
        $user = json_decode($jsonString);
        App::call()->repository->user->changeUser($user);

        echo json_encode(['success' => 'ok']);
    }

    public function actionGetAll() {
        $users = App::call()->repository->user->getAll();

        echo json_encode(['success' => 'ok', 'users' => $users]);
    }

    public function actionLogOut() {
        $userId = App::call()->request->getParam('id');
        $idBasket = App::call()->repository->user->deleteCurrentUser($userId);

        echo json_encode(['success' => 'ok', 'id' => $userId, 'idBasketLOgOut' => $idBasket]);
    }

    public function actionLogIn() {
        $jsonString = $_POST['json'];
        $user_id = json_decode($jsonString);
        $flagChooseBasket = App::call()->repository->user->addCurrentUser($user_id);

        echo json_encode(['success' => 'ok', 'flagChooseBasket' => $flagChooseBasket]);
    }

    public function actionAdd() {
        $jsonString = $_POST['json'];
        $user = json_decode($jsonString);
        $user_id = App::call()->repository->user->addUser($user);

        echo json_encode(['success' => 'ok', 'id' => $user_id]);
    }
}
?>
