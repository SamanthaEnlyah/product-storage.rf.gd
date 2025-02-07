<?php
	include "connect_to_server.php";


	function createDatabase(){
		$conn = connectToServer();
		$sql = "CREATE DATABASE magacin";
		$conn->query($sql);
		
	}
	
	createDatabase();
?>