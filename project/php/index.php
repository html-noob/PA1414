<?php
    session_start();
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/loggedinview.css">
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
                //you are logged in here
                include 'loggedinview.php';
            }
            else
            {
                //you are not logged in, show the loginview 
                include 'loginview.php';
            }
        ?>
        </div>
        
      
        
        <?php 
            include 'footer.php';
        ?>
        
    </body>
</html>