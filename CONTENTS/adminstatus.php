<?php
session_start();
if (isset($_SESSION['flag']))
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
     <link rel="icon" href="administrator.png">
     <title>Delivery Status</title>
     <link rel="stylesheet" href="css6.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Arimo&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
   </head>
    <style>
    .delivered
    {
      background-color:white;
      color:teal;
      width:25%;
      padding:10px;
      border-radius:5px;
      float:right;
      font-weight:bold;
      border-style:double;
      font-family:verdana;
    }
    .box
    {   color:white;
        background-image:url('dark.png');
        font-family: 'Arimo', sans-serif;
        width: 700px;
        padding:20px;   
        margin:2%;
    }
    span
    {
        font-family: 'Anton', sans-serif;
        letter-spacing:1.5px;
    }
    </style>
    <body style=" font-family: 'Archivo Narrow', sans-serif;">

        <div class="header" style="text-align: center;">
        <a href="logout2.php" style="float:left">Logout</a>
        <a href="viewreport.php" style="float:right">View Reports</a> 
        <div class="header-center" >
              <a href="order.php">Orders</a>
              <a class="active" href="adminstatus.php">Status of Delivery</a>
              <a href="stock.php">Stock</a>
              <a href="customer.php">Customers</a>
              <a href="add.php">Add Items</a>
              </div></div>
              <br><h2>Orders dispatched to delivery</h2>
        <?php
        $con=mysqli_connect('localhost','root','','dispatch');
        $con1=mysqli_connect('localhost','root','','miniproject');
        $t="show tables";
        $res=$con->query($t);
        
        if(mysqli_num_rows($res)>0)
        {   while($cus=mysqli_fetch_array($res))
            {
            $o=$cus[0];
            $c="select amt from $o where quantity<>0";
            $list=$con->query($c);
            $amt=0;
            $m1="select LastDeliveryAddress from customer_details where Username='$o'";
            $res1=$con1->query($m1);
            $row1=mysqli_fetch_array($res1);
            $a=$row1[0];
            while($row=mysqli_fetch_array($list))
                $amt+=$row['amt'];
                echo"<div class='box'> <form method='POST'><button name='del' type='submit' class='delivered'>Delivered</button> <div><span>Username:</span> $o <input type='hidden' name='c' value='$o'><br><span>Address:</span> $a  <br><span>Amount to be collected:</span> Rs. $amt</div></form></div><br>";
            }
        }
        else 
        echo "<h1 style='font-family:verdana'>There are no pending orders currently >>> All dispatched orders delivered.</h1>";
        if(isset($_POST['c']) && isset($_POST['del']))
         { $c=$_POST['c'];
           $d="drop table $c";
           $con->query($d);
           echo"<script>window.location.href='adminstatus.php'</script>";

            }
        
        ?>     
          </div></body></html>