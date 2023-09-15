<?php

    // Connect to database
    $host = "srv766.hstgr.io";
    $dbUsername = "u304514465_root3";
    $dbPassword = "Tickmarble236!";
    $dbName = "u304514465_user_input";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Set variables to work with data
    $arrayBars = array("chasers_2","churchkey_bar_and_grill","city_bar","danny's_pub","lucky's_1313_brew_pub","sconnie_bar",
                       "state_street_brats","the_double_u", "the_kollege_klub","wando's_bar_and_grill","whiskey_jack's_saloon");

    foreach($arrayBars as $element) {
        // SQL Statement and query
        $sql = "DELETE FROM `$element`";
        $result = mysqli_query($conn, $sql);
    }

    $conn->close();

    // Connect to database
    $host = "srv766.hstgr.io";
    $dbUsername = "u304514465_root";
    $dbPassword = "Tickmarble236!";
    $dbName = "u304514465_got_in";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    $sql = "UPDATE accepted_rejected set accepted=0";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE accepted_rejected set total=0";
    $result = mysqli_query($conn, $sql);

    $conn->close();
?>