<?php

    function getAvgTime($bar) {
        // Set current time zone and get current day of week and store it in $day
        date_default_timezone_set('America/Chicago');
        $date1 = date("Y-m-d"); 
        $timestamp = strtotime($date1);
        $day = date('l', $timestamp);

        //Test
        //$day = 'Friday';

        // Get the current time rounded to the nearest half-hour and store it in $rounded_time
        $seconds = time();
        $rounded_seconds = round($seconds / (30 * 60)) * (30 * 60);
        $rounded_time = date('h:i:s', $rounded_seconds);

        // Connect to database
        $host = "srv766.hstgr.io";
        $dbUsername = "u304514465_root2";
        $dbPassword = "Tickmarble236!";
        $dbName = "u304514465_estimated_time";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        // SQL statement to get average time from estimated_time database
        $sql = "SELECT wait_time FROM `$bar` WHERE `day`='$day' AND `time`='$rounded_time'";
        $result = mysqli_query($conn, $sql);
        $returnVal = 0;
    
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['wait_time'];
        }

        $conn->close();

        return $returnVal;

    }

    //$bar = 'chasers_2';
    //echo getAvgTime($bar);

?>  