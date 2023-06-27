<?php

    require_once "config/connection.php";

    if(isset($_POST['submit'])){
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(!empty($fullname) && !empty($username) && !empty($password)){
            $encrypted_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            $sql = "INSERT INTO users VALUES (NULL, '$username' ,'$encrypted_password', '$fullname' , now())";
            //BCRYPT = ALGORITMA
            $query = mysqli_query($conn, $sql);
            

            if($query){
               echo "<script>
                alert('Your Account is Succesfully registired!');
                location.href = 'register.php'
            </script>";
            }

            else{
                $error = mysqli_error($conn);
                echo "<script>
                alert(\"Something Error $error\");
                location.href = 'register.php'
            </script>";
            }
        }

        else{
            echo "<script>
                alert('Please fill all forms!');
                location.href = 'register.php'
            </script>";
        }

    }

    else{
        header('location: register.php');
    }

?>