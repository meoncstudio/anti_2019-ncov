<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

    $rst = $_REQUEST['rst']

    $json = file_get_contents("sta.json");
    
    $data = json_decode ($json, true);
    
    //解码成数组
    //给它赋予新的值
    $data["visitNumber"] = $data["visitNumber"] + 1;

    $data["results"][$rst] = $data["results"][$rst] + 1;

    //还原成.json文件
    $newdata = json_encode($data);
    //保存到原来的文件中
    file_put_contents("sta.json", $newdata);

?>