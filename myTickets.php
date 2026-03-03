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
<p><?php echo $user_data['first_name'];?></p>
</header>
<ul>


    <li><a href="viewBus.php">Ticket Booking</a></li>
    <li><a href="myTickets.php">My Tickets</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="logout.php">logout</a></li>
    </ul>

   

</div>



<div class="sidebar2">


    <h1 class="adminTopic">My Tickets</h1>

<?php
    $user_id = $user_data['id'];
    
    $sqlget="SELECT t.id AS ticket_id, CONCAT(r.via_city, ' - ', r.destination) AS route,
       b.name AS bus_name, r.departure_datetime, r.cost, t.payment_status, b.id AS bus_id,
       r.id AS route_id
FROM tickets t
JOIN buses b
    ON t.bus_id = b.id
JOIN routes r
    ON b.route_id = r.id
WHERE t.user_id = $user_id";
    $sqldata=mysqli_query($conn, $sqlget) or die('error getting');
    
    // <th>ID</th>
    echo "<div class='table-card'>";
    echo "<table>";
    echo "<thead>
    <tr>
    <th>Ticket ID</th>
    <th>Route</th>
    <th>Bus Name</th>
    <th>Departure</th>
    <th>Cost</th>
    <th>Payment Status</th>
    <th>Actions</th>
       </tr>
       </thead>
      <tbody>";

       while ($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC))
       {
        // echo "<tr><td>";
        // echo $row['id'];
        echo "</td><td>";
        echo $row['ticket_id'];
        echo "</td><td>";
        echo $row['route'];
        echo "</td><td>";
        echo $row['bus_name'];
        echo "</td><td>";
        echo $row['departure_datetime'];
        echo "</td><td>";
        echo $row['cost'];
        echo "</td><td>";
        echo $row['payment_status'];
        // echo $row['departure_time'];
        // echo "</td><td>";
        echo "</td>";
       
          
        ?>

        <td>
        <div class="action-btns">

            <a class="btn btn-success" 
            href="AddBooking.php?bus_id=<?php echo $row['bus_id'];?>&route_id=<?php echo $row['route_id'];?>">
            Pay
        </a>
        
        <a class="btn btn-danger" 
        href="AddBooking.php?bus_id=<?php echo $row['bus_id'];?>&route_id=<?php echo $row['route_id'];?>">
        Delete
    </a>
</div>

        </td></tr>

<?php
       }

       echo "</tbody></table></div>";


?>






</div>

</body>
</html>