<?php

if(!isset($_SESSION)){
    session_start();
}

/**
 * ログインしているかチェックする
 * @return bool
 */
function isLogin() {
    if (isset($_SESSION['user'])) {
        return true;
    }

    return false;
}

/**
 * ログインしているユーザーの表示用ユーザー名を取得
 * @return string
 */
function getLoginUserName() {
    if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['name'];

        if (7 < mb_strlen($name)) {
            $name = mb_substr($name, 0, 7) . "...";
        }

        return $name;
    }

    return "";
}

/**
 * ログインしているユーザーIDを取得する
 * @return |null
 */
function getLoginUserId() {
    if (isset($_SESSION['user'])) {
        return $_SESSION['user']['id'];
    }

    return null;
}
