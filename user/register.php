<?php
    session_start();
    require '../common/validation.php';
    require '../common/database.php';

    // パラメータ取得
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // バリデーション
    $_SESSION['errors'] = [];

    // - 空チェック
    emptyCheck($_SESSION['errors'], $user_name, "ユーザー名を入力してください。");
    emptyCheck($_SESSION['errors'], $user_email, "メールアドレスを入力してください。");
    emptyCheck($_SESSION['errors'], $user_password, "パスワードを入力してください。");

    // - 文字数チェック
    stringMaxSizeCheck($_SESSION['errors'], $user_name, "ユーザー名は255文字以内で入力してください。");
    stringMaxSizeCheck($_SESSION['errors'], $user_email, "メールアドレスは255文字以内で入力してください。");
    stringMaxSizeCheck($_SESSION['errors'], $user_password, "パスワードが空は255文字以内で入力してください。");

    if($_SESSION['errors']) {
        header('Location: ../user/');
        exit;
    }

    // DB接続処理
    $database_handler = getDatabaseConnection();

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