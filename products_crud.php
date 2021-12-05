<?php
	require_once "connection.php";

if (isset($_POST['add_records'])) {
	global $mysqli;
	$title=$_POST['title'];
    $text=$_POST['text'];
	connectDB ();
	$result = $mysqli -> query("INSERT INTO `products`(title, text) VALUES('$title','$text')");
	closeDB ();
	if(mysqli_num_rows($result) == 1) {
		$_SESSION['title'] = $title;
		echo "success";
  }
  else
  {
	  echo "fail";
  }
  exit();   
}

if(isset($_POST['all_products'])){
	$data = '';
	global $mysqli;
	connectDB ();
	$result = $mysqli -> query("SELECT * FROM `products` ORDER BY `id` DESC");
	closeDB ();
	
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$data .= '<div class="text">
							<a class="btn btn-success"  onclick="getProduct('.$row['id'].')"><i class="fa fa-edit"></i></a>
							<a class="btn delete btn-success" onclick="deleteProduct('.$row['id'].')"><i class="fa fa-trash-alt"></i></a>
							  <h2>'.$row['title'].'</h2>
							  <p>'.$row['text'].'</p>
							  </div>';
			  
		}
	}
	 echo $data;
}

if (isset($_POST['edit_submit'])) {
	global $mysqli;
	connectDB ();
	$res = $mysqli -> query("UPDATE `products` SET `title`='$title', `text`='$text' WHERE `id`='$id'");
	closeDB ();
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['deleteid'])) {
	$id = $_POST['deleteid'];
	global $mysqli;
	connectDB ();
	$res = $mysqli -> query("DELETE FROM `products` WHERE `id`='$id'");
	if(mysqli_num_rows($result) == 1) {
		$_SESSION['title'] = $title;
		echo "success";
  	}
  	else
 	 {
	  echo "fail";
  	}
  exit();
}

if (isset($_POST['edit_submit'])) {
	global $mysqli;
	connectDB ();
	$res = $mysqli -> query("UPDATE `products` SET `title`='$title', `text`='$text' WHERE `id`='$id'");
	closeDB ();
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['deleteid'])) {
	$id = $_POST['deleteid'];
	global $mysqli;
	connectDB ();
	$res = $mysqli -> query("DELETE FROM `products` WHERE `id`='$id'");
	if(mysqli_num_rows($result) == 1) {
		$_SESSION['title'] = $title;
		echo "success";
  	}
  	else
 	 {
	  echo "fail";
  	}
  exit();
}

if(isset($_POST['updateid'])){
	$product_id = $_POST['updateid'];
	global $mysqli;

	connectDB ();
	$res = $mysqli -> query("SELECT * FROM `products` WHERE `id`='$product_id'");
	closeDB ();

	$response = array();
	if(mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			$response = $row;
		}
		echo json_encode($response);
	}


}

if (isset($_POST['update_records'])) {
	global $mysqli;
	$title=$_POST['title'];
    $text=$_POST['text'];
	$id=$_POST['id'];
	connectDB ();
	$result = $mysqli -> query("UPDATE `products` SET `title`='$title', `text`='$text' WHERE `id`='$id'");
	closeDB ();
	if(mysqli_num_rows($result) == 1) {
		$_SESSION['title'] = $title;
		echo "success";
  }
  else
  {
	  echo "fail";
  }
  exit();   
}


?>