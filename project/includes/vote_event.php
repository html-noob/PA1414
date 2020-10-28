<?php   
    session_start();
    include_once 'dbh.php';
?>
<?php 
    if (isset($_POST['submit']) && (isset($_SESSION['userID']))) // om användaren är inlogad
    {
        $userID = $_SESSION['userID'];
        $event_number = $_POST['event-id'];
        
        if (isset($_POST['check']))
        {
            $preferred_time = $_POST['check'];
        }
        //elseif(isset($_POST['date-time']))
        elseif(!(empty($_POST['date-time'])))
        {
            $preferred_time = $_POST['date-time'];
        }
        
        else 
        {
            echo "<br>";
            echo "<h1 style='color: red;'>Please either tick a checkbox OR provide your own suggestion for the meeting</h1>";
            $where = $_SERVER['HTTP_REFERER'];
            //echo $where;
            
            header( "refresh:3;url={$where}" );
            
            //header('Location: ' . );
        }
        
        //if they are logged in and want to vote, we can get the email by using the userID
        
        $sql ="SELECT email FROM users WHERE user_id = $userID;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $invited_email = $row['email'];
        
        $sql = "UPDATE event_user SET preferred_time = '$preferred_time' WHERE event_id = $event_number AND email = '$invited_email';";
        
        mysqli_query($conn, $sql);
        header("Location: ../php/past_events.php?id={$userID}");
        
       
    }
    
    if (isset($_POST['submit']) && !(isset($_SESSION['userID']))) // om användaren inte är inlogad
    {
        $invited_email = $_POST['email'];
        
        $event_number = $_POST['event-id'];
        
        if (isset($_POST['check']))
        {
            $preferred_time = $_POST['check'];
        }
        //elseif(isset($_POST['date-time']))
        if(!(empty($_POST['date-time'])))
        {
            $preferred_time = $_POST['date-time'];
        }
        
        /*if (isset($_POST['check'] && !(empty($_POST['date-time']))
        {
            $preferred_time = $_POST['date-time'];
        }*/
        
        else 
        {
            echo "<br>";
            echo "<h1 style='color: red;'>Please either tick a checkbox OR provide your own suggestion for the meeting</h1>";
            $where = $_SERVER['HTTP_REFERER'];
            //echo $where;
            
            header( "refresh:3;url={$where}" );
            
            //header('Location: ' . );
        }
       
        $sql = "UPDATE event_user SET preferred_time = '$preferred_time' WHERE event_id = $event_number AND email = '$invited_email';";
        mysqli_query($conn, $sql);
        echo "<br>";
        echo $sql;
        echo "<br>";
        echo "Now I shall redirect you to an appropriate view. That view should show what events you are invited to (upcoming)
        <br>
        what events you are hosting (upcoming)
        <br>
        past events, both invited and hosted";
    }