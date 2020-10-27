<?php   
    session_start();
    if (isset($_POST['submit']) && (isset($_SESSION['userID']))) // om användaren är inloggad så har jag user id, om ej, fixa det
    {
        include_once 'dbh.php';
        
        $user = $_SESSION['userID'];
        
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $info = $_POST['info'];
        
        $datetime = $date . ' ' . $time;
        
        
        
       $sql = "INSERT INTO event
              (creator_id, event_time, event_location, event_additional_info)
              VALUES
              ('$user', '$datetime', '$location', '$info');
              ";
       mysqli_query($conn, $sql);
       
       $sql = "SELECT event_id FROM event WHERE creator_id = '$user' ORDER BY event_id DESC LIMIT 1;";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $eventID = $row['event_id'];
       
          
       header("Location: ../php/yourevent.php?id=$eventID");
       
       
    }
    
    if (isset($_POST['submit']) && !(isset($_SESSION['userID']))) // om användaren inte är inlogad
    {
        include_once 'dbh.php';
        
        // get userID from email
        $email = $_POST['email'];
        //create a user in the database with the email
        $sql = "INSERT INTO users
            (email)
            VALUES 
            ('$email');
            ";
        mysqli_query($conn, $sql);
        
        $sql = "SELECT user_id from users WHERE email = '$email';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        $user = $row['user_id'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $info = $_POST['info'];
        
        $datetime = $date . ' ' . $time;
        
       $sql = "INSERT INTO event
              (creator_id, event_time, event_location, event_additional_info)
              VALUES
              ('$user', '$datetime', '$location', '$info');
              ";
       mysqli_query($conn, $sql);
       
       $sql = "SELECT event_id FROM event WHERE creator_id = '$user' ORDER BY event_id DESC LIMIT 1;";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $eventID = $row['event_id'];
       

       header("Location: ../php/yourevent.php?id=$eventID");
    }