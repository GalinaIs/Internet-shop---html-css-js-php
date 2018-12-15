<?php
return [
    'rootDir' => __DIR__ . "/../",
    'templatesDir' => __DIR__ . "/../views/",
    'defaultController' => 'product',
    'controllerNamespace' => "app\\shop\\controllers",
    'components' => [
        'db' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'isyanova_shop',
            'charset' => 'utf8'     
        ],
        'request' => [
            'class' => \app\services\request\Request::class
        ],
        'renderer' => [
            'class' => \app\shop\services\renderers\TemplateRenderer::class
        ],
        'session' => [
            'class' => \app\services\Session::class
        ],
        'repository' => [
            'class' => \app\shop\models\repositories\AppRepository::class
        ],
        'files' => [
            'class' => \app\services\Files::class
        ],
        'resize' => [
            'class' => \app\vendor\Resize::class
        ],
    ]
]
?>