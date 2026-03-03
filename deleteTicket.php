<?php

include 'connection.php';

$id = $_GET['ticket_id'];
if(empty($id) or !is_numeric($id)){
    echo "A valid ticket id is required";
    return;
};
$sql = " DELETE FROM `tickets` WHERE id = $id" ;
$query = mysqli_query($conn,$sql);

//header("location:adminDash.php");

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Ticket Deleted successfully');
    window.location.href='myTickets.php';
    </script>");

?>
