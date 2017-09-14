<?php
    include("f_item.php");
    $num=$_GET["num"];
    $state=$_GET["item"];
    if($state==1){
            sword_change($num);
    }else if($state==2){
            pig_change($num);
    }else if($state==3){
        if($num == 1){
            kingofpig(1);
        }else{
            kingofpig(0);
        }
    }
?>