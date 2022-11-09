<?php

class DashboardController extends SessionController
{
  public function __construct()
  {
    parent::__construct();
  }

  public function render()
  {
    $this->view->render('dashboard/template');
  }

  public function searchAllUser(){
    $user = new UserModel();
    $data = $user->getAllUsers();
    $this->view->render('dashboard/template',$data);
  }

  public function searchAllCategories(){
    $category = new CategoryModel();
    $data = $category->getAll();
    $this->view->render('dashboard/template',$data);
  }

  public function searchAllProducts(){
    $product = new ProductModel();
    $data = $product->getAll();
    $this->view->render('dashboard/template',$data);
  }
}
