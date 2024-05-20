<?php
// env.php を読み込み
require_once '../env.php';

// lib/DB.php を読み込み
require_once '../lib/DB.php';

// セッション開始
session_start();
session_regenerate_id(true);

// カートデータがあれば削除
if (!empty($_SESSION['my_shop']['cart_items'])) {
    // DBに接続する
    $db = new DB();

    // カート内の商品を削除するSQLを作成
    $cart_item_ids = array_keys($_SESSION['my_shop']['cart_items']);
    $placeholders = rtrim(str_repeat('?,', count($cart_item_ids)), ',');
    $sql = "DELETE FROM items WHERE id IN ($placeholders);";
    
    // SQLを実行してカート内の商品を削除
    $stmt = $db->pdo->prepare($sql);
    $stmt->execute($cart_item_ids);

    // カートを空にする
    $_SESSION['my_shop']['cart_items'] = array();
}

// ここに購入後の他の処理を追加する

// 購入後のメッセージを表示する例
echo "購入が完了しました。ありがとうございます！";

// 他のページにリダイレクトする場合
// header('Location: another_page.php');
?>