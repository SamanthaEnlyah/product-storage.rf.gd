<?php


	
	include_once ("connect_to_database.php");

	function writeMUT(){
		
	    $connection = connectToDatabase();
		$selectOpen = "<select id='measure_unit_id' required class='m-unit' style='width: 210px; margin: 0px 10px 10px 45px;'  name='measure_unit'>";
		
		
		$sql = "SELECT MernaJedinicaID, NazivMerneJedinice, Oznaka FROM merna_jedinica WHERE FK_TipMerneJediniceID = ".$_GET['measure_unit_type_id'];
		$result = $connection->query($sql);
		
		$options = "";
		
		if($result->num_rows > 0){
			$options.="<form action='form_insert_product.php' method='post'>";
			$options.="<select id='measure_unit_id' required class='m-unit' style='width: 210px; margin: 0px 10px 10px 45px;'  name='measure_unit'>";
			
			
			while($row = $result->fetch_array()){
				$options .= "<option value='".$row['MernaJedinicaID']."'>".$row['Oznaka']."</option>";
			}
			
			
			$options.="</select>";
			$options.="<input type='submit' value='set measure units'/>";
			$options.="</form>";
			
			//$iframe = "<iframe id='measuringUnitsOfType'></iframe>";
			
		} else echo "<option>No values</option>";
		$connection->close();
		
		//echo $options;
		
		//echo "</select>";
		
		$selectClose = "</select>";
		
		$select = /*$selectOpen.*/$options; //.$iframe;//.$selectClose; //  "'".$selectOpen."'";
		
		
		
		
		//header("Location: form_insert_product.php");
		
		echo $select;
		
	}
	writeMUT();

	
		
?>


