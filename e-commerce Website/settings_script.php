<?php 
	session_start();
	if (!isset($_SESSION['email']))
	header('location: index.php');
	require_once("connection.php");
	
	$old_pass = $_POST['old-password'];
	$old_pass = mysqli_real_escape_string($conn, $old_pass);
	$old_pass = strip_tags($old_pass);
	$old_pass = MD5($old_pass);

	$new_pass = $_POST['password'];
	$new_pass = mysqli_real_escape_string($conn, $new_pass);
	$new_pass = strip_tags($new_pass);
	$new_pass = MD5($new_pass);

	$new_pass1 = $_POST['password1'];
	$new_pass1 = mysqli_real_escape_string($conn, $new_pass1);
	$new_pass1 = strip_tags($new_pass1);
	$new_pass1 = MD5($new_pass1);

	$query = "SELECT Email, Password FROM ecomm.persons
	WHERE Email ='".$_SESSION['email']."'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	$orig_pass = $row['Password'];
	if ($new_pass != $new_pass1)
		{
		header('location: settings.php?error=The two passwords don\'t match');
		}
	else
		{
		if ($old_pass == $orig_pass)
			{
			$query = "UPDATE  ecomm.persons SET Password = '".$new_pass."' WHERE Email = '".$_SESSION['email']."'";
			mysqli_query($conn, $query);
			header('location: setting.php?error="Password Updated"');
			}
		else
			header('location: setting.php?error="Wrong Password"');
		}
?>