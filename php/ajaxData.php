<?php
	include_once ("connect_to_database.php");
	
	$connection = connectToDatabase();
	
	if(!empty($_POST["tipmernejedinice"])){
		$sql = "SELECT MernaJedinicaID, NazivMerneJedinice, Oznaka FROM merna_jedinica WHERE FK_TipMerneJediniceID = ".$_POST['tipmernejedinice'];
		$result = $connection->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				echo "<option value=".$row['MernaJedinicaID'].">".$row['Oznaka']."</option>";
			}
		}else {
			echo "<option value=''>Prvo odaberite tip merne jedinice</option>";
		}
	}

?>