<?php
    include_once '../includes/dbh.php';
?>

<?php
    $userID = $_SESSION['userID'];
    $sql = "SELECT first_name FROM users WHERE user_id = $userID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo "Welcome to <i>the best</i> meeting scheduling app " . $row['first_name'];
?>