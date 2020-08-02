<?php
    session_start();
    require '../common/validation.php';
    require '../common/database.php';

    // パラメータ取得
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // バリデーション
    $_SESSION['errors'] = [];

    // - 空チェック
    emptyCheck($_SESSION['errors'], $user_email, "メールアドレスを入力してください。");
    emptyCheck($_SESSION['errors'], $user_password, "パスワードを入力してください。");

    // - 文字数チェック
    stringMaxSizeCheck($_SESSION['errors'], $user_email, "メールアドレスは255文字以内で入力してください。");
    stringMaxSizeCheck($_SESSION['errors'], $user_password, "パスワードが空は255文字以内で入力してください。");

    if($_SESSION['errors']) {
        header('Location: ../login/');
        exit;
    }

    // ログイン処理
    $database_handler = getDatabaseConnection();
    if ($statement = $database_handler->prepare('SELECT id, name, password FROM users WHERE email = :user_email')) {

        $statement->bindParam(':user_email', $user_email);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $name = $user['name'];
        $id = $user['id'];

        if (password_verify($user_password, $user['password'])) {
            $_SESSION['user'] = [
                'name' => $name,
                'id' => $id
            ];
            header('Location: ../memo/');
            exit;
        } else {
            $_SESSION['errors'] = [
                'メールアドレスまたはパスワードが間違っています。'
            ];
            header('Location: ../login/');
            exit;
        }
    }
