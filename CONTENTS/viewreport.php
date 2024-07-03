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
     <title>Reports</title>
     <link rel="stylesheet" href="css6.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">
    
    <style>
     td
     {
     text-align: left;
     }
    #i
    {
        width: 600px;;
        height: 50px;
        border:none;
        font-size: 20px;
        
    }
    
        </style>
    </head>
    <body >
    <form action="order.php">
	<input type="submit" id="back" value="Back to Orders">
	</form>
    <div style="padding-top:50px;">
        <fieldset >
        <legend style="font-family: 'Cinzel', serif;font-size:50px">Public Queries:</legend>
	    <?php
         $con=mysqli_connect('localhost','root','','miniproject');
          if($con==FALSE)
          die("Error_could not connect database>>>".mysqli_connect_error());
          $q="select * from Query";
	      $res=$con->query($q);$i=1;
          echo"<table>";
          while($row=mysqli_fetch_array($res))
          {
           echo"<tr> <td>$i)</td> <td><form method='POST' action='removereport.php'><input type='text' name='q' id='i' value='$row[q]' ></td><td><button id='back' type='Submit'>Query Solved</button></form></td></tr>";
          $i++;
         }
         echo "</table>";
        ?>
      </fieldset>
        </div>
        </body>
        </html>