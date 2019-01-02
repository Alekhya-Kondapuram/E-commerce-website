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



	#require_once("connection.php");
	$sql = "CREATE TABLE persons 
	(PID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	Name CHAR(50) NOT NULL,
	Email CHAR(50) NOT NULL UNIQUE,
	Password CHAR(50) NOT NULL,
	Contact CHAR(50) NOT NULL,
	City CHAR(50) NOT NULL,
	Address CHAR(50) NOT NULL)";
	$row=mysqli_query($conn,$sql);
	if($row){
		echo "table persons created successfully";
	}
	else{
		echo "error in creating the table".mysqli_error($conn);
	}
	
	$sql = "CREATE TABLE items
	(PID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Price INT(10) NOT NULL)
	cart INT(10)";
	$row=mysqli_query($conn,$sql);
	if($row){
		echo "table items created successfully";
	}
	else{
		echo "error in creating the table".mysqli_error($conn);
	}
	
	$sql = "CREATE TABLE contacts
	(ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Name CHAR(50) NOT NULL,
	Email CHAR(50) NOT NULL UNIQUE,
	Message CHAR(200)
	)";
	$row=mysqli_query($conn,$sql);
	if($row){
		echo "table contacts created successfully";
	}
	else{
		echo "error in creating the table".mysqli_error($conn);
	}
?>