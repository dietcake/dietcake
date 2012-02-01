<?php
class Dispatcher
{
    public static function invoke()
    {
        list($controller_name, $action_name) = self::parseAction(Param::get(DC_ACTION));

        $controller = self::getController($controller_name);

        $controller->action = $action_name;
        $controller->beforeFilter();
        $controller->dispatchAction();
        $controller->afterFilter();

        echo $controller->output;
    }

    /**
     * コントローラ/アクション名を取得する
     *
     * url は必ず http://example.com/index.php?dc_action=controller-name/action-name の形
     *
     */
    public static function parseAction($action)
    {
        $action = explode('/', $action);

        if (count($action) < 2) {
            throw new DCException('invalid url format');
        }
        $action_name = array_pop($action);
        $controller_name = join("_", $action);

        return array($controller_name, $action_name);
    }

    public static function getController($controller_name)
    {
        $controller_class = Inflector::camelize($controller_name) . 'Controller';
       
        if (!class_exists($controller_class)) {
            throw new DCException("{$controller_class} is not found");
        }

        return new $controller_class($controller_name);
    }
}
