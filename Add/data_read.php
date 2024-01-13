<?php

$servername = 'localhost';
$username = '4u';
$password = '1234567';
$dbname = '4u';

$sql = new mysqli($servername, $username, $password, $dbname);
$topic_rnd = $sql->query(" SELECT * FROM content WHERE id = '" . rand(1, 10) . "' ORDER BY id DESC ");
$length = $sql->query("SELECT COUNT(*) FROM content");
$length = $length->fetch_assoc();
$length = $length['COUNT(*)'];

while ($row = $topic_rnd->fetch_assoc()) {
    echo '<h2>' . $row['title'] . '</h2><br>';
    echo $row['user_content'];
}

$topics = $sql->query(" SELECT * FROM content ORDER BY id DESC ");
while ($row = $topics->fetch_assoc()) {
    echo '<h2>' . $row['title'] . '</h2><br>';
    echo $row['user_content'];
}
?>