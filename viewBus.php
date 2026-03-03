<?php 
session_start();

  include("connection.php");
  include("function.php");

  $user_data = check_login($conn);
  // create_admin($conn, 'admin@gmail.com', 'Admin', 'Faith', '12345678');

?>

<?php include("connection.php")?>



<!DOCTYPE html>
<html>
<head>
  <title>User View Buses</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cssfile/sidebar.css">
  <style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: "Segoe UI", Roboto, sans-serif;
  }

  body {
    background: #f4f6f9;
  }

  .adminTopic {
    font-size: 28px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 25px;
  }

  .sidebar2 {
    /* margin-left: 260px; */
    padding: 70px;
  }

  /* Card Container */
  .table-card {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  table thead {
    background: #2c3e50;
    color: white;
  }

  table th {
    padding: 15px;
    font-weight: 500;
    text-align: left;
    font-size: 14px;
    letter-spacing: 0.5px;
  }

  table td {
    padding: 18px 15px;
    border-bottom: 1px solid #eee;
    font-size: 14px;
    color: #555;
  }

  table tr:hover {
    background-color: #e6f2fd;
    transition: 0.2s ease;
  }

  /* Price styling */
  .price {
    font-weight: 600;
    color: #27ae60;
  }

  /* Book Button */
  .btn-book {
    background: #3498db;
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    display: inline-block;
    transition: all 0.3s ease;
  }

  .btn-book:hover {
    background: #2980b9;
    transform: translateY(-2px);
  }

  /* Responsive */
  @media (max-width: 992px) {
    .sidebar2 {
      margin-left: 0;
      padding: 20px;
    }
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
<p><?php echo $user_data['first_name'];?></p>
</header>
<ul>


    <li><a href="viewBus.php">Ticket Booking</a></li>
    <li><a href="myTickets.php">My Tickets</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="logout.php">logout</a></li>
  <!--  <li><a href="#">Event</a></li>
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


    <h1 class="adminTopic">Booking Your Ticket...</h1>

<?php

    
    $sqlget="SELECT * FROM routes";
    $sqldata=get_bus_route_table($conn);
    
    // <th>ID</th>
    echo "<div class='table-card'>";
    echo "<table>";
    echo "<thead>
    <tr>
    <th>Via City</th>
    <th>Destination</th>
    <th>Bus Name</th>
    <th>Departure DateTime</th>
    <th>Cost</th>
    <th>Booking</th>
       </tr>
       </thead>
      <tbody>";

       while ($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC))
       {
        // echo "<tr><td>";
        // echo $row['id'];
        echo "</td><td>";
        echo $row['via_city'];
        echo "</td><td>";
        echo $row['destination'];
        echo "</td><td>";
        echo $row['name'];
        echo "</td><td>";
        echo $row['departure_datetime'];
        echo "</td><td>";
        // echo $row['departure_time'];
        // echo "</td><td>";
        echo $row['cost'];
        echo "</td>";
       
          
        ?>

        <td>

        <a class="btn-book" 
   href="AddBooking.php?bus_id=<?php echo $row['bus_id'];?>&route_id=<?php echo $row['route_id'];?>">
   Book Now
</a>

        </td></tr>

<?php
       }

       echo "</tbody></table></div>";


?>






</div>

</body>
</html>