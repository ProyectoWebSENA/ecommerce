<?php

class UserModel extends Model implements IModel
{
  private $id;
  private $name;
  private $email;
  private $cellphone;
  private $address;
  private $password;
  private $role;

  public function __construct()
  {
    parent::__construct();
    $this->id = 0;
    $this->name = "";
    $this->email = "";
    $this->cellphone = 0;
    $this->address = "";
    $this->password = "";
    $this->role = "";
  }

  public function save()
  {
    try {
      $query = $this->prepare("INSERT INTO users 
        (name, email, cellphone, address, password, role) 
        VALUES (:name, :email, :cellphone, :address, :password, :role)");
      $query->execute([
        'name' => $this->name,
        'email' => $this->email,
        'cellphone' => $this->cellphone,
        'address' => $this->address,
        'password' => $this->password,
        'role' => $this->role
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("USERMODEL::SAVE-> " . $e->getMessage());
      return false;
    }
  }

  public function getAllUsers()
  {
    try {
      $query = $this->query('SELECT * FROM users');
      $items = $query->fetchAll(PDO::FETCH_ASSOC);
      return $items;
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function get($id)
  {
    try {
      $query = $this->prepare("SELECT * 
        FROM users 
        WHERE id = :id");
      $query->execute(['id' => $id]);
      $user = $query->fetch(PDO::FETCH_ASSOC);
      return $user;
    } catch (PDOException $e) {
      error_log("USERMODEL::GET -> " . $e->getMessage());
      return false;
    }
  }

  public function delete($id)
  {
    try {
      $query = $this->prepare("DELETE FROM users 
        WHERE id = :id");
      $query->execute(['id' => $id]);
      return true;
    } catch (PDOException $e) {
      error_log("USERMODEL::DELETE ->" . $e->getMessage());
      return false;
    }
  }

  public function update()
  {
    try {
      $query = $this->prepare("UPDATE users 
        SET name = :name, email = :email, cellphone = :cellphone, 
        address = :address
        WHERE id = :id");
      $query->execute([
        "name" => $this->name,
        "email" => $this->email,
        "cellphone" => $this->cellphone,
        "address" => $this->address,
        "id" => $this->id
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("USERMODEL::UPDATE-> " . $e->getMessage());
      return false;
    }
  }

  public function updatePassword()
  {
    try {
      $query = $this->prepare("UPDATE users SET password = :password WHERE id = :id");
      $query->execute([
        "password" => $this->password,
        "id" => $this->id
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("USERMODEL::UPDATEPASSWORD-> " . $e->getMessage());
      return false;
    }
  }

  public function from($array)
  {
    $this->id = $array['id'];
    $this->name = $array['name'];
    $this->email = $array['email'];
    $this->cellphone = $array['cellphone'];
    $this->address = $array['address'];
    $this->password = $array['password'];
    $this->role = $array['role'];
  }

  public function exists($email)
  {
    try {
      $query = $this->prepare("SELECT email 
        FROM users 
        WHERE email = :email");
      $query->execute(['email' => $email]);
      $query->fetch(PDO::FETCH_ASSOC);
      if ($query->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      error_log("USERMODEL::EXISTS -> " . $e->getMessage());
      return false;
    }
  }

  public function compareSignupPasswords($password, $coPassword)
  {
    if ($password === $coPassword) return true;

    return false;
  }

  private function getHashedPassword($password)
  {
    return password_hash($password, PASSWORD_ARGON2I, ['cost' => 10]);
  }

  //Metodos Setters
  public function setId($id)
  {
    $this->id = $id;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function setCellphone($cellphone)
  {
    $this->cellphone = $cellphone;
  }
  public function setAddress($address)
  {
    $this->address = $address;
  }
  public function setPassword($password, $hash = true)
  {
    if ($hash) {
      $this->password = $this->getHashedPassword($password);
    } else {
      $this->password  = $password;
    }
  }
  public function setRole($role)
  {
    $this->role = $role;
  }

  //Metodos Getters
  public function getId()
  {
    return $this->id;
  }
  public function getName()
  {
    return $this->name;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getCellphone()
  {
    return $this->cellphone;
  }
  public function getAddress()
  {
    return $this->address;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function getRole()
  {
    return $this->role;
  }
}
