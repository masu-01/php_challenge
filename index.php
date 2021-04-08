<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
<!-- ヘッダー -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">登録書籍リストはこちら</a></div>
            </div>
        </nav>
    </header>

<!-- フォームを作って「insert.php」に送る -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>書籍登録フォーム</legend>
                    <label>タイトル：<input type="text" name="title"></label><br>
                    <label>著者：<input type="text" name="author"></label><br>
                    <label>URL：<input type="text" name="url"></label><br>
                    <label>メモ：<textArea name="memo" rows="4" cols="40"></textArea></label><br>
                    <label>ページ数：<input type="text" name="page_all"></label><br>
                    <input type="submit" value="送信">
            </fieldset>
        </div>
</body>

</html>
