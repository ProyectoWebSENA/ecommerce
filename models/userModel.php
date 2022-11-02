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
    parent ::__construct();
    $this->id ="";
    $this->name ="";
    $this->username ="";
    $this->email ="";
    $this->cellphone =0;
    $this->address ="";
    $this->hash_password ="";
    $this->pic_url ="";
  }

  public function save()
  {
  }
  public function get($id)
  {
  }
  public function delete($id)
  {
  }
  public function update()
  {
  }
  public function from($array)
  {
  }

  public function setId($id) { $this -> id = $id;}
  public function seName($name) { $this -> name = $name;}
  public function setUsername($username) { $this -> username = $username;}
  public function setEmail($email) { $this -> email = $email;}
  public function setCellphone($cellphone) { $this -> cellphone = $cellphone;}
  public function setAdrees($address) { $this -> address = $address;}
  public function setPassword($hash_password) { $this -> hash_password = $hash_password;}
  public function setPic($pic_url) { $this -> pic_url = $pic_url;} 



  public function getId() { $this -> id ;}
  public function getName() { $this -> name ;}
  public function getUsername() { $this -> username;}
  public function getEmail() { $this -> email ;}
  public function getCellphone() { $this -> cellphone ;}
  public function getAdrees() { $this -> address ;}
  public function getPassword() { $this -> hash_password ;}
  public function getPic() { $this -> pic_url ;}
}
