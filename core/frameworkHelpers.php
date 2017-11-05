<?php

// TODO: if this file grows then it may needs to change 

function console_log($message) {
    echo str_replace("\\", "/", "<script>console.log(\"".$message."\"); </script> \n");
}

function URL($string) {
    return LOCALHOSTURI.$string;
}

function dump($var) {
    var_dump($var);
    echo("<br/><br/>");
}

function platformSlashes($path, $slash1='/', $slash2='\\') {
    if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
        $path = str_replace($slash1, $slash2, $path);
    }
    return $path;
}

function generateField($name, $sqlName, $type ="text", $value="") {
	echo"<tr>";
	echo"	<td>".$name.":</td>";
	echo"	<td><input type=\"".$type."\" name=\"".$sqlName."\" value=\"".$value."\"/></td>";
	echo"</tr>";
}