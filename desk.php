<?php
/**
 * Created by PhpStorm.
 * User: ASUS4-5
 * Date: 2017/6/27
 * Time: 上午 11:00
 */
include("function/sql_in.php");
$freeze_check = $db->prepare("SELECT freeze FROM item");
$freeze_check->execute();
$freeze = $freeze_check->fetch();
$freeze_check = null;
echo $freeze[0];
?>