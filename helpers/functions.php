<?php
session_start();

require_once __DIR__ . "/../config/db.php";

function addUser($name, $email, $tel, $pass_hash)
{
    global $pdo;

    $sql = "INSERT INTO users (name,email,tel,password) VALUES (:name,:email,:tel,:password)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([':name' => $name, ':email' => $email, ':tel' => $tel, ':password' => $pass_hash]);
}

function passHandle($pass_main, $pass_second)
{
    if ($pass_main !== $pass_second) {
        return false;
    } else return password_hash($pass_main, PASSWORD_DEFAULT);
}


function uniqeEmail($email)
{
    global $pdo;

    $sql = "SELECT id FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    if ($stmt->fetchAll()) {
        return false;
    } else return true;
}

function uniqePhone($tel)
{
    global $pdo;

    $sql = "SELECT id FROM users WHERE tel = :tel";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':tel' => $tel]);
    if ($stmt->fetchAll()) {
        return false;
    } else return true;
}

function myFindUser($login)
{
    global $pdo;

    $sql = "SELECT id,password,name FROM users WHERE email = :email OR tel = :tel";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $login,':tel' => $login]);
    return $stmt->fetch();
}
