<?php 
    session_start();
    include_once '../includes/dbh.php';
    $sql = "SELECT * FROM event WHERE event_id = 12;";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result))
    {
        echo $row['event_id'];
        echo " || ";
        echo $row['creator_id'];
        echo " || ";
        echo $row['event_time'];
        echo " || ";
        echo $row['event_location'];
        echo " || ";
        echo $row['event_additional_info'];
        
    }     