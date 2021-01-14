<?php
// var_dump($_POST);
// exit();

session_start(); // セッションの開始
include('functions.php'); // 関数ファイル読み込み
$pdo = connect_to_db(); // DB接続
$username = $_POST['username']; // データ受け取り→変数に入れる
$password = $_POST['password'];

// DBにデータがあるかどうか検索
$sql = 'SELECT * FROM user_table
WHERE username=:username
AND password=:password
AND is_deleted=0';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();
// var_dump($_POST);
// exit();

if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し、以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
}

// DBのデータ有無で条件分岐
$val = $stmt->fetch(PDO::FETCH_ASSOC); // 該当レコードだけ取得
if (!$val) { // 該当データがないときはログインページへのリンクを表示
  echo "<p>ログイン情報に誤りがあります.</p>";
  echo '<a href="login.php">login</a>';
  exit();
} elseif ($_POST["username"] == "taisei" && $_POST["password"] == 19970123) { // DBにデータがあればセッション変数に格納
  $_SESSION = array(); // セッション変数を空にする
  $_SESSION["session_id"] = session_id();
  $_SESSION["is_admin"] = $val["is_admin"];
  $_SESSION["username"] = $val["username"];
  header("Location:read.php"); // 一覧ページへ移動
  exit();
} else { // DBにデータがあればセッション変数に格納
  $_SESSION = array(); // セッション変数を空にする
  $_SESSION["session_id"] = session_id();
  $_SESSION["is_admin"] = $val["is_admin"];
  $_SESSION["username"] = $val["username"];
  header("Location:not_edit_read.php"); // 一覧ページへ移動
  exit();
}
