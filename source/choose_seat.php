<html>
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/choose_seat.css" type="text/css" rel="stylesheet" />
    <title>index</title>
</head>
<body>
<?php
    require_once "menu.php";
    require_once "includes/db.fun.inc.php";
    $route_no = $_GET["flight"];
    //$route_no = 1;
    db_connect();
    $sql="select * from flights where route_no = ".$route_no;
    $result = db_query($sql);
    $row = mysqli_fetch_object($result);
    $from = $row->from_city;
    $to = $row->to_city;
?>

<div id="mainbody">
    <form id="formid"  method = "get"  action = "list.php">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>from</th>
                <th>to</th>
                <th>select</th>
                <th>child</th>
                <th>Wheelchair</th>
                <th>Special Diet</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $from;?></td>
                    <td><?php echo $to;?></td>
                    <td><input type="checkbox" id="seat1" value="seat1" class="seat" name="seat1[]">  </td>
                    <td><input type="checkbox" id="child1" value="child" name="seat1[]" disabled="disabled">  </td>
                    <td><input type="checkbox" id="wheelchair1" value="wheelchair" name="seat1[]" disabled="disabled"> </td>
                    <td><input type="checkbox" id="diet1" value="special diet" name="seat1[]" disabled="disabled"> </td>
                </tr>
                <tr>
                    <td><?php echo $from;?></td>
                    <td><?php echo $to;?></td>
                    <td><input type="checkbox" id="seat2" value="seat2" class="seat" name="seat2[]">  </td>
                    <td><input type="checkbox" id="child2" value="child" disabled="disabled" name="seat2[]">  </td>
                    <td><input type="checkbox" id="wheelchair2" value="wheelchair" disabled="disabled" name="seat2[]"> </td>
                    <td><input type="checkbox" id="diet2" value="special diet" disabled="disabled" name="seat2[]"> </td>
                </tr>
                <tr>
                    <td><?php echo $from;?></td>
                    <td><?php echo $to;?></td>
                    <td><input type="checkbox" id="seat3" value="seat3" class="seat" name="seat3[]">  </td>
                    <td><input type="checkbox" id="child3" value="child" disabled="disabled" name="seat3[]">  </td>
                    <td><input type="checkbox" id="wheelchair3" value="wheelchair" disabled="disabled" name="seat3[]"> </td>
                    <td><input type="checkbox" id="diet3" value="special diet" disabled="disabled" name="seat3[]"> </td>
                </tr>
                <tr>
                    <td><?php echo $from;?></td>
                    <td><?php echo $to;?></td>
                    <td><input type="checkbox" id="seat4" value="seat4" class="seat" name="seat4[]">  </td>
                    <td><input type="checkbox" id="child4" value="child" disabled="disabled" name="seat4[]">  </td>
                    <td><input type="checkbox" id="wheelchair4" value="wheelchair" disabled="disabled" name="seat4[]"> </td>
                    <td><input type="checkbox" id="diet4" value="special diet" disabled="disabled" name="seat4[]"> </td>
                </tr>
                <tr>
                    <td><?php echo $from;?></td>
                    <td><?php echo $to;?></td>
                    <td><input type="checkbox" id="seat5" value="seat5" class="seat" name="seat5[]">  </td>
                    <td><input type="checkbox" id="child5" value="child" disabled="disabled" name="seat5[]">  </td>
                    <td><input type="checkbox" id="wheelchair5" value="wheelchair" disabled="disabled" name="seat5[]"> </td>
                    <td><input type="checkbox" id="diet5" value="special diet" disabled="disabled" name="seat5[]"> </td>
                </tr>
                <input type="text" value="<?php echo $route_no;?>"  hidden="hidden" name="flight">
            </tbody>
        </table>
        <div id="info">The total number of seats is:&nbsp&nbsp&nbsp<span id="number">0</span></div>
        <input type="button" class="btn btn-default button" onclick="back();" value="<  back">
        <input type="button" class="btn btn-default button" onclick="book();" value="add to booking">
    </form>
</div>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
v<script src="js/choose_seat.js" type="text/javascript"></script>
</body>
</html>