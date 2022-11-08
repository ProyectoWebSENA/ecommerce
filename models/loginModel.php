<?php

class LoginModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function login($email, $password)
  {
    error_log("LOGINMODEL:LOGIN inicio");

    try {
      $query = $this->prepare("SELECT * FROM usuarios WHERE email = :email");
      $query->execute(['email' => $email]);

      if ($query->rowCount() == 1) {
        $item = $query->fetch(PDO::FETCH_ASSOC);

        $user = new UserModel();
        $user->from($item);

        error_log("LOGINMODEL::LOGIN id: " . $user->getId());

        if (password_verify($password, $user->getPassword())) {
          error_log("LOGINMODEL::LOGIN exito");
          return $user;
        } else {
          return NULL;
        }
      }
    } catch (PDOException $e) {
      error_log("LOGINMODEL::LOGIN PDOException -> " . $e->getMessage());
      return NULL;
    }
  }
}
