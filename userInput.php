<?php
    include 'dynamics/averageWaitTime.php';

    // Set default time zone and get current time and store in time2
    date_default_timezone_set('America/Chicago');
    $nowDate = date("Y-m-d h:i:sa");
    //echo '<br>' . $nowDate;
    $start = '19:00:00';
    $end   = '24:00:00';
    $time2 = date("H:i:s", strtotime($nowDate));

    // If current time is outside 7PM to 12AM discard input, else enter into if statement
    if (($time2 >= $start ) && ($time2 <= $end)) {
        // Get current time
        $date = date('h:i:s', time());

        // Get values from html script
        $bar = $_POST['bar'];
        $time = $_POST['time'];
        $accepted = $_POST['accepted'];

        //$bar = "Churchkey Bar and Grill";
        //$time = "20";
        //$accepted = "Rejected";
        
        // Convert bar name to data table bar name
        $index = 0;
        $arrayBars = array("Chaser's 2.0","Churchkey Bar and Grill","City Bar","Danny's Pub","Lucky's 1313 Brew Pub","Sconnie Bar",
                        "State Street Brats","The Double U", "The Kollege Klub","Wando's Bar and Grill","Whiskey Jack's Saloon");
        $arrayBarsData = array("chasers_2","churchkey_bar_and_grill","city_bar","danny's_pub","lucky's_1313_brew_pub","sconnie_bar",
        "state_street_brats","the_double_u", "the_kollege_klub","wando's_bar_and_grill","whiskey_jack's_saloon");
        foreach($arrayBars as $element) {
            if($element == $bar) {
                $bar = $arrayBarsData[$index];
                break;
            }
            $index += 1;
        }
 
        // Call function to get avg wait time
        $range = getAvgTime($bar);
        // Compare user input to avg wait time +- 30 minutes, if outside range add data to discarded items table then exit
        if( ($range + 30 < $time) or ($range - 30 > $time) ) {
            // Connect to database
            $host = "srv766.hstgr.io";
            $dbUsername = "u304514465_root4";
            $dbPassword = "Tickmarble236!";
            $dbName = "u304514465_discarded_time";
            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            // prepare and bind
            $stmt = $conn->prepare("INSERT INTO time (`bar`, `time`, `wait_time`) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $bar, $date, $time);
            $stmt->execute();

            // Close connection and quit
            $stmt->close();
            $conn->close();
            exit();
        }

        // If data inside range add to correct tables
        // Connect to database
        $host = "srv766.hstgr.io";
        $dbUsername = "u304514465_root3";
        $dbPassword = "Tickmarble236!";
        $dbName = "u304514465_user_input";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO `$bar` (day_time, wait_time) VALUES (?, ?)");
        $stmt->bind_param("si", $date, $time);
        $stmt->execute();

        // Close statement and connection
        $stmt->close();
        $conn->close();
        
        // Second SQL statement
        // Connect to database
        $host = "srv766.hstgr.io";
        $dbUsername = "u304514465_root";
        $dbPassword = "Tickmarble236!";
        $dbName = "u304514465_got_in";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        // prepare and bind
        $stmt = $conn->prepare("UPDATE accepted_rejected SET total = total + 1 WHERE bar_name = '$bar'");
        $stmt->execute();

        // If user got accepted, add 1 to accepted column
        if($accepted == "Accepted") {
            // prepare and bind
            $stmt = $conn->prepare("UPDATE accepted_rejected SET accepted = accepted + 1 WHERE bar_name = '$bar'");
            $stmt->execute();
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        exit();
    }

?>