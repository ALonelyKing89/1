<?
// Подключаемся к СЕССИИ
session_start();

// Подключаемся к БД
require_once 'db.php'
$prob = $db->query('SELECT * FROM probl');
// Вывод шапки
require_once "header.php";


// Вывод подвала
require_once "footer.php";
?>
