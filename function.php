<?php
	require_once "connection.php";

	function getNews ($limit){
		global $mysqli;
		connectDB ();
		$result = $mysqli -> query("SELECT * FROM `news` ORDER BY `id` DESC LIMIT  $limit");
		closeDB ();
		return resultToArray ($result);
	} 

	function resultToArray ($result){
		$array = array ();
		while (($row = $result->fetch_assoc()) != false)
			$array [] = $row;
		return $array;
	}

		function getCatigories ($limit){
		global $mysqli;
		connectDB ();
		$result = $mysqli -> query("SELECT * FROM `catigories` ORDER BY `id` DESC LIMIT  $limit");
		closeDB ();
		return resultToArray ($result);
	} 

			function getContacts ($limit){
		global $mysqli;
		connectDB ();
		$result = $mysqli -> query("SELECT * FROM `contact_us` ORDER BY `id` DESC LIMIT  $limit");
		closeDB ();
		return resultToArray ($result);
	} 

?>