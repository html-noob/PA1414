<?php
    session_start();
    include_once '../includes/dbh.php';

    $query_string  = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] );
    $query_string_size = count($query_string);
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/radio.css">
        <!-- robot font from google's font website-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <script type="text/javascript" src="../javascript/one_box.js"></script>
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

                    echo "
                    <table class='my-table'>
                      <tr>
                        <th>event-host</th>
                        <th>date and host's preferred time</th>
                        <th>event location</th>
                        <th>additional information</th>
                        <th>people invited</th>
                      </tr>
                    ";

                $sql = "SELECT * FROM event_view WHERE event_id = '$event_number';";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result))
                {
                    //$creator_id = $row['creator_id'];
                    $host_email = $row['host_email'];

                    $date_time = $row['event_time'];
                    $time_without_seconds = substr($date_time, 0, -3);

                    $event_location = $row['event_location'];
                    $event_additional_info = $row['event_additional_info'];
                    $person_invited = $row['invited_email'];

                    echo "
                        <tr>
                            <td>{$host_email}</td>
                            <td>{$time_without_seconds}</td>
                            <td>{$event_location}</td>
                            <td>{$event_additional_info}</td>
                            <td>{$person_invited}</td>
                        </tr>
                        ";
                }
                echo "
                    </table>
                    <br>
                ";
                
                if (!(isset($_SESSION['userID']))) // om man inte är inloggad, fråga efter användarens epost
                        {
                            echo "
                                <form action='../includes/vote_event.php' method='POST'>
                                <label><b>Email</b></label> 
                                <input type='text' placeholder='Enter email' name='email' required>
                            ";
                        }
                        
                    echo"<h1>Vote on your preferred time for the event</h1>";

                $only_hours = substr($date_time, 11, -3);
                echo"<form action='../includes/vote_event.php' method='POST'>";
                
                    $event_number = htmlspecialchars($_GET['id']);
                    echo "<input type='hidden' id='event-id' name='event-id' value='{$event_number}'>";
                echo "
                    <label class='container'>{$only_hours}
                        <input type='checkbox' checked='checked' name='check' onclick='onlyOne(this)' value='{$date_time}'>
                        <span class='checkmark'</span>
                    </label>
                ";
                    for ($i = 0; $i < $query_string_size - 1; $i++)
                    {
                        $only_hours = substr($query_string[$i + 1], (strpos($query_string[$i + 1], '='))+1);
                        $date_not_hours = substr($date_time, 0, 10);
                        $optional_date = $date_not_hours." ".$only_hours;
                        
                        echo "
                            <label class='container'>{$only_hours}
                                <input type='checkbox' name='check' onclick='onlyOne(this)' value='{$optional_date}'>
                                <span class='checkmark'></span>
                            </label>
                        ";

                    }
                echo"<h1>If you can't attend to any of these times, please send in your own suggestion in the format: <b>yyyy-mm-dd hh:mm</b></h1>";
                
                echo "<input type='datetime' placeholder='Desired datetime of event' name='date-time'>";
                echo"<button type='submit' name='submit'>Answer invitation</button>";
                    echo"</form>";

                echo "<br>";
        ?>
        </div>



        <?php
            include 'footer.php';
        ?>

    </body>
</html>