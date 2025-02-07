<?php

		include_once("connect_to_database.php");
		$conn = connectToDatabase();
		$sql = "SELECT * FROM tip_merne_jedinice";
		$result = $conn->query($sql);
		if($result -> num_rows > 0){
			while($row = $result->fetch_array()){
				echo "<option value='".$row['TipMerneJediniceID']."'>".$row['TipMerneJediniceNaziv']."</option>";
			}
			
		}

?>
