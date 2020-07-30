<?php
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

$mysqli = mysqli_connect('localhost', 'root', 'password', 'simple_memo', '13306');

if (!$mysqli) {
    echo "Error: Unable to connect to MySQL.<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . "<br>";
    exit;
}

if ($stmt = $mysqli->prepare('INSERT INTO users (name, email, password) values(?, ?, ?)')) {
    $stmt->bind_param("s", $user_name);
    $stmt->bind_param("s", $user_email);

    $password = password_hash($user_password, PASSWORD_DEFAULT);
    $stmt->bind_param("s", $password);
    $stmt->execute();
}

mysqli_close($mysqli);
