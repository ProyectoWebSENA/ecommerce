<?php

class ProductController extends SessionController
{
  function __construct()
  {
    parent::__construct();
  }

  function render()
  {
    $data = [];

    if ($this->existsGET(['id'])) {
      $id = $this->getGet('id');
    } else {
      $this->redirect('login', ['error' => "Errors::ERROR_AUTH_DATABASE"]);
    }
    $data['product'] = $this->model->get($id);
    $data['reviews'] = $this->model->getProductReviews($id);
    $this->view->render('product/index', $data);
  }
}
