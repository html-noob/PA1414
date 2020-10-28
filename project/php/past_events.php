<?php
    session_start();
    include_once '../includes/dbh.php';
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/radio.css">
        <!-- robot font from google's font website-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        
        <title>WebbScheduler</title>
    </head>
    
    <body>
        <?php
            include 'header.php';
        ?>
   
        <div class="content">
        <?php
            if (isset($_SESSION['userID']))
            {
                $control1 = True;
                $control2 = True;
                $control3 = True;
                $control4 = True;
                
                
                //you are logged in here
                $host_number = htmlspecialchars($_GET['id']);
                $sql = "SELECT email FROM users WHERE user_id = $host_number;";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $logged_in_email = $row['email'];
                
                $sql = "SELECT * FROM event_view WHERE host_id = '$host_number' AND event_time > current_timestamp();";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) != 0)
                {
                    $control1 = False;
                    echo "
                        <h1>Your upcoming events</h1>
                        <br>
                    ";
                    
                    
                    //the events that the user is hosting which are coming in the future:
                    echo "
                        <table class='my-table'>
                          <tr>
                            <th>event-host</th>
                            <th>preferred time</th>
                            <th>event location</th> 
                            <th>additional information</th>
                            <th>people invited</th>
                            <th>preferred time</th>
                          </tr>
                        ";
                        
                    
                    while ($row = mysqli_fetch_array($result))
                    {
                        //$creator_id = $row['creator_id'];
                        $host_email = $row['host_email'];
                        $date_time = $row['event_time'];
                        $event_location = $row['event_location'];
                        $event_additional_info = $row['event_additional_info'];
                        $person_invited = $row['invited_email'];
                        $preferred_time = $row['preferred_time'];
                    
                        echo "
                            <tr>
                                <td>{$host_email}</td>
                                <td>{$date_time}</td>
                                <td>{$event_location}</td>
                                <td>{$event_additional_info}</td>
                                <td>{$person_invited}</td>
                                <td>{$preferred_time}</td>
                            </tr>
                            ";
                    }
                    echo "
                        </table>
                        <br>";
                }    
                //the past events that the user is hosting
                
                $sql = "SELECT * FROM event_view WHERE host_id = '$host_number' AND event_time < current_timestamp();";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) != 0)
                {
                    $control2 = False;
                    echo "
                        <h1>Your past events</h1>
                        <br>
                    ";
                    
                    
                    echo "
                        <table class='my-table'>
                          <tr>
                            <th>event-host</th>
                            <th>preferred time</th>
                            <th>event location</th> 
                            <th>additional information</th>
                            <th>people invited</th>
                            <th>preferred time</th>
                          </tr>
                        ";
                        
                    while ($row = mysqli_fetch_array($result))
                    {
                        //$creator_id = $row['creator_id'];
                        $host_email = $row['host_email'];
                        $date_time = $row['event_time'];
                        $event_location = $row['event_location'];
                        $event_additional_info = $row['event_additional_info'];
                        $person_invited = $row['invited_email'];
                        $preferred_time = $row['preferred_time'];
                    
                        echo "
                            <tr>
                                <td>{$host_email}</td>
                                <td>{$date_time}</td>
                                <td>{$event_location}</td>
                                <td>{$event_additional_info}</td>
                                <td>{$person_invited}</td>
                                <td>{$preferred_time}</td>
                            </tr>
                            ";
                    }
                    echo "
                        </table>
                
                    <br>";
                }    
                //upcoming events that the logged in user has been invited to
                
                $sql = "SELECT * FROM event_view WHERE invited_email = '$logged_in_email' AND event_time > current_timestamp();";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) != 0)
                {
                    $control3 = False;
                
                    echo "
                        <h1>Upcoming events</h1>
                        <br>
                    ";
                    
                    
                    echo "
                        <table class='my-table'>
                          <tr>
                            <th>event-host</th>
                            <th>preferred time</th>
                            <th>event location</th> 
                            <th>additional information</th>
                            <th>people invited</th>
                            <th>preferred time</th>
                          </tr>
                        ";
                    
                    
                    while ($row = mysqli_fetch_array($result))
                    {
                        //$creator_id = $row['creator_id'];
                        $host_email = $row['host_email'];
                        $date_time = $row['event_time'];
                        $event_location = $row['event_location'];
                        $event_additional_info = $row['event_additional_info'];
                        $person_invited = $row['invited_email'];
                        $preferred_time = $row['preferred_time'];
                    
                        echo "
                            <tr>
                                <td>{$host_email}</td>
                                <td>{$date_time}</td>
                                <td>{$event_location}</td>
                                <td>{$event_additional_info}</td>
                                <td>{$person_invited}</td>
                                <td>{$preferred_time}</td>
                            </tr>
                            ";
                    }
                    echo "
                        </table>
                        <br>";
                }
                    
                //past events that the logged in user has been invited to
                
                $sql = "SELECT * FROM event_view WHERE invited_email = '$logged_in_email' AND event_time < current_timestamp();";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) != 0)
                {
                    $control4 = False;
                    
                    echo "
                        <h1>Past events</h1>
                        <br>
                    ";
                    
                    echo "
                        <table class='my-table'>
                          <tr>
                            <th>event-host</th>
                            <th>preferred time</th>
                            <th>event location</th> 
                            <th>additional information</th>
                            <th>people invited</th>
                            <th>preferred time</th>
                          </tr>
                        ";
                        
                    while ($row = mysqli_fetch_array($result))
                    {
                        //$creator_id = $row['creator_id'];
                        $host_email = $row['host_email'];
                        $date_time = $row['event_time'];
                        $event_location = $row['event_location'];
                        $event_additional_info = $row['event_additional_info'];
                        $person_invited = $row['invited_email'];
                        $preferred_time = $row['preferred_time'];
                    
                        echo "
                            <tr>
                                <td>{$host_email}</td>
                                <td>{$date_time}</td>
                                <td>{$event_location}</td>
                                <td>{$event_additional_info}</td>
                                <td>{$person_invited}</td>
                                <td>{$preferred_time}</td>
                            </tr>
                            ";
                    }
                    echo "
                        </table>
                        <br>
                
                    </div>";
                }
                    if ($control1 == True && $control2 == True && $control3 == True && $control4 == True)
                    {
                        echo "You have no events";
                    }
        
                
            } else
            {
                echo "please login to see your past events";
            }
            //$query_string  = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] );
            //$query_string_size = count($query_string);
            //str_replace("Other", "", $query_string[0]);
            //echo $query_string[0];
            //echo $query_string[1];
            //echo $query_string[0];
            //var_dump($query_string[0]);
            
            //for ($i = 0; $i < $query_string_size; $i++)
           // {
           //     echo "";
                //echo $query_string[$i];
           //     echo "<br>";
           // }
        ?>
        </div>
        
      
        
        <?php 
            include 'footer.php';
        ?>
        
    </body>
</html>