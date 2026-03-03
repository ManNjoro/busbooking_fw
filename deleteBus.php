<?php

include 'connection.php';

$ID = $_GET['id'];
if(empty($ID) or !is_numeric($ID)){
    echo "A valid Bus id is required";
    return;
};
$sql = " DELETE FROM `buses` WHERE ID = $ID " ;
$query = mysqli_query($conn,$sql);

//header("location:adminDash.php");

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Bus Deleted!!!');
    window.location.href='ManagesBuses.php';
    </script>");

?>
