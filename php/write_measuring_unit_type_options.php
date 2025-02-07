<?php
	
	$connection = connectToDatabase();
	
	 function writeMeasuringUnitTypeOptions(){
		
		global $connection; //  = connectToDatabase();
		
		$sql = "SELECT TipMerneJediniceID, TipMerneJediniceNaziv FROM tip_merne_jedinice";
		$result = $connection->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_array()){
				echo "<option value='".$row['TipMerneJediniceID']."'>".$row['TipMerneJediniceNaziv']."</option>";
			}
		}

		
	} 
	

?>