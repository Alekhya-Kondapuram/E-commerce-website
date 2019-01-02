<?php
	session_start();
	require_once("connection.php");
	if(isset($_GET['add'])){
		$id=$_GET['id'];
		//include("add-or-added.php");
		echo $id;
		
		$value= 1;
	$query = "UPDATE ecomm.items SET cart= 1 WHERE PID=". $id;
		echo $query;
		if(mysqli_query($conn, $query))
		{
			header("location:home.php");
		}
	}
 ?>                    