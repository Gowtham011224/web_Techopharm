<?php
session_start();
if (isset($_SESSION['uname']))
{
//empty
}
else
{
    echo '<script>window.location.href = "cover.html";</script>';
}
?>

<!DOCTYPE html>
<html>
    <head>
     <link rel="icon" href="icon.png">
     <title>  Profile </title>
     <link rel="stylesheet" href="css5.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Fasthand&display=swap" rel="stylesheet">     
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">
</head>
    <body >
        <div class="header" style="text-align: center;">
           
            <div class="header-left"><img src="icon.png" width="100" height="100">
            </div>
            <span style="font-size: 75px;opacity:1;"><b>TECHOPHARM </b></span>
            <span style="font-family: 'Fasthand', cursive;font-size: 50px;opacity: 1;">Your doorstep drug</span>
            <div class="header-right" >
              <a class="active" href="userprofile.php">Profile</a>
              <a href="useritems.php">Place Order</a>
              <a href="userstatus.php">Status</a>
              <a href="logout.php">Logout</a>
            </div>
        </div><br>
        <?php
        if(isset($_POST['col']))
        {   $u=$_SESSION['uname'];
            $cc=$_POST['col'];
            $nv=$_POST['inp'];
        $con=mysqli_connect('localhost','root','','miniproject');
        if($con==FALSE)
        die("Error_could not connect >>>".mysqli_connect_error());
        $upd="update customer_details set $cc='$nv' where Username='$u'";
        if($con->query($upd))
        echo "<h2><script>alert('Successfully updated.');</script></h2>";
        else 
        echo "Couldn't update";
	     }
     ?>
        <fieldset class="ct">
        <legend><div class="hd">Your Details:</div></legend>
	    <?php
         $con=mysqli_connect('localhost','root','','miniproject');
          if($con==FALSE)
          die("Error_could not connect database>>>".mysqli_connect_error());
        $u=$_SESSION['uname'];
        $q="select * from customer_details where username='$u'";
	      $res=$con->query($q);
		    $row=mysqli_fetch_array($res);
        echo "<br><table>
        <tr> <th>Username  :</th> <td>$row[Username]</td> </tr> 
        <tr> <th>Name  :</th>     <td>$row[Name]</td>     </tr>
        <tr> <th>Password  :</th> <td>$row[Password]</td> </tr> 
        <tr> <th>Email ID  :</th> <td>$row[Email]</td>    </tr> 
        <tr> <th>Date of Birth  :</th> <td>$row[DOB]</td> </tr> 
        <tr> <th>Contact Number  :</th> <td>$row[Contact]</td> </tr> 
        </table>";       
        ?>
      </fieldset>
      <img src='hello.gif' style="float:right">
      <div class='upd'>
      <h3><u>UPDATION</u></h3>
        <form method="post">
        	Click the info to be updated:
         <input type="radio" name="col" id="b1" value="Name" required>   
         <label for="b1">Name</label>
         <input type="radio" name="col" id="b2" value="Password" required>   
         <label for="b2">Password</label>
         <input type="radio" name="col" id="b3" value="Email" required>   
         <label for="b3">Email ID</label>
         <input type="radio" name="col" id="b4" value="DOB" required>
         <label for="b4">Date of birth (yyyy-mm-dd)</label>
         <input type="radio" name="col" id="b4" value="Contact" required>
         <label for="b4">Contact Number</label><br>
        Enter the new value: <input type="text" name="inp" placeholder="Enter value in respective format" style="width:200px" required>    
        <br><br><input class='button' type="submit">   <input class='button' type="reset">
        </form></div>  
     </body>
    </html>
