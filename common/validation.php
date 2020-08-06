<?php
function emptyCheck(&$errors, $check_value, $message){
    if (empty($check_value)) {
        array_push($errors, $message);
    }
}

function stringMaxSizeCheck(&$errors, $check_value, $message, $max_size = 255){
    if ($max_size < mb_strlen($check_value)) {
        array_push($errors, $message);
    }
}

function mailAddressCheck(&$errors, $check_value, $message){
    if (filter_var($check_value, FILTER_VALIDATE_EMAIL) == false) {
        array_push($errors, $message);
    }
}
