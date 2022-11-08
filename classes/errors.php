<?php

class Errors
{
  const ERROR_AUTH_EMPTY = "b15f0a6da0e9135656c615914d4f1beb";
  const ERROR_AUTH_LOGIN_WRONG_PARAMS = "56bb73f45b045c36aaa52108a6c2eeaf";
  const ERROR_AUTH_DATABASE = "6fa803235d7d9dabc49321b4ff6cfadd";
  const ERROR_AUTH_SIGNUP_NEWUSER_EXISTS = "8594da7a580dd5c973dc71c3e064a515";
  const ERROR_AUTH_SIGNUP_NEWUSER_SAVE = "8e90df7c259da8b25277c0e51a1367af";
  const ERROR_AUTH_SIGNUP_NEWUSER_PASSWORDS_DIFFER = "ae5a5bbd690498f76e1279ace4b50c7f";

  private $errorList = [];

  public function __construct()
  {
    $this->errorList = [
      Errors::ERROR_AUTH_EMPTY => "No todos los campos solicitados fueron completados. Por favor intentelo de nuevo.",
      Errors::ERROR_AUTH_LOGIN_WRONG_PARAMS => "El usuario o la contraseña no coinciden con ningun usuario registrado.",
      Errors::ERROR_AUTH_DATABASE => "Se ha presentado un error en nuestro servidor. Por favor intentalo más tarde.",
      Errors::ERROR_AUTH_SIGNUP_NEWUSER_EXISTS => "El correo con el que está intentando registarse ya existe en nuestra plataforma.",
      Errors::ERROR_AUTH_SIGNUP_NEWUSER_SAVE => "Ocurrió un problema en nuestros servidores. Por favor vuelva a intentarlo.",
      Errors::ERROR_AUTH_SIGNUP_NEWUSER_PASSWORDS_DIFFER => "Las contraseñas no coinciden."
    ];
  }

  function get($hash)
  {
    return $this->errorList[$hash];
  }

  function existsKey($key)
  {
    if (array_key_exists($key, $this->errorList)) {
      return true;
    } else {
      return false;
    }
  }
}
