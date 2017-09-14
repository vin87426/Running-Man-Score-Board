<?php
    include("sql_in.php");
    if(!isset($_GET['data']))exit;
    $data = $_GET['data'];
    $team = json_decode($data,true);
    date_default_timezone_set("Asia/Taipei");
    $date = new DateTime(date('Y-m-d G:i:s'));
    if(isset($team['hr']) && $team['hr']!=null )$HR = $team['hr'];
    else $HR =0;
    if(isset($team['mi']) && $team['mi']!=null )$MI = $team['mi'];
    else $MI =0;
    $date->add(new DateInterval('PT'.$HR.'H'.$MI.'M'));
    $newteam = null;
    $timestamp = $date->format('Y-m-d G:i:s');
    $newit = $db->prepare("UPDATE item SET starttime='$timestamp'");
    $newit->execute();
    $newit = null;

?>