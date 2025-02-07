<?php
	include_once ("connect_to_database.php");
	
	function insert_measure_unit(){
		$conn = connectToDatabase();
		
		$measure_unit_name = $_POST['measure_unit_name']; 
		$measure_unit_label = $_POST['label'];
		
		echo "<script>alert('".$measure_unit_name.", ".$measure_unit_label."');</script>";
		
		$sql = "INSERT INTO merna_jedinica (NazivMerneJedinice, Oznaka)
		VALUES('".$measure_unit_name."', '".$measure_unit_label."')";
		
		$conn->query($sql);
	}
insert_measure_unit();
?>