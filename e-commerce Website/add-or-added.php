<?php
	function message($id){
		require("connection.php");
		$query = "SELECT cart FROM ecomm.items WHERE PID=".$id;
		$result= mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		while($row)
		{
			if($row['cart'] == 0){
				return "Add to cart";
			}else{
				return "Added!";
			}
		}
	}
?>