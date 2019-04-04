<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<h1>my first php page</h1>
<h4>
WELCOME
<?php

    if (isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>
<?php

echo $_SESSION['username']."<br>";
echo $_SESSION['message']."<br>";
//echo $_SESSION['username'];

?>
<a href ="logout.php">Log out</a>
</h4>
</body>
</html>