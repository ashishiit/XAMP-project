<!DOCTYPE html>
<html>
<body>
<h1>my first php page</h1>
<?php
// $var = "hello world";
// echo "i love $var". "<br>";
$a = 10;
$b = 20;
$c = 30;

echo "value of a is $a <br>";
echo "value of b $b <br>";
echo "sum of a and b is" . ($a+$b). "<br>";


$txt1 = "Learn PHP";
$txt2 = "W3Schools.com";
$x = 5;
$y = 4;

echo "<h2>$txt1 </h2>";
echo "Study PHP at $txt2<br>";
echo $x + $y;

// $var = array("1", "2", "3");
// echo $var;
$temp = NULL;
echo $temp;
var_dump($temp);
echo strlen("hello");
define("name", "AShish");
echo name;

/* Connect to database */
$link = mysqli_connect("localhost", "root", "root")
or die("Could not connect : " . mysql_error());
print "Connected successfully";
mysqli_select_db($link, "test") or die("Could not select database");

/* Perform SQL query */
$query = "SELECT * FROM persons";
$result = mysqli_query($link, $query)
or die("Query failed : " . mysqli_error());

/* Print results in HTML */
print "<table>\n";
while ($line = mysqli_fetch_array($result)) {
    print "\t<tr>\n";
    foreach ($line as $col_value) {
        print "\t\t<td>$col_value</td>\n";
    }
    print "\t</tr>\n";
}
print "</table>\n";
mysqli_free_result($result);

/* Close connection */
mysqli_close($link);
?>
</body>
</html>
