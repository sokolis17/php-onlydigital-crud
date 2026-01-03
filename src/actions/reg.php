<?php

require_once __DIR__ . "/../../helpers/functions.php";


$name = $_POST['user_name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];

//ПОЧТА
if (!uniqeEmail($email)) {
    $_SESSION['error']['email'] = 'Пользователь с такой почтой уже существует';
    header('Location: /php-onlydigital-crud/register.php');
};
//ТЕЛЕФОН
if (!uniqePhone($tel)) {
    $_SESSION['error']['tel'] = 'Пользователь с таким телефоном уже существует';
    header('Location: /php-onlydigital-crud/register.php');
}
//ПАРОЛЬ
$hash = passHandle($pass, $pass2);
if ($hash === false) {
    $_SESSION['error']['pass'] = 'Пароли должны совпадать';
    header('Location: /php-onlydigital-crud/register.php');
}

if (!empty($_SESSION['error'])) {
    header('Location: /php-onlydigital-crud/register.php');
    exit;
}

try {
    addUser($name, $email, $tel, $hash);
    header('Location: /php-onlydigital-crud/login.php');
    exit;
} catch (PDOException $e) {
    $_SESSION['error']['global'] = "Ошибка при регистрации: " . $e->getMessage();
    header('Location: /php-onlydigital-crud/register.php');
    exit;
}


