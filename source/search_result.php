<html>
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/search_result.css" type="text/css" rel="stylesheet" />
    <title>index</title>
</head>
<body>
<?php
    require_once "menu.php";
    require_once "includes/db.fun.inc.php";
    db_connect();
    $sql="select * from flights where";
    if($_GET["from"] != null){
        $from = "'".($_GET["from"])."'";
        $sql=$sql." from_city = ".$from;
    }
    if($_GET["to"] != null){
        $to = "'".($_GET["to"])."'";
        if($_GET["from"] != null){
            $sql=$sql." and to_city = ".$to;
        }else{
            $sql=$sql." to_city = ".$to;
        }
    }
    $result = db_query($sql);
?>
    <div id="mainbody">
        <form id="formid"  method = "get"  action = "choose_seat.php">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>from</th>
                    <th>to</th>
                    <th>select</th>
                </tr>
                </thead>
                <tbody>
<?php
    while($row = mysqli_fetch_object($result)){
?>
                <tr>
                    <td><?php echo $row->from_city;?></td>
                    <td><?php echo $row->to_city;?></td>
                    <td><input type="radio" name="flight" id="option<?php echo $row->route_no;?>" value="<?php echo $row->route_no;?>"> </td>
                 </tr>
<?php
    //echo $row->route_no;
    //$dbc->close();
}
?>
                </tbody>
            </table>
            <input type="button" class="btn btn-default button" onclick="back();" value="<new search">
            <input type="button" class="btn btn-default button" onclick="book();" value="booking">
        </form>
    </div>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/search_result.js" type="text/javascript"></script>
</body>
</html>