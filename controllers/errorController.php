<?php

class ErrorController extends Controller
{
  function __construct()
  {
    parent::__construct();
    $this->view->render('404/index');
    error_log("ERRORCONTROLLER::CONSTRUCT -> Inicio de Error");
  }
}
