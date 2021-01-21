<?php
	session_start(); 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$data = $_POST['data'];
		$captcha = $data; 
		$_SESSION["captcha"] = $captcha; 
		$im = imagecreatetruecolor(50, 24); 
		$bg = imagecolorallocate($im, 22, 86, 165); 
		$fg = imagecolorallocate($im, 255, 255, 255); 
		imagefill($im, 0, 0, $bg); 
		imagestring($im, rand(1, 7), rand(1, 7), rand(1, 7), $captcha, $fg); 
		header("Cache-Control: no-store, no-cache, must-revalidate");  
		define('BASE_DIR', dirname(__FILE__).'/images/');
		$file = BASE_DIR . 'images' . '.png';
		imagepng($im,$file);
		imagedestroy($im);
		echo "Captcha saved";
	}
?> 
