<?php
//require_once "db_settings.inc";

/*define("HOST", "rerun.it.uts.edu.au");
define("USERNAME","potiro");
define("PASSWORD","pcXZb(kL");*/
define("HOST", "127.0.0.1");
define("USERNAME","root");
define("PASSWORD","");
$dbc;
$result;
function db_connect(){
    global $dbc;
    $dbc = new mysqli(HOST,USERNAME,PASSWORD);
    if(mysqli_connect_errno()) {
        echo "Connect Failed";
        exit;
    }
    $dbc->select_db("poti") or die("fail to select db");
}

function db_query($sql){
    global $result;
    global $dbc;
    $result = $dbc->query($sql);
    return $result;
}
?>