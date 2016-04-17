<html>
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/search.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    <title>search</title>
</head>
<body>
<?php
    require_once "menu.php";
?>
    <div class="searchdiv">
        <form class="form-inline" id="formid"  method = "get"  action = "search_result.php">
            <div class="form-group">
                <input type="text" class="form-control" id="from" placeholder="from" name="from">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="to" placeholder="to" name="to">
            </div>

            <input type="button" class="btn btn-default" onclick="formsubmit();" value="search">
        </form>
    </div>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/jquery_ui.js" type="text/javascript"></script>
    <script src="js/search.js" type="text/javascript"></script>
</body>
</html>