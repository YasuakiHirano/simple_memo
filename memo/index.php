<!DOCTYPE html>
<html lang="ja">                                                                                                                                                                    
    <head>
        <meta charset="utf-8">
        <title>SimpleMemo | メモ</title>
        <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../public/css/main.css" />
        <style>
            input, textarea {
                background: none;
                border: none;
                outline: none;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            #memo-title, #memo-content {
                width: 100%;
                padding: 0;
                margin: 0;
            }

            #memo-title {
                height: 2em;
                font-size: 1.8em;
            }

            #memo-content {
                height: 100%;
                font-size: 1.2em;
            }
        </style>
    </head>
    <body class="p-3">
        <div class="bg-white h-100 rounded shadow">
            <div class="row h-100 m-0 p-0">
                <div class="col-3 h-100 m-0 p-0 border-left border-right border-gray">
                    <div class="h3 pl-4 pt-3">
                        Memoリスト
                    </div>
                    <div class="list-group-flush p-0 ">
                        <a href="http://google.com" class="list-group-item">Item #1</a>
                        <a href="http://google.com" class="list-group-item">Item #2</a>
                        <a href="http://google.com" class="list-group-item">Item #3</a>
                    </div>
                </div>
                <div class="col-9 h-100">
                    <input type="text" id="memo-title" placeholder="タイトルを入力する..." />
                    <textarea id="memo-content" placeholder="内容を入力する..."></textarea>
                </div>
            </div>
        </div>
    </body>
</html>

