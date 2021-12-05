<!DOCTYPE html>
<html>
<head>
	<title>Catigories</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	<?php
		require_once"function.php";
		$news = getCatigories(3);
	?>
</head>
<body>
	<?php include "header.php";?>
		<div class="content">
	  	<?php
	  		for($i = 0; $i < count($news); $i++){
					echo '<div class="text">
					<h2>'.$news[$i]["title"].'</h2>
					<p>'.$news[$i]["catigories"].'</p>
					 </div>';
	  			}
	  	?>
</body>
</html>