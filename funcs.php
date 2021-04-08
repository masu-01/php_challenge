<?php
// 全体的に使う共通の関数をここに書きます

// DB接続する関数「db_conn()」をつくる
    function db_conn() {
        try{
            $db_name = "challenge";  //データベース名
            $db_id   = "root";       //アカウント名
            $db_pw   = "root";       //パスワード
            $db_host = "localhost";  //dbホスト
            $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host , $db_id ,$db_pw);
            return $pdo;             //「$pdo」を「db_conn（この関数）」の外でも使えるようにする「return」
        } catch (PDOException $e) {
            exit('DB Connection Error:' . $e->getMessage());
        }
    } 


// SQLエラー関数：



?>