<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Text : <input type="text" name="data"><br />
    <input type="submit">
</form>

<?php
    include ('qrcode.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = $_POST['data'];
        $options = "f=8&ms=r&md=0.8";
        $generator = new QRCode($data, $options);
        $image = $generator->render_image();
        define('BASE_DIR', dirname(__FILE__).'/images/');
        $file = BASE_DIR . 'images' . '.png';
        imagepng($image,$file);
        imagedestroy($image);
        echo "QR saved";
    }
?>

</body>
</html>