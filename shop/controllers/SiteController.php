<?php
namespace app\shop\controllers;
use \app\shop\base\App as App;

abstract class SiteController implements ISiteController {
    private $action;
    private $layout = 'main';
    private $layoutLine = 'main_with_line';
    private $useLayout = true;

    public function run($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            throw new \Exception("Ошибка! Запрашиваемая страница не найдена!");
        }       
    }

    public function renderTemplate($template, $params = []) {
        return App::call()->renderer->render($template, $params);
    }

    public function render($template, $params = [], $useLayoutLine = false) {
        if ($this->useLayout) {
            if ($useLayoutLine) {
                $content = $this->renderTemplate($template, $params);
                return $this->renderTemplate("layouts/{$this->layoutLine}", ['content' => $content]);
            }

            $content = $this->renderTemplate($template, $params);
            return $this->renderTemplate("layouts/{$this->layout}", ['content' => $content]);
        }

        return $this->renderTemplate($template, $params);
    }

    public function redirect($url) {
        header("Location: {$url}");
        exit;
    }
}
?>
