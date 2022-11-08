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
        $this->redirect('signup', ['error' => "Campos invalidos"]);
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
          $this->redirect('signup', ['error' => "El usuario ya existe"]);
        }

        if ($user->save()) {
          $this->redirect('', ['success' => "Usuario registrado correctamente"]);
        } else {
          $this->redirect('signup', ['error' => "Error inesperado"]);
        }
      } else {
        $this->redirect('signup', ['error' => "Contraseñas no coinciden"]);
      }
    } else {
      $this->redirect('signup', ['error' => "Error los campos obligatorios no fueron completados "]);
    }
  }
}
