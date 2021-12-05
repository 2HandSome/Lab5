<!DOCTYPE html>
<html>
<head>
	<title>Contacts</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	<?php
		require_once"function.php";
		$news = getContacts(3);
	?>
</head>
<body>
	<?php include "header.php";?>
		<div class="content">
	  	<?php
	  		for($i = 0; $i < count($news); $i++){
			echo '<div class="text">
			<h2>Contacts</h2>
			<p>Phone : '.$news[$i]["phone"].'</p>
			<p>Email : '.$news[$i]["email"].'</p>
			<p>Addres : '.$news[$i]["addres"].'</p>
			<h3>'.$news[$i]["about_us"].'</h3>
			<p>'.$news[$i]["text"].'</p>
			</div>';
	  			}
	  	?>
</body>
</html>