<?php
namespace tests;
use PHPUnit\Framework\TestCase;
use app\User;
use app\DataUser;

require_once dirname(__FILE__).'/../app/DataUser.php';
require_once dirname(__FILE__).'/../app/User.php';

class DataUserTest extends TestCase
{ 
 protected $obj;
 /*
  * Тестируем метод NewUser, должен вернуть объект класса User
  */
 public function testNewUserReturnTrue()
 {
    /*
     * Создаем (мокаем) объект аналогичный User, т.к. он создается в методе 
     * getInstance текущего класса и далее используется.
     * Все его методы будут заглушками - возвращать NULL.
     */
    $user = $this->getMockBuilder(User::class)
    ->disableOriginalConstructor() //Отключаем конструктор т.к. не нужен
    ->getMock();
    /*
     * Переопределяем возвращаемое значение метода verify() с NULL на TRUE,
     * т.к. данный метод будет использоваться в тестируемом методе.
     */
    $user->expects($this->once())
    ->method('verify')
    ->will($this->returnValue(true));
    /*
     * Создаем (мокаем) объект аналогичный DataUser т.к. нужно
     *  переопределить метод getInstance. Он будет всегда возвращать объект User.
     */
    $DataUser = $this->getMockBuilder(DataUser::class)
    /*
     * Указываем методы на которые ставим заглушки. По-умолчанию будут возвращать
     * NULL, а так же их можно потом переопределить
     */
    ->setMethods(['getInstance'])
    ->getMock();
    /*
     * Меняем возвращаемое значение у метода getInstance.
     * Будет всегда возвращен объект из переменной $user
     * т.к. дальше в коде используется его метод verify()
     */
    $DataUser->expects($this->once())
    ->method('getInstance')
    ->will($this->returnValue($user));
    /*
     * Проверяем, принадлежит ли возвращаемый тестируемым методом объект
     * классу User
     */
    $this->assertTrue(is_a($DataUser->newUser([]), User::class));
 }
 /*
 * Тестируем метод NewUser, должен вернуть FALSE
 */
 public function testNewUserReturnFalse()
 {
    /*
     * Изменяем метод checkUser (ставим заглушку), чтобы он возвращал NULL
     * Проверка if ($this->checkUser($user)) не выполнится и метод вернет FALSE
     */
    $DataUser = $this->getMockBuilder(DataUser::class)
    ->setMethods(['getInstance', 'checkUser'])
    ->getMock();
    $this->assertFalse($DataUser->newUser([]));
 }
}