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
     <title>Add Items</title>
     <link rel="stylesheet" href="css6.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&display=swap" rel="stylesheet">
    
    </head>
    <style>
        td
        {
            text-align:left;
        }
        p
        {
            font-family: 'Roboto Mono', monospace;
            font-size :25px;
        }
        </style>
    <body >
        <div class="header" style="text-align: center;">
        <a href="logout2.php" style="float:left">Logout</a>
        <a href="viewreport.php" style="float:right">View Reports</a> 
        <div class="header-center" >
              <a href="order.php">Orders</a>
              <a href="adminstatus.php">Status of Delivery</a>
              <a href="stock.php">Stock</a>
              <a href="customer.php">Customers</a>
              <a class="active" href="add.php">Add Items</a>
              </div>
            </div>
            
            <div class='add'>
      <p><u>Enter details to add drug to table:</u></p>
        <form method="post">
        <table>
<tr><td>
Drug Name :</td>
<td><input type="text"  name="name" required><font color="red">*</font>
</td></tr><tr><td>
Code(unique):</td> 
<td><input type="text" name="code" minlength="4" maxlength="4" required><font color="red">*</font>
</td></tr><tr><td>
MRP:</td> 
<td><input type="text" name="mrp" required ><font color="red">*</font>
</td></tr><tr><td>
Our Price:</td> 
<td><input type="text" name="op" required><font color="red">*</font>
</td></tr>
</table>
        
        <br><br><input id='back' type="submit">   <input id='back' type="reset">
        </form></div>  

        <?php
  $con=mysqli_connect('localhost','root','','miniproject');
  if($con==FALSE)
  die('Connection to database failed!');
   if(isset($_POST['name']))
  {
    $n=$_POST['name'];
    $c=$_POST['code'];
    $m=$_POST['mrp'];
    $o=$_POST['op'];
    
$s="select * from medicine where code='$c'";
$res=$con->query($s);
if(mysqli_num_rows($res)>0)
{  
die("Code already taken!...Try different one.");
}
$in="insert into medicine(drug,code,mrp,ourrate) values('$n','$c','$m','$o')";

if($con->query($in)==FALSE)
{
  echo"data not added";
}
else
{
  echo"<h3>Data Successfully added</h3>";
}
  }
?>
</div>
</body>
</html>