<?php
// DBに接続する
    require_once('funcs.php');   //「funcs.php」の中を読み込んで
    $pdo = db_conn();  //そのなかの「db_conn（関数）」を呼び出す

// select.phpから送られてきたidを受け取る
    $id = $_GET['id'];

// ↑のidのデータを取り出すためのSQL文を書く
$stmt = $pdo->prepare('SELECT * FROM book_table WHERE id =' . $id . ';');
$status = $stmt->execute();

// データを表示する
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}

?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>登録データ修正</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>修正する書籍</legend>
                <label>登録日：<?= $result['indate'] ?><br>
                <label>タイトル：<input type="text" name="title" value="<?= $result['title'] ?>"></label><br>
                <label>著者：<input type="text" name="author" value="<?= $result['author'] ?>"></label><br>
                <label>URL：<input type="text" name="url" value="<?= $result['url'] ?>"></label><br>
                <label>メモ：<textarea name="memo" rows="4" cols="40"><?= $result['memo'] ?></textarea></label><br>
                <label>ページ数：<input type="text" name="page" value="<?= $result['page'] ?>">/<?= $result['page_all'] ?></label><br>
                <!-- 「hidden」は隠せるけどデータを送れる -->
                <input type="hidden" name="id" value="<?= $result['id'] ?>"><br> 
                <input type="hidden" name="page_all" value="<?= $result['page_all'] ?>"><br>
                <input type="hidden" name="indate" value="<?= $result['indate'] ?>"><br> 
                <input type="submit" value="送信">
            </fieldset>
            </div>
    </form>

    <!-- 削除するリンクも作る -->
    <button onclick="location.href='delete.php?id=<?= $result['id'] ?>'">このデータを削除する</button>

</body>

</html>