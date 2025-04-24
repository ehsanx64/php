<?php
class Controller {
    private $layout = 'materialize';
    private $pageTitle = 'Title';

    public function __construct() {

    }

    public final function render($viewName, $params = array()) {
        $viewFilename = VIEW_DIR . DS . str_replace('controller', '', strtolower(get_class($this)))
            . DS . $viewName . '.php';
        ob_start();
        ob_implicit_flush(false);
        extract($params, EXTR_OVERWRITE);
        require $viewFilename;
        $actionOutput = ob_get_clean();
        echo $this->renderLayout($actionOutput);
    }

    public final function renderContent($viewName, $params = array()) {
        $controllerName = cleanControllerName(get_class($this));
        $viewFilename = VIEW_DIR . DS . $controllerName . DS . $viewName . '.php';
        ob_start();
        ob_implicit_flush(false);
        extract($params, EXTR_OVERWRITE);
        require $viewFilename;
        $actionOutput = ob_get_clean();
        return $actionOutput;
    }

    public function renderLayout($content, $layoutFile = '') {
        $defaultLayoutFile = LAYOUT_DIR . DS . $this->layout . '.php';
        if (empty($layoutFile) || !file_exists(LAYOUT_DIR . DS . $layoutFile)) {
            ob_start();
            ob_implicit_flush(false);
            require $defaultLayoutFile;
            $layoutOutput = ob_get_clean();
        } else {
            ob_start();
            ob_implicit_flush(false);
            require LAYOUT_DIR . DS . $layoutFile . '.php';
            $layoutOutput = ob_get_clean();
        }
        return $layoutOutput;
    }
}
