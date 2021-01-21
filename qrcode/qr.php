<?php
    include ('qrcode.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = $_POST['data'];
        echo "here" . $data;
        $generator = new QRCode($data, "f=8&ms=r&md=0.8");
        $generator->output_image();
        $image = $generator->render_image();
        define('BASE_DIR', dirname(__FILE__).'/images/');
        $file = BASE_DIR.'images'.$filepath.'.png';
        imagepng($image,$file);
        imagedestroy($image);
        echo "QR saved";
    }
?>