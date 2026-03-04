<?php
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($conn);

?>

<!DOCTYPE html>

<html>
<title>Online Bus Ticket System</title>
<!--<link rel="stylesheet" href="css/profile.css"/>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<head>

  <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Roboto, sans-serif;
  }

  body {
    background: #f4f6f9;
  }

  /* Greeting */
  .usern {
    padding: 30px 60px 0 60px;
    font-size: 22px;
    font-weight: 600;
    color: #2c3e50;
  }

  /* Main Layout */
  .wrapper {
    display: flex;
    gap: 30px;
    padding: 30px 60px;
  }

  /* Left Card */
  .left {
    width: 280px;
    background: #ffffff;
    border-radius: 12px;
    padding: 30px 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    text-align: center;
  }

  .left img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
    border: 4px solid #3498db;
  }

  /* Right Card */
  .right {
    flex: 1;
    background: #ffffff;
    border-radius: 12px;
    padding: 30px 40px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
  }

  .right h3 {
    font-size: 18px;
    margin-bottom: 15px;
    color: #2c3e50;
    font-weight: 600;
  }

  hr {
    border: none;
    height: 1px;
    background: #e0e0e0;
    margin-bottom: 20px;
  }

  .info-group {
    margin-bottom: 15px;
    font-size: 14px;
    color: #555;
  }

  .info-label {
    font-weight: 600;
    color: #2c3e50;
  }

  /* Buttons */
  .btn {
    padding: 8px 16px;
    border-radius: 6px;
    border: none;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    margin: 5px 5px 0 0;
  }

  .btn-primary {
    background: #3498db;
    color: white;
  }

  .btn-primary:hover {
    background: #2980b9;
  }

  .btn-danger {
    background: #e74c3c;
    color: white;
  }

  .btn-danger:hover {
    background: #c0392b;
  }

  .btn-secondary {
    background: #95a5a6;
    color: white;
  }

  .btn-secondary:hover {
    background: #7f8c8d;
  }

  .btn-link {
    background: #2ecc71;
    color: white;
  }

  .btn-link:hover {
    background: #27ae60;
  }

  /* Responsive */
  @media (max-width: 992px) {
    .wrapper {
      flex-direction: column;
      padding: 20px;
    }

    .usern {
      padding: 20px;
    }
  }
</style>
  <link rel="stylesheet" href="cssfile/sidebar.css">
</head>

<body>





  <!-- body part my account code -->

  <!-- <div class="usern">
  Hello <?php echo $user_data['first_name']; ?>
</div> -->

<div class="wrapper">

  <!-- Left Profile Card -->
  <div class="left">
    <img src="image/Re.png" alt="user">

    <button class="btn btn-secondary">Upload Image</button>
    <br><br>
    <a href="viewBus.php">
      <button class="btn btn-link">Home</button>
    </a>
  </div>

  <!-- Right Information Card -->
  <div class="right">

    <h3>Account Information</h3>
    <hr>

    <div class="info-group">
      <span class="info-label">Email:</span>
      <?php echo $user_data['email']; ?>
    </div>

    <div class="info-group">
      <span class="info-label">First Name:</span>
      <?php echo $user_data['first_name']; ?>
    </div>

    <div class="info-group">
      <span class="info-label">Last Name:</span>
      <?php echo $user_data['last_name']; ?>
    </div>

    <div class="info-group">
      <span class="info-label">Phone:</span>
      <?php echo $user_data['phone']; ?>
    </div>

    <br>
    <h3>Security & Actions</h3>
    <hr>

    <a href="updateProfile.php">
      <button class="btn btn-primary">Update Profile</button>
    </a>

    <a href="logout.php">
      <button class="btn btn-secondary">Logout</button>
    </a>

    <a href="deleteProfile.php ?>">
      <button class="btn btn-danger">Delete Account</button>
    </a>

  </div>

</div>






</body>

</html>