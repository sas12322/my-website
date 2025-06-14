<?php
$mysqli = new mysqli("db", "user", "password", "mydb");

if ($mysqli->connect_error) {
    die("連線失敗: " . $mysqli->connect_error);
}
echo "✅ 成功連接資料庫！";
?>
