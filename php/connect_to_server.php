<?php
	function connectToServer(){
		
		$dbhostname = "sql105.infinityfree.com";
		$dbusername = "if0_38258861";
		$dbpassword = "yoWlRatHCLRH";
		
		$connection =  mysqli_connect($dbhostname, $dbusername, $dbpassword);
		if($connection) {
			echo "<script>alert('Successfuly connected to db server')</script>";
			return $connection;
		}
		else {
			echo "<script>alert('Not connected to db server')</script>";
		}

	}


?>