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
     <title>Stocks</title>
     <link rel="stylesheet" href="css6.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&display=swap" rel="stylesheet">
    <style>
      button[value='2']
      {
        border:none;
        background:none; 
        font-family: 'Archivo Narrow', sans-serif;
        font-size: 1.5pc;
        color:red;
        cursor: pointer;
        text-decoration:underline;
      }
      button[value='Available']
      {
        border:none;
        background:none; 
        font-family: 'Archivo Narrow', sans-serif;
        font-size: 1.5pc;
        color:green;
        cursor: pointer;
      }
      button[value='Unavailable']
      {
        border:none;
        background:none; 
        font-family: 'Archivo Narrow', sans-serif;
        font-size: 1.5pc;
        cursor: pointer;
        color:orange;
        text-decoration:underline;
      }
      table
      {
        border:2px solid black;
       
      }
      </style>
    </head>
    <body >
        <div class="header" style="text-align: center;">
        <a href="logout2.php" style="float:left">Logout</a>
        <a href="viewreport.php" style="float:right">View Reports</a> 
        <div class="header-center" >
              <a href="order.php">Orders</a>
              <a href="adminstatus.php">Status of Delivery</a>
              <a class="active" href="stock.php">Stock</a>
              <a href="customer.php">Customers</a>
              <a href="add.php">Add Items</a>
              </div>
        </div>

        <?php
         $con=mysqli_connect('localhost','root','','miniproject');
          if($con==FALSE)
          die("Error_could not connect database>>>".mysqli_connect_error());
         if(isset($_POST['c']) && isset($_POST['sub']))
         {  
          $c=$_POST['c'];
          if($_POST['sub']=='2')
            $d="DELETE FROM medicine WHERE code ='$c'";
          if($_POST['sub']=='Available')
            $d=" UPDATE `medicine` SET `Availability`='Unavailable' WHERE code='$c'"; 
          if($_POST['sub']=='Unavailable')
            $d=" UPDATE `medicine` SET `Availability`='Available' WHERE code='$c'";
            $con->query($d);
         }
          $q="select * from medicine";$i=0;
	      $res=$con->query($q);
          echo "<br><center><table>
        <tr> <th>S.No.<hr></th><th>Code<hr></th>  <th>Drug Name<hr></th> <th>MRP<hr></th>
        <th>Our Rate<hr></th> <th>Availability<hr></th> <th>Delete<hr></th></tr>";
          while($row=mysqli_fetch_array($res))
          {
            $i++;
        echo"<form method='POST'>
        <tr> <td>$i)<hr></td><td><input type='hidden' name='c' value='$row[Code]'>$row[Code]<hr></td>  <td>$row[Drug]<hr></td>   <td>Rs $row[MRP]<hr></td>
        <td>Rs $row[OurRate]<hr></td>  <td><button type='submit' name='sub' value='$row[Availability]'>$row[Availability]</button><hr></td>
        <td><button type='submit' name='sub' value='2'>Delete</button><hr></td></tr></form>";
         }
         echo " </table></center>";
        ?> 
        </body>
        </html>