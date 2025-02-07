<?php

	include ("connect_to_database.php");
	
		//$measure_unit_type_ID = 0;
	
	 function writeMernaJedinicaOptionsByType(){
		$connection = connectToDatabase();
		echo "WRITE MERNA JEDINICA";
		
		//$measure_unit_type_ID = $_POST['id'];
	//echo "<script>alert('".$measure_unit_type_ID."');</script>";
       
		
		//$measure_unit_type_naziv = $_GET['measure_unit_type'];
		
		//$measure_unit_type_ID = $measure_unit_type_ID;
//		getMeasureTypeID($measure_unit_type);
	   
		//$sql = "SELECT mj.MernaJedinicaID, mj.Oznaka FROM merna_jedinica mj INNER JOIN tip_merne_jedinice tmj ON mj.FK_TipMerneJediniceID = tmj.TipMerneJediniceID WHERE FK_TipMerneJediniceID = ".$measure_unit_type_ID;
		
		echo .$GLOBALS['measure_unit_type_ID'];
		
		//echo $measure_unit_type_ID;
		$sql = "SELECT MernaJedinicaID, NazivMerneJedinice, Oznaka FROM merna_jedinica WHERE FK_TipMerneJediniceID = ".$GLOBALS['measure_unit_type_ID'];
		$result = $connection->query($sql);
		
		$options = "";
		
		if($result->num_rows > 0){
			
			//$options.="<form action='insert_product_layout.php' method='post'>";
			//$options.="<select id='measure_unit_id' required class='m-unit' style='width: 210px; margin: 0px 10px 10px 45px;'  name='measure_unit'>";
			while($row = $result->fetch_array()){
				$options .= "<option value='".$row['MernaJedinicaID']."'>".$row['Oznaka']."</option>";
			}
			//$options.="</select>";
			//$options.="<input type='submit' value='set measure units'/>";
			//$options.="</form>";
		} else echo "<option>No values</option>";
		$connection->close();
	   // echo "<script> history.back(); document.write(".$options.");</script>";
		echo $options;
	//	header("Location: insert_product_layout.php");
		
	} 
	




	 function getMeasureTypeID($naziv){
		$connection = connectToDatabase();
		
	   
		$sql = "SELECT TipMerneJediniceID FROM tip_merne_jedinice WHERE TipMerneJediniceNaziv = '".$naziv."'";
		$result = $connection->query($sql);


		if($result->num_rows > 0){
			
			$row = $result->fetch_array();
			return $row['TipMerneJediniceID'];
			
			//while($row = $result->fetch_array()){
				
			//}
			
		} //else 
		$connection->close();
		
	} 



	

//writeMernaJedinicaOptionsByType();

?>