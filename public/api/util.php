<?php


header("Content-Type:text/html;   charset=utf-8"); 

$mysql_server_name='207.148.29.164'; //mysql server name
$mysql_username='ncov'; //mysql username
$mysql_password='ncov2019'; //mysql password
$mysql_database='ncov'; //mysql database name


GLOBAL $conn;
$conn = mysqli_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting: ") ; //Connect to database

mysqli_query($GLOBALS['conn'], "set character set 'utf8'");
mysqli_query($GLOBALS['conn'], "set names 'utf8'"); 

mysqli_select_db($GLOBALS['conn'], $mysql_database); //Open database


function SQL($sql){
    
    $result = mysqli_query($GLOBALS['conn'], $sql);
    
    
    if(is_bool($result)){
        return $result;
    }
    
    $results = array();
    
    while ($row = mysqli_fetch_assoc($result)){
        $results[] = $row;
    }
    
    return $results;
    
}


?>