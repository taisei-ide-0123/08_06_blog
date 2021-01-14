<?php
// var_dump($_POST);
// exit();
session_start(); // セッションの開始
include('functions.php'); // 関数ファイル読み込み
check_session_id(); // idチェック関数の実行
not_admin_user();
// 各値をpostで受け取る
$id = $_POST['id'];
// var_dump($id);
// exit();
$title = $_POST['title'];
// var_dump($title);
// exit();
$body = $_POST['body'];
$deadline = $_POST['deadline'];

$pdo = connect_to_db();

// idを指定して更新するSQLを作成(UPDATE文)
$sql = "UPDATE blog_table SET title=:title, body=:body, updated_at=sysdate() WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':body', $body, PDO::PARAM_STR);
// $stmt->bindValue(':deadline', 0 /* 0はダミナーなので適切な値に差し替え */, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
// var_dump($id);
// exit();
$status = $stmt->execute();

// 各値をpostで受け取る (データ登録処理後)
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し,以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常に実行された場合は一覧ページファイルに移動し,処理を実行する
  header("Location:read.php");
  exit();
}
