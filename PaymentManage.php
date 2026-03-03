<?php 
session_start();

 include("connection.php");
 include("function.php");

  // $user_data = check_login($conn);

?>



<!DOCTYPE html>
<html>
<head>
  <title>payment received!!!</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cssfile/sidebar.css">
<link rel="stylesheet" href="./cssfile/table.css">
  <style type="text/css">


button 
{
    padding: 5px 5px 5px 5x;
}
.btnPolicy{

  padding: 5px 5px 5px 5px;
  border: 2px solid yellow;
    border-radius: 7px;
    background-color: red;
    color: white;
    margin-left: 20px;
}

.btnPolicy:hover{

  background:red;
    padding: 7px 7px 7px 7px;
    cursor: pointer;

}


  </style>
</head>
<body>
  <input type="checkbox" id="check">

  <label for="check">
<i class="fa fa-bars" id="btn"></i>
<i class="fa fa-times" id="cancle"></i>


  </label>
  <div class="sidebar">
<header><img src="image/Re.png">
<p><?php echo $_SESSION['email']; ?></p>
</header>
<ul>


    
    <li><a href="adminDash.php">Manage Routes</a></li>
    <li><a href="ManagesBuses.php">Manage Buses</a></li>
    <li><a href="BookingManage.php">Booking People</a></li>
    <li><a href="PaymentManage.php">Transaction</a></li>
    <li><a href="adminLogout.php">logout</a></li>

  <!--  <li><a href="#">Event</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Service</a></li>
    <li><a href="#">Contact</a></li>-->
    </ul>
 <!--  <li>
      <div class="social-links">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-youtube"></i></a>
        
      </div>
    </li>-->
   

</div>



<div class="sidebar2">


    <h1 class="adminTopic">Transaction Received...</h1>



<?php


    $sqldata=get_payment_summary($conn);
    
    echo "<div class='table-card'>";
    echo "<table>";
    echo "<thead>
    <tr>
    <th>Customer</th>
    <th>Amount</th>
    <th>Payment Receipt</th>
    <th>Destination</th>
       </tr>
       </thead>
      <tbody>";

       while ($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC))
       {
        
        echo "<tr><td>";
        echo $row['customer_name'];
        echo "</td><td>";
        echo $row['amount'];
        echo "</td><td>";
        echo $row['receipt'];
        echo "</td><td>";
        echo $row['destination'];
        echo "</td></tr>";
      
       
          
        ?>

        <!-- <td>

        <button style="border:2px solid yellow; border-radius:7px; background-color:red;color:white;">
          <a href="updateTransactionRecivied.php?id=<?php echo $row['id'];?>">
         
          
          

          Update

          </a>

        </button>

        </td>


        <td>

        <button style="border:2px solid yellow; border-radius:7px; background-color:red;color:white;">
          <a href="deleteTransactionRecivied.php?id=<?php echo $row['id'];?>">
         
          
          

          Delete

          </a>

        </button>

        </td> -->





      <!-- </tr> -->

<?php
       }

       echo "</tbody></table></div>";


?>
<?php

   
          
        ?>

        







</div>

</body>
</html>