<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  OTP length: <input type="text" name="n"><br />
  <input type="submit">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = $_POST['n'];
        $generator = "1357902468"; 
        $result = ""; 
    
        for ($i = 1; $i <= $n; $i++) { 
            $result .= substr($generator, (rand()%(strlen($generator))), 1); 
        }
        if (empty($n)) {
            echo "Incorrect number";
        } else {
            echo json_encode($result);
        }
    }
?>

</body>
</html>