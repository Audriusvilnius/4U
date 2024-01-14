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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['user_content'];
    $sql->query("INSERT INTO content (title, user_content) VALUES ('$title', '$content')");
    header('Location: index.php');
}

global $wpdb;

echo '<form method="post" action="">
    <div style="margin-bottom: 25px;margin-top: 25px;">
        <input type="text" name="title" placeholder="Topic"><br>
    </div>
    <div>
        <textarea type="text" name="user_content" placeholder="Topic Content" "></textarea>
    </div>
    <div style="margin-bottom: 25px;margin-top: 25px;">
        <input type="text" name="author" placeholder="Author"><br>
    </div>
        <button type="submit" >Add Topic</button>
</form><br><br>';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (($_POST['title'] != '') && $_POST['user_content'] != '' && $_POST['author'] != '') {
        // Assuming 'your_table_name' is the name of your table
        // $table_name = $wpdb->prefix . 'content';
        $table_name = 'content';
        // Sanitize and validate your form data (to prevent SQL injection and other security issues)
        $data = array(
            'title' => sanitize_text_field($_POST['title']),
            'user_content' => sanitize_text_field($_POST['user_content']),
            'author' => sanitize_text_field($_POST['author']),
            // Add more columns as needed
        );
        $wpdb->insert($table_name, $data);

        if ($wpdb->last_error) {
            echo 'Error inserting data: ' . $wpdb->last_error;
        } else {
            echo '<h3 style="color: skyblue;background-color: lime; padding: 15px;border-radius: 10px;text-align: center;">Data inserted successfully!</h3>';
        }
    } else {
        echo '<h3 style="color: crimson;background-color: skyblue; padding: 15px;border-radius: 10px;text-align: center;">Please fill all the fields</h3>';
    }
}
?>