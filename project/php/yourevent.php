<?php
    session_start();
    include_once '../includes/dbh.php';
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/add_people.css">
        <!-- robot font from google's font website-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <title>WebbScheduler</title>
    </head>
    
    <body>
        <?php
            include 'header.php';
        ?>
   
        <div class="content">
            <h1>The event</h1>
            <br>
            <?php
                $event_number = htmlspecialchars($_GET["id"]);
                /*
                $sql = "SELECT * FROM event_view WHERE event_id = '$event_number';";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result))
                {
                    //$creator_id = $row['creator_id'];
                    $host_email = $row['host_email'];
                    $date_time = $row['event_time'];
                    $event_location = $row['event_location'];
                    $event_additional_info = $row['event_additional_info'];
                    $person_invited = $row['invited_email'];
                }
                */
                //$sql = "SELECT email FROM users WHERE user_id = $creator_id";
                //$result = mysqli_query($conn, $sql);
                //$row = mysqli_fetch_assoc($result);
                //$host_email = $row['email'];
                
               
            
                echo "
                    <table class='my-table'>
                      <tr>
                        <th>event-host</th>
                        <th>date and preferred time</th>
                        <th>event location</th> 
                        <th>additional information</th>
                        <th>people invited</th>
                      </tr>
                    ";
                    
                $sql = "SELECT * FROM event WHERE event_id = '$event_number';";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                
                $creator_id = $row['creator_id']; 
                $date_time = $row['event_time'];
                $time_without_seconds = substr($date_time, 0, -3);
                $event_location = $row['event_location'];
                $event_additional_info = $row['event_additional_info'];
                
                $sql = "SELECT email FROM users WHERE user_id = $creator_id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                
                $host_email = $row['email'];
               
                
                    echo "
                        <tr>
                            <td>{$host_email}</td>
                            <td>{$time_without_seconds}</td>
                            <td>{$event_location}</td>
                            <td>{$event_additional_info}</td>
                            <td>nobody yet</td>
                        </tr>
                        ";

                echo "
                    </table>
                    <br>
                ";
            ?>
            </div>
            
            <?php 
                include 'add_people.php'
            ?>

        
        
            
        <?php
            include 'footer.php';
        ?>
        
    </body>
</html>