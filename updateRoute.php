<?php 

	session_start();

?>
<?php include("connection.php")?>
<!--
<!DOCTYPE html>
<html>
<head>
	<title>admin Panel suraksha</title>
</head>
<body>

   <?php// echo "welcome:".  $_SESSION['id']; ?>
   <a href="adminLogout.php"><button class="btnHome">logout</button></a>

</body>
</html>

-->


<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel Suraksha</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cssfile/sidebar.css">
<link rel="stylesheet" href="cssfile/signUp.css">
	<style type="text/css">

			body{

		  background-image: url("image/20.jpg");
		  background-position: center;
		  background-size: cover;
		  height: 700px;
		  background-repeat: no-repeat;
      background-attachment: fixed;

		}
		.adminTopic{
			text-align: center;
			color: #fff;
			

		}
    .form_wrap .submit_btn:hover{

      color:#fff;
      font-weight: 600;

    }
    #decription{
      width: 100%;
      border-radius: 3px;
      border: 1px solid #9597a6;
      padding: 10px;
      outline: none;
      color: black;
    }
    .idclass{

      width: 100%;
      border-radius: 3px;
      border: 1px solid #9597a6;
      padding: 10px;
      outline: none;
      color: black;

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

   

   <?php 

   $route_id = $_GET['id'];
   if(empty($route_id) or !is_numeric($route_id)) {
    echo "Route id is required in the query parameter";
    return;
   };
   $route_query = "SELECT * FROM routes WHERE id='$route_id'";
   $route_to_update = mysqli_query($conn, $route_query);

   if(mysqli_num_rows($route_to_update)==1){
    $route_row = mysqli_fetch_assoc($route_to_update);
      $via_city_db = $route_row['via_city'];
      $destination_db = $route_row['destination'];
      $departure_datetime_db = $route_row['departure_datetime'];
      $cost_db = $route_row['cost'];
   }


      

       if(isset($_POST['routeUpdate'])){

       $via_city=$_POST['Via_city'];
       $destination=$_POST['destination'];
       $dep_datetime=$_POST['departure_datetime'];
        $cost=$_POST['cost'];

       $query="UPDATE `routes` SET Via_city='$via_city',destination='$destination',departure_datetime='$dep_datetime',cost='$cost' where id=$route_id";


       $query_run=mysqli_query($conn,$query);

      
  

         if($query_run){

            /*
      
                    //redirect to your profile page//

                    header("Location: adminDash.php");
       
                    die;

                 
*/
           echo '<script type="text/javascript">alert("Route updated sucessfully!!!")</script>';
            header("Location: adminDash.php");
       
            die;


          }

          else{

               echo '<script type="text/javascript">alert("Route not updated!!!")</script>';
           }

           

     }

?>



<div class="sidebar2">



          <div class="wrapper">
  <div class="registration_form">
    <div class="title">
      Bus Route Update/Edit
    </div>

    <form action="#" method="POST">
      <div class="form_wrap">

        <!-- <div class="input_wrap">
          <label for="title">Id</label>
          <input type="number" id="title" name="id" class="idclass" value="<?php echo $_GET['id'];?>">
        </div> -->
        
        <div class="input_wrap">
          <label for="title">Via_city</label>
          <input type="text" id="title" name="Via_city" placeholder="Via_city" value="<?php echo $via_city_db;?>" required>
        </div>


        <div class="input_wrap">
          <label for="title">Destination</label>
          <input type="text" id="title" name="destination" placeholder="Destination" value="<?php echo $destination_db;?>" required>
        </div>


         <div class="input_wrap">
          <label for="title">Departure Datetime</label>
          <input type="datetime-local" id="title" name="departure_datetime" placeholder="Departure Datetime" value="<?php echo $departure_datetime_db;?>" class="idclass">
        </div>


          <div class="input_wrap">
          <label for="title">Cost</label>
          <input type="number" id="title" name="cost" placeholder="Cost" value="<?php echo $cost_db;?>" class="idclass">
        </div>


        
        <div class="input_wrap">

          <input type="submit" value="Update Route Now" class="submit_btn" name="routeUpdate">

        </div>



      </div>
    </form>
  </div>
</div>




</div>

</body>
</html>