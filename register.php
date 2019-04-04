
<!-- <h1>my first php page</h1> -->
<?php


$db = mysqli_connect("localhost", "root", "root", "registration");
if (isset($_POST['register_btn']))
{
    session_start();
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);
    
    if ($password ==  $password2)
    {
        $password = md5($password);
        $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['message'] = "You're now logged in";

        $_SESSION['username'] = $username;
        header("location: home.php");
    }
    else
    {
        $_SESSION['message'] = "passwords don't match";
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
<form method = "post" action = "register.php">
	<table>
			<tr>
		<td>Username</td>
		<td><input type = "text" name = "username"></td>
			</tr>
			<tr>
		<td>Email </td>
		<td><input type = "email" name = "email"></td>
			</tr>
			<tr>
		<td>Password</td>
		<td><input type = "password" name = "password"></td>
			</tr>
			<tr>
		<td>Renter Password</td>
		<td><input type = "password" name = "password2"></td>
			</tr>
			<tr>
		<td>Submit</td>
		<td><input type = "submit" name = "register_btn" value="Register"></td>
			</tr>
	</table>
</form>
</body>
</html>
