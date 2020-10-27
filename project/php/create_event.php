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
            <h1>Create event</h1>
            <form action="../includes/createevent.php" method="POST">
                <div class="container"> 
                    <?php
                    
                        if (!(isset($_SESSION['userID']))) // om man inte är inloggad, fråga efter användarens epost
                        {
                            echo "
                                <label><b>Email</b></label> 
                                <input type='text' placeholder='Enter email' name='email' required>
                            ";
                        } 
                        
                    ?>
                    <label><b>Date (yyyy-mm-dd)</b></label> 
                    <input type="date" placeholder="Date of event" name="date"  autofocus="autofocus" required>

                    <label><b>Time (hh:mm)</b></label> 
                    <input type="text" placeholder="potential time of event" name="time">
                    
                    <label><b>Location</b></label> 
                    <input type="text" placeholder="potential location or adress" name="location">                
          
                    <label><b>Additional information</b></label> 
                    <input type="text" placeholder="potential practial information, for example a zoom code" name="info"> 
          
                    <button type="submit" name="submit">Create event</button>
                </div> 
          
                 <!--<div class="container" style="background-color:#f1f1f1">  
                    don't have an account? <a href="registerview.php"> register here!</a>
                    <br>
                    Forgot <a href="#">password?</a>
                </div>-->
            </form>
        </div>
        
        <?php 
            include 'footer.php';
        ?>
    </body>
</html>