<?php

// TODO: if this file grows then it may needs to change 

function platformSlashes($path) {
    if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
        $path = str_replace('/', '\\', $path);
    }
    return $path;
}