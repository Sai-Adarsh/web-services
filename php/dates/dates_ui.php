<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  start_date: <input type="text" name="start_date"><br />
  end_date: <input type="text" name="end_date">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $start_date = date_create($start_date);
    $end_date = date_create($end_date);
    $diff= date_diff($end_date, $start_date);
    $diff = $diff->format('%R %y years %m months %d days %h hours %i seconds');
    // send the result now
    if (empty($start_date) || empty($end_date)) {
        echo "Dates are incorrect syntax";
    } else {
        echo $diff;
    }
}
?>

</body>
</html>