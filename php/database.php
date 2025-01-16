<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wardrobe-rk2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
    die();
}

function createUser($username, $email, $phone, $password, $conn) {
    $sql = "INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$username, $email, $phone, $password]);
}

function getUserByEmail($email, $conn) {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserById($id, $conn) {
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function getUserByLoginOrEmail($login, $conn) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$login, $login]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>