<?php
    require '../common/auth.php';
    require '../common/database.php';

    if (!isLogin()) {
       header('Location: ../login/');
       exit;
    }

    $user_id = getLoginUserId();
    $database_handler = getDatabaseConnection();

    if ($statement = $database_handler->prepare("SELECT max(id) as last_id FROM memos")) {
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $result['last_id']++;
    }

    $title = "無題{$result['last_id']}";
    if ($statement = $database_handler->prepare("INSERT INTO memos (user_id, title, content) VALUES(:user_id, :title, null)")) {
        $statement->bindParam(":user_id", $user_id);
        $statement->bindParam(":title", $title);
        $statement->execute();
    }

    $_SESSION['select_memo'] = [
        'id' => $database_handler->lastInsertId(),
        'title' => $title,
        'content' => '',
    ];
    header('Location: ../memo');
    exit;