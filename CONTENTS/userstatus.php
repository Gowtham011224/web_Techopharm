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
     <title>  Status </title>
     <link rel="stylesheet" href="css5.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Fasthand&display=swap" rel="stylesheet">     
     <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
      .img
      {
        float:right; 
        border-radius:25px;
        margin:25px;
      }
    </style>
    
    </head>
    <body>
          <div class="header" style="text-align: center;">
           <div class="header-left"><img src="icon.png" width="100" height="100">
           </div>
           <span style="font-size: 75px;opacity:1;"><b>TECHOPHARM </b></span>
           <span style="font-family: 'Fasthand', cursive;font-size: 50px;opacity: 1;">Your doorstep drug</span>
           <div class="header-right" >
             <a href="userprofile.php">Profile</a>
             <a href="useritems.php">Place Order</a>
             <a  class="active" href="userstatus.php">Status</a>
             <a href="logout.php">Logout</a>
           </div>
       </div>
          <div style="font-family: 'Gloria Hallelujah', cursive;font-size:50px"><?php
          $u=$_SESSION['uname'];
          $con1=mysqli_connect('localhost','root','','dispatch');
          $con2=mysqli_connect('localhost','root','','order');
          $c="show tables";
          $res1=$con1->query($c);
          $res2=$con2->query($c);
          $f1=0;$f2=0;
          while($arr1=mysqli_fetch_array($res1))
          {
              if($arr1['Tables_in_dispatch']==$u)
              $f1=1;
          }
         while($arr2=mysqli_fetch_array($res2))
          {
            if($arr2['Tables_in_order']==$u)
              $f2=1;
          }
          echo"<div><img class='img' src='pharm.jpeg'><div>";

          if ($f2==1)
          echo"We have received your order...<br>Order yet to dispatch...Kindly wait...";
          else if($f1==1)
          echo"We have received your order...<br>Order dispatched...<br>You might receive your order at your doorstep anytime...<br>Kindly wait...<br>Thank you for choosing us.";
          else
          echo "No pending orders left.<br>All delivered.<br>Thank you for choosing us.<br>If you didnt receive your order...then contact us through report option in home page or mail us.";
          ?></div>
          </body>
        </html>