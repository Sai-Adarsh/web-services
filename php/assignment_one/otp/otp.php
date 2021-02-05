<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = $_POST['n'];
        $generator = "1357902468"; 

        $result = ""; 
    
        for ($i = 1; $i <= $n; $i++) { 
            $result .= substr($generator, (rand()%(strlen($generator))), 1); 
        }
        $result_json = array('otp' => $result);
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');

        if (empty($n)) {
            echo "Incorrect number";
        } else {
            echo json_encode($result_json);
        }
    }
?>