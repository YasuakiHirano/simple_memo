<?php
    if(!isset($_SESSION)){
        session_start();
    }

    function isLogin() {
        if (isset($_SESSION['user'])) {
            return true;
        }

        return false;
    }

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