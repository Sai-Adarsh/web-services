<?php
    include('union.php');
    include('intersection.php');
    include('difference.php');

    $array1 =  $_POST['array1'];
    $array1 = explode(', ', $array1);
    
    $array2 =  $_POST['array2'];
    $array2 = explode(', ', $array2);

    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ($_POST['operation'] == 'union') {
            $result_json = array('result' => unionFunc($array1, $array2));
        }

        elseif ($_POST['operation'] == 'intersection') {
            $result_json = array('result' => intersectionFunc($array1, $array2));
        }

        elseif ($_POST['operation'] == 'difference') {
            $result_json = array('result' => diffFunc($array1, $array2));
        }

        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($result_json);
    }
?>