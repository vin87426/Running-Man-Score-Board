<?php
    include("f_score_in.php");
    include("f_member.php");
    include("f_item.php");
    $num=$_GET["which_team"];
    $kkkk=$_GET["kill"];
    if($num!=0){
        if($kkkk=="kill") {
            if(mem_dead($num)){
                echo "kill team : ";
                echo $num;
            }else{
                echo "失敗!!! 這個小隊已經沒有人活著了!";
            }
        }else if($kkkk == "killed"){
            echo "killed by : ";
            echo $num;
            score_in($num,8000,"pig");
            $sword_num = sword_change(-1);
        }
    }
?>