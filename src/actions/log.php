<?php

require_once __DIR__ . '/../../helpers/functions.php';

//КАПЧА
$token = $_POST['smart-token'] ?? '';

if (!checkCaptcha($token)) {
    $_SESSION['error']['login'] = "Капча не пройдена!";
    header('Location: /php-onlydigital-crud/login.php');
    exit;
}

//АВТОРИЗАЦИЯ
$login = $_POST['login'];
$pass = $_POST['pass'];

$user = myFindUser($login);


if ($user and password_verify($pass, $user['password'])) {
    $_SESSION['user']['id'] = $user['id'];
    $_SESSION['user']['name'] = $user['name'];
    $_SESSION['user']['email'] = $user['email'];
    $_SESSION['user']['tel'] = $user['tel'];
    header('Location: /php-onlydigital-crud/home.php');
    exit;
} else {
    $_SESSION['error']['find'] = "Ошибка, пользователь с таким логином и паролем не найден";
    header('Location: /php-onlydigital-crud/login.php');
    exit;
}