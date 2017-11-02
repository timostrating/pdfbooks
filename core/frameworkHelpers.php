<?php

// TODO: if this file grows then it may needs to change 

function console_log($message) {
    echo str_replace("\\", "/", "<script>console.log(\"".$message."\"); </script> \n");
}

function platformSlashes($path) {
    if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
        $path = str_replace('/', '\\', $path);
    }
    return $path;
}