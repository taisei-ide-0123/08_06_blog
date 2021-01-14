<?php
session_start(); // セッションの開始
include('functions.php'); // 関数ファイル読み込み
check_session_id(); // idチェック関数の実行
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <link rel="stylesheet" href="css/write.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
  <form action="create.php" method="POST">
    <header>
      <div class="header-title">
        <p>Blog</p>
      </div>
      <a class="fas fa-home fa-2x" href="read.php" style="color: #6f6f6f; position: fixed; top: 2.3%; left: 90%;"></a>
    </header>
    <div class="post">
      <div class="title">
        <input type="text" name="title" placeholder="title">
      </div>
      <div class="text">
        <textarea type="text" name="body" cols="30" rows="10" placeholder="text"></textarea>
      </div>
      <div class="button">
        <button>POST</button>
      </div>
    </div>
  </form>
</body>

</html>