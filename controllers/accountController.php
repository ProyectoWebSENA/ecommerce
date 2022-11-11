<?php

class AccountController extends SessionController
{
  public function __construct()
  {
    parent::__construct();
    $session = new Session();
  }

  public function render()
  {
    $data = [];
    $data = $this->getUserData($_SESSION['user']);
    $this->view->render('account/index', $data);
  }

  public function getUserData($userId)
  {
    $user = new UserModel();
    return $user->get($userId);
  }

  public function updateUserData()
  {
    if ($this->existsPOST(['name', 'email', 'cellphone', 'address', 'password', 'coPassword'])) {
      $name = $this->getPost('name');
      $email = $this->getPost('email');
      $cellphone = $this->getPost('cellphone');
      $address = $this->getPost('address');
      $password = $this->getPost('password');
      $coPassword = $this->getPost('coPassword');

      if (
        $name == '' || empty($name) || $email == '' || empty($email) || $cellphone == '' || empty($cellphone) || $address == '' || empty($address)
      ) {
        $this->redirect('account', ['error' => Errors::ERROR_AUTH_EMPTY]);
      }

      $user = new UserModel();
      $user->setId($_SESSION['user']);
      $user->setName($name);
      $user->setEmail($email);
      $user->setCellphone($cellphone);
      $user->setAddress($address);

      if ($password == '' || empty($password) || $coPassword == '' || empty($coPassword)) {
        if ($user->update()) {
          $this->redirect('account');
        } else {
          $this->redirect('account', ['error' => 'Error actualizando usuario']);
        }
      } else {
        if ($user->compareSignupPasswords($password, $coPassword)) {
          $user->setPassword($password);

          if ($user->update()) {
            if ($user->updatePassword()) {
              $this->logout();
              $this->redirect('login');
            } else {
              $this->redirect('account', ['error' => Errors::ERROR_AUTH_SIGNUP_NEWUSER_SAVE]);
            }
          } else {
            $this->redirect('account', ['error' => Errors::ERROR_AUTH_SIGNUP_NEWUSER_SAVE]);
          }
        } else {
          $this->redirect('account', ['error' => Errors::ERROR_AUTH_SIGNUP_NEWUSER_PASSWORDS_DIFFER]);
        }
      }
    } else {
      $this->redirect('account', ['error' => Errors::ERROR_AUTH_DATABASE]);
    }
  }

  public function deleteUserAccount()
  {
  }
}
