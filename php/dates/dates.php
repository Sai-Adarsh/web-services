<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // collect value of input field
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $start_date = date_create($start_date);
        $end_date = date_create($end_date);

        $diff= date_diff($end_date, $start_date);
        $diff = $diff->format('%y years %m months %d days %h hours %i seconds');
        $result_json = array('difference' => $diff);
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

        // headers to tell that result is JSON
        header('Content-type: application/json');

        // send the result now
        if (empty($start_date) || empty($end_date)) {
            echo "Dates are incorrect syntax";
        } else {
            echo json_encode($result_json);
        }
    }
?>