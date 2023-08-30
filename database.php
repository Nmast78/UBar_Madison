<?php
    $bar = $_POST['bars'];
    $wait_time = $_POST['wait'];
    $accepted = $_POST['get-in'];

    if(!empty($bar) || !empty($wait_time) || !empty($accepted)) {
        $host = '127.0.0.1';
        $username = 'root';
        $password = 'sehdud387!';
        $dbName = 'ubar_user_input_times';

        $conn = new mysqli($host, $username, $password, $dbName);

        if(mysqli_connect_error()) {
            die('Connection error');
        } else {
            $insert = "INSERT INTO chasers_2 (wait_time, accepted) VALUES (?, ?)";

            $stmt = $conn->prepare($insert);
            $stmt->bind_param("ss", $wait_time, $accepted);
            $stmt->execute();
            echo "Success";
        }

        $stmt->close();
        $conn->close();

    } else {
        echo "All fields are required";
        die();
    }
?>