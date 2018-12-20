<?php
function is_selected($a,$b){
    $result = '';
    if ($a == $b){
        $result = 'selected';
    }
    return $result;
}

function is_disabled($a,$b){
    $result = '';
    if ($a == $b){
        $result = 'disabled';
    }
    return $result;
}

function is_readonly($a,$b){
    $result = '';
    if ($a == $b){
        $result = 'readonly';
    }
    return $result;
}



?>