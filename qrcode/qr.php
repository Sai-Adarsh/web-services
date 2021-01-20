<?php
    include 'qrcode.php';

    $data = $_POST['data'];
    echo "here" . $data;
    $generator = new QRCode($data, "f=8&ms=r&md=0.8");
    
    /* Output directly to standard output. */
    $generator->output_image();
    
    /* Create bitmap image. */
    $image = $generator->render_image();
    define('BASE_DIR', dirname(__FILE__).'/images/');
	$file = BASE_DIR.'images'.$filepath.'.png';
	imagepng($image,$file);
	imagedestroy($image);
    echo "saved";
?>