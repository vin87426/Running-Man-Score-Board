<?php
function npc_search($stage)
{
    include("sql_in.php");
    $nst = $db->prepare("SELECT * FROM log WHERE stage='$stage'");
    $nst->execute();
    $log = array();
    $count = 0;
    while ($row = $nst->fetch()) {
        $log[$count] = array($row['id'], $row['team'], $row['ntime']);
        $count++;
    }
    $nst = null;
    return $log;
}
function npc_eventdel($tn)
{
    include("sql_in.php");
    $freeze_check = $db->prepare("SELECT freeze FROM item");
    $freeze_check->execute();
    $freeze = ($freeze_check->fetch())[0];
    $freeze_check = null;
    if($freeze=="1")return;
    $nst = $db->prepare("SELECT * FROM log WHERE id='$tn'");
    $nst->execute();
    $row = $nst->fetch();
    $tnum=$row['team'];
    $tsco=$row['score'];
    $stage=$row['stage'];
    if($stage=="reborn"){
        $chteam = $db->prepare("UPDATE team SET reborn=reborn-1 WHERE num='$tnum'");
        $chteam->execute();
        $chteam = null;
    }
    $chteam = $db->prepare("UPDATE team SET score=score-'$tsco' WHERE num='$tnum'");
    $chteam->execute();
    $chteam = null;
    $nst = null;

    $ndel = $db->prepare("DELETE FROM log WHERE id='$tn'");
    $ndel->execute();
    $ndel = null;
}
function npc_search_all()
{
    include("sql_in.php");
    $nst = $db->prepare("SELECT * FROM log");
    $nst->execute();
    $log = array();
    $count = 0;
    while ($row = $nst->fetch()) {
        $log[$count] = array($row['id'], $row['team'], $row['ntime'],$row['stage'],$row['score']);
        $count++;
    }
    $nst = null;
    return $log;
}
?>