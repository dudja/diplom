<?php

/*
 * *Класс маршрутизации
 */

class Routing {

    public static function buildRoute()
    {
        /*Контроллер и действие по умолчанию*/
        $controllerName = "IndexController";
        $modelName = "IndexModel";
        $action = "index";

        $route = explode("/", $_SERVER['REQUEST_URI']);

        /*Определяем контроллер по умолчанию*/
        if ($route[1] != '') {
            $controllerName = ucfirst($route[1] . "Controller");
            $modelName = ucfirst($route[1] . "Model");
        }

        include CONTROLLER_PATH . $controllerName . ".php";
        include MODEL_PATH . $modelName . ".php";

        if (isset($route[2]) && ($route[2] != '')) {
            $action = $route[2];
        }

        $controller = new $controllerName();
        $controller->$action();
    }

    public function errorPage(){

    }

}
