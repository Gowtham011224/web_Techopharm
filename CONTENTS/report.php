<!DOCTYPE html>
<html>
    <head><title>Report</title>
    <link rel="icon" href="icon.png">
</head>
<body>
    <form action="cover.html">
	<input type="submit" style="padding:5px;color:white;background-color:grey;" value="Back to home page">
	</form><br><br>[character limit:100 words]
        <form method=POST>
        <input style="height:150px;width:450px" name="q" placeholder="Enter your query/suggestion here with proper user info and click Submit..." required>
               <br><br> <input style="padding:5px;color:white;background-color:grey;" type="Submit" value="Submit"><hr>
    </form>
    <?php
        if(isset($_POST['q']))
        { 
        $q=$_POST['q'];
        $con=mysqli_connect('localhost','root','','miniproject');
        if($con==FALSE)
        die("Error_could not connect >>>".mysqli_connect_error());
        $ct="create table if not exists Query(query varchar(100))";
        $con->query($ct);
        $in="insert into Query values('$q')";
        
        if($con->query($in))
        echo "<script>alert('Query successfully submitted.We will take required actions.Thank you for your suggestion.');</script>";
        else 
        echo "Couldn't submit";
	     }
     ?>
     </body>
        </html>