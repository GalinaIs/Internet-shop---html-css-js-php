<?php
namespace app\shop\services\renderers;
use \app\shop\base\App as App;

class TemplateRenderer implements IRenderer {
    public function render($template, $params = []) {
        ob_start();
        extract($params);
        include App::call()->config['templatesDir'] . $template . '.php';
        return ob_get_clean();
    }
}
?>