<?php

class signupController extends SessionController
{
    function __construct()
    {
        parent:: __construct();
    }
 function render(){
    $this -> view -> render('login/singup');
 }
 
 function newUser(){
    if($this-> existsPOST(['name', 'username','email', 'cellphone',
    'address'
    ,'hash_pasword', 'pic_url', 'role'
    ])){
        $name = $this->getPost('name');
        $username= $this->getPost('username');
        $email = $this->getPost('email');
        $address = $this->getPost('address');
        $password = $this->getPost('password');
        $pic_url= $this->getPost('pic_url');
        $role = $this->getPost('role');
    }
  }
}
