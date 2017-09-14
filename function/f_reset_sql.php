<?php
function reset_sql($team){
    include("sql_in.php");
    date_default_timezone_set("Asia/Taipei");
    $teamdel = $db->prepare("DELETE FROM team WHERE 1");
    $teamdel->execute();
    $teamdel = null;

    $logdel = $db->prepare("DELETE FROM log WHERE 1");
    $logdel->execute();
    $logdel = null;

    $itdel = $db->prepare("DELETE FROM item WHERE 1");
    $itdel->execute();
    $itdel = null;

    for ($x = 1; $x <= 8; $x++) {
        $mem = $team["t".$x];
        $newteam = $db->prepare("INSERT INTO team(num,mem_all,mem_cur) VALUES ('$x','$mem','$mem')");
        $newteam->execute();
    }
    $date = new DateTime(date('Y-m-d G:i:s'));
    if(isset($team['hr']) && $team['hr']!=null )$HR = $team['hr'];
    else $HR =0;
    if(isset($team['mi']) && $team['mi']!=null )$MI = $team['mi'];
    else $MI =0;
    $date->add(new DateInterval('PT'.$HR.'H'.$MI.'M'));
    $newteam = null;
    $timestamp = $date->format('Y-m-d G:i:s');
    $newit = $db->prepare("INSERT INTO item(sword,kop,starttime,gym,pig,freeze) VALUES (0,0,'$timestamp',0,4,0)");
    $newit->execute();
    $newit = null;
}
?>