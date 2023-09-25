<?php
require_once dirname(__FILE__).'/../User.php';
use PHPUnit\Framework\TestCase;
class UserTest extends TestCase
{
    public function testGetPassword()
    {
        $obj = new User();
        $user['login'] = 'login';
        $this->assertArrayHasKey('password', $obj->getPassword($user));
    }
}