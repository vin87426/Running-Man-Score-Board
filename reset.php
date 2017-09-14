<?php
include("function/f_reset_sql.php");
$data = $_GET['data'];
$data = json_decode($data,true);
reset_sql($data);
?>