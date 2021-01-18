<?php
    include('transpose.php');
    include('lower_diagonal.php');
    include('upper_diagonal.php');

    $str = $_POST['matrix'];

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ($_POST['operation'] == 'transpose') {
            $result_json = array('result' => transpose($str));
        }

        elseif ($_POST['operation'] == 'lower_diagonal') {
            $result_json = array('result' => lowerDiagonal($str));
        }

        elseif ($_POST['operation'] == 'upper_diagonal') {
            $result_json = array('result' => upperDiagonal($str));
        }

        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($result_json);
    }
?>