<?php
	include_once "connect_to_database.php";
	
	
	function addProduct(){
		//$amount = setAmountDialog();
		if(isset($_GET['amount']) && isset($_GET['productID'])){
			$newAmount = $_GET['amount'];
			$productID = $_GET['productID'];
			
			echo "PRODUCTID".$productID;
			$existingAmount = getExistingAmountOfProduct($productID);
			$sumAmount = $newAmount + $existingAmount;
			
			
			$sql = "UPDATE proizvod SET KolicinaProizvodaUSkladistu = ".$sumAmount." WHERE ProizvodID = ".$productID;	
			$connection = connectToDatabase();
			$connection->query($sql);
			$connection->close();
			header('Location: ../update_products_layout.php');
		}
	}	
	
//	function setAmountDialog(){
//		echo "<script>var number = prompt('Set amount of product that arrived in warenhouse:');</script>";
//	}

	function getExistingAmountOfProduct($productID){
		$sql = "SELECT KolicinaProizvodaUSkladistu FROM proizvod WHERE ProizvodID=".$productID;
		$connection = connectToDatabase();
		$result = $connection->query($sql);
		$existingAmount=0;
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$existingAmount = $row ['KolicinaProizvodaUSkladistu'];
			}
		}
		
		$connection->close();
		
		return  $existingAmount;
	}
//
addProduct();
?>