<!DOCTYPE html>
<html lang="ja">                                                                                                                                                                    
    <head>
        <meta charset="utf-8">
        <title>SimpleMemo | メモ</title>
        <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../public/css/main.css" />
        <script defer src="../public/js/all.js"></script>
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
    </head>
    <body class="p-3">
        <div class="bg-white h-100 rounded shadow">
            <div class="row h-100 m-0 p-0">
                <div class="col-3 h-100 m-0 p-0 border-left border-right border-gray">
                    <div class="d-flex justify-content-between pt-1">
                        <div class="pl-3 pt-2">
                            xxxさん、こんにちは。
                        </div>
                        <div class="pr-1">
                            <button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button>
                            <a href="../login" class="btn btn-dark"><i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </div>
                    <div class="h3 pl-3 pt-3">
                        Memoリスト
                    </div>
                    <div class="list-group-flush p-0 ">
                        <a href="http://google.com" class="list-group-item">Item #1</a>
                        <a href="http://google.com" class="list-group-item">Item #2</a>
                        <a href="http://google.com" class="list-group-item">Item #3</a>
                    </div>
                </div>
                <div class="col-9 h-100">
                    <div id="memo-menu">
                        <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-success"><i class="fas fa-save"></i></button>
                    </div>
                    <input type="text" id="memo-title" placeholder="タイトルを入力する..." />
                    <textarea id="memo-content" placeholder="内容を入力する..."></textarea>
                </div>
            </div>
        </div>
    </body>
</html>

