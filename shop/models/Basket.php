<?php
namespace app\shop\models;

class Basket extends DataEntity {
    public $id;
    public $id_product;
    public $id_user;
    public $quantity;
    public $id_color;
    public $color;
    public $id_size;
    public $size;
    public $name;
    public $path_img;
    public $cost;
    //private $allCost;

    /*public function calculateCost() {
        $this->allCost = $this->cost * $this->quantity;
    }

    public function getCost() {
        return $this->allCost;
    }*/
}
?>