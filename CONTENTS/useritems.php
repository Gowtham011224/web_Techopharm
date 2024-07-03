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
     <title>  Place Order </title>
     <link rel="stylesheet" href="css5.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Fasthand&display=swap" rel="stylesheet">   
     <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">  
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
      input[type='button']
      {
        background:none; 
        font-size: 1pc;
        cursor: pointer;
        color:green;
        border-radius:10px;
        width: 20px;
        padding:2px;
        border-style:double;
        font-family: 'Archivo Narrow', sans-serif;
      }
      input[type='number']
      {
        background:none; 
        font-size: 1pc;
        width: 50px;
        font-family: 'Archivo Narrow', sans-serif;
        padding:2px;
        color:crimson;
        text-align:center;
        border-color:black;
        border-style:dotted;       
        
      }
      table
      {
        border:2px solid black;
      }
      th
  {
    font-family: 'Roboto Slab', serif;
    font-size: 2pc;
    padding: 30px;
  }
  
  td
  {
    font-family: 'Archivo Narrow', sans-serif;
    font-size: 1.5pc;
    padding: 12px;
    text-align: center;
  }
    </style>
    </head>

    <body style="font-family: 'Archivo Narrow', sans-serif;">
        <div class="header" style="text-align: center;">
           
            <div class="header-left"><img src="icon.png" width="100" height="100">
            </div>
            <span style="font-size: 75px;opacity:1;"><b>TECHOPHARM </b></span>
            <span style="font-family: 'Fasthand', cursive;font-size: 50px;opacity: 1;">Your doorstep drug</span>
            <div class="header-right" >
              <a href="userprofile.php">Profile</a>
              <a class="active" href="useritems.php">Place Order</a>
              <a href="userstatus.php">Status</a>
              <a href="logout.php">Logout</a>
            </div>
          </div>
          <h1>Place order by entering required quantity</h1>
          <?php
         $con=mysqli_connect('localhost','root','','miniproject');
          if($con==FALSE)
          die("Error_could not connect database>>>".mysqli_connect_error());
          $q="select * from medicine where Availability='Available'";
          $j=0;
	      $res=$con->query($q);
          echo "<br><table>
        <tr> <th>S.No.<hr></th><th>Code<hr></th>  <th>Drug Name<hr></th> <th>MRP<hr></th>
        <th>Our Rate<hr></th> <th>Quantity<hr></th><th>Amount<hr></th> </tr> <form method='POST'>";
        $c=mysqli_num_rows($res);
        for($i=0;$i<$c;$i++)
        $arr[$i]=0; //array to store quantity
        $i=-1;$k=-1;$l=-1;$sum=0;
        while($row=mysqli_fetch_array($res))
          { $i++;
            $j++;
            $k++;
            $l++;
        echo"<tr> <td>$j)<hr></td>  <td><input type='hidden' name='c' value='$row[Code]'>$row[Code]<hr></td> 
         <td>$row[Drug]<hr></td>     <td>Rs $row[MRP]<hr></td>      <td>Rs $row[OurRate]<hr></td> 
          <td>";if(isset($_POST[$k]) && $_POST[$k]>0)
          $arr[$i]=$_POST[$k] ;
          else
          $arr[$i]=0;

          $code[$l]=$row['Code'];//array to store code
          $d[$l]=$row['Drug'];//array to store drug
          $m[$l]=$row['MRP'];//array to store mrp
          $r[$l]=$row['OurRate'];//array to store rate
          $cost[$l]=$arr[$i]*$row['OurRate'];//array to store amt
          $sum+=$cost[$l];
          echo"<input type='number' min=0 name='$k' value=";if(isset($_POST[$k])) echo $arr[$i]; echo" placeholder='N' > <hr></td> <td><output name='o'>Rs $cost[$l] </output><hr></td></tr>";
         }
         $e='';
         if(isset($_POST['address']))
         $e=$_POST['address'];
         echo "</table><br><button class='button' type='Submit' required>Calculate Amount</button> <br>
         <h2>Total payable amount:Rs $sum</h2>
         <textarea name='address' rows='7' cols='45' placeholder='Enter your delivery location' required>$e</textarea><br>
         <br><input class='button' name='sub' value='Place Order' type='Submit'></form>";
         
         if(isset($_POST['sub']) && $_POST['sub']=='Place Order')
         {
         if($sum==0)
         die("<script>alert('Select any items before placing order.')</script>");
         $n=$_SESSION['uname'];
         $con1=mysqli_connect('localhost','root','','order');$con2=mysqli_connect('localhost','root','','dispatch');
         $a="show tables"; $res2=$con2->query($a);$f1=0;   $res1=$con1->query($a);$f2=0;
         while($arr1=mysqli_fetch_array($res2))
          {
              if($arr1['Tables_in_dispatch']==$n)
              $f1=1;
          }
          while($arr2=mysqli_fetch_array($res1))
          {
            if($arr2['Tables_in_order']==$n)
              $f2=1;
          }
          
         
          if($f2==1 ||$f1==1)
            {  
          die("<script>alert('Order already placed.Can not place another order while previous is yet to delivery.');window.location.href='useritems.php';</script>");
            }
            $ct="create table if not exists $n (code int(4)ZEROFILL unique not null,drug varchar(50),mrp decimal(10,2),rate decimal(10,2),quantity int,amt decimal(10,2))";
            $con1->query($ct);
            $s="select * from $n";
           $res=$con1->query($s);
         for($l=0;$l<$c;$l++)
         {
          $ins="insert into $n values($code[$l],'$d[$l]',$m[$l],$r[$l],$arr[$l],$cost[$l])";
          $con1->query($ins);
         }
         $ad=$_POST['address'];
         $upd="update customer_details set LastDeliveryAddress='$ad' where Username='$n'";
         
        $con->query($upd);
         echo "<script>alert('Order placed.Kindly wait for your delivery.');
         window.location.href='userstatus.php';</script>";
         }
        ?> 
        
        </body>
        </html>