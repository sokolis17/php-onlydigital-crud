<?php

require_once __DIR__. '/../../helpers/functions.php';

if (!isset($_SESSION['user']['id'])) {
    header('Location: /php-onlydigital-crud/login.php');
}
session_unset();
header('Location: /php-onlydigital-crud/login.php');