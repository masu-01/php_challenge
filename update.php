<?php

// DBに接続する
    require_once('funcs.php');   //「funcs.php」の中を読み込んで
    $pdo = db_conn();  //そのなかの「db_conn（関数）」を呼び出す

// detail.phpから送信されてきた情報を受け取る
    $title = $_POST['title'];
    $author = $_POST['author'];
    $url = $_POST['url'];
    $memo = $_POST['memo'];
    $page = $_POST['page'];
    $page_all = $_POST['page_all'];
    $id = $_POST['id'];
    $indate = $_POST['indate'];


// dbにデータを入力するためのSQL文を書く
// INSERT INTO テーブル名(カラム1, カラム2,...) VALUES(値1, 値2,...) ;
    $stmt = $pdo->prepare("INSERT INTO
                            book_table(id,up_id,title,author,url,memo,page,page_all,indate,up_date)
                            VALUES(
                                NULL,:id,:title,:author,:url,:memo,:page,:page_all,:indate,sysdate())
                        ");

// バインド変数を用意する
    $stmt->bindValue(':id', $id, PDO::PARAM_STR);
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':author', $author, PDO::PARAM_STR);
    $stmt->bindValue(':url', $url, PDO::PARAM_STR);
    $stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
    $stmt->bindValue(':page', $page, PDO::PARAM_INT);
    $stmt->bindValue(':page_all', $page_all, PDO::PARAM_INT);
    $stmt->bindValue(':indate', $indate, PDO::PARAM_STR);


//  実行する
//  成功したか失敗したかが「$status」に入る→成功したら「true」、失敗は「false」
//  データ登録処理後にフォームがリセットされる（というかもっかいindex.phpを表示させる）
$status = $stmt->execute();

if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:". print_r($error, true));
}else{
  //成功したらindex.phpへリダイレクト
  header('Location: index.php');
}


?>
