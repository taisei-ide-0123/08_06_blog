<?php
// var_dump($_POST);
// exit();
// 関数ファイル読み込み
include("functions.php");
// 送信されたidをgetで受け取る
$id = $_GET['id'];
// var_dump($id);
// exit();
// DB接続&id名でテーブルから検索
$pdo = connect_to_db();
$sql = 'SELECT * FROM blog_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// fetch()で1レコード取得できる.
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <link rel="stylesheet" href="css/write.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
  <form action="update.php" method="POST">
    <header>
      <div class="header-title">
        <p>Blog</p>
      </div>
      <a class="fas fa-home fa-2x" href="read.php" style="color: #6f6f6f; position: fixed; top: 2.3%; left: 90%;"></a>
    </header>
    <div class="post">
      <div class="title">
        <input type="text" name="title" placeholder="title" value="<?= $record["title"] ?>">
      </div>
      <div class="text">
        <textarea type="text" name="body" cols="30" rows="10" placeholder="text"><?= $record["body"] ?></textarea>
      </div>
      <div class="button">
        <button>POST</button>
      </div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
    </div>
  </form>

</body>

</html>