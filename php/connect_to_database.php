<?php
	function connectToDatabase(){
		$dbname = "if0_38258861_product_storage";
		$dbhostname = "sql105.infinityfree.com";
		$dbusername = "if0_38258861";
		$dbpassword = "yoWlRatHCLRH";
		
		$connection = mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname);
		
		if($connection) {
			return $connection;
		}
		else {
			echo "<script>alert('Not connected to db')</script>";
		}
	}
?>