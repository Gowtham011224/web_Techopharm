<!DOCTYPE html>
<html>
<head>
<link href="css3.css" rel="stylesheet" >
<link rel="icon" href="icon.png">
<link href="https://fonts.googleapis.com/css2?family=Lumanosimo&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap" rel="stylesheet">
<title>Signup</title>
</head>
<body style="background-color:#282d31;font-family: 'Lumanosimo', cursive;color:white">
	<form action="cover.html">
	<input type="submit" id="back" value="Back to home page">
	</form>
  <br>
  <form action="userlogin.php">
	<input type="submit" id="back" value="Back to login">
	</form><br><h2 style="text-align:center;font-family: 'Major Mono Display', monospace;">We are happy that you decided to join our family!</h2>
     <img src="signup bg.jpg" width="50%" style="float:left;">
  <form class="text" method="POST">
    <h1>Please sign up</h1>
    <table><tr>(Note:For username only lowercase and numbers.)
      <td>Username</td>
      <td><input type="text" name="uname" pattern="[a-z0-9]{8}" placeholder="Only 8 characters"required></td>
      <td>Create Password</td>
      <td><input type="password" name="pwd" minlength='6' maxlength='15' placeholder="Password" required></td></tr>
  
    <tr><td>Name</td><td>
    <input type="text" name="n" maxlength="20" required></td><td>Email ID</td><td>
    <input type="email" name="em" placeholder="name@example.com" maxlength="25" required></td></tr>

    <tr><td>
    Date of birth</td><td>
    <input type="date" name="dob" required></td><td>Contact number</td><td>
    <input type="number" name="cn" min=0 max=9999999999 placeholder="XXXXX-XXXXX"required></td></tr>
  </table>
    <br><button id="back" type="submit">Sign in</button> <button id="back" type="reset">Reset</button>
  </form>
  <br>
  <div style="text-align:center;position:static">
  <?php
  $con=mysqli_connect('localhost','root','','miniproject');
  if($con==FALSE)
  die('Connection to database failed!');
  $ct="create table if not exists Customer_Details (Username varchar(8) unique not null,Password varchar(15),Name varchar(20),Email varchar(25),DOB varchar(10),Contact int,LastDeliveryAddress varchar(100))";
  if($con->query($ct)==FALSE)
  echo"Error in table creation";
  if(isset($_POST['uname']))
  {
    $u=$_POST['uname'];
    $p=$_POST['pwd'];
    $n=$_POST['n'];
    $e=$_POST['em'];
    $d=$_POST['dob'];
    $c=$_POST['cn'];
    
$s="select * from customer_details where username='$u'";
$res=$con->query($s);
if(mysqli_num_rows($res)>0)
{  
die("Username already taken!...Try different one.");
}
$in="insert into Customer_Details values('$u','$p','$n','$e','$d','$c','Last address does not exist')";
if($con->query($in)==FALSE)
{
  echo"data not added";
}
else
{
  echo"<h3>Successfully signed in...You can now login.</h3>";
}
  }
?>
</div>
</body>
</html>
	