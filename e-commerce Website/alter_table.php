<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomm";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql= "ALTER TABLE items
ADD cart INT(10)";

$row=mysqli_query($conn,$sql);
	if($row){
		echo "table updated successfully";
	}
	else{
		echo "error in updating the table".mysqli_error($conn);
	}