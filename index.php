<?php

session_start();

if(isset($_SESSION['user'])){
    header('Location: /php-onlydigital-crud/home.php');
    exit;
}else{
    header('Location: /php-onlydigital-crud/login.php');
    exit;
}

