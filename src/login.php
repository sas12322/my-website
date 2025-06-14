<?php
require_once 'config.php'; // 引入資料庫設定

// 取得表單資料
$emailOrUser = $_POST['email_or_username'] ?? '';
$password    = $_POST['password'] ?? '';

// 檢查是否填寫
if (empty($emailOrUser) || empty($password)) {
    die("請填寫帳號或密碼！");
}

// 嘗試以 Email 或使用者名稱查找
$sql = "SELECT * FROM users WHERE email = ? OR username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $emailOrUser, $emailOrUser);
$stmt->execute();
$result = $stmt->get_result();

// 找到使用者
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // 比對密碼
    if (password_verify($password, $user['password'])) {
        echo "✅ 登入成功，歡迎 " . htmlspecialchars($user['username']) . "！";
        // 你可以在這裡轉跳：
        // header("Location: dashboard.php");
        // exit;
    } else {
        echo "❌ 密碼錯誤！";
    }
} else {
    echo "❌ 查無此帳號！";
}

$stmt->close();
$conn->close();
?>
