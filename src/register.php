<?php
require_once 'config.php';

// 取得 POST 資料
$username = $_POST['username'] ?? '';
$birthday = $_POST['birthday'] ?? '';
$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// 驗證欄位是否填寫
if (empty($username) || empty($birthday) || empty($email) || empty($password)) {
    die("請完整填寫所有欄位！");
}

// 加密密碼
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// 準備 SQL
$sql = "INSERT INTO users (username, birthday, email, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $username, $birthday, $email, $hashedPassword);

// 執行寫入
if ($stmt->execute()) {
    echo "✅ 註冊成功！";
} else {
    echo "❌ 註冊失敗：" . $stmt->error;
}

$stmt->close();
$conn->close();
?>
