<?php

    include_once("connect_to_database.php");

    $typeid = $_POST['typeid'];

    $sql = "SELECT * FROM merna_jedinica WHERE FK_TipMerneJediniceID = ".$typeid;

    $conn = connectToDatabase();
    $result = $conn -> query($sql);
    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<li>".$row['NazivMerneJedinice'].", ".$row['Oznaka']."</li>";
        }
    }

?>