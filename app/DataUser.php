<?php
namespace app;
class DataUser
{
 public function newUser(array $data){
    $user = $this->getInstance($data);
    if ($this->checkUser($user)){
        $user->password = md5(uniqid($user->name));
        return $user;
    }
    return false;
 }
 protected function getInstance($data){
    return new User($data);
 }
 protected function checkUser($user){
    if($user->verify()){
        return true;
    }
    return false;
 }
}