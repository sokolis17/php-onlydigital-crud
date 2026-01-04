<?php
session_start();

require_once __DIR__ . "/../config/db.php";
$keys = require_once __DIR__. '/../config/keys.php';

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

    $sql = "SELECT * FROM users WHERE email = :email OR tel = :tel";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $login,':tel' => $login]);
    return $stmt->fetch();
}

function userUpdate($id,$name, $email, $tel, $pass = null){
    global $pdo;
    if(!empty($pass)){ 
        $sql = "UPDATE users SET name = :name,email = :email,tel = :tel,password = :password WHERE id = :id";
        $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
        $params = [':id'=>$id,':name' => $name, ':email' => $email, ':tel' => $tel, ':password' => $pass_hash];
    }else{
        $sql = "UPDATE users SET name = :name,email = :email,tel = :tel WHERE id = :id";
        $params = [':id'=>$id,':name' => $name, ':email' => $email, ':tel' => $tel];
    }
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($params);
}
function checkCaptcha($token) {

    global $keys;

    $secret = $keys['server_key']; 
    
    $ch = curl_init("https://smartcaptcha.yandexcloud.net/validate");
    $args = [
        "secret" => $secret,
        "token" => $token,
        "ip" => $_SERVER['REMOTE_ADDR']
    ];
    
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($args));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    

    $server_output = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code !== 200) {
        return false;
    }

    
    $resp = json_decode($server_output);
    return $resp->status === "ok";
}
