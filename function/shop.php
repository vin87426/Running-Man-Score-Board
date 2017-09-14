<?php
    include("f_item.php");
    $num=$_GET["buy"];
    if(sword_change($num)<0){
        sword_change(1);
    }
?>