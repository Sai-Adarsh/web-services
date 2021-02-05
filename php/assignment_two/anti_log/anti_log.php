<?php
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

    // headers to tell that result is JSON
    header('Content-type: application/json');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $param_number = (float)$_POST['number'];
        $Alog=pow(10,$param_number);
        
        $list = array();
        array_push($list,$Alog );


        $Obj = new \stdClass();
        $Obj->title = "AntiLogarithm";
        $Obj->language = "PHP";
        $Obj->result = $list;
        $params = array();
        array_push($params, $param_number);
        $Obj->params = $params;
        $Obj->question = "AntiLogarithm";
        $Obj->status = 200;
        $output = new \stdClass();
        $output->data=(object)$Obj;
        $output->status=200;
        $JSON = json_encode($output);
        echo $"JSON";
    }
?>