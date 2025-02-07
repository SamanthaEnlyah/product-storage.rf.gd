<?php

	include "connect_to_database.php";
	
	function createTables(){
		$conn = connectToDatabase();
		
		$sqlCreateTipMerneJedinice = "CREATE TABLE tip_merne_jedinice
		(TipMerneJediniceID INT(255) PRIMARY KEY AUTO_INCREMENT,
		TipMerneJediniceNaziv varchar(500))";
		
		$sqlCreateMernaJedinica = "CREATE TABLE merna_jedinica 
		(MernaJedinicaID INT(255) PRIMARY KEY AUTO_INCREMENT, 
		NazivMerneJedinice varchar(300), 
		Oznaka varchar(10), 
		FK_TipMerneJediniceID INT(255))";
		
		$sqlCreateProizvod = "CREATE TABLE proizvod 
		(ProizvodID INT(255) PRIMARY KEY AUTO_INCREMENT, 
		Naziv varchar(1000), 
		SlikaFilename varchar(1000),
		Cena INT(255), 
		Deklaracija varchar(1000), 
		BrojBarKoda varchar(13),  
		KolicinaProizvodaUSkladistu DECIMAL(4), 
		KolicinaUPakovanju DECIMAL(65,0),
		FK_MernaJedinicaID INT(255),
		FK_TradeNameID INT(255))";		
	
		$sqlCreateTradeName = "CREATE TABLE trade_name (TradeNameID INT(255) PRIMARY KEY AUTO_INCREMENT, Name varchar(300))";
	
		$conn->query($sqlCreateTipMerneJedinice);
		$conn->query($sqlCreateMernaJedinica);
	    $conn->query($sqlCreateProizvod);
	    $conn->query($sqlCreateTradeName);
	}
	
createTables();

?>