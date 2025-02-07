<?php

	include ("connect_to_database.php");

		
	function writeTradeNameOptions(){
			$sql = "SELECT TradeNameID, Name FROM trade_name";
			$conn = connectToDatabase();
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_array()){
					echo "<option value='".$row['TradeNameID']."'>".$row['Name']."</option>";
				}
			}
		$conn->close();
	}
?>