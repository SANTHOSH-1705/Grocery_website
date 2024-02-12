<?php
session_start();
If(empty($_SESSION['id']));
header('Location:login.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="width=150px; margin:auto;height:500px;margin-top:300px">
    <?php
    include "config.php";
    session_destroy();
    echo '<meta http-equiv="refresh" content="2;url=login.php">';
    echo '<progress max=100><strong>60% done.</strong></progress><br>';
    echo '<span class="itext">logging out please wait!...</span>';
    ?>
</div>
</body>
</html>