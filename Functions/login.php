<?php
session_start();
$db = new SQLite3('../database.db');

$login_message = "";
$signup_message = "";

// --- LOGIN FORM ---
if (isset($_POST['login'])) {
    $email = trim($_POST['login_email']);
    $password = $_POST['login_password'];

    // Use prepared statement for security
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

    if ($result && password_verify($password, $result['password'])) {
        // Set session variables
        $_SESSION['user_id']   = $result['user_id'];
        $_SESSION['user_name'] = $result['username'];
        $_SESSION['email']     = $result['email'];
        header("Location: Home.php");
        exit();
    }
    else {
        $login_message = "Invalid email or password!";
    }
}

// --- SIGNUP FORM ---
if (isset($_POST['signup'])) {
    $fname = trim($_POST['first_name']);
    $lname = trim($_POST['last_name']);
    $email = trim($_POST['signup_email']);
    $password = password_hash($_POST['signup_password'], PASSWORD_DEFAULT);
    $username = $fname . " " . $lname;

    // Check if email already exists
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $check = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

    if ($check) {
        $signup_message = "Email already exists!";
    }
    else {
        // Insert new user
        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $stmt->bindValue(':email', $email, SQLITE3_TEXT);
        $stmt->bindValue(':password', $password, SQLITE3_TEXT);
        $stmt->execute();

        $signup_message = "Account created successfully! You may now log in.";
    }
}
?>