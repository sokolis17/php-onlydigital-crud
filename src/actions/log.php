<?php

require_once __DIR__. '/../../helpers/functions.php';

$login = $_POST['login'];
$pass = $_POST['pass'];

$user = myFindUser($login);

if($user and password_verify($pass,$user['password'])){
    header('Location: /php-onlydigital-crud/home.php');
} else{
    $_SESSION['error']['find'] = "Ошибка, пользователь с таким логином и паролем не найден";
    header('Location: /php-onlydigital-crud/login.php');
}