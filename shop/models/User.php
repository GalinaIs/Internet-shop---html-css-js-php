<?php
namespace app\shop\models;

class User extends DataEntity {
    public $id;
    public $username;
    public $password;
    public $email;
    public $credit_cart;
    public $gender;
    public $id_gender;
}
?>