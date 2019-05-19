
<!-- <h1>my first php page</h1> -->
<?php


$db = mysqli_connect("localhost", "root", "root", "registration");
if (isset($_POST['login_btn']))
{
    session_start();
    $username = mysqli_real_escape_string($db, $_POST['username']);
//     $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
//     $password2 = mysqli_real_escape_string( $_POST['password2']);
    
    
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username='$username' AND password ='$password'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) == 1)
        {
        $_SESSION['message'] = "You're now logged in";
//         echo $_SESSION['message'];
        $_SESSION['username'] = $username;
        header("location: home.php");
        }
        else {
            $_SESSION['message'] = "incorrect username or password";
        }
   
    
}
?>

<!DOCTYPE html>
<html>
<body>
	<head>
		<title>
			Registration
		</title>
	</head>

<?php

    if (isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>
<form method = "post" action = "login.php">
	<table>
			<tr>
		<td>user name</td>
		<td><input type = "text" name = "username"></td>
			</tr>
			
			<tr>
		<td>Password</td>
		<td><input type = "password" name = "password"></td>
			</tr>
			
			<tr>
		<td>Submit</td>
		<td><input type = "submit" name = "login_btn" value="Login"></td>
			</tr>
	</table>
</form>
</body>
</html>
