<?php
// DBに接続する
    require_once('funcs.php');   //「funcs.php」の中を読み込んで
    $pdo = db_conn();  //そのなかの「db_conn（関数）」を呼び出す

//  データを取得するためのSQL文を作成する
    $stmt = $pdo->prepare("SELECT * FROM book_table");
    $status = $stmt->execute();

// 登録したデータすべてを表示する
    $view ="";
    if($status == false){
        //execute（SQL実行時にエラーがある場合）
        $error = $stmt->errorInfo();
        exit('ErrorQuery:' . print_r($error, true));
    }else{
        //Selectデータの数だけ自動でループしてくれる「FETCH_ASSOC」
        while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $view .= '<p>'
                        . h($result['id'])  . '＝＝＝＝＝＝＝＝＝＝ '
                        . h($result['date'])  . '<br>'
                        .'<a href= "'. h($result['url']).  '" target="_blank">'. h($result['title'])  .'</a>　'
                        . h($result['author']).  '<br>'
                        . h($result['memo']) .  '<br>'
                        . h($result['page']) . '/'
                        . h($result['page_all']) .  '　ページ<br>'
                        . '登録日：' .h($result['indate']) 
                        . '　　最終更新日：' .h($result['up_date']) .  '<br>'
                        . '<a href= "detail.php?id='. $result['id'].  '">'. '更新する'  .'</a>' 
                        . '<br>＝＝＝＝＝＝＝＝＝＝'
                    .'</p>';  //「.」は「+」の意味
        }
    }
?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>本一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">書籍登録フォームはこちら</a>
        </div>
    </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
<!-- 検索フォームを作成して、検索ワードを「kensaku.php」に送る -->
    <div class="container jumbotron">
    だれの本を探しますか？
    <form action="search.php" method="post">
        <input type="text" name="keyword">
        <input type="submit" name="submit" value="検索">
    </form>
    </div>

<!-- 表示エリア -->
    <div class="container jumbotron"><?= $view ?></div>

</div>
<!-- Main[End] -->

</body>
</html>
