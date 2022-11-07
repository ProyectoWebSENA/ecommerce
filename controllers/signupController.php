<?php

class SignupController extends SessionController
{
  function __construct()
  {
    parent::__construct();
  }
  function render()
  {
    $this->view->render('login/signup');
  }

  function newUser()
  {
    if ($this->existsPOST(['name', 'email', 'cellphone', 'address', 'hash_pasword', 'role'])) {
      $name = $this->getPost('name');
      $email = $this->getPost('email');
      $address = $this->getPost('address');
      $password = $this->getPost('password');
      $role = $this->getPost('role');
    }
  }
}
