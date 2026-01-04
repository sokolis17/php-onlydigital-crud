<?php

require_once __DIR__ . '/../../helpers/functions.php';

$id = $_SESSION['user']['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$pass = $_POST['password'] ?? null;

if (userUpdate($id, $name, $email, $tel, $pass)) {
    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['tel'] = $tel;

    $_SESSION['msgSucc'] = 'Данные успешно обновлены!';
} else {
    $_SESSION['msgErr'] = 'Ошибка обновления базы данных.';
}

header('Location: /php-onlydigital-crud/profile-edit.php');
exit;
