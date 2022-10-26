<?php

class ErrorController extends Controller
{
  function __construct()
  {
    parent::__construct();
    error_log("ERRORCONTROLLER::CONSTRUCT -> Inicio de Error");
  }

  function render()
  {
    error_log("ERROR::RENDER -> Render inicio 404");
    $this->view->render('404/index');
  }
}
