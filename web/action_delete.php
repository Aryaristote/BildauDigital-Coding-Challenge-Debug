<?php

$database_host = 'your_host';
$database_user = 'your_username'; 
$database_password = 'your_password';
$database_name = 'your_database';

$question_id = $_POST['id']; 

// Validate if 'id' is set in the POST request
if (!isset($question_id)) {
    $result = ['error' => 'Question ID not specified'];
    die(json_encode($result));
}

// Connect to the database
$connection = mysqli_connect($database_host, $database_user, $database_password, $database_name);

// Check the database connection
if (!$connection) {
    $result = ['error' => mysqli_connect_error()];
    die(json_encode($result));
}

// Use prepared statements to prevent SQL injection
$stmt = mysqli_prepare($connection, "DELETE FROM questions WHERE id = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, 's', $question_id);
mysqli_stmt_execute($stmt);

// Check if the deletion was successful
if (mysqli_affected_rows($connection) > 0) {
    $result = ['status' => true];
} else {
    $result = ['status' => false];
}

// Close the prepared statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($connection);

// Output the result as JSON
die(json_encode($result));
