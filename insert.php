<?php

    if(isset($_POST['bars']) && isset($_POST['slider']) && isset($_POST['get-in'])) {
        // Get values from input form
        $bar = $_POST['bars'];
        $waitTime = $_POST['slider'];
        $gotIn = $_POST['get-in'];
        $currentTime = date('hh:ii:ss');

        // Connect to database
        $host = "srv766.hstgr.io";
        $dbUsername = "u304514465_root3";
        $dbPassword = "Tickmarble236!";
        $dbName = "u304514465_user_input";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        // If connection fails die, else execute statement
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        } else {
            $sql = "INSERT INTO '$dbName' VALUES ('$currentTime', '$waitTime')";
            if(mysqli_query($conn, $sql)) {
                echo "Success";
            } else {
                echo mysqli_error($conn);
            }
        }

        mysqli_close($conn);
        header("Location:templates/home.html");

    } else {
        echo "All fields required";
        die();
    }

?>