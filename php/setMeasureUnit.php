<?php
	
	//include ("insert_product.php");

/* 
	function setMeasureUnit(){
			product_measure_unitID($_GET['measure_unit']);
	}
	 */
	
	$measure_unit;
	
	function setMeasureUnit(){
		$measure_unit = $_GET['measure_unit'];
	}
	
	function getMeasureUnit(){
		return $measure_unit;
	}

	//setMeasureUnit();
?>