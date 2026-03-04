<?php

session_start();
include("connection.php");
include("function.php");
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
      font-weight: 600;
      color: #2c3e50;
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
    .form_wrap select {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #dcdfe6;
      font-size: 14px;
      transition: all 0.3s ease;
      background: #fff;
    }

    .form_wrap input:focus,
    .form_wrap select:focus {
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
    $routes = get_routes($conn);


    if (isset($_POST['AddBus'])) {


      //$id=$_POST['id'];
      $nameOFbus = $_POST['bus_name'];
      $route_id = $_POST['route_id'];

      if ($conn->connect_error) {
        die('Connection Failed :' . $conn->connect_error);
      } else {


        $stmt = $conn->prepare("INSERT INTO buses(name,route_id) VALUES(?,?)");
        //table3 is the table name//

        $stmt->bind_param("si", $nameOFbus, $route_id);

        $stmt->execute();

        echo ("<script LANGUAGE='JavaScript'>
                      window.alert('Succesfully Bus Added!!!');
                      window.location.href='ManagesBuses.php';
                      </script>");




        $stmt->close();
        $conn->close();
      }
    }


    ?>




    <div class="page-header">
      <h1>Add New Bus</h1>
    </div>

    <div class="form-card">
      <div class="registration_form">

        <form action="#" method="POST">
          <div class="form_wrap">

            <div class="input_wrap">
              <label>Bus Name</label>
              <input type="text" name="bus_name" placeholder="Enter bus name" required>
            </div>

            <div class="input_wrap">
              <label>Select Route</label>
              <select name="route_id" required>
                <option value="">-- Select Route --</option>
                <?php
                while ($row = mysqli_fetch_array($routes, MYSQLI_ASSOC)) {
                  echo '<option value="' . $row['id'] . '">' . $row['via_city'] . ' - ' . $row['destination'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="input_wrap">
              <input type="submit" value="Add Bus" class="submit_btn" name="AddBus">
            </div>

          </div>
        </form>

      </div>
    </div>




  </div>

</body>

</html>