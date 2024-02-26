<?php
    if (isset($_GET["inquiry_id"])){

    $id = $_GET["inquiry_id"];

    $servername = "localhost";
    $username  = "root";
    $password = "";
    $database = "cis202";
    
    // Connect to the Database
    $connection = new mysqli($servername, $username, $password, $database);
    

    $sql = "DELETE FROM inquiry WHERE inquiry_id=$id";
    $connection->query($sql);
    }

    header("location: /cis202/admin.php");
    exit;
?>
