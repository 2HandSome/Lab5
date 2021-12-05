<?php

require_once "connection.php";
global $mysqli;
connectDB ();
$res = $mysqli -> query("SELECT * FROM `products` WHERE `id`='117'");
closeDB ();

$response = array();
if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
		$response = $row;
	}
	echo json_encode($response);
}
?>