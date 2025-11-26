<?php
try {
    $db = new PDO('sqlite:../database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

function getRackets($db) {
    $stmt = $db->query("SELECT * FROM Products WHERE Category='Racket' ORDER BY Id ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getGrips($db) {
    $stmt = $db->query("SELECT * FROM Products WHERE Category='Grip' ORDER BY Id ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getShuttlecocks($db) {
    $stmt = $db->query("SELECT * FROM Products WHERE Category='Shuttlecock' ORDER BY Id ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getShoes($db) {
    $stmt = $db->query("SELECT * FROM Products WHERE Category='Shoes' ORDER BY Id ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBags($db) {
    $stmt = $db->query("SELECT * FROM Products WHERE Category='Bag' ORDER BY Id ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getJerseys($db) {
    $stmt = $db->query("SELECT * FROM Products WHERE Category='Jersey' ORDER BY Id ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>