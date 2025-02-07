<?php
	include ("connect_to_database.php");
	
	function insert_tradename(){
		$conn = connectToDatabase();
		
		$product_trade_name = $_POST['trade_name']; //manufacturer
		
		
		echo "<script>alert('".$product_trade_name."')</script>";
		
		
		$sql = "INSERT INTO trade_name (Name)VALUES('".$product_trade_name."')";
		
		$conn->query($sql);
	}
insert_tradename();
header("Location: insert_trade_name_layout.php");
?>