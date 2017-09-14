<?php
    include("f_npc.php");
    $iddd=$_GET["ididid"];
    $ss=$_GET["which_stage"];
    if($ss==1){
        $stage="reborn";
    }else if($ss==2){
        $stage="bowl";
    }else if($ss==3){
        $stage="noodle";
    }else if($ss==4){
        $stage="soup";
    }else if($ss==5){
        $stage="sadie";
    }else if($ss==6){
        $stage="xian";
    }else if($ss==7){
        $stage="hong";
    }else if($ss==8){
        $stage="exercise";
    }else if($ss==9){
        $stage="love";
    }else if($ss==10) {
        $stage = "pig";
    }
    npc_eventdel($iddd);
    $x=npc_search($stage);
    $myJSON = json_encode($x);
    echo $myJSON;
?>