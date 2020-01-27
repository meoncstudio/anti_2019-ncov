<?php
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
 $json = file_get_contents("sta.json");
 
 $data = json_decode ($json, true);
 
 //解码成数组
 //给它赋予新的值

 $newdata = json_encode($data);

 echo $newdata;
?>