<?php
namespace app\shop\services\renderers;

interface IRenderer {
    public function render($template, $params = []);
}
?>