<?php
require_once dirname(__FILE__).'/../User.php';
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testVerifyPassword()
    {
        $obj = new User();
        $user['password'] = '123';
        $this->expectException(LengthException::class);
        $obj->verifyPassword($user);
    }
}