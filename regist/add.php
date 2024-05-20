<?php 
//../env.phpを読み込む
require_once "../env.php";
//lib/DB.phpを読み込み
require_once "../lib/DB.php";
// POSTリクエストで何もしないと何も表示しない
// POSTリクエストでなければ何も表示しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}
//セッション開始
session_start();
//セッションハイジャック対策
session_regenerate_id(true);
// TODO: セッションデータ取得
$regist = $_SESSION["my_shop"]["regist"];

// パスワードのハッシュ化
$regist['password'] = password_hash($regist['password'], PASSWORD_DEFAULT);

// TODO: データベースに登録
$db = new DB();

//users テーブルにレコードを挿入するSQL
$sql ="INSERT INTO users (name,email,password)
       VALUES (:name, :email, :password);
       ";

$stmt = $db ->pdo->prepare($sql);
$stmt->execute($regist);
// TODO: 予期せぬエラーの場合は、入力画面にリダイレクト
// TODO: 成功の場合は、完了画面にリダイレクト

header('Location: complete.php');
?>