<?php
namespace tests;
use PHPUnit\Framework\TestCase;
use app\Connection;

require_once dirname(__FILE__).'/../app/Connection.php';
class ConnectionTest extends TestCase
{
    protected $obj; //объект тестируемого класса
    /*
     * Метод вызывается в начале тестирования
     * Тут создаем объект класса который будем тестировать
     * при его создании выполняется метод-конструктор прописанный в данном классе
     */
    protected function setUp(): void {
        $this->obj = new Connection();
    }
    /**
     * @dataProvider hostsProvider
     * Тест проходит успешно если возвращаемое значение равно true
     * Проверяем на заведомо существующих доменах.
     * Используется метод провайдер данных (hostsProvider) для получения аргумента $a
     */
    public function testSiteVerificationTrue($a){
        $this->assertTrue($this->obj->siteVerification($a));
    }
    /*
     * Метод предоставляющий данные для тестирования.
     * Для каждого массива будет произведен отдельный тест
     */
    public function hostsProvider(){
        return [
            ['ukr.net'],
            ['klisl.com'],
        ];
    }
    /*
     * Тест проходит успешно если возвращаемое значение равно false
     * Тестируем с несуществующим доменом
     */
    public function testSiteVerificationFalse(){
        $this->assertFalse($this->obj->siteVerification('cocojambo'));
    }
}