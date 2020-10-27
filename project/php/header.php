<header>
    <a href="index.php">|| Home ||</a>
    <a href="registerview.php">Register here ||</a>
    <a href="create_event.php">Create event ||</a>
    <?php 
    if ((isset($_SESSION['userID']))) { // om man är inloggad
        echo"
            <a href='past_events.php?id={$_SESSION['userID']}'>Events ||</a>
        ";
    }
    ?>
    <form action="../includes/logout.php" id="lob-form"method="POST">
        <button class="lob" type="submit" name="logout">Log out ||</button>
    </form>
</header>
