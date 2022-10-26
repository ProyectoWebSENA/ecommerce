<?php

class View
{
  function __construct()
  {
  }

  function render($viewName, $data = [])
  {
    $this->classData = $data;

    //$this -> handleMessages();

    require_once 'views/' . $viewName . '.php';
  }
}
