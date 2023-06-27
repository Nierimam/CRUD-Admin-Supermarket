<?php

    require_once "../../config/connection.php";
    require_once "../../helper/alert.php";

    if(isset($_POST['submit'])){
        $categoryName = mysqli_real_escape_string($conn, $_POST['category_name']);
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        if(!empty($categoryName)){
            $sql = "UPDATE categories SET name='$categoryName' WHERE id=$id";
            $query = mysqli_query($conn, $sql);

            if($query){
                alert("Data Is Sucssesfully Updated", "../index.php");
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