<!doctype html>
<html lang="en">
<head>
    <title>Lab1</title>
</head>
<body>
<form method="post">
    <input type="text" name="processor" placeholder="Процессор">
    <input type="submit"><br>
</form>
<br>
<form method="post">
    <select name="software">
        <option value="Firefox">Firefox</option>
        <option value="Opera">Opera</option>
        <option value="Google Chrome">Google Chrome</option>
    </select>
    <input type="submit"><br>
</form>
<br>
<form method="post">
    <input hidden name="guarantee">
    <input type="submit" value="Перевірити гарантію"><br>
</form>
<br>
<?php
require_once __DIR__ . "/BaseDb.php";

$computer = new BaseDb();
if (isset($_POST["processor"])) {
    $computer->processor();
} elseif (isset($_POST["software"])) {
    $computer->software();
}elseif (isset($_POST["guarantee"])) {
   $computer->guarantee();
}
?>
</body>
</html>

