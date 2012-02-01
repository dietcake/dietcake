<?php
class View
{
    public $controller;             // コントローラへの参照
    public $vars = array();         // 展開する変数
    public static $ext = '.php';

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    /**
     * コンテンツをレンダリングする
     *
     * $this->render(); // 現在のコントローラ/アクションのビュー
     * $this->render('edit'); // 現在のコントローラ、edit アクションのビュー
     * $this->render('error/503'); // error コントローラ、503 アクションのビューをレンダリング
     *
     * @param string $action レンダリングするアクション名
     * @return void
     */
    public function render($action = null)
    {
        $action = is_null($action) ? $this->controller->action : $action;
        if (strpos($action, '/') === false) {
            $view_filename = VIEWS_DIR . $this->controller->name . '/' . $action . self::$ext;
        } else {
            $view_filename = VIEWS_DIR . $action . self::$ext;
        }
        $content = self::extract($view_filename, $this->vars);
        $this->controller->output .= $content;
    }

    public static function extract($filename, $vars)
    {
        if (!file_exists($filename)) {
            throw new DCException("{$filename} is not found");
        }

        extract($vars, EXTR_SKIP);
        ob_start();
        ob_implicit_flush(0);
        include $filename;
        $out = ob_get_clean();
        return $out;
    }
}
