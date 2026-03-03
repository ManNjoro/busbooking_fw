<?php

function check_login($conn)
{

	if (isset($_SESSION['user_id'])) {

		$id = $_SESSION['user_id'];
		$query = "select * from users where id = '$id'";

		$result = mysqli_query($conn, $query);
		if ($result && mysqli_num_rows($result) > 0) {

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: Login.php");
	die;
}

function create_admin($conn, $email, $first_name, $last_name, $password)
{
	$query = "INSERT INTO admins(email, first_name, last_name, password) VALUES('$email', '$first_name', '$last_name', '$password')";
	mysqli_query($conn, $query);
	echo "ADMIN CREATED SUCCESSFULLY!!";
	header("Location: Login.php");
	die;
}

function get_route($conn, $route_id)
{
	$route_query = "SELECT * FROM routes WHERE id='$route_id'";
	return mysqli_query($conn, $route_query);
}

function get_route_name($conn, $route_id)
{
	$route = get_route($conn, $route_id);
	$route_row = mysqli_fetch_assoc($route);
	return $route_row['via_city'] . " - " . $route_row['destination'];
}

function get_routes($conn)
{
	$route_query = "SELECT * FROM routes";
	return mysqli_query($conn, $route_query);
}

function get_rows($conn, $table_name)
{
	$route_query = "SELECT * FROM " . "$table_name";
	return mysqli_query($conn, $route_query);
}

function get_bus($conn, $bus_id)
{
	$route_query = "SELECT * FROM buses WHERE id='$bus_id'";
	return mysqli_query($conn, $route_query);
}

function get_bus_route_table($conn)
{
	$query = "SELECT b.id AS bus_id, b.name, r.via_city, r.destination, r.departure_datetime, r.cost, r.id AS route_id
			FROM buses b
			JOIN routes r
			ON b.id = r.id";
	return mysqli_query($conn, $query);
}

function get_payment_summary($conn)
{
	$query = "SELECT p.id AS payment_id, p.ticket_id,
       p.amount, p.receipt,
       CONCAT(u.first_name,' ', u.last_name) AS customer_name,
       r.destination
	FROM payments p
	JOIN tickets t
		ON t.id = p.ticket_id
	JOIN users u
		ON t.user_id = u.id
	JOIN routes r
		ON t.route_id = r.id";
	return mysqli_query($conn, $query);
}


function get_payment_status($status){
	switch ($status) {
		case 'P':
			return "Pending";
			break;
		case 'C':
			return "Complete";
			break;
		case 'F':
			return "Failed";
			break;
		
		default:
			return "Unknown";
			break;
	}
}


function random_num($length)
{

	$text = "";
	if ($length < 5) {
		$length = 5;
	}

	$len = rand(4, $length);

	for ($i = 0; $i < $len; $i++) {
		# code...

		$text .= rand(0, 9);
	}

	return $text;
}
