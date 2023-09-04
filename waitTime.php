<?php

    // Connect to database
    $host = "srv766.hstgr.io";
    $dbUsername = "u304514465_root3";
    $dbPassword = "Tickmarble236!";
    $dbName = "u304514465_user_input";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Set variables to work with data
    $arrayBars = array("chasers_2","churchkey_bar_and_grill","city_bar","danny's_pub","lucky's_1313_brew_pub","sconnie_bar","state_street_brats","the_double_u",
                       "the_kollege_klub","wando's_bar_and_grill","whiskey_jack's_saloon");
    $wait_times = array();

    // For each bar average data and send to screen
    foreach($arrayBars as $element) {
        $total = 0;
        $counter = 0;

        // SQL Statement and query
        $sql = "SELECT * FROM `$element`";
        $result = mysqli_query($conn, $sql);

        // Parse data and get the average wait time, else total = 0
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $total += $row['wait_time'];
                $counter += 1;
            }
            $total = ceil($total / $counter);
            array_push($wait_times, $total);
        } else {
            $total = 0;
            array_push($wait_times, $total);
        }
    }
    echo json_encode($wait_times);

?>