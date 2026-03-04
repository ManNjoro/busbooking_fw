<?php

session_start();


?>
<?php include("connection.php") ?>

<!DOCTYPE html>
<html>

<head>

  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="cssfile/sidebar.css">
</head>

<body>
  <!--
   <?php //echo "welcome:".  $_SESSION['username']; 
    ?>
   <a href="adminLogout.php"><button class="btnHome">logout</button></a>-->

</body>

</html>




<!DOCTYPE html>
<html>

<head>
  <title>Admin Panel of Bus Services</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="./cssfile/table.css">
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


    <h1 class="adminTopic">Manage Route of Buses</h1>

    <a class="btn btn-right" href="Addroute.php">Add Route</a><br />



    <?php


    $sqlget = "SELECT * FROM routes";
    $sqldata = mysqli_query($conn, $sqlget) or die('error getting');

    echo "<div class='table-card'>";
    echo "<table>";
    echo "<thead>
    <tr>
    <th>Via City</th>
    <th>Destination</th>
    <th>Departure</th>
    <th>Cost</th>
    <th>Actions</th>
   
       </tr>
       </thead>
      <tbody>";

    while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
      echo "<tr><td>";
      echo $row['via_city'];
      echo "</td><td>";
      echo $row['destination'];
      echo "</td><td>";
      echo $row['departure_datetime'];
      echo "</td><td>";
      echo $row['cost'];
      echo "</td>";


    ?>

      <td>
        <div class="action-btns">


          <a class="btn btn-success" href="updateRoute.php?id=<?php echo $row['id']; ?>">
            Update
          </a>
          <a class="btn btn-danger" href="deleteRoute.php?id=<?php echo $row['id']; ?>">
            Delete
          </a>
        </div>


      </td>
      </tr>

    <?php
    }

    echo "</tbody></table></div>";


    ?>



  </div>

</body>

</html>