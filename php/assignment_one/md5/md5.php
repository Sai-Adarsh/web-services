<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $string = $_POST['string'];
        echo md5($string);
    }
?>