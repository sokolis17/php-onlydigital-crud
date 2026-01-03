<?php
session_start();

function uniqe_email($email,$email_arr){
    for($i=0;$i<count($email_arr);$i++){
    if($email === $email_arr[$i]['email']){
        return false;
        }
    }
    return true;
}