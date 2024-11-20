<!-- delete.php -->
<?php
    // Delete a record from the database
    require_once("db.php");

    if(isset($_GET['id'])){ 
        $id = $_GET['id'];

        $sql = "DELETE FROM clients WHERE id = $id";
        $conn->query($sql);
    }

    header("Location:inventory.php");
    exit();
?>