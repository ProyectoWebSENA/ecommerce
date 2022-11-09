<?php

class DashboardController extends SessionController
{
  public function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $data = [];
    $user = new UserModel();
    $data = $user->getAllUsers();
    $this->view->render('dashboard/index', $data);
  }

  public function products()
  {
    $data = [];
    $user = new ProductModel();
    $data = $user->getAllProducts();
    $this->view->render('dashboard/products', $data);
  }
}
