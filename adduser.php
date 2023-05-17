<?php
    include("connection.php");

    $email = $_REQUEST["email"];
    $password = md5($_REQUEST["password"]);
    $name = $_REQUEST["name"];
    $country = $_REQUEST["country"];
    $inlineRadioOptions = $_REQUEST["inlineRadioOptions"];

    if ($inlineRadioOptions == "option1"){
        $utypeId = 1;
    }else if ($inlineRadioOptions == "option2"){
        $utypeId = 2;
    }else{
        $utypeId = 3;
    }

    $sql = "INSERT INTO Users (email, password, name, country, utypeId)
    VALUES ('$email','$password','$name','$country','$utypeId')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully');window.location='signin.html'</script>" ;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

?>