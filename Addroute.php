<?php

session_start();
include("connection.php");

?>



<!DOCTYPE html>
<html>

<head>
  <title>Routes adding</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="cssfile/sidebar.css">
  <link rel="stylesheet" href="cssfile/signUp.css">
  <style>
    body {
      background: #f4f6f9;
      font-family: "Segoe UI", Roboto, sans-serif;
    }

    .sidebar2 {
      margin-left: 250px;
      padding: 60px 40px;
    }

    .page-header {
      margin-bottom: 30px;
    }

    .page-header h1 {
      font-size: 26px;
      color: #2c3e50;
      font-weight: 600;
    }

    /* Card Container */
    .form-card {
      background: #ffffff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      max-width: 600px;
    }

    /* Input Styling Override */
    .form_wrap input[type="text"],
    .form_wrap input[type="number"],
    .form_wrap input[type="datetime-local"],
    .form_wrap select {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #dcdfe6;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    .form_wrap input:focus {
      border-color: #3498db;
      box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.15);
      outline: none;
    }

    .form_wrap label {
      font-size: 13px;
      font-weight: 600;
      color: #555;
      margin-bottom: 6px;
    }

    /* Submit Button */
    .form_wrap .submit_btn {
      width: 100%;
      background: #3498db;
      padding: 14px;
      border: none;
      border-radius: 8px;
      color: white;
      font-weight: 600;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .form_wrap .submit_btn:hover {
      background: #2980b9;
      transform: translateY(-2px);
    }

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


    <?php


    if (isset($_POST['routeAdd'])) {

      $via_city = $_POST['via_city'];
      $destination = $_POST['destination'];
      $dep_datetime = $_POST['departure_datetime'];
      $cost = $_POST['cost'];





      if ($conn->connect_error) {
        die('Connection Failed :' . $conn->connect_error);
      } else {

        //$userPay_id = random_num(20);
        $stmt = $conn->prepare("INSERT INTO routes(via_city,destination,departure_datetime,cost) VALUES(?,?,?,?)");
        //table3 is the table name//

        $stmt->bind_param('sssi', $via_city, $destination, $dep_datetime, $cost);

        $stmt->execute();

        echo '<script type="text/javascript">alert("Route add successfully")</script>';
        $stmt->close();
        $conn->close();
        header("Location: adminDash.php");

        die;
      }
    }


    ?>




    <div class="page-header">
      <h1>Add New Route</h1>
    </div>

    <div class="form-card">
      <div class="registration_form">

        <form action="#" method="POST">
          <div class="form_wrap">

            <div class="input_wrap">
              <label>Via City</label>
              <input type="text" name="via_city" placeholder="Enter via city" required>
            </div>

            <div class="input_wrap">
              <label>Destination</label>
              <input type="text" name="destination" placeholder="Enter destination city" required>
            </div>

            <div class="input_wrap">
              <label>Departure Date & Time</label>
              <input type="datetime-local" name="departure_datetime" required>
            </div>

            <div class="input_wrap">
              <label>Cost</label>
              <input type="number" min="1" name="cost" placeholder="Enter route cost" required>
            </div>

            <div class="input_wrap">
              <input type="submit" value="Add Route" class="submit_btn" name="routeAdd">
            </div>

          </div>
        </form>

      </div>
    </div>




  </div>

</body>

</html>