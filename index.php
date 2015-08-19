<?php


//Включаем обработку ошибок при разработке
ini_set('display_errors',1);
error_reporting(E_ALL);
//Страт сессии
session_start();

//Подключаем файлы
define('ROOT',dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');


//Класс роутер
$router = new Router();
$router->run();
