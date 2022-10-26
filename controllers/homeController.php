<?php

class HomeController extends Controller
{
  function __construct()
  {
    error_log("LOGIN::CONSTRUCT -> Inicio home");
    parent::__construct();
  }

  function render()
  {
    error_log("LOGIN::RENDER -> Render incio home");
    $this->view->render('home/index');
  }
}
