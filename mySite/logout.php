<?php
require 'config/connect_to_red.php';
//unset($_SESSION['logged_user']);
$sql="select login from user where login='".$_COOKIE['usa']."'";

$log_result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($log_result);

$login=$row['login'];

if($_COOKIE['usa']==$login)
{
    setcookie('usa',$login,time()-36000,'/');
}
header('Location: /mySite/index.php');


