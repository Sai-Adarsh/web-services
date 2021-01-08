<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    first array: <input type="text" name="array1"><br /><br />
    second array: <input type="text" name="array2"><br /><br />
    Operation:
    <select id="operation" name="operation">
        <option value="union">Union</option>
        <option value="intersection">Intersection</option>
        <option value="difference">Difference</option>
    </select>
    <input type="submit">
</form>

<?php
    include('union.php');
    include('intersection.php');
    include('difference.php');
    
    $array1 =  $_POST['array1'];
    $array1 = explode(', ', $array1);
    
    $array2 =  $_POST['array2'];
    $array2 = explode(', ', $array2);

    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['operation'] == 'union') {
            $result = unionFunc($array1, $array2);
            $result = implode(', ', $result);
            echo $result;
        }

        elseif ($_POST['operation'] == 'intersection') {
            $result = intersectionFunc($array1, $array2);
            $result = implode(', ', $result);
            echo $result;
        }

        elseif ($_POST['operation'] == 'difference') {
            $result = array_diff($array1, $array2);
            $result = implode(', ', $result);
            echo $result;
        }
    }    
?>

</body>
</html>