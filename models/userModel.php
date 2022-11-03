<?php

class UserModel extends Model implements IModel
{
  private $id;
  private $name;
  private $username;
  private $email;
  private $cellphone;
  private $address;
  private $hash_password;
  private $pic_url;

  public function __construct()
  {
    parent::__construct();
    $this->id = "";
    $this->name = "";
    $this->username = "";
    $this->email = "";
    $this->cellphone = 0;
    $this->address = "";
    $this->hash_password = "";
    $this->pic_url = "";
  }

  public function save()
  {
    try {
      $query = $this->prepare("INSERT INTO usuarios (name, username, email, cellphone, address,
      hash_password, pic_url) ) VALUES (:name, :username, :email, :cellphone, :address, :hash_password, :pic_url)");
      $query->execute([
        "name" => $this->name,
        "username" => $this->username,
        "email" => $this->email,
        "ccellphone" => $this->cellphone,
        "address" => $this->address,
        "hash_password" => $this->hash_password,
        "pic_url" => $this->pic_url,
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
      $this->username = $user['username'];
      $this->email = $user['email'];
      $this->cellphone = $user['cellphone'];
      $this->address = $user['address'];
      $this->hash_password = $user['hash_password'];
      $this->pic_url = $user['pic_url'];
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
      $query = $this->prepare("UPDATE usuarios SET name, username = :username, email = :email, cellphone = :cellphone, 
      address = :address, hash_password = :hash_password,  pic_url= :pic_url WHERE id = :id");
      $query->execute([
        "id" => $this->id,
        "name" => $this->name,
        "username" => $this->username,
        "email" => $this->email,
        "ccellphone" => $this->cellphone,
        "address" => $this->address,
        "hash_password" => $this->hash_password,
        "pic_url" => $this->pic_url,
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
    $this->username = $array['username'];
    $this->email = $array['email'];
    $this->cellphone = $array['cellphone'];
    $this->address = $array['address'];
    $this->hash_password = $array['hash_password'];
    $this->pic_url = $array['pic_url'];
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
  public function setUsername($username)
  {
    $this->username = $username;
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
    if($hash){
    $this->hash_password = $this->getHashedPassword($password);
  }else{
    $this->hash_password  = $password;
  }
}
  public function setPic($pic_url)
  {
    $this->pic_url = $pic_url;
  }



  public function getId()
  {
    $this->id;
  }
  public function getName()
  {
    $this->name;
  }
  public function getUsername()
  {
    $this->username;
  }
  public function getEmail()
  {
    $this->email;
  }
  public function getCellphone()
  {
    $this->cellphone;
  }
  public function getAdrees()
  {
    $this->address;
  }
  public function getPassword()
  {
    $this->hash_password;
  }
  public function getPic()
  {
    $this->pic_url;
  }
}