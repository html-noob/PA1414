<?php
    session_start();
    //om man har klickat på knappen från min registrerings sida:
    if (isset($_POST['submit']))
    {   
        include_once 'dbh.php';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['psw'];
        $rPassword = $_POST['rpsw'];
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        var_dump($hashedPassword);

        if (empty($name) || empty($email) || empty($password) || empty($rPassword))
        {
            header("Location: ../php/registerview.php?signup=field_empty");
            exit();	 
        } else
            {
                if (!($password === $rPassword))
                {
                    header("Location: ../php/registerview.php?signup=passwords_dont_match");
                    exit();
                }
            }
            
        $sql= "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) 
        {
            header("Location: ../php/registerview.php?signup=email_in_use");
            exit();
        }
        
        $sql = "
                INSERT INTO users
                (first_name, email, password)
                VALUES
                ('$name', '$email', '$hashedPassword')
               ;"
                ;
        mysqli_query($conn, $sql);
        //$_SESSION['userID'] = $row['user_id'];
        header("Location: ../php/index.php");
    } else
    {
        header("Location: ../php/registerview.php");
		exit();
    }