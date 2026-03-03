<?php

include 'connection.php';

$ID = $_GET['id'];
if(empty($ID) or !is_numeric($ID)){
    echo "Route id is required and should be valid";
    return;
};
$sql = " DELETE FROM `routes` WHERE ID = $ID " ;
$query = mysqli_query($conn,$sql);

// header("location:adminDash.php");

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Route Deleted!!!');
    window.location.href='adminDash.php';
    </script>");

?>
