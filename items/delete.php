<?php

    require_once "../config/connection.php";
    require_once "../helper/alert.php";
    require_once "../helper/authentication.php";

    if(is_numeric($_GET['id'])){
        $id= mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM items WHERE id=$id";
        $query = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($query);

        if($total == 1){
            $sql = "DELETE FROM items WHERE id=$id";
            $query = mysqli_query($conn, $sql);

            if($query){
                alert("Data Is Sucssesfully Deleted!", "./index.php");
            }
            else{
                $error = mysqli_error($conn);
                alert("Something Error! $error", "./index.php");
            }
        }
        else{
            alert("Data Not Found!", "./index.php");
        }

    }
    else{
        header("location: .index.php");
    }

?>