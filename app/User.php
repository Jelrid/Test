<?php
namespace app;
class User
{ 
 public function verifyPassword(array $user){
 
    if(strlen($user['password'])<4){
        throw new LengthException('Количество символов в пароле (' .$user['password']. ') не соответствует требованиям.');
    }
    //
 }
}