<?php

require_once __DIR__. "/../../helpers/functions.php";
require_once __DIR__. "/../../config/db.php";


$name = $_POST['user_name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];

if($pass !== $pass2){
    $_SESSION['error']['pass'] = 'Пароли должны совпадать';
    header('Location: /php-onlydigital-crud/register.php');
    exit;
}

$sql = "SELECT email,phone FROM users";
$row = $pdo->query($sql);
$res= $row->fetchAll();

if(!uniqe_email($email,$res)){
    $_SESSION['error']['email'] = 'Пользователь с такой почтой уже существует';
    header('Location: /php-onlydigital-crud/register.php');
    exit;
};

