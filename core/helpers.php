<?php

// TODO: if this file grows then it may needs to change 


// TODO: A config option for showing logs would be nice
function console_log($message)      {  console_messsage($message, "log"); }
function console_warning($message)  {  console_messsage($message, "warn"); }
function console_error($message)    {  console_messsage($message, "error"); }

function console_messsage($message, $type) { 
    if(CONSOLE_MESSAGES_ON && $_SERVER['REQUEST_METHOD'] === "GET") { 
        echo str_replace("\\", "/", "<script>console.$type(\"".str_replace(PHP_EOL, "", $message)."\"); </script> \n");
    }
}


function URL($string, $value) {
    return str_replace(":ID", $value, $string);  // TODO: Make this genaric for any :VARIABLE
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


function generateTableField($name, $sqlName, $type ="text", $value="") {
	echo'<tr>';
	echo'	<td>'.$name.':</td>';
	echo'	<td><input type="'.$type.'" name="'.$sqlName.'" value="'.$value.'"/></td>';
	echo'</tr>';
}


function generateFormField($name, $sqlName, $type='text', $value='') {
    echo '<div class="form-group">';
        echo '<input type="'.$type.'" name="'.$sqlName.'" class="form-control" placeholder="'.$name.'" value="'.$value.'"/></td>';
    echo '<div class="form-group">';
}


function good_hash($string) {
    $string = hash('md5', $string) . "random salt";
    $string = hash('sha256', $string) . "dit is ook een random salt";
    $string = hash('sha512', $string);
    return $string;
}