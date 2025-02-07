<?php

	
	include_once "connect_to_database.php";
	
	
	function addProduct(){
		//$amount = setAmountDialog();
		if(isset($_POST['amount']) && isset($_POST['productID'])){
			$newAmount = $_POST['amount'];
			$productID = $_POST['productID'];
			
			echo "<script>alert('PRODUCTID'+$productID)</script>";
			$existingAmount = getExistingAmountOfProduct($productID);
			$sumAmount = $newAmount + $existingAmount;
			
			
			$sql = "UPDATE proizvod SET KoličinaProizvodaUSkladistu = ".$sumAmount." WHERE ProizvodID = ".$productID;	
			
			echo "<script>alert('add more product(): '.{$existingAmount});</script>";
			
			$connection = connectToDatabase();
			$connection->query($sql);
			$connection->close();
			header('Location: show_products_layout.php');
		}
	}	
	
//	function setAmountDialog(){
//		echo "<script>var number = prompt('Set amount of product that arrived in warenhouse:');</script>";
//	}

	function getExistingAmountOfProduct($productID){
		$sql = "SELECT KoličinaProizvodaUSkladistu FROM proizvod WHERE ProizvodID=".$productID;
		$connection = connectToDatabase();
		$result = $connection->query($sql);
		$existingAmount=0;
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$existingAmount = $row ['KoličinaProizvodaUSkladistu'];
			}
		}
		
		$connection->close();
		
		return  $existingAmount;
	}
//
addProduct();
?>