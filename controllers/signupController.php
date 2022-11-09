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
    if ($this->existsPOST(['name', 'email', 'cellphone', 'address', 'password'])) {
      $name = $this->getPost('name');
      $email = $this->getPost('email');
      $cellphone = $this->getPost('cellphone');
      $address = $this->getPost('address');
      $password = $this->getPost('password');
      $coPassword = $this->getPost('coPassword');

      if (
        $name == '' || empty($name) || $email == '' || empty($email) || $cellphone == '' || empty($cellphone) || $address == '' || empty($address) || $password == '' || empty($password)
      ) {
        $this->redirect('signup', ['error' => Errors::ERROR_AUTH_EMPTY]);
      }

      $user = new UserModel();

      if ($user->compareSignupPasswords($password, $coPassword)) {
        $user->setName($name);
        $user->setEmail($email);
        $user->setCellphone($cellphone);
        $user->setAddress($address);
        $user->setPassword($password);
        $user->setRole("user");

        if ($user->exists($email)) {
          $this->redirect('signup', ['error' => Errors::ERROR_AUTH_SIGNUP_NEWUSER_EXISTS]);
        }

        if ($user->save()) {
          $this->redirect('login');
        } else {
          $this->redirect('signup', ['error' => Errors::ERROR_AUTH_SIGNUP_NEWUSER_SAVE]);
        }
      } else {
        $this->redirect('signup', ['error' => Errors::ERROR_AUTH_SIGNUP_NEWUSER_PASSWORDS_DIFFER]);
      }
    } else {
      $this->redirect('signup', ['error' => Errors::ERROR_AUTH_DATABASE]);
    }
  }
}
