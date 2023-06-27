<?php

    //alert("pesan", "../location.php")

    function alert($message, $path){
        echo "<script>
            alert(\"$message\");
            location.href = '$path';
        </script>";
    }

?>