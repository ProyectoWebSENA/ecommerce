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
}
