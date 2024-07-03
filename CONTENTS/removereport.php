<?php
 $c=$_POST['q'];
 $con=mysqli_connect('localhost','root','','miniproject');
 if($con==FALSE)
 die("Error_could not connect database>>>".mysqli_connect_error());
$d="DELETE FROM query WHERE q = '$c'";

if($con->query($d))

echo"<script>window.location.href='viewreport.php'</script>";

?>