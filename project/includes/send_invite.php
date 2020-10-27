<?php   
    session_start();
    if ( isset($_POST['submit']) ) 
    {
        include_once 'dbh.php';
        
        $event_number = htmlspecialchars($_GET["id"]);

        $email_string = $_POST['email'];
        $time_string = $_POST['time'];
        
        $emails_arr = explode("\n", $email_string);
        $times_arr = explode("\n", $time_string);
        
        $times_size = count($times_arr);
        
        $amount_invited = count($emails_arr);
        //echo $amount_invited;
        
        //print all the value which are in the array
        foreach($emails_arr as $email) {
            $email = preg_replace('/[\x00-\x1F\x7F]/', '', $email);
            $sql = "
            INSERT INTO 
            event_user (event_id, email) 
            VALUES ($event_number, '$email');
            ";
        
        mysqli_query($conn, $sql);
        
        }
/*
emil@live.se
lupus@lek.se
victor@ignore.se
*/
        
        $counter = 1;
        $url_times ="&";
        echo $times_size;
        echo "<br>";
        foreach($times_arr as $time) {
            if ($counter == $times_size)
                $url_times = $url_times . "time" . $counter . "=" . $time;
            else
                $url_times = $url_times . "time" . $counter . "=" . $time . "&";
            //echo $url_times;
            
            $counter++;
        }
        echo $counter;
        echo "<br>";
        $new_url_times = preg_replace('/\s+/', '', $url_times);
        //echo $url_times;
        //echo "<br>";
        echo $new_url_times;
        header("Location: ../php/voteevent.php?id=$event_number"."$new_url_times");
        
    }