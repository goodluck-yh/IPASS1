<html>
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/list.css" type="text/css" rel="stylesheet" />
    <title>index</title>
</head>
<body>
<?php
session_start();
$_SESSION["flag"] = false;
require_once "menu.php";
require_once "includes/db.fun.inc.php";
$route_no = $_GET["flight"];
db_connect();
$seat = array();
for($i=1; $i<=5; $i++){
    if($_GET['seat'.$i]){
        $seat[] = $_GET['seat'.$i];
    }
}
//$seat = array($_GET['seat1'],$_GET['seat2'],$_GET['seat3'],$_GET['seat4'],$_GET['seat5']);
if(isset($_SESSION["route_no"]) == false){
    $route_no_arr = array($route_no);
    $_SESSION["route_no"] = $route_no_arr;
    $_SESSION["route".$route_no] = $seat;
}else{
    if(in_array($route_no, $_SESSION["route_no"])==false){
        $_SESSION["route_no"][] = $route_no;
        $_SESSION["route".$route_no] = $seat;
    }else{
        for($i=0; $i<count($seat); $i++){
            $_SESSION["route".$route_no][] = $seat[$i];
        }
    }
}
?>
<div id="mainbody">
    <form id="formid"  method = "get"  action = "">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>route_no</th>
                <th>from</th>
                <th>to</th>
                <th>price</th>
                <th>special requirement</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $route_no_arr = $_SESSION["route_no"];
            for($k = 0; $k < count($route_no_arr); $k++) {
                $route_no = $route_no_arr[$k];
                $seat =$_SESSION["route".$route_no];
                $sql="select * from flights where route_no = ".$route_no_arr[$k];
                $result = db_query($sql);
                $row = mysqli_fetch_object($result);
                $from = $row->from_city;
                $to = $row->to_city;
                $price = $row->price;
                for ($i = 0; $i < count($seat); $i++) {
                    if (count($seat[$i]) != 0) {
                        ?>
                        <tr>
                            <td><?php echo $route_no_arr[$k]; ?></td>
                            <td><?php echo $from; ?></td>
                            <td><?php echo $to; ?></td>
                            <td><?php echo $price; ?>
                            <td><?php
                                for ($j = 1; $j < count($seat[$i]); $j++) {
                                    echo $seat[$i][$j];
                                    if ($j != count($seat[$i]) - 1) {
                                        echo " & ";
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                        <?php

                    }
                }
            }
            ?>

            <input type="text" value="<?php echo $route_no;?>"  hidden="hidden" name="flight">
            </tbody>
        </table>
        <input type="button" class="btn btn-default button" onclick="bookmore();" value="Book more Flights">
        <input type="button" class="btn btn-default button" onclick="clearAll();" value="Clear all booked flights">
        <input type="button" class="btn btn-default button" onclick="" value="Proceed to Checkout">
    </form>
</div>
<?php mysqli_close($dbc);?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/list.js" type="text/javascript"></script>
</body>
</html>