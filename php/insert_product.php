<?php
	include ("connect_to_database.php");
	//include ("setType.php");
	//include ("setMeasureUnit.php");
	
	//	$product_measure_unitID;
		
	function insert_product(){
		$conn = connectToDatabase();
		
		$product_trade_nameID = $_POST['product_trade_name']; //manufacturer
		$product_name = $_POST['product_name'];
		$product_image = $_FILES['product_image'];
		$product_price = $_POST['product_price'];
		$product_declaration = $_POST['declaration'];
		$product_barcode_number = $_POST['barcode_number'];
		$product_quantity = $_POST['quantity'];
		$product_amount = $_POST['amount'];
		
		$product_measure_unitID = $_POST['measureUnitId'];
		
		save_image($product_image);
		
		$sql = "INSERT INTO proizvod (Naziv, SlikaFilename, Cena, Deklaracija, BrojBarKoda, KolicinaProizvodaUSkladistu, KolicinaUPakovanju, FK_MernaJedinicaID, FK_TradeNameID) 
		VALUES('".$product_name."', '".$product_image["name"]."', ".$product_price.", '".$product_declaration."','".$product_barcode_number."',".$product_quantity.",".$product_amount.",".$product_measure_unitID.",".$product_trade_nameID.")";
		
		$conn->query($sql);
	}
	
	
insert_product();

header("Location: show_products_layout.php");

function save_image($imageFile){
	$dir = "../images/";
	
	move_uploaded_file($imageFile["tmp_name"], $dir . $imageFile["name"]);  
	
	
}
?>