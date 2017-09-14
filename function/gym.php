<?php
    include "f_item.php";
    $cc=$_GET["change"];
    if($cc == 1){
        gym_change();
    }
    echo gym_status();
?>