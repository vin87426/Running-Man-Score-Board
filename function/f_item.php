<?php
function sword_change($n){
    include("sql_in.php");
    $freeze_check = $db->prepare("SELECT freeze FROM item");
    $freeze_check->execute();
    $freeze = ($freeze_check->fetch())[0];
    $freeze_check = null;
    if($freeze=="1")return 0;
    $swordn = $db->prepare("SELECT sword FROM item");
    $swordn->execute();
    $check = $swordn->fetch();
    $swordn = null;
    if($check['sword']+$n<=0){
        $swordc = $db->prepare("UPDATE item SET sword=0");
        $swordc->execute();
        $swordc = null;
        return 0;
    }else{
        $swordc = $db->prepare("UPDATE item SET sword=sword+$n");
        $swordc->execute();
        $swordc = null;
        return  $check['sword']+$n;
    }
}
//add n pigs to the number of pig
function pig_change($n){
    include("sql_in.php");
    $freeze_check = $db->prepare("SELECT freeze FROM item");
    $freeze_check->execute();
    $freeze = ($freeze_check->fetch())[0];
    $freeze_check = null;
    if($freeze=="1")return 0;
    $pign = $db->prepare("SELECT pig FROM item");
    $pign->execute();
    $check = $pign->fetch();
    $pign = null;
    if($check['pig']+$n<=0){
        $pigc = $db->prepare("UPDATE item SET pig=0");
        $pigc->execute();
        $pigc = null;
        return 0;
    }
    else{
        $pigc = $db->prepare("UPDATE item SET pig=pig+'$n'");
        $pigc->execute();
        $pigc = null;
        return $check['pig']+$n;
    }
}

// c = 1 or 0 (whether go out)
function kingofpig($c){
    include("sql_in.php");
    $freeze_check = $db->prepare("SELECT freeze FROM item");
    $freeze_check->execute();
    $freeze = ($freeze_check->fetch())[0];
    $freeze_check = null;
    if($freeze=="1")return;
    $kop = $db->prepare("UPDATE item SET kop='$c'");
    $kop->execute();
    $kop = null;
}
function king_pig_check(){
    include("sql_in.php");
    $kop_status = $db->prepare("SELECT kop FROM item");
    $kop_status->execute();
    $kop = $kop_status->fetch();
    $mreb = null;
    return $kop['kop'];
}
function start_time(){
    include("sql_in.php");
    $stime = $db->prepare("SELECT starttime FROM item");
    $stime->execute();
    $gettime = $stime->fetch();
    $stime = null;
    return $gettime['starttime'];
}

function ask_game_state(){
    include("sql_in.php");
    $stime = $db->prepare("SELECT * FROM item");
    $stime->execute();
    $gettime = $stime->fetch();
    $stime = null;
    return $gettime;
}

//change the status
function gym_change(){
    include("sql_in.php");
    $freeze_check = $db->prepare("SELECT freeze FROM item");
    $freeze_check->execute();
    $freeze = ($freeze_check->fetch())[0];
    $freeze_check = null;
    if($freeze=="1")return;
    $gymstate = gym_status();
    if($gymstate==1)$gymstate=0;
    else $gymstate = 1;
    $gym = $db->prepare("UPDATE item SET gym='$gymstate'");
    $gym->execute();
    $gym = null;
    return $gymstate;
}

//get the status
function gym_status(){
    include("sql_in.php");
    $sgym = $db->prepare("SELECT * FROM item");
    $sgym->execute();
    $gymdata = $sgym->fetch();
    $sgym = null;
    return $gymdata['gym'];
}
function set_freeze(){
    include("sql_in.php");
    $team = $db->prepare("UPDATE team SET score=score+mem_cur*2000 WHERE 1");
    $team->execute();
    $freeze = $db->prepare("UPDATE item SET freeze='1'");
    $freeze->execute();
}
function get_freeze(){
    include("sql_in.php");
    $freeze = $db->prepare("SELECT freeze FROM item");
    $freeze->execute();
    $freeze_state = $freeze->fetch();
    return $freeze_state['freeze'];
}
?>