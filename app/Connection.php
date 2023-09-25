<?php
namespace app;
/*
 * Класс устанавливающий соединение с заданным сайтом используя библиотеку curl
 * В случае успеха возвращает true, иначе false.
 */
class Connection
{
    public $curl;
    public function __construct()
    {
        $this->curl = curl_init();
    }
    public function siteVerification($host)
    {
        curl_setopt($this->curl, CURLOPT_URL, $host);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($this->curl);
        if ($response) return true;
        else return false;
    }
    public function curlClose(){
        curl_close($this->curl);
    }
}