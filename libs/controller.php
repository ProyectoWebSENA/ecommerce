<?php

class Controller
{
  function __construct()
  {
    $this->view = new View();
  }

  function loadModel($model)
  {
    $url = 'models/' . $model . 'Model.php';

    if (file_exists($url)) {
      require_once $url;

      $modelName = $model . 'Model';
      $this->model = new $modelName();
    }
  }

  function existsPOST($params)
  {
    foreach ($params as $param) {
      if (!isset($_POST[$param])) {
        error_log("CONTROLLER::EXITSPOST -> no existe el parametro " . $param);
        return false;
      }
    }

    return true;
  }

  function existsGET($params)
  {
    foreach ($params as $param) {
      if (!isset($_GET[$param])) {
        error_log("CONTROLLER::EXISTSGET -> no existe el parametro " . $param);
        return false;
      }
    }

    return true;
  }

  function getPost($name)
  {
    return $_POST[$name];
  }

  function getGet($name)
  {
    return $_GET[$name];
  }

  function redirect($url, $messages = [])
  {
    $data = [];
    $params = [];

    foreach ($messages as $key => $value) {
      array_push($data, $key . '=' . $value);
    }

    $params = join('&', $data);

    if ($params != '') {
      $params = '?' . $params;
    }
    header('Location: ' . constant('URL') . $url . $params);
  }
}
