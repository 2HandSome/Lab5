<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/form.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
function do_login()
{
 var username=$("#username").val();
 var password=$("#password").val();
 if(username!="" && password!="")
 {
  $("#loading_spinner").css({"display":"block"});
  $.ajax
  ({
  type:'post',
  url:'do_login.php',
  data:{
	do_login:"do_login",
   username:username,
   password:password
  },
  success:function(response) {
  if(response=="success")
  {
    window.location.href="index.php";
  }
  else
  {
    $("#loading_spinner").css({"display":"none"});
    alert("Wrong Details!!!!");
  }
  }
  });
  
 }
 else
 {
  alert("Please Fill All The Details");
 }

 return false;
}
</script>
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form form method="post" onsubmit="return do_login();">
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" id="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" id="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" id="login_button" name="login">Login</button>
  	</div>
  </form>
</body>
</html>