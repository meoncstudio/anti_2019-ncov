<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    
    require 'util.php';

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

    $rst = $_REQUEST['rst'];

    SQL("INSERT INTO `sta`(`rst`) VALUES ('$rst')");

    echo '{"code": 0}';


?>