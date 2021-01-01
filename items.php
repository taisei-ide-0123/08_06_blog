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
  <link rel="stylesheet" href="css/items.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
  <header>
    <div class="header-title">
      <p>Blog</p>
    </div>
  </header>
  <div class="container">
    <a class="fas fa-home fa-2x" href="read.php" style="color: #fff; text-decoration: none; padding: 0 10%;"></a>
    <a class="far fa-edit fa-2x" href="input.php" style="color: #fff; text-decoration: none; padding: 0 10%;"></a>
    <a class="fab fa-twitter fa-2x" href="https://twitter.com/taisei_ide" style="color: #fff; text-decoration: none; padding: 0 10%;"></a>
    <a class="fab fa-facebook-square fa-2x" href="https://www.facebook.com/profile.php?id=100004433554720" style="color: #fff; text-decoration: none; padding: 0 10%;"></a>
    <a class="fab fa-github fa-2x" href="https://github.com/taisei-ide-0123" style="color: #fff; text-decoration: none; padding: 0 10%;"></a>
  </div>
  <div class="core">
    <div class="post">
      <p><?= $record["created_at"] ?></p>
      <h1><?= $record["title"] ?></h1>
      <p><?= $record["body"] ?></p>
    </div>
  </div>
  <input type="hidden" name="id" value="<?= $record['id'] ?>">
  </form>

</body>

</html>