<?php
require_once('db.php');

if (isset($_GET['id'])) {
    $id= $_GET['id'];
    $sql= "DELETE FROM form_info WHERE id = $id ";
    if (mysqli_query($conn,$sql)) {
        echo "Delete Succesful";
        header("location:index.php");
    }
    else{
        echo "Delete Unsucessful";
        header("location:index.php");
    }
    
}

?>