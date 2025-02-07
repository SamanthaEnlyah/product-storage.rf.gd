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
				<td>Add image</td>
				<td>Quantity of product in storage</td>
				<td>Price</td>
				<td>Declaration</td>
				<td>Bar Code number</td>
				<td>Package Quantity</td>
				<td>Measure Unit</td>
				<td>Manufacturer</td>

<!--			<td>Proizvod ID</td>
				<td>Naziv</td>
				<td>Slika</td>
				<td>Dodaj sliku</td>
				<td>Količina proizvoda u skladištu</td>
				<td>Cena</td>
				<td>Deklaracija</td>
				<td>Broj Bar koda</td>
				<td>Količina u pakovanju</td>
				<td>Merna Jedinica</td>
				<td>Proizvođač</td>-->
			
			</tr>";
		
		$counter = 0;
		while($row = $results->fetch_assoc()){
			echo 
			"<tr>
				<td>".$row['ProizvodID']."</td>
				<td>".$row['Naziv']."</td>
				<td><img width=80 height=80 src='../images/".$row['SlikaFilename']."'/></td>
				<td>
				<form method='POST' action='non ajax/add_image.php' enctype='multipart/form-data'>
					<!--<script>alert('amount_ID_{$row['ProizvodID']}');</script>-->
					<input id='slika_ID_{$row['ProizvodID']}' type='file' name = 'slika'/>
					<input id='productID_ID_{$row['ProizvodID']}'  name='productID' value ='".$row['ProizvodID']."' hidden/>
					<input id='add_ID_{$row['ProizvodID']}'  type='submit' value='Add image'/>
				</form>
				</td>
				<td id='kolicinaProizvodaSkladiste'>".$row['KolicinaProizvodaUSkladistu']."</td>
				<td>".$row['Cena']."</td>
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