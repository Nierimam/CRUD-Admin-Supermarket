<?php

    //mysql_connect() => DEPRECATED/ UNSUPORTED
    //mysqli_connect() => IMPROVED (PROSEDURAL & OOP)
    //PDO (PHP DATA OBJECT)

    //mysql_connect("localhost", "root", "");

    @$conn = mysqli_connect("localhost", "root", "", "4b_inventory");

    if(!$conn){
        echo "Something Error :" ." ". mysqli_connect_error() ;
    }

?>