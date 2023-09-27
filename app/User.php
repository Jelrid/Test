<?php
namespace app;
class User 
{
 public $name;
 public $email;
 public $password;
 public function __construct($data) {
$this->name = $data['name'];
$this->email = $data['email'];
 }
 public function verify(){
if ($this->name && $this->email){
return true;
}
return false;
 }
}