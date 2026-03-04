<?php
session_start();

include("connection.php");
include("function.php");

// $user_data = check_login($conn);

?>



<!DOCTYPE html>
<html>

<head>
  <title>Booking Manage</title>
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


    </ul>



  </div>



  <div class="sidebar2">


    <h1 class="adminTopic">Booking People...</h1>



    <?php


    $sqlget = "SELECT t.id AS ticket_id, CONCAT(u.first_name, ' ', u.last_name) AS customer_name,
       u.email AS customer_email, u.phone AS customer_phone, b.name AS bus_name,
       CONCAT(r.via_city, ' - ', r.destination) AS route,
       t.payment_status
FROM tickets t
JOIN users u
    ON t.user_id = u.id
JOIN buses b
    ON t.bus_id = b.id
JOIN routes r
    ON b.route_id = r.id";
    $sqldata = mysqli_query($conn, $sqlget) or die('error getting');

    echo "<div class='table-card'>";
    echo "<table>";
    echo "<thead>
    <tr>
    <th>Ticket ID</th>
    <th>Passenger Name</th>
    <th>Contact</th>
    <th>E-mail</th>
    <th>Bus</th>
    <th>Route</th>
    <th>Payment Status</th>
    <th>Action</th>

    
   
       </tr>
       </thead>
      <tbody>";

    while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
      echo "<tr><td>";
      echo $row['ticket_id'];
      echo "</td><td>";
      echo $row['customer_name'];
      echo "</td><td>";
      echo $row['customer_phone'];
      echo "</td><td>";
      echo $row['customer_email'];
      echo "</td><td>";
      echo $row['bus_name'];
      echo "</td><td>";
      echo $row['route'];
      echo "</td><td>";
      echo get_payment_status($row['payment_status']);
      echo "</td>";


    ?>

      <td>


        <a class="btn btn-success" href="updateBooking.php?id=<?php echo $row['ticket_id']; ?>">




          Update

        </a>


      </td>
      <!-- <td>


        <a class="btn" href="deleteBooking.php?id=<?php echo $row['ticket_id']; ?>">




          Delete

        </a>



      </td> -->
      </tr>

    <?php
    }

    echo "</tbody></table></div>";


    ?>
    <?php



    ?>









  </div>

</body>

</html>