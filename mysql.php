<a href="index.php">index</a><br><br>
<?php

$mysqli = new mysqli("localhost", "root", "", "test");
if ($mysqli->connect_errno) {
echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;}

$res = $mysqli->query("SELECT client, count(*) AS cn , c.name FROM orders o LEFT JOIN clients c 
              ON o.client = c.id WHERE status = 'Complete'   group by client HAVING cn > 4");
while ($row = $res->fetch_assoc()) {
    echo "   client id = ".$row['client'].',   name = '.$row['name']. ',   count = '.$row['cn']. "<br>";
}
/*
echo "Исходный порядок строк...<br>";
$res = $mysqli->query("SELECT * FROM orders WHERE status = 'Complete' ");

while ($row = $res->fetch_assoc()) {
    echo " client = " . $row['client'] . "<br>";
}
*/
?>
