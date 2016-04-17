<html>
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/yourbooking.css" type="text/css" rel="stylesheet" />
    <title>yourbooking</title>
</head>
<body>
<?php
session_start();
require_once "menu.php";
require_once "includes/db.fun.inc.php";
db_connect();
if($_GET["delete"]){
    $arr_no = array();
    for($i=0;$i<count($_GET["delete"]);$i++){
        $arr = explode("_",$_GET["delete"][$i]);
        unset($_SESSION["route".$arr[0]][$arr[1]]);
        if(count($_SESSION["route".$arr[0]])==0){
            foreach ($_SESSION["route_no"] as $k=>$v){
                if($v==$arr[0]){
                    unset($_SESSION["route_no"][$k]);
                }
            }
            $_SESSION["route_no"] = array_values($_SESSION["route_no"]);
        }else if(in_array($arr[0], $arr_no)==false){
            $arr_no[] = $arr[0];
        }
    }
    for($i=0;$i<count($arr_no);$i++){
        $_SESSION["route".$arr_no[$i]] = array_values($_SESSION["route".$arr_no[$i]]);
    }
}

if(isset($_SESSION["route_no"])==false || count($_SESSION["route_no"])==0){
    echo "<script>alert('You have no booking!');
location.href='search.php';
document.onmousedown=click;
</script>";
}else {

    ?>

    <div id="mainbody">
        <form id="formid" method="get" action="yourbooking.php">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>route_no</th>
                    <th>from</th>
                    <th>to</th>
                    <th>price</th>
                    <th>special requirement</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $route_no_arr = $_SESSION["route_no"];
                for ($k = 0; $k < count($route_no_arr); $k++) {
                    $route_no = $route_no_arr[$k];
                    $seat = $_SESSION["route" . $route_no];
                    $sql = "select * from flights where route_no = " . $route_no_arr[$k];
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
                                <td><input type="checkbox" value="<?php echo $route_no_arr[$k];?>_<?php echo $i;?>"  name="delete[]"></td>
                            </tr>
                            <?php

                        }
                    }
                }
                ?>

                </tbody>
            </table>
            <input type="button" class="btn btn-default button" onclick="delete_item();" value="delete">
        </form>
    </div>
    <?php
}
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/yourbooking.js" type="text/javascript"></script>
</body>
</html>