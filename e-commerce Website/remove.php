<?php 
	require_once("connection.php");
	if(isset($_GET['id']) && is_numeric($_GET['id'])){
		$id=$_GET["id"];
		$query = "UPDATE ecomm.items SET cart=0 WHERE PID=".$id;
		$res=mysqli_query($conn,$query);
		if($res){
			header("location:cart.php");
			exit;
		}else{
			echo "error while deleting records".mysqli_error($conn);
		}
	}else{
		echo "Donot try this!";
	}
?>