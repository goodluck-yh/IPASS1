<html>
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <title>index</title>
</head>
<body>
<?php
session_start();
session_destroy();
require_once "menu.php";
echo "<script>alert('All bookings have been cleared!');
location.href='search.php';
document.onmousedown=click;
</script>";
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>