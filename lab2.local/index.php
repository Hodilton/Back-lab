<?php
require 'db_connect.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'register':
        require 'register.php';
        break;

    case 'login':
        require 'login.php';
        break;

    default:
        echo "<h1>Добро пожаловать на наш сайт!</h1>";
        echo "<p><a href='?page=register'>Регистрация</a> |
                 <a href='?page=login'>Авторизация</a></p>";
}