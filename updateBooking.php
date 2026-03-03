<?php 

	session_start();
  include("connection.php");
  include("function.php");

?>



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
  
    </ul>
   

</div>
<!-------------------------------------------------->
   

   <?php 
    $id = $_GET['id'];
    if(empty($id) or !is_numeric($id)){
      echo "A valid ticket id is required";
      return;
    }

      

       if(isset($_POST['updateBooking'])){

     $payment_status=$_POST['payment_status'];

       $query="UPDATE `tickets` SET payment_status='$payment_status' where id=$id";


       $query_run=mysqli_query($conn,$query);

      
  

         if($query_run){

            /*
      
                    //redirect to your profile page//

                    header("Location: adminDash.php");
       
                    die;

                 
*/
              echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Booking Updated!!!');
    window.location.href='BookingManage.php';
    </script>");


        //   echo '<script type="text/javascript">alert("Booking udated sucessfully!!!")</script>';


          }

          else{

               echo '<script type="text/javascript">alert("Booking not updated!!!")</script>';
           }

           

     }

?>



<div class="sidebar2">




   
          

          <div class="wrapper">
  <div class="registration_form">
    <div class="title">
    Update Passenger Booking...
    </div>

    <form action="#" method="POST">
      <div class="form_wrap">


        <div class="input_wrap">
          <label for="title">Ticket ID</label>
          <input type="number" id="title" name="id" class="idclass" disabled value="<?php echo $_GET['id'];?>">
        </div>
        
        <div class="input_wrap">
          <label for="payment_status">Payment Status</label>
          <select name="payment_status" id="payment_status">
            <option value="">--Select Status--</option>
            <option value="P">Pending</option>
            <option value="C">Complete</option>
            <option value="F">Failed</option>
          </select>
        </div>


        


        <div class="input_wrap">
          <input type="submit" value="Update Now" class="submit_btn" name="updateBooking">

        </div>



      </div>
    </form>
  </div>
</div>





</div>

</body>
</html>