<?php
session_start();


include("connection.php");
include("function.php");



?>




<!DOCTYPE html>
<html>

<head>
  <title>Admin Panel of Bus</title>
  <!--cdn icon library -->

  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="cssfile/sidebar.css">
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


    <h1 class="adminTopic">Manage Buses</h1>

    <a class="btn btn-right" href="AddBus.php">+ Add Bus</a><br />



    <?php


    $sqlget = "SELECT * FROM buses";
    $sqldata = mysqli_query($conn, $sqlget) or die('error getting');

    echo "<div class='table-card'>";
    echo "<table>";
    echo "<thead>
    <tr>
    <th>Bus Name</th>
    <th>Route</th>
    <th>Actions</th>
   
       </tr>
       </thead>
      <tbody>";

    while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
      echo "<tr><td>";
      echo $row['name'];
      echo "</td><td>";
      echo get_route_name($conn, $row['route_id']);
      echo "</td>";



    ?>

      <td>

        <div class="action-btns">

          <a class="btn btn-success" href="UpdateBus.php?id=<?php echo $row['id']; ?>">
            Update
          </a>
          <a class="btn btn-danger" href="deleteBus.php?id=<?php echo $row['id']; ?>">
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