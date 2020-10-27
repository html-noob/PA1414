<?php
 session_start();

	if (isset($_POST['submit'])) 
	{
		include 'dbh.php';
        
		$email = $_POST['email'];
		$password = $_POST['psw'];
		
		// error checker
		
		if (empty($email) || empty($password)) {
			header("Location: ../php/index.php?loginerror=field_empty");
			exit();	
		} else {
			$sql = "SELECT * FROM users WHERE email = '$email';";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
				if ($resultCheck < 1) {
						header("Location: ../index.php?login_error=no_email_matched");
						exit();	
						// detta FUNKAR
			} else {
				if ($row = mysqli_fetch_assoc($result)) {
					$pwdFromDB = $row['password'];
					$pwdCheck = password_verify($password, $pwdFromDB);
                    
					if ($pwdCheck == FALSE) {
						header("Location: ../php/index.php?login_error=wrong_password");
						exit();							
					} elseif ($pwdCheck == TRUE) {
							//log in the user here
							
							$_SESSION['userID'] = $row['user_id'];
							header("Location: ../php/index.php?login=success");
							session_start();
							exit();
					}  
				}
			}
		}
		
	} else {
			header("Location: ../php/index.php?errorXD");
			exit();	
	}
?>