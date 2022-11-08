<?php

require_once 'controllers/errorController.php';
class App
{
  function __construct()
  {
    $url = isset($_GET['url']) ? $_GET['url'] : null;

    if (empty($url)) {
      $archController = 'controllers/homeController.php';
      require_once $archController;
      $controller = new HomeController();
      $controller->loadModel('home');
      $controller->render();
      return false;
    }

    $url = rtrim($url, '/');
    $url = explode('/', $url);

    $archController = 'controllers/' . $url[0] . 'Controller.php';

    if (file_exists($archController)) {
      require_once $archController;

      $controllerName = $url[0] . 'Controller';
      $controller = new $controllerName;

      $controller->loadModel($url[0]);

      if (isset($url[1])) {
        if (method_exists($controller, $url[1])) {
          if (isset($url[2])) {
            $nparam = sizeof($url) - 2;
            $params = [];

            for ($i = 0; $i < $nparam; $i++) {
              array_push($params, $url[$i] + 2);
            }

            $controller->{$url[1]}($params);
          } else {
            $controller->{$url[1]}();
          }
        } else {
          //No existe el metodo -> 404
          $controller = new ErrorController();
        }
      } else {
        $controller->render();
      }
    } else {
      //No existe el controlador -> 404
      $controller = new ErrorController();
    }
  }
}
