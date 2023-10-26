<?php 
    include 'config.php';

    $ID = $_GET['id'];
    mysqli_query($con, "DELETE FROM prodect WHERE id=$ID");
    header("location: prodects.php");
?>