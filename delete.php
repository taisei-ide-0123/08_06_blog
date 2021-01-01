<?php
// 関数ファイル読み込み
include("functions.php");
// idをgetで受け取る
$id = $_GET['id'];
// idを指定して更新するSQLを作成 -> 実行の処理
$pdo = connect_to_db();
$sql = 'DELETE FROM blog_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 一覧画面にリダイレクト
header('Location:read.php');
