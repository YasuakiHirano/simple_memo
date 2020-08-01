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
