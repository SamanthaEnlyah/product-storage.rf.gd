<?php
include_once("connect_to_database.php");

function insert_image_to_database(){
	$connection = connectToDatabase();
	$dir = "../../images/";
	
	move_uploaded_file($_FILES["slika"]["tmp_name"],
      $dir . $_FILES["slika"]["name"]);  
	
	$imageFilename = $_FILES["slika"]["name"];
	
	//$imageFilePath = $dir.$imageFilename;
	
	$id = $_POST["productID"];
	$sql = "UPDATE proizvod SET SlikaFilename = '".$imageFilename."' WHERE ProizvodID =".$id;
	$connection->query($sql);
	
}

insert_image_to_database();
header("Location: ../show_products_with_images_layout.php");
?>