<?php
class Controller
{
    public $name;           // コントローラ名
    public $action;         // アクション名
    public $view;           // ビュー

    public $default_view_class = 'View';     // デフォルトのビュークラス名

    public $output;         // 出力結果

    public function __construct($name)
    {
        $this->name = $name;
        $this->view = new $this->default_view_class($this);
    }

    public function beforeFilter()
    {
    }

    public function afterFilter()
    {
    }

    public function dispatchAction()
    {
        if (!self::isAction($this->action)) {
            // アクション名が予約語などで正しくないとき
            throw new DCException('invalid action name');
        } 

        if (!method_exists($this, '__call')) {
            if (!method_exists($this, $this->action)) {
                // アクションがコントローラに存在しないとき
                throw new DCException('action does not exist');
            }
            $method = new ReflectionMethod($this, $this->action);
            if (!$method->isPublic()) {
                // アクションが public メソッドではないとき
                throw new DCException('action is not public');
            }
        }

        // アクションの実行
        $this->{$this->action}();

        $this->render();
    }

    // アクション名の妥当性を検証する
    public static function isAction($action)
    {
        $methods = get_class_methods('Controller');
        return !in_array($action, $methods);
    }

    // ビューに値を渡す
    public function set($name, $value = null)
    {
        if (is_array($name)) {
            foreach ($name as $k => $v) {
                $this->view->vars[$k] = $v;
            }
        } else {
            $this->view->vars[$name] = $value;
        }
    }

    public function beforeRender()
    {
    }

    public function render($action = null)
    {
        static $is_rendered = false;

        if ($is_rendered) {
            return;
        }

        $this->beforeRender();
        $this->view->render($action);
        $is_rendered = true;
    }
}
