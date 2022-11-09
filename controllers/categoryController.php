<?php
class CategoryController extends SessionController
{
  public function __construct()
  {
    parent::__construct();
  }

  function render()
  {
    $this->view->render('404/index');
  }

  function view()
  {
    $this->view->render('category/index');
  }
}
