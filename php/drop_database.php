<?php
include_once("connect_to_server.php");

    function dropDatabase(){
        echo "HI";
        $sql = "DROP DATABASE magacin";
        $conn = connectToServer();
        $conn -> query( $sql );
   
        echo "valjda obrisano";
            
    }

    dropDatabase();
?>