<?php

    // Connect to database
    $host = "srv766.hstgr.io";
    $dbUsername = "u304514465_root";
    $dbPassword = "Tickmarble236!";
    $dbName = "u304514465_got_in";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Set variables to work with
    $acceptRate = array();

    $sql = "CALL `calcPercent`()";
    $result = mysqli_query($conn, $sql);

    // Parse data and get the average wait time, else total = 0
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $percent = $row['percentage'];
            array_push($acceptRate, $percent);
        }
    } else {
        $total = 100;
        array_push($wait_times, $total);
    }

    echo json_encode($acceptRate);

?>