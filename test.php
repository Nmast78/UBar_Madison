<?php
    date_default_timezone_set('America/Chicago');

    // Connect to database
    $host = "srv766.hstgr.io";
    $dbUsername = "u304514465_root4";
    $dbPassword = "Tickmarble236!";
    $dbName = "u304514465_discarded_time";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    $bar = "chasers_2";
    $time2 = "11:27:00";
    $time = 50;
    $date = date('h:i:s', time());

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO time (`bar`, `time`, `wait_time`) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $bar, $date, $time);
    $stmt->execute();

    // Close connection and quit
    $stmt->close();
    $conn->close();
    exit();
?>