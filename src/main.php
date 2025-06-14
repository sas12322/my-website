<?php
session_start();

// 沒有登入就導回登入頁
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <title>歡迎使用者</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">

  <h1 class="mb-4">🎉 歡迎回來，<?php echo htmlspecialchars($_SESSION['username']); ?>！</h1>
  <p>這是你的主頁，可以開始記帳囉！</p>
  <a href="logout.php" class="btn btn-danger mt-3">登出</a>

</body>
</html>
