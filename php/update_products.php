<html>

<head>
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
</head>

<body>


<?php

include "connect_to_database.php";
//include "add_existing_product.php";

	$connection = connectToDatabase();
	$sql = "SELECT * FROM proizvod";
	$results = $connection->query($sql);
	if($results->num_rows > 0){
		echo "<table id='proizvodi' class='table table-hover'>";
		
		echo "<tr class='table-info'>
			
				<td>Product ID</td>
				<td>Name</td>
				<td>Image</td>
				<td>Add quantity to storage</td>
				<td>Quantity in storage</td>
				<td>Price</td>
				<td>Declaration</td>
				<td>Bar code number</td>
				<td>Quantity in package</td>
				<td>Measure Unit</td>
				<td>Manufacturer</td>
			
			</tr>";
		
		$counter = 0;
		while($row = $results->fetch_assoc()){
			echo 
			"<tr>
				<td>".$row['ProizvodID']."</td>
				<td>".$row['Naziv']."</td>
				<td><img width='100' src='../images/".$row['SlikaFilename']."'/></td>
				<td>
				<form method='GET' action='non ajax/add_existing_product.php'>
					<!--<script>alert('amount_ID_{$row['ProizvodID']}');</script>-->
					<input id='amount_ID_{$row['ProizvodID']}' type='text' name = 'amount'/>
					<input id='productID_ID_{$row['ProizvodID']}'  name='productID' value ='".$row['ProizvodID']."' hidden/>
					<input id='add_ID_{$row['ProizvodID']}'  type='submit' value='Add'/>
				</form>
				</td>
				<td id='kolicinaProizvodaSkladiste'>".$row['KolicinaProizvodaUSkladistu']."</td>
				<td>$".$row['Cena']."</td>
				<td>".$row['Deklaracija']."</td>
				<td>".$row['BrojBarKoda']."</td>
				<td>".$row['KolicinaUPakovanju']."</td>
				<td>".getMernaJedinicaOznaka($row['FK_MernaJedinicaID'])."</td>
				<td>".getTradeName($row['FK_TradeNameID'])."</td>
			</tr>";
			$counter =  $counter + 1;
		}
		echo "</table>";
	}
	
	function getMernaJedinicaOznaka($id){
		$connection = connectToDatabase();
		
		$sql = "SELECT Oznaka FROM merna_jedinica WHERE MernaJedinicaID = ".$id;
		$results = $connection->query($sql);
		if($results->num_rows > 0){
			$row = $results->fetch_assoc();
			return $row['Oznaka'];
		}
	} 
	
	function getTradeName($id){
		$connection = connectToDatabase();
		
		$sql = "SELECT Name FROM trade_name WHERE TradeNameID = ".$id;
		$results = $connection->query($sql);
		if($results->num_rows > 0){
			$row = $results->fetch_assoc();
			return $row['Name'];
		}
	} 

?>

</body>

</html>