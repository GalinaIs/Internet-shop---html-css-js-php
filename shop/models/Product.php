<?php
namespace app\shop\models;

class Product extends DataEntity {
    public $id;
    public $name = '';
    public $cost = 0;
    public $info = '';
    public $path_img = '';
    public $category_name = [];
    public $brand = [];
    public $designer = [];
    public $size = [];
    public $trend = [];
    public $color = [];
    public $material = [];
}
?>