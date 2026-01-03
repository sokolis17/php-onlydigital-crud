<?php

require_once __DIR__ . "/../../helpers/functions.php";


$name = $_POST['user_name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];

//ПАРОЛЬ
$hash = pass_handle($pass, $pass2);
if ($hash === false) {
    $_SESSION['error']['pass'] = 'Пароли должны совпадать';
    header('Location: /php-onlydigital-crud/register.php');
}
//ПОЧТА
if (!uniqe_email($email)) {
    $_SESSION['error']['email'] = 'Пользователь с такой почтой уже существует';
    header('Location: /php-onlydigital-crud/register.php');
};
//ТЕЛЕФОН
if (!uniqe_phone($tel)) {
    $_SESSION['error']['tel'] = 'Пользователь с таким телефоном уже существует';
    header('Location: /php-onlydigital-crud/register.php');
}

if(!empty($_SESSION['error'])){
    header('Location: /php-onlydigital-crud/register.php');
    exit;
}
?>