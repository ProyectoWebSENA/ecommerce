<?php

class LoginController extends SessionController
{
  function __construct()
  {
    parent::__construct();
  }

  function render()
  {
    $this->view->render('login/index');
  }

  function authenticate()
  {
    if ($this->existsPOST(['email', 'password'])) {
      $email = $this->getPost('email');
      $password = $this->getPost('password');

      if ($email == '' || empty($email) || $password == '' || empty($password)) {
        error_log("LOGIN::AUTHENTICATE empty");
        $this->redirect('login', ['error' => Errors::ERROR_AUTH_EMPTY]);
        return false;
      }

      $user = $this->model->login($email, $password);

      if ($user != NULL) {
        error_log("LOGIN::AUTHENTICATE pasa");
        $this->initialize($user);
      } else {
        error_log("LOGIN::AUTHENTICATE usuario o contraseña inconrrectos");
        $this->redirect('login', ['error' => Errors::ERROR_AUTH_LOGIN_WRONG_PARAMS]);
      }
    } else {
      error_log("LOGIN::AUTHENTICATE error con los parametros");
      $this->redirect('login', ['error' => Errors::ERROR_AUTH_DATABASE]);
    }
  }
}
