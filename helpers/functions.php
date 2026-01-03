<?php
session_start();

require_once __DIR__ . "/../config/db.php";

function pass_handle($pass_main,$pass_second){
    if($pass_main !== $pass_second){
        return false;
    }else return password_hash($pass_main,PASSWORD_DEFAULT);
}


function uniqe_email($email)
{
    global $pdo;

    $sql = "SELECT id FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    if($stmt->fetchAll()){
        return false;
    }else return true;
}
