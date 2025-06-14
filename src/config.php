<?php
$host = 'db'; // 如果你用 docker-compose，MySQL container name 應該是 db
$db   = 'accounting';
$user = 'root';
$pass = 'root'; // 如果你 docker-compose 裡設的密碼是 root

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("資料庫連線失敗: " . $conn->connect_error);
}
?>
