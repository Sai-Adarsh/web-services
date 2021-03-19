<!DOCTYPE html>
<html lang="en">
<head>
	<title>Web Services</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
				<form class="login100-form validate-form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<span class="login100-form-title p-b-43">
						Lempel Ziv Welch
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Text is required">
						<input class="input100" type="text" name="message">
						<span class="label-input100">Lempel Ziv Welch message</span>
					</div>
					
                    <div class="wrap-input100 rs2">
						<input class="input100" disabled type="number" name="size">
						<span class="label-input100">Disabled</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Run
						</button>
					</div>
                    
                    <div class="text-center w-full p-t-23">
						<a href="#" class="txt1">
						<?php
							class LZW
							{
								function compress($unc) {
									$i;$c;$wc;
									$w = "";
									$dictionary = array();
									$result = array();
									$dictSize = 256;
									for ($i = 0; $i < 256; $i += 1) {
										$dictionary[chr($i)] = $i;
									}
									for ($i = 0; $i < strlen($unc); $i++) {
										$c = $unc[$i];
										$wc = $w.$c;
										if (array_key_exists($w.$c, $dictionary)) {
											$w = $w.$c;
										} else {
											array_push($result,$dictionary[$w]);
											$dictionary[$wc] = $dictSize++;
											$w = (string)$c;
										}
									}
									if ($w !== "") {
										array_push($result,$dictionary[$w]);
									}
									return implode(",",$result);
								}
							
								function decompress($com) {
									$com = explode(",",$com);
									$i;$w;$k;$result;
									$dictionary = array();
									$entry = "";
									$dictSize = 256;
									for ($i = 0; $i < 256; $i++) {
										$dictionary[$i] = chr($i);
									}
									$w = chr($com[0]);
									$result = $w;
									for ($i = 1; $i < count($com);$i++) {
										$k = $com[$i];
										if ($dictionary[$k]) {
											$entry = $dictionary[$k];
										} else {
											if ($k === $dictSize) {
												$entry = $w.$w[0];
											} else {
												return null;
											}
										}
										$result .= $entry;
										$dictionary[$dictSize++] = $w . $entry[0];
										$w = $entry;
									}
									return $result;
								}
							}
							if ($_SERVER["REQUEST_METHOD"] == "POST") {
							
								$msg = $_POST['message'];
								$lzw = new LZW();
								$com = $lzw->compress($msg);
								$dec = $lzw->decompress($com);
								$list = array();
								array_push($list,$com);  
								array_push($list,$dec);  
								$Obj = new \stdClass();
								$Obj->title = "Lempel_Ziv_Welch";
								$Obj->language = "PHP";
								$Obj->result = $list;
								$params = array();
								array_push($params, $msg);
								$Obj->params = $params;
								$Obj->question = "Lempel_Ziv_Welch";
								$Obj->status = 200;
								$output = new \stdClass();
								$output->data=(object)$Obj;
								$output->status=200;
								$JSON = json_encode($output);
								echo $JSON;
							}



							?>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>




</body>
</html>