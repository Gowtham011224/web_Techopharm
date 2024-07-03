<!DOCTYPE html>
<html>
<head>
<link href="css2.css" rel="stylesheet" >
<link rel="icon" href="administrator.png">
<title>Admin</title>
</head>
<body>
	<form action="cover.html">
	<input type="submit" id="back" value="Back to home page">
	</form>
	
	<div class="login-panel">
		<div class="login-info-box">
			<img src="log.webp" style="width: 150px; height: 150px;">
			<h2>Hi...<br> Login to gain ADMIN status.</h2>
		</div>
							
		<div class="white-panel">
			<div class="login-show">
				<h2>LOGIN</h2>
				<form method="POST">
				  <input type="text" placeholder="Admin ID" name="id" required>
				  <input type="password" placeholder="Password" name="password" required>
				  <input type="submit" value="LOGIN">
				</form>
			</div>
		</div>
	</div>
<?php
session_start();
if(isset($_POST['id']) && isset($_POST['password']))
{
$id=$_POST['id'];
$pwd=$_POST['password'];
if($id=='adminlauncher#123' && $pwd=='admin')
{   $_SESSION['flag']=1;
	echo"<script> window.location.href='order.php'; </script>";
}
else
echo"<script> alert('Admin ID or PASSWORD is incorrect.Please check!');</script>";

}
?>
</body>
</html>