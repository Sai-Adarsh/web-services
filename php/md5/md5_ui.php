<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  String: <input type="text" name="string"><br />
  <input type="submit">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $string = $_POST['string'];
        echo md5($string);
    }
?>

</body>
</html>