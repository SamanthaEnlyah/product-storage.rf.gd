<!--<html>

<head>
</head>

<body>
-->

<script src="js/jquery-3.6.1.js"></script>



<!--<form  action="insert_measure_unit_type.php" method="post" style="margin: 40px;">-->

    <p style="margin: 40px;">
        <label for="naziv" style="margin: 3px;">Select measure unit type:</label></br>
        <select id="types_id" name="types">
            <?php
                include_once("connect_to_database.php");
                $conn = connectToDatabase();
                $sql = "SELECT * FROM tip_merne_jedinice";
                $result = $conn->query($sql);
                if($result -> num_rows > 0){
                    while($row = $result->fetch_array()){
                        echo "<option value='".$row['TipMerneJediniceID']."'>".$row['TipMerneJediniceNaziv']."</option>";
                    }
                    
                }
            ?>
        </select>
	</p>

	<p style="margin-left: 40px;">or</p>
	
    <button style="margin-left: 40px;" id = "create_new_MUT" >Create new measuring  unit type (Volume, Mass,...)</button> <!--onclick disable select-->
	
    <p style="margin-left: 40px;">
	
	<label for="measure_unit_name" style="margin: 3px;">Measure unit name:</label></br>
	<input type="text" id="measure_unit_name" style="margin: 3px;" name="measure_unit_name"/></br>
	
	<label for="oznaka" style="margin: 3px;">Label:</label></br>
	<input id="oznaka" type="text" style="margin: 3px;" name="oznaka"/></br>
	
	<input type="submit" id='new_mu' name="new_mu" style="margin: 5px;" value="Insert measure unit"/>
    </p>
<!--</form>-->


 <form  action="insert_measure_unit_type.php" method="post" >
	<div id="add_type_div" style="display: none; padding: 20px; background-color: lightgray; border: 2pt solid gray; width:280px;" >
				<p style="color: black;">Add new type:</p>
				<label>Srpski: </label>
				<p><input id="unit_type_ser" type="text" style="margin: 3px;" name="measure_unit_type_serbian"/></p>
				<label>English: </label>
				<p><input id="unit_type_eng" type="text" style="margin: 3px;" name="measure_unit_type_english"/></p>

				<input type="submit" id="add_type" name="new_type" value="Add type" />			
				<!--<label id="mut" hidden name="mut"></label>-->
		</div>
</form>


<p style="margin-left: 40px;"> Measure units for selected measure type that are  already in database:</p>
<ul id="measure_units_for_type">
    
</ul>



	<script>
		$("#create_new_MUT").click(function(evt){
			evt.preventDefault();
			
			
			$("#add_type_div").toggle();
			
			var top = $("#create_new_MUT").offset().top;
			var left = $("#create_new_MUT").offset().left;

			$("#add_type_div").css('position', 'fixed');
			$("#add_type_div").css('top', top); 
			$("#add_type_div").css('left', left+300); 
			
			if($("#types_id").attr('disabled') == 'disabled') {
				$("#types_id").removeAttr('disabled');
			}else {
				$("#types_id").attr('disabled', 'disabled');
			}
			
			
		});


        $("#types_id").click(function(evt){
            var typeid = $(this).val();
            $.ajax({
                type: "post",
                url: "show_measure_units.php",
                data: "typeid="+typeid,
                success: function(response){
                    $("#measure_units_for_type").html(response);
                }

            });
            
        });

        $("#new_mu").click(function(evt){


            var typeid = $("#types_id").val();
       
            var formdata = new FormData();
            formdata.append("typeid", typeid);
            formdata.append("measure_unit_name", $("#measure_unit_name").val());
            formdata.append("oznaka", $("#oznaka").val());
            formdata.append("new_mu", true);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //measure_unit_name oznaka empty fields
                    $("#measure_unit_name").val("");
                    $("#oznaka").val("");
                }
            };
            xmlhttp.open("POST", "insert_measure_unit_type.php", true);
            xmlhttp.send(formdata);

        });

		$("#add_type").click(function(evt){
			//evt.preventDefault();
			//alert(select.id);
			
			
            $("#types_id").remove();
            var select = document.createElement("select");
            select.id = "types_id";

			$.ajax({
					type: 'POST',
					url: 'show_types_with_ajax.php',
                    
					success: function(html){
						$('#types_id').html(html);
					}
				});	
			
			/*  var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
				document.getElementById("types_id").html(this.responseText);
			  }
			};
			xmlhttp.open("GET", "add_type_with_ajax.php", true);
			xmlhttp.send(); */
			
			//$("#mut").val($("#unit_type").val());
		
		});
	</script>
	
	<!--
</body>

</html>-->