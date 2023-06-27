<?php

    require_once "../../config/connection.php";
    require_once "../../helper/alert.php";

    if(isset($_POST['submit'])){
        $itemName = mysqli_real_escape_string($conn, $_POST['item_name']);
        $idCategory = mysqli_real_escape_string($conn, $_POST['id_category']);
        $price =    mysqli_real_escape_string($conn, $_POST['price']);
        $stock = mysqli_real_escape_string($conn, $_POST['stock']);
        $dateExpired = mysqli_real_escape_string($conn, $_POST['date_expired']);


        if(!empty($itemName) && is_numeric($idCategory) && is_numeric($price) && is_numeric($stock) 
        && !empty($dateExpired)){
            $sql = "INSERT INTO items VALUES (NULL, '$itemName', $idCategory, $price, $stock, 
            '$dateExpired', now(), NULL)";
            $query = mysqli_query($conn, $sql);

            if($query){
                alert("Data Is Sucssesfully Inserted", "../index.php");
            }
            else{
                $error = mysqli_error($conn);
                alert("Something Error! $error", "../index.php");
            }
        }
        else{
            alert("Please Fill All form", "../index.php");
        }
    }
    else{
        header('location: ../index.php');
    }

?>