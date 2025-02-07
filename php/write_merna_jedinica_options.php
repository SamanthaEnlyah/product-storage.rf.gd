<?php

	//include ("connect_to_database.php");
	
	echo "<script>alert('Sta kk ne radi?');</script>";
	
	 function writeMernaJedinicaOptions(){
		
		$connection = connectToDatabase();
		$sql = "SELECT MernaJedinicaID, Oznaka FROM merna_jedinica";
		$result = $connection->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_array()){
				echo "<option value='".$row['MernaJedinicaID']."'>".$row['Oznaka']."</option>";
			}
		}
		$connection->close();
	} 
	

?>