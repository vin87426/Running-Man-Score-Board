<?php
    include("f_score_in.php");
    include("f_member.php");
    $num=$_GET["which_team"];
    $ss=$_GET["which_stage"];
    if($num!=0){
        echo "Team number : ";
    }
    if($ss==1){
        $stage="reborn";
        $score=0;
    }else if($ss==2){
        $stage="bowl";
        $score=300;
    }else if($ss==3){
        $stage="noodle";
        $score=300;
    }else if($ss==4){
        $stage="soup";
        $score=300;
    }else if($ss==5){
        $stage="sadie";
        $score=3000;
    }else if($ss==6){
        $stage="xian";
        $score=2000;
    }else if($ss==7){
        $stage="hong";
        $score=2500;
    }else if($ss==8){
        $stage="exercise";
        $score=1000;
    }else if($ss==9){
        $stage="love";
        $score=10000;
    }else if($ss==10) {
        $stage = "pig";
        $score = 8000;
    }
    for($i=1; $i<=8; $i++){
        if($num % 10 == 1){
            if($score==0){
                $check=reborn($i,1);
                echo "\n";
                if($check){
                    score_in($i,$score,$stage);
                    echo $i." 復活成功\n";
                }else{
                    echo $i." 復活失敗\n";
                }
            }else{
                echo $i;
                echo " ";
                score_in($i,$score,$stage);
            }
        }
        $num /= 10;
    }
?>