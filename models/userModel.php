<?php

class UserModel extends Model implements IModel
{
  private $id;
  private $name;
  private $email;
  private $cellphone;
  private $address;
  private $hash_password;
  private $role;

  public function __construct()
  {
    parent::__construct();
    $this->id = "";
    $this->name = "";
    $this->email = "";
    $this->cellphone = 0;
    $this->address = "";
    $this->hash_password = "";
    $this->role = "";
  }

  public function save()
  {
    try {
      $query = $this->prepare("INSERT INTO usuarios (name, email, cellphone, address,
      hash_password, role) ) VALUES (:name, :email, :cellphone, :address, :hash_password, :role)");
      $query->execute([
        "name" => $this->name,
        "email" => $this->email,
        "cellphone" => $this->cellphone,
        "address" => $this->address,
        "hash_password" => $this->hash_password,
        "role" => $this->role
      ]);
    } catch (PDOException $e) {
      error_log("USERMODEL::SAVE-> " . $e->getMessage());
      return false;
    }
  }
  public function get($id)
  {
    try {
      $query = $this->prepare("SELECT * FROM usuarios Where id = :id");
      $query->execute(['id' => $id]);
      $user = $query->fetch(PDO::FETCH_ASSOC);

      $this->name = $user['name'];
      $this->email = $user['email'];
      $this->cellphone = $user['cellphone'];
      $this->address = $user['address'];
      $this->hash_password = $user['hash_password'];
      $this->role = $user['role'];
      return $this;
    } catch (PDOException $e) {
      error_log("USERMODEL::GET -> " . $e->getMessage());
      return false;
    }
  }
  public function delete($id)
  {
    try {
      $query = $this->prepare("DELETE FROM usuarios Where id = :id");
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
      $query = $this->prepare("UPDATE usuarios SET name = :name, email = :email, cellphone = :cellphone, 
      address = :address, hash_password = :hash_password, role = :role WHERE id = :id");
      $query->execute([
        "id" => $this->id,
        "name" => $this->name,
        "email" => $this->email,
        "ccellphone" => $this->cellphone,
        "address" => $this->address,
        "hash_password" => $this->hash_password,
        "role" => $this->role
      ]);
      return true;
    } catch (PDOException $e) {
      error_log("USERMODEL::UPDATE-> " . $e->getMessage());
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
    $this->hash_password = $array['hash_password'];
    $this->role = $array['role'];
  }

  public function setId($id)
  {
    $this->id = $id;
  }
  private function getHashedPassword($password)
  {
    return password_hash($password, PASSWORD_ARGON2I, ['cost' => 10]);
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
  public function setAdrees($address)
  {
    $this->address = $address;
  }
  public function setPassword($password, $hash = true)
  {
    if ($hash) {
      $this->hash_password = $this->getHashedPassword($password);
    } else {
      $this->hash_password  = $password;
    }
  }
  public function setRole($role)
  {
    $this->role = $role;
  }


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
  public function getAdrees()
  {
    return $this->address;
  }
  public function getPassword()
  {
    return $this->hash_password;
  }
  public function getRole()
  {
    return $this->role;
  }
}
