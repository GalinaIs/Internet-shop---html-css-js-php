<?php
namespace app\shop\models\repositories;
use \app\shop\models\Product as Product;
use \app\shop\base\App as App;

class ProductRepository extends Repository {
    public function getTableName() {
        return 'products';
    }

    public function getEntityClass() {
        return Product::class;
    }

    public function getException() {
        return ['db', 'exception', 'id', 'image'];
    }

    private function getAllSize(Product $product) {
        $sql = 'select name from (select * from size_product where id_product = :id) as A INNER JOIN size 
        ON size.id = A.id_size';
        $allSize = static::getDb()->queryAll($sql, [':id' => $product->id]);
        return array_column($allSize, 'name');
    }

    private function getAllColor(Product $product) {
        $sql = 'select name from (select * from color_product where id_product = :id) as A INNER JOIN color 
        ON color.id = A.id_color';
        $allColor = static::getDb()->queryAll($sql, [':id' => $product->id]);
        return array_column($allColor, 'name');
    }

    private function getAllBrand(Product $product) {
        $sql = 'select name from (select * from brand_product where id_product = :id) as A INNER JOIN brand 
        ON brand.id = A.id_brand';
        $allBrand = static::getDb()->queryAll($sql, [':id' => $product->id]);
        return array_column($allBrand, 'name');
    }

    private function getAllDesigner(Product $product) {
        $sql = 'select name from (select * from designer_product where id_product = :id) as A INNER JOIN designer 
        ON designer.id = A.id_designer';
        $allDesigner = static::getDb()->queryAll($sql, [':id' => $product->id]);
        return array_column($allDesigner, 'name');
    }

    private function getAllTrend(Product $product) {
        $sql = 'select name from (select * from trend_product where id_product = :id) as A INNER JOIN trend 
        ON trend.id = A.id_trend';
        $allTrend = static::getDb()->queryAll($sql, [':id' => $product->id]);
        return array_column($allTrend, 'name');
    }

    private function getAllCategoryName(Product $product) {
        $sql = 'select name from (select * from category_product where id_product = :id) as A INNER JOIN category_thing 
        ON category_thing.id = A.id_category';
        $allCategoryName = static::getDb()->queryAll($sql, [':id' => $product->id]);
        return array_column($allCategoryName, 'name');
    }

    private function getAllMaterial(Product $product) {
        $sql = 'select name from (select * from material_product where id_product = :id) as A INNER JOIN material 
        ON material.id = A.id_material';
        $allMaterial = static::getDb()->queryAll($sql, [':id' => $product->id]);
        return array_column($allMaterial, 'name');
    }

    private function getAllSizeToProducts($products) {
        foreach($products as $oneProduct) {
            $oneProduct->size = $this->getAllSize($oneProduct);
        }
    }

    private function getAllColorToProducts($products) {
        foreach($products as $oneProduct) {
            $oneProduct->color = $this->getAllColor($oneProduct);
        }
    }

    private function getAllBrandToProducts($products) {
        foreach($products as $oneProduct) {
            $oneProduct->brand = $this->getAllBrand($oneProduct);
        }
    }

    private function getAllDesignerToProducts($products) {
        foreach($products as $oneProduct) {
            $oneProduct->designer = $this->getAllDesigner($oneProduct);
        }
    }

    private function getAllTrendToProducts($products) {
        foreach($products as $oneProduct) {
            $oneProduct->trend = $this->getAllTrend($oneProduct);
        }
    }

    private function getAllCategoryNameToProducts($products) {
        foreach($products as $oneProduct) {
            $oneProduct->category_name = $this->getAllCategoryName($oneProduct);
        }
    }

    private function getAllMaterialToProducts($products) {
        foreach($products as $oneProduct) {
            $oneProduct->material = $this->getAllMaterial($oneProduct);
        }
    }

    public function getAllProducts() {
        $products = $this->getAll();
        $this->getAllSizeToProducts($products);
        $this->getAllColorToProducts($products);
        $this->getAllBrandToProducts($products);
        $this->getAllDesignerToProducts($products);
        $this->getAllTrendToProducts($products);
        $this->getAllCategoryNameToProducts($products);
        $this->getAllMaterialToProducts($products);
        return $products;
    }

    public function getOneProduct($id) {
        $product = $this->getOne($id);
        $product->size = $this->getAllSize($product);
        $product->color = $this->getAllColor($product);
        $product->brand = $this->getAllBrand($product);
        $product->designer = $this->getAllDesigner($product);
        $product->trend = $this->getAllTrend($product);
        $product->category_name = $this->getAllCategoryName($product);
        $product->material = $this->getAllMaterial($product);
        return $product;
    }
}
?>