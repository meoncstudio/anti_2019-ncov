<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    
    require 'util.php';

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

    $rst = 0;
    @$rst = $_REQUEST['rst'];

    if($rst != 0){
        SQL("INSERT INTO `sta`(`rst`) VALUES ('$rst')");
    }

    $count = SQL("SELECT COUNT(*) AS `count` FROM `sta`;");

    echo '{"code": 0, "visit": ' . ($count[0]['count'] + 1390) . '}';


?>