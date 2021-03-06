<?php
namespace App\Controllers;

use App\Core\App;

class UsersController
{
  public function allUsers(){
    $users = App::get('database')->getAll('users');
    echo json_encode($users);
  }

  public function oneUser($params){
    $user = App::get('database')->getOne('users', $params['userId']);
    echo json_encode($user);
  }

  public function addUser(){
    $credentials = $_POST;
    $credentials['password'] = hashPassword($credentials);
    App::get('database')->addNew("users", $credentials);
    echo json_encode('sucess');
  }

}

