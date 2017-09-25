<?php
function mem_dead($tn){
    include("sql_in.php");
    $freeze_check = $db->prepare("SELECT freeze FROM item");
    $freeze_check->execute();
    $freeze = ($freeze_check->fetch())[0];
    $freeze_check = null;
    if($freeze=="1")return false;
    $team_check = $db->prepare("SELECT mem_cur FROM team WHERE num='$tn'");
    $team_check->execute();
    $memnow = ($team_check->fetch())[0];
    $team_check=null;
    if($memnow-1<0)return false;
    $mdie = $db->prepare("UPDATE team SET mem_cur=mem_cur-1 WHERE num='$tn'");
    $mdie->execute();
    $mdie = null;
    return true;
}
function mem_add($tn){
    include("sql_in.php");
    $freeze_check = $db->prepare("SELECT freeze FROM item");
    $freeze_check->execute();
    $freeze = ($freeze_check->fetch())[0];
    $freeze_check = null;
    if($freeze=="1")return false;
    $team_check = $db->prepare("SELECT * FROM team WHERE num='$tn'");
    $team_check->execute();
    $team_status = $team_check->fetch();
    $memnow = $team_status["mem_cur"];
    $memall = $team_status["mem_all"];
    $team_check=null;
    if($memnow+1>$memall)return false;
    $mdie = $db->prepare("UPDATE team SET mem_cur=mem_cur+1 WHERE num='$tn'");
    $mdie->execute();
    $mdie = null;
    return true;
}
function reborn($tn,$val){
    include("sql_in.php");
    $freeze_check = $db->prepare("SELECT freeze FROM item");
    $freeze_check->execute();
    $freeze = ($freeze_check->fetch())[0];
    $freeze_check = null;
    if($freeze=="1")return false;
    $mnow = $db->prepare("SELECT * FROM team WHERE num='$tn'");
    $mnow->execute();
    $log = $mnow->fetch();
    if($log['mem_cur']+$val>$log['mem_all'])return false;
    $mreb = $db->prepare("UPDATE team SET reborn=reborn+$val,mem_cur=mem_cur+1 WHERE num='$tn'");
    $mreb->execute();
    $mreb = null;
    return 1;
}
function control_reborn($tn){
    include("sql_in.php");
    $freeze_check = $db->prepare("SELECT freeze FROM item");
    $freeze_check->execute();
    $freeze = ($freeze_check->fetch())[0];
    $freeze_check = null;
    if($freeze=="1")return 0;
    $mnow = $db->prepare("SELECT * FROM team WHERE num='$tn'");
    $mnow->execute();
    $log = $mnow->fetch();
    if($log['reborn']>$log['mem_all'] || $log['reborn']-1<0 )return 0;
    $mreb = $db->prepare("UPDATE team SET reborn=reborn - 1 WHERE num='$tn'");
    $mreb->execute();
    $mreb = null;
    return 1;
}
function mem_now($tn){
    include("sql_in.php");
    $mnow = $db->prepare("SELECT mem_cur FROM team WHERE num='$tn'");
    $mnow->execute();
    $log = $mnow->fetch();
    $mnow = null;
    return $log['mem_cur'];
}
function mem_all(){
    include("sql_in.php");
    $mnow = $db->prepare("SELECT * FROM team");
    $mnow->execute();
    $teamlist=array();
    while ($row = $mnow->fetch()) {
        $temp_team=array();
        $temp_team['num'] = $row['num'];
        $temp_team['mem_all'] = $row['mem_all'];
        $temp_team['mem_cur'] = $row['mem_cur'];
        $temp_team['score'] = $row['score'];
        $temp_team['reborn'] = $row['reborn'];
        $teamlist[$row['num']] = $temp_team;
    }
    $nst = null;
    $mnow = null;
    return $teamlist;
}
?>