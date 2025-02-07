
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function(){
		$('#tip_merne_jedinice').on('change', function(){
			var tipMerneJediniceID = $(this).val();
			if(tipMerneJediniceID){
				$.ajax({
					type: 'POST',
					url: 'ajaxData.php',
					data: 'tipmernejedinice=' + tipMerneJediniceID,
					success: function(html){
						$('#merna_jedinica').html(html);
					}
				});	
			} else {
				$('#merna_jedinica').html("<option value=''>Nije odabrano</option>");
			}	
		});
	});
</script>



<form action="insert_product.php" method="post" style="margin: 15px 5px 5px 45px;" id="product" enctype="multipart/form-data">


	<label style="margin: 3px;">Trade name:</label></br>
	<select style="width: 210px; margin: 3px;" name="product_trade_name" form="product" required>
	<?php include ("write_trade_name_options.php"); writeTradeNameOptions(); ?>
	</select></br>

	<label for="naziv" style="margin: 3px;">Product name:</label></br>
	<input type="text" style="margin: 3px;" name="product_name" required /></br>
	
	<label for="slika" style="margin: 3px;">Product image:</label></br>
	<input type="file" style="margin: 3px;" name="product_image" required /></br>
	
	<label for="cena" style="margin: 3px;">Product price in US dollars ($):</label></br>
	<input id="cena" type="text" style="margin: 3px;" name="product_price" required /></br>
	
	<label for="deklaracija" style="margin: 3px;">Declaration:</label></br>
	<input type="text" style="margin: 3px;" name="declaration" /></br>
	
	<label for="barcode" style="margin: 3px;">Bar code number:</label></br>
	<input id="barcode" type="text" style="margin: 3px;" name="barcode_number" required /></br>
	
	<label for="quantity" style="margin: 3px;">Quantity:</label></br>
	<input id="quantity" type="text" style="margin: 3px;" name="quantity" required /></br>
	
	


	

		
	
	
	<div>
		</br>
		<label>Measuring unit type:</label></br>
		<?php
			include_once "connect_to_database.php";
			
			$sql = "SELECT * FROM tip_merne_jedinice";
			$connection = connectToDatabase();
			$result = $connection->query($sql);
		?>
		<select id="tip_merne_jedinice">
			<option>Choose measuring unit type (tip merne jedinice):</option>
			<?php
				if($result->num_rows > 0) {
					while($row = $result->fetch_array()){
						echo "<option value = '".$row['TipMerneJediniceID']."'>".$row['TipMerneJediniceNaziv']."</option>";
					}
				}
			?>
		</select>
		</br>
		</br>
		<label>Measuring unit:</label></br>
		<select id="merna_jedinica" name="measureUnitId">
			<option value="">First choose measuring unit type (Prvo odaberite tip merne jedinice)</option>
		</select>
	</div>
		
	</br>	
	<label for="amount" style="margin: 3px;">Amount in package:</label></br>
	<input id="amount" type="text" style="margin: 3px;" name="amount" required /></br>
		
			
	<input type="submit" style="margin: 5px;" value="Insert product" form="product" name="insert_product_btn"/>
	</form>
			
			
			
		