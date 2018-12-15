<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . "/../shop/config/main.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";

\app\shop\base\App::call()->run($config);
?>