<?php
    require '../common/auth.php';
    require '../common/database.php';

    if (!isLogin()) {
        header('Location: ../login/');
        exit;
    }

    $user_name = getLoginUserName();
    $user_id = getLoginUserId();

    $memos = [];
    $database_handler = getDatabaseConnection();
    if ($statement = $database_handler->prepare("SELECT id, title, content, updated_at FROM memos WHERE user_id = :user_id ORDER BY updated_at DESC")) {
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();

        while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
           array_push($memos, $result);
        }
    }

    $edit_id = "";
    if (isset($_SESSION['select_memo'])) {
        $edit_memo = $_SESSION['select_memo'];
        $edit_id = empty($edit_memo['id']) ? "" : $edit_memo['id'];
        $edit_title = empty($edit_memo['title']) ? "" : $edit_memo['title'];
        $edit_content = empty($edit_memo['content']) ? "" : $edit_memo['content'];
    }
?>
<!DOCTYPE html>
<html lang="ja">                                                                                                                                                                    
    <?php
        include_once "../common/header.php";
        echo getHeader("メモ投稿");
    ?>
    <body class="p-3">
        <div class="bg-white h-100 rounded shadow">
            <div class="row h-100 m-0 p-0">
                <div class="col-3 h-100 m-0 p-0 border-left border-right border-gray">
                    <div class="d-flex justify-content-between pt-1">
                        <div class="pl-3 pt-2">
                            <?php echo $user_name; ?>さん、こんにちは。
                        </div>
                        <div class="pr-1">
                            <a href="./add.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
                            <a href="./logout.php" class="btn btn-dark"><i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </div>
                    <div class="h3 pl-3 pt-3">
                        メモリスト
                    </div>
                    <div class="list-group-flush p-0 ">
                        <?php if(empty($memos)): ?>
                            <div class="pl-3 pt-3 h5 text-info">メモがありません。</div>
                        <?php endif; ?>
                        <?php foreach($memos as $memo): ?>
                        <a href="./select.php?id=<?php echo $memo['id']; ?>" class="list-group-item list-group-item-action <?php echo $edit_id == $memo['id'] ? 'active' : ''; ?>">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?php echo $memo["title"] ?></h5>
                                <small><?php echo date('Y/m/d H:i', strtotime($memo['updated_at'])); ?></small>
                            </div>
                            <p class="mb-1">
                                <?php
                                    if (mb_strlen($memo['content']) <= 100) {
                                        echo $memo['content'];
                                    } else {
                                        echo mb_substr($memo['content'], 0, 100) . "...";
                                    }
                                ?>
                            </p>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-9 h-100">
                    <?php if(isset($_SESSION['select_memo'])): ?>
                        <div id="memo-menu">
                            <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <button type="button" class="btn btn-success"><i class="fas fa-save"></i></button>
                        </div>
                        <input type="text" id="memo-title" placeholder="タイトルを入力する..." value="<?php echo $edit_title; ?>" />
                        <textarea id="memo-content" placeholder="内容を入力する..."><?php echo $edit_content; ?></textarea>
                    <?php else: ?>
                        <div class="pt-3 h5 text-info">
                            メモを新規作成してください。
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <style>
            input{
                background: none;
                border: none;
                outline: none;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            textarea {
                background: none;
                border: none;
                outline: none;
                overflow: hidden;
                text-overflow: ellipsis;
                box-sizing: border-box;
            }

            input {
                white-space: nowrap;
            }

            #memo-title, #memo-content {
                width: 100%;
                padding: 0;
                margin: 0;
            }

            #memo-menu {
                height: 3%;
                font-size: 1.8em;
                text-align: right;
            }

            #memo-title {
                height: 9%;
                font-size: 1.8em;
            }

            #memo-content {
                height: 87%;
                font-size: 1.2em;
                resize: none;
                overflow-y: auto;
            }
        </style>
    </body>
</html>

