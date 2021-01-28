<?php
// 呼び出し
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['id'];

// DB接続
$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM blog_table LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS cnt FROM likes_table GROUP BY todo_id) AS likes ON blog_table.id = likes.todo_id';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  // foreachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<li class='post'>";
    $output .= "<h1>{$record["title"]}</h1>";
    $output .= "<p style='display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 8; overflow: hidden; '>{$record["body"]}</p>";
    $output .= "<a class='read-more' href='items.php?id={$record["id"]}'>READ MORE</a>";
    $output .= "<a class='fas fa-heart' id='heart' href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}' style='text-decoration: none; padding: 30px;'>{$record["cnt"]}</a>";
    $output .= "</li>";
  }
  // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($record);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <link rel="stylesheet" href="css/read.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
  <header>
    <div class="header-title">
      <p>Blog</p>
    </div>
  </header>
  <div class="container">
    <a class="fab fa-twitter fa-2x" href="https://twitter.com/taisei_ide" style="color: #fff; text-decoration: none; padding: 0 10%;"></a>
    <a class="fab fa-facebook-square fa-2x" href="https://www.facebook.com/profile.php?id=100004433554720" style="color: #fff; text-decoration: none; padding: 0 10%;"></a>
    <a class="fab fa-github fa-2x" href="https://github.com/taisei-ide-0123" style="color: #fff; text-decoration: none; padding: 0 10%;"></a>
    <a class="fas fa-door-open fa-2x" href="logout.php" style="color: #fff; text-decoration: none; padding: 0 10%;"></a>
  </div>
  <ul>
    <?= $output ?>
  </ul>
  <script src="js/heart.js"></script>
</body>

</html>