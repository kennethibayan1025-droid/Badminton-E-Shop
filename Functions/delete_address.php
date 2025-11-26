<?php
session_start();
$db = new SQLite3('../database.db');

// Make sure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Pages/Login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Delete the user's address
$delete = $db->prepare("DELETE FROM addresses WHERE user_id = :uid");
$delete->bindValue(":uid", $user_id);
$delete->execute();

// Redirect back to account page
header("Location: ../Pages/Account.php");
exit();
?>