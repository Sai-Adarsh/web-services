<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Text: <input type="text" name="text"><br /><br />
    Size: <input type="number" name="size"><br /><br />
    Code Type:
    <select id="codetype" name="codetype">
        <option value="codabar">codabar</option>
        <option value="code128">code128</option>
        <option value="code39">code39</option>
        <option value="code25">code25</option>
    </select>
    <input type="submit">
</form>

<?php
    include ('ui_func.php');
    $filepath = (isset($_POST["filepath"])?$_POST["filepath"]:"");
    $text = (isset($_POST["text"])?$_POST["text"]:"0");
    $size = (isset($_POST["size"])?$_POST["size"]:"20");
    $orientation = (isset($_POST["orientation"])?$_POST["orientation"]:"horizontal");
    $code_type = (isset($_POST["codetype"])?$_POST["codetype"]:"code128");
    $print = (isset($_POST["print"])&&$_POST["print"]=='true'?true:false);
    $sizefactor = (isset($_POST["sizefactor"])?$_POST["sizefactor"]:"1");

    if (empty($text) != 1 && empty($size) != 1) {
        echo barcode( $filepath, $text, $size, $orientation, $code_type, $print, $sizefactor );
    }
    // This function call can be copied into your project and can be made from anywhere in your code
?>

</body>
</html>