<?php 
session_start();

  include("connection.php");
  include("function.php");

  $user_data = check_login($conn);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="cssfile/payment.css">

</head>
<body>



<?php

$cost = $_GET['cost'];
$ticket_id = $_GET['ticket_id'];
if(empty($cost) or !is_numeric($cost) or empty($ticket_id) or !is_numeric($ticket_id)){
    echo "A valid cost and ticket_id value is required";
    return;
};



  if(isset($_POST['checkout'])){


    //  $name=$_POST['name'];
    //  $cname=$_POST['cardName'];
    //  $cnumber=$_POST['cardNumber'];
    //  $expM=$_POST['expM'];
    //  $expY=$_POST['expYear'];
    //  $cvv=$_POST['cvv'];
     $amount=$_POST['amount'];


       if($conn->connect_error)
          {
            die('Connection Failed :'.$conn->connect_error);
          }
          else
          {


              $stmt=$conn->prepare("INSERT INTO payments(amount, ticket_id) VALUES(?,?)");
              //table3 is the table name//

              $stmt->bind_param("ii",$amount, $ticket_id);

              $stmt->execute();
              $query="UPDATE `tickets` SET payment_status='C' where id=$ticket_id";


       $query_run=mysqli_query($conn,$query);
                          
                           echo ("<script LANGUAGE='JavaScript'>
                window.alert('Succesfully added!!!');
                window.location.href='paySucess.php';
                </script>");

              
              $stmt->close();
              $conn->close();
              }
                
          
      }     
  

   ?>


<div class="container">

    <form method="POST">

        <div class="row">

            <!-- <div class="col">

                <h3 class="title">billing address</h3>

                 <div class="inputBox">
                    <span>Amount You Pay :</span>
                    <input type="number" value="<?php echo $cost;?>" name="amount">
                </div>

                <div class="inputBox">
                    <span>Name :</span>
                    <input type="text" value="<?php echo $user_data['first_name'] . " " . $user_data['last_name'];?>" name="name">
                </div>

                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" value="<?php echo $user_data['email'];?>" name="email">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january" name="expM" required>
                </div>

                

            </div> -->

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="image/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>Amount You Pay :</span>
                    <input type="number" value="<?php echo $cost;?>" name="amount">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="mr. john deo" name="cardName" required>
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444" name="cardNumber" required>
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january" name="expM" required>
                </div>
                

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022" name="expYear" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234" name="cvv" required>
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn" name="checkout">

    </form>

</div>    
    
</body>
</html>