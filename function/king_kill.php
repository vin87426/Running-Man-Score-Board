<?php
    include("f_score_in.php");
    include("f_member.php");
    include("f_item.php");
    $num=$_GET["which_team"];
    if($num!=0){
        if(king_pig_check()==0)echo "你還沒出動喔!!";
        else{
            if(mem_dead($num)){
                echo "kill team : ";
                echo $num;
            }else{
                echo "失敗!!! 這個小隊已經沒有人活著了!";
            }
        }
    }else{
        $sword_num = sword_change(-1);
        if($sword_num == 0){
            echo "場上沒有劍@@";
        }else{
            echo "剩餘";
            echo $sword_num;
            echo "隻劍";
        }
    }
?>