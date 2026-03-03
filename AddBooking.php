<?php 
session_start();

  include("connection.php");
  include("function.php");

  $user_data = check_login($conn);

  $bus_id = $_GET['bus_id'];
  $route_id = $_GET['route_id'];
  $route_data = get_route($conn, $route_id);
  $route_row = mysqli_fetch_assoc($route_data);
  $route_cost = $route_row['cost'];

if(empty($bus_id) or !is_numeric($bus_id)){
    echo "A valid Bus id is required";
    return;
};


if($conn->connect_error)
          {
            die('Connection Failed :'.$conn->connect_error);
          }
          else
          {


              $stmt=$conn->prepare("INSERT INTO tickets(user_id,route_id,bus_id) VALUES(?,?,?)");
              //table3 is the table name//

              $stmt->bind_param("iii",$user_data['id'],$route_id, $bus_id);

              $stmt->execute();
              $ticket_id = $conn->insert_id;
              
                         echo ("<script LANGUAGE='JavaScript'>
    window.alert('Booking successful!!!');
    window.location.href = 'AddPay.php?cost=" . $route_cost . "&ticket_id=" .$ticket_id ."';
</script>");
              
              $stmt->close();
              $conn->close();
              }    
  

   ?>

          