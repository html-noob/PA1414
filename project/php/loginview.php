    <div class="imgcontainer"> 
        <img src="../img/motherbear.jpg"
             alt="avatar" class="avatar"> 
    </div>
    
    <h1>Log in</h1>
    <form action="../includes/login.php" method="POST">
        <div class="container"> 
            <label><b>Email</b></label> 
            <input type="text" placeholder="Enter Email" name="email" required> 
  
            <label><b>Password</b></label> 
            <input type="password" placeholder="Enter Password" name="psw" required> 
  
            <button type="submit" name="submit">Login</button>
        </div> 
  
        <div class="container" style="background-color:#f1f1f1">  
            don't have an account? <a href="registerview.php" style="text-decoration:none;"> register here!</a>
            <br>
            Forgot password? <a href="#" style="text-decoration:none;">click here!</a>
        </div> 
    </form>