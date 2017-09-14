<?php
    include("f_score_in.php");
    include("f_member.php");
    include("f_item.php");
    $kk=$_GET["king"];
    $oo=$_GET["out"];
    if($kk == 1){
        if($oo == 1){
            echo "Let's go baby !";
            kingofpig(1);
        }else{
            echo "回家囉~~";
            kingofpig(0);
        }
    }else{
        if($oo == 1){
            echo "Let's go baby !";
            $pig_num = pig_change(1);
        }else{
            echo "回家囉~~";
            $pig_num = pig_change(-1);
        }
    }
?>