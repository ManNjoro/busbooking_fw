<?php

include('connection.php');
include('function.php');

$user_data = check_login($conn);

$ID = $user_data['id'];
$sql = " DELETE FROM `users` WHERE id = $ID " ;
$query = mysqli_query($conn,$sql);


  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully your profile Deleted');
    window.location.href='Login.php';
    </script>");




?>