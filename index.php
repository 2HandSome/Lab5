<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<?php
		require_once"function.php";
		$news = getNews(3);
	?>
</head>
<body>
	<?php include "header.php";?>
 	<div class ="logo">
			<img src="img/car2go-carsharing.jpg"/>
	</div>
		<div class="content">
	  	<?php
	  		for($i = 0; $i < count($news); $i++){
					echo '<div class="text">
					<h2>'.$news[$i]["title"].'</h2>
					<p>'.$news[$i]["full_text"].'</p>
					 </div>';
	  			}
	  	?>

	</div>
		 	
</body>
</html>