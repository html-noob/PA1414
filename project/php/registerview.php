<?php 
    session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/style.css"> 
        <!-- robot font from google's font website-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <title>RegisterPage</title>
    </head>
    
    <body>
        <?php
            require 'header.php'
        ?>
       <div class="imgcontainer"> 
            <img src="../img/motherbear.jpg"
                 alt="avatar" class="avatar"> 
        </div>
        
        <h1>Register</h1>
        <form action="../includes/register.php" method="post">
            <div class="container"> 
                <label><b>First name</b></label> 
                <input type="text" placeholder="Enter First Name" name="name" required>

                <label><b>email</b></label> 
                <input type="text" placeholder="Enter email" name="email" required>                
      
                <label><b>Password</b></label> 
                <input type="password" placeholder="Enter Password" name="psw" required> 
                
                <label><b>Repeat Password</b></label> 
                <input type="password" placeholder="Repeat Password" name="rpsw" required> 
      
                <button type="submit" name="submit">Register</button> 
            </div> 
      
            <div class="container" style="background-color:#f1f1f1">  
                already have an account? <a href="index.php"> Login here!</a>
                <br>
                Forgot <a href="#">password?</a>
            </div> 
        </form>
        
    <?php
        require 'footer.php'
    ?>  
    </body>
</html>