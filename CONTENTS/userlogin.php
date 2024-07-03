<!DOCTYPE html>
<html>
<head>
<link href="css4.css" rel="stylesheet" >
<link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">

<link rel="icon" href="icon.png">
<title>Login</title>
</head>
<body>
    <div >
    <form action="cover.html">
	<input type="submit" id="back" value="Back to home page">
	</form>
    </div>
    <div class="bg" >
        <div class="login-box">
        <img src="icon.png" >    
        <h1>WELCOME back user!<br>Enter login details</h1>
        <form method="POST">
            <center><table><tr>
            <td><input type="text" name="uname" placeholder="Username" style="width:200px;padding:7px;" required></td></tr>
            <tr><td><input type="password" name="pwd" placeholder="Password" style="width:200px;padding:7px;" required></td></tr></table>
            <input id="login" type="submit" value="LOGIN"></center>
        </form>
        <br>
        <a href="usersignup.php"><i>Not a member yet! Wanna join us? Click here to signup.</i></a>
        <br>
        <a href="fp.html"><i>forgot password?</i></a>
        </div>
    </div>
    <?php
        session_start();
	if(isset($_POST['uname'])&& isset($_POST['pwd']))
        {
        $u=$_POST['uname'];
        $p=$_POST['pwd'];
        $con=mysqli_connect('localhost','root','','miniproject');
        if($con==FALSE)
        die("Connection to database failed!");
        $s="select Username,Password,DOB from customer_details";
        $res=$con->query($s);
	    $f=0;
        if(mysqli_num_rows($res)>0)
          {  
            while($row=mysqli_fetch_array($res))
            {
              if($row['Username']==$u && ($row['Password']==$p || $row['DOB']==$p))
                {
		    $f=1;
		    $_SESSION['uname']=$u;
		    echo '<script>window.open("userprofile.php");</script>';
              }  
            }  
              
          }
          if($f==0)
          echo"<script> alert('USERNAME or PASSWORD is incorrect.Please check!');</script>";
            
        }
        ?>

</body>


