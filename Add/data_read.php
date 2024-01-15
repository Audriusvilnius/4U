<?php

$servername = 'localhost';
$username = '4u';
$password = '1234567';
$dbname = '4u';

$sql = new mysqli($servername, $username, $password, $dbname);

// Random topic

$length = $sql->query("SELECT COUNT(*) FROM content");
$length = $length->fetch_assoc();
$length = $length['COUNT(*)'];


$id = $sql->query(" SELECT * FROM content ORDER BY id DESC ");
foreach ($id as $key => $row) {
    $random_id[$key] = $row['id'];
}
$length = count($random_id);
$topic_rnd = rand(0, $length - 1);
$topic_id = $sql->query(" SELECT * FROM content WHERE id = '" . $random_id[$topic_rnd] . "' ORDER BY id DESC ");
while ($row = $topic_id->fetch_assoc()) {
    echo '<h2>' . $row['title'] . '</h2><br>';
    echo $row['user_content'] . '<br>';
    echo ' <small style="float:right;color:black;"><i>id: ' . $row['id'] . '</i></small><br>';
}

// All topic
$topics = $sql->query(" SELECT * FROM content ORDER BY id DESC ");
while ($row = $topics->fetch_assoc()) {
    echo '<h2 style="text-align: center;">' . $row['title'] . '</h2><br>';
    echo $row['user_content'] . '<br>';
    echo '<p style="text-align: right;">Author: <i><b>' . $row['author'] . $row['id'] . '</i></b></p><hr><br><br>.';
}

// Path: Add/data_read.php
global $wpdb;
echo '<form method="post" action="">
    <div style="margin-bottom: 25px;margin-top: 25px;">
        <input type="text" name="title" placeholder="Topic" style="border-radius: 7px;"><br>
    </div>
    <div>
        <textarea type="text" name="user_content" placeholder="Write content here ..." " style="border-radius: 7px;"></textarea>
    </div>
    <div style="margin-bottom: 15px;margin-top: 15px; width: 400px;float:right;">
        <input type="text" name="author" placeholder="Author" style="border-radius: 7px;"><br>
        <button style="margin-bottom: 15px;margin-top: 15px;float:right;" type="submit" >Add Topic</button>
    </div>
</form><br><br><br><br><br><hr>';

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
            echo '<h3 style="background-color: rgba(0, 255, 0, 0.585); padding: 15px;border-radius: 10px;text-align: center;">Data inserted successfully!</h3>';
        }
    } else {
        echo '<h3 style="color: crimson;background-color: skyblue; padding: 15px;border-radius: 10px;text-align: center;">Please fill all the fields!</h3>';
    }
}

// Path: delete/data_read.php
global $wpdb;

echo '<form method="post" action="">
        <input type="hidden" name="id" value = ' . $row['id'] . '"><br>
    <div>
        <button style="margin-bottom: 15px;margin-top: 15px;float:right; background-color:crimson" type="submit" >Delete</button>
    </div>
</form>';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id'] != '') {
    if (isset($_POST['id'])) {
        // Assuming 'your_table_name' is the name of your table
        //$table_name = $wpdb->prefix . 'your_table_name';
        $table_name = 'content';
        // Assuming 'id' is the primary key for your table
        $id_to_delete = sanitize_text_field($_POST['id']);

        $wpdb->delete(
            $table_name,
            array('id' => $id_to_delete),
            array('%d') // %d represents the format of the ID, adjust accordingly
        );

        if ($wpdb->last_error) {
            echo 'Error deleting data: ' . $wpdb->last_error;
        } else {
            echo '<h3 style="background-color: rgba(0, 255, 0, 0.585); padding: 15px;border-radius: 10px;text-align: center;">Data deleted successfully!</h3>';
        }
        header('Location: http://localhost/4U/index.php');
    }
}

?>