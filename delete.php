<?php
$id   = $_GET["id"];

// DB接続
require_once('funcs.php');   //「funcs.php」の中を読み込んで
$pdo = db_conn();  //そのなかの「db_conn（関数）」を呼び出す


// データ削除SQL文作成
$stmt = $pdo->prepare('DELETE FROM book_table WHERE id = :id ;');

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    //*** function化する！******\
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit("SQLError:" . print_r($error, true));
} else {
    //*** function化する！*****************
    redirect('select.php');
    // header("Location: index.php");
    // exit();
}
