<?php
        session_start();

        include("connection.php");
    
        $email = $_REQUEST["email"];
        $password = md5($_REQUEST["password"]);
    
        $sql = "SELECT * FROM Users WHERE email='$email' and password='$password'";
    
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            $_SESSION["email"] = $row["email"];

            echo "<script>window.location='courses.php';</script>";
        }
        else{
            echo "Username and Password is not valid.";
        }
?>