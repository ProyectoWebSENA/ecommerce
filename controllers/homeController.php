<?php

class HomeController extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function render()
  {
    $data = [];
    $data['categories'] = $this->model->getCategories();
    $data['products'] = $this->model->getProducts();
    $this->view->render('home/index', $data);
  }


  function searchAllProducts()
  {
    if ($this->model->getAll()) {
      return $this->model;
    } else {
      $this->redirect('product', ['error' => "Error inesperado"]);
    }
  }

  function searchAllProductsWithParameter()
  {
    if ($this->existsPOST(['name'])) {
      $name = $this->getPost('name');
      if ($name == '' || empty($name)) {
        error_log("HOMECONTROLLER::SEARCHALLPRODUCTSWITHPARAMETER empty");
        $this->redirect('product', ['error' => 'Campos vacios']);
        return false;
      }

      if ($this->model->getAllWithParameter($name)) {
        return $this->model;
      } else {
        $this->redirect('product', ['error' => "Error inesperado"]);
      }
    } else {
      $this->redirect('product', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }
}
