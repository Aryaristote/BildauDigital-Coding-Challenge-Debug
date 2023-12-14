<?php

// Start the session
session_start();

// Database connection details
$database_host = 'your_host';
$database_user = 'your_user';
$database_password = 'your_password';
$database_name = 'your_database';

// User input
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the database
if (!($connection = mysqli_connect($database_host, $database_user, $database_password, $database_name))) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

// Prepared statement to prevent SQL injection
$stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE username=?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$query = mysqli_stmt_get_result($stmt);

// Check if a user with the given username exists
if ($query->num_rows == 1) {
    $userEntry = mysqli_fetch_array($query);

    // Use password_verify for secure password comparison
    if (password_verify($password, $userEntry['password'])) {
        // Set user_id in session if login is successful
        $_SESSION['user_id'] = $userEntry['id'];
        $result = ['status' => true];
    }
} else {
    // Return status false if user not found
    $result = ['status' => false];
}

// Return JSON response
echo json_encode($result);
die;
