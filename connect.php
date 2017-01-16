<?php
$servername = "mysqlserver.ceymogzg6sqk.us-west-2.rds.amazonaws.com:3306";
$username = "mysqlroot";
$password = "mysqlroot";
$dbname = "learn";

// Create connection
//$conn = new mysqli($servername, $username, $password);

// Check connection
//if ($conn->connect_error) {
  //  die("Connection failed: " . $conn->connect_error);
//}

$conn = mysql_connect($servername,$username,$password)
        or die("Unable to Connect Mysql");
echo "Connected successfully <br/>";

$db_selected = mysql_select_db($dbname, $conn);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}


$sql = "SELECT name FROM learn_table";
$result = mysql_query($sql);


// Check result
// This shows the actual query sent to MySQL, and the error. Useful for debugging.
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

while ($row = mysql_fetch_assoc($result)) {
    echo $row['name'];
    echo "<br />";
}
mysql_close($conn);

?>
