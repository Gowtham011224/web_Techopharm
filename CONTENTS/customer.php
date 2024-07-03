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
     <title>Customers</title>
     <link rel="stylesheet" href="css6.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">

    </head>
    <body >
        <div class="header" style="text-align: center;">
        <a href="logout2.php" style="float:left">Logout</a>
        <a href="viewreport.php" style="float:right">View Reports</a> 
        <div class="header-center" >
              <a href="order.php">Orders</a>
              <a href="adminstatus.php">Status of Delivery</a>
              <a href="stock.php">Stock</a>
              <a class="active" href="customer.php">Customers</a>
              <a href="add.php">Add Items</a>
              </div>
        </div>
              <div style="padding-top:50px;">
        <fieldset >
        <legend style="font-family: 'Cinzel', serif;font-size:50px">Customers Data:</legend>
	    <?php
         $con=mysqli_connect('localhost','root','','miniproject');
          if($con==FALSE)
          die("Error_could not connect database>>>".mysqli_connect_error());
          $q="select * from customer_details";
	      $res=$con->query($q);
          echo "<br><table>
        <tr> <th>Username</th>  <th>Name</th> <th>Password</th>
        <th>Email ID</th> <th>Date of Birth</th> <th>Contact Number</th></tr>";
          while($row=mysqli_fetch_array($res))
          {
        echo"<tr><td>$row[Username]</td><td>$row[Name]</td> <td>$row[Password]</td>
        <td>$row[Email]</td>  <td>$row[DOB]</td><td>$row[Contact]</td></tr>";
         }
         echo " </table>";
        ?>
      </fieldset>
        </div>
        </body>
        </html>