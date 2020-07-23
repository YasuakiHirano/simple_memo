<!DOCTYPE html>
<html lang="ja">                                                                                                                                                                    
    <head>
        <meta charset="utf-8">
        <title>simple memo | ログイン</title>
        <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css" />
        <style>
            html {
                height: 100%;
            }

            body {
                height: 100%;
                margin: 0;
                background: #d6f5eb;
            }

            .login-card-width {
               width: 35em;
                height: 38em;
            }

            .border-gray {
                border-color: rgba(0,0,0,.180);
            }
        </style>
    </head>
    <body>
        <div class="d-flex align-items-center justify-content-center h-100">
            <form method="post" action="">
                <div class="card rounded login-card-width shadow">
                    <div class="card-body">
                        <div class="rounded-circle mx-auto border-gray border d-flex mt-3" style="width:10em; height:10em;">
                            <img src="../public/images/animal_stand_zou.png" class="w-75 mx-auto p-2" alt="icon"/>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="mt-3 h2">SimpleMemo</div>
                        </div>
                        <div class="row mt-3">
                            <div class="offset-2 col-8 offset-2">
                                <label class="w-100">
                                    <input type="text" name="user_email" class="form-control w-100" placeholder="メールアドレスを入力" />
                                </label>
                                <label class="w-100">
                                    <input type="password" name="user_password" class="form-control w-100" placeholder="パスワードを入力" />
                                </label>
                                <button type="button" class="form-control btn btn-success">
                                   ログイン
                                </button>
                            </div>
                        </div>
                        <div class="mt-5">
                            <div class="d-flex justify-content-center">
                                アカウントをお持ちではありませんか？
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="../user" class="text-success">アカウントを作成</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

