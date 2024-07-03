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
     <title>Orders</title>
     <link rel="stylesheet" href="css6.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
   <style>
    .b
    { float:left;
      border:2px solid black;
      margin:5px;
      margin-left:1.2%;
      font-family: 'Quicksand', sans-serif;

    }
    table
    {
        padding: 2px;
        border-collapse:collapse;
        margin-bottom:5%;
    }
    td
    {
        border: 1px solid black;
        font-family: 'Archivo Narrow', sans-serif;
        font-size: 5px;
        padding: 5px;
    }
    .head {
    overflow:hidden;
    background-color: #212529;
    height: 40px;
    color:white;
    }
    th
    {border: 1px solid black;
     font-family: 'Roboto Slab', serif;
    font-size: 10px;
    padding: 5px;   
    }
    .dispatch
    {
      background-color:rgb(153, 93, 210);
      color:white;
      padding:5px;
      border-radius:5px;
      float:right;
      border-style:double;
    }
    </style>
    </head>
    <body style=" font-family: 'Archivo Narrow', sans-serif;">

        <div class="header" style="text-align: center;">
        <a href="logout2.php" style="float:left">Logout</a>
        <a href="viewreport.php" style="float:right">View Reports</a> 
        <div class="header-center" >
              <a class="active" href="order.php">Orders</a>
              <a href="adminstatus.php">Status of Delivery</a>
              <a href="stock.php">Stock</a>
              <a href="customer.php">Customers</a>
              <a href="add.php">Add Items</a>
              </div>
        </div>
        <br><h2 >Current orders yet to delivery</h2>
        <?php
        $con1=mysqli_connect('localhost','root','','miniproject');
        $con2=mysqli_connect('localhost','root','','order');
        $t="show tables";
        $res=$con2->query($t);
        $i=1;
        if(mysqli_num_rows($res)>0)
        { 
            while($cus=mysqli_fetch_array($res))
            {
            $o=$cus[0];
            echo"<div class='b'><form method='POST'><br><div class='head'><input type='hidden' name='c' value='$o' >Order No:$i <button name='disp' class='dispatch'>Dispatch</button></form><br>Username: $o</div>";
            $c="select * from $o where quantity<>0";
            $list=$con2->query($c);
            echo "<div><br>Order:<table>
            <tr> <th>S.No.<hr></th><th>Code<hr></th>  <th>Drug<hr></th> <th>Quantity<hr></th> <th>Amount<hr></th> </tr>";
            $j=1;$amt=0;
            $m1="select LastDeliveryAddress from customer_details where Username='$o'";
            $res1=$con1->query($m1);
            $row1=mysqli_fetch_array($res1);
            $a=$row1[0];
            while($row=mysqli_fetch_array($list))
            {
                echo"<tr> <td>$j.<hr></td>  <td>$row[code]<hr></td> 
                <td>$row[drug]<hr></td> <td>$row[quantity]<hr></td> <td>$row[amt]<hr></td></tr> ";
                $j++;
                $amt+=$row['amt'];
            }
            echo"<br></table></div><div><p>Address:<br>$a</p><hr><p>Bill amount: Rs.$amt only</p></div></div>";
            $i++;
         }
         }
        else 
        echo "<h1 style='font-family:verdana'>There are no orders currently >>> All orders cleared.</h1>";
        if(isset($_POST['c']) && isset($_POST['disp']))
        { 
         $con3=mysqli_connect('localhost','root','','dispatch');
         $un=$_POST['c'];
         $b="select * from $un where quantity<>0";
         $list1=$con2->query($b);
         
         $ct="create table if not exists $un (code int(4)ZEROFILL unique not null,drug varchar(50),quantity int,amt decimal(10,2)) ";
         
         $con3->query($ct);$l=0;
         while($row4=mysqli_fetch_array($list1))
            {
                $code[$l]=$row4['code'];//array to store code
                $d[$l]=$row4['drug'];//array to store drug
                $q[$l]=$row4['quantity'];//array to store quantity
                $r[$l]=$row4['amt'];//array to store rate
                $l++;
            }
            $c=mysqli_num_rows($list1);
            for($l=0;$l<$c;$l++)
            {
                $ins="insert into $un values($code[$l],'$d[$l]',$q[$l],$r[$l])";
                $con3->query($ins);
            }
         $del="drop table $un";
         $con2->query($del);
         echo"<script>window.location.href='order.php'</script>";
        }
        ?></body></html>
