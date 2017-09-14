<?php
    include("f_score_in.php");
    include("f_member.php");
    $num=$_GET["which_team"];
    for($i=1; $i<=8; $i++){
        if($num % 10 == 1){
            $check = control_reborn($i);
            if($check)echo $i."復活成功\n";
            else echo $i."復活失敗\n";
        }
        $num /= 10;
    }
?>