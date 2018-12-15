<?php
namespace app\shop\models\repositories;
use \app\shop\models\DataEntity as DataEntity;

interface IRepository {
    public function getOne($id);
    public function getAll();
    public function getTableName();
    public function save(DataEntity $entity);
    public function delete(DataEntity $entity);
    public function getEntityClass();
    public function getException();
}
?>