<?php
				
	include_once("connect_to_database.php");
	//echo "huh?";
	
	function submit(){
		if(!empty($_POST['new_mu'])) {
			insert_mu();
		}
		if(!empty($_POST['new_type'])){
			insert_type(); 
			//create_type_combo();
			header('Location: insert_measure_unit_layout.php');
		}
	}
	
	function insert_mu(){
		$conn = connectToDatabase();
		
		$measure_unit_name = $_POST['measure_unit_name']; 
		$measure_unit_label = $_POST['oznaka'];
		$measure_type_id = $_POST['typeid'];
		
		echo "<script>alert('typeid: ' + '".$measure_type_id."');</script>";
		
		$sql = "INSERT INTO merna_jedinica (NazivMerneJedinice, Oznaka, FK_TipMerneJediniceID)
		VALUES('".$measure_unit_name."', '".$measure_unit_label."', ".$measure_type_id.")";
		
		$conn->query($sql);
	}
	
	function insert_type(){
		$conn = connectToDatabase();
		$mernaJedinicaNaziv = $_POST['measure_unit_type_english']." (".$_POST['measure_unit_type_serbian'].")";
		$sql = "INSERT INTO tip_merne_jedinice (TipMerneJediniceNaziv)
				VALUES('".$mernaJedinicaNaziv."')";
		$conn->query($sql);
	}
	
	function create_type_combo(){
		$conn = connectToDatabase();
		$sql = "SELECT * FROM tip_merne_jedinice";
		$result = $conn->query($sql);
		if($result -> num_rows > 0){
			while($row = $result->fetch_array()){
				echo "<option value='".$row['TipMerneJediniceID']."'>".$row['TipMerneJediniceNaziv']."</option>";
			}
			
		}
		
	}
	
	submit();
	header('Location: insert_measure_unit_layout.php');
?>
			