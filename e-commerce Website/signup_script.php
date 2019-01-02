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

	error_reporting(0);
	require_once("connection.php");
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$name = mysqli_real_escape_string($conn,$name);
		$name = strip_tags($name);
		
		$email = $_POST['e-mail'];
		$email = mysqli_real_escape_string($conn,$email);
		$email = strip_tags($email);
		
		$password = $_POST['password'];
		$password = mysqli_real_escape_string($conn,$password);
		$password = strip_tags($password);
		$password = MD5($password);
		
		$contact = $_POST['contact'];
		$contact = mysqli_real_escape_string($conn,$contact);
		$contact = strip_tags($contact);

		$city = $_POST['city'];
		$city = mysqli_real_escape_string($conn,$city);
		$city = strip_tags($city);

		$address = $_POST['address'];
		$address = mysqli_real_escape_string($conn,$address);
		$address = strip_tags($address);
		
		$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
		$regex_num = "/^[789][0-9]{9}$/";
		$query = "SELECT * FROM ecomm.persons WHERE Email='$email'";
		$result = mysqli_query($conn, $query);
		$num = mysqli_num_rows($result);

		if ($num != 0)
			{
			$m = "<span style='color:red;'>Email Already Exists</span>";
			header('location: signup.php?m1='.$m);
			}
		else if (!preg_match($regex_email,$email))
			{
			$m = "<span style='color: red;'>Not a valid Email Id</span>";
			header('location: signup.php?m1='.$m);
			}
		else if (!preg_match($regex_num, $contact))
			{
			$m = "<span style='color: red;'>Not a valid phone number</span>";
			header('location: signup.php?m2='.$m);
			}
		else{
			
			$query2 = "INSERT INTO ecomm.persons
			(Name, Email, Password, Contact, City, Address)
			VALUES
			('$name','$email','$password','$contact','$city','$address')";
			if(mysqli_query($conn,$query2))
			{
				session_start();
				$_SESSION['email']=$email;
				header('location: home.php');	
			}
			else{
				echo "error while inserting the records".mysqli_error($conn);
			}
			
		}
	}
	mysqli_close($conn);
?>