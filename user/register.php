<?php
    // パラメータ取得
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // TODO: バリデーション

    // DB接続処理
    try
    {
        $database_handler = new PDO('mysql:host=db;dbname=simple_memo;charset=utf8mb4', 'root', 'password');
    }
    catch (PDOException $e)
    {
        echo "DB接続に失敗しました。<br />";
        echo $e->getMessage();
        exit;
    }

    // インサートSQLを作成して実行
    if ($statement = $database_handler->prepare('INSERT INTO users (name, email, password) values(:name, :email, :password)'))
    {
        $password = password_hash($user_password, PASSWORD_DEFAULT);

        $statement->bindParam(':name', $user_name);
        $statement->bindParam(':email', $user_email);
        $statement->bindParam(':password', $password);
        $statement->execute();
    }

    // メモ投稿画面にリダイレクト
    header('Location: ../memo/');
    exit;