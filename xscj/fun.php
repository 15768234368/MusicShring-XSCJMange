<?php
    $db = mysqli_connect('localhost','root','zhang09820');

    if(!$db){
        die("connect error: ".mysqli_error($db));
    }
    
	mysqli_select_db($db, 'pxscj');   
	mysqli_set_charset($db, 'utf8');   
?>