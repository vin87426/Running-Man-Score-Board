<?php

    function score_in($tn, $sc, $st)
    {
        include("sql_in.php");
        $freeze_check = $db->prepare("SELECT freeze FROM item");
        $freeze_check->execute();
        $freeze = ($freeze_check->fetch())[0];
        $freeze_check = null;
        if($freeze=="0") {
        $newlog = $db->prepare("INSERT INTO log(team,score,stage) VALUES ('$tn','$sc','$st')");
        $newlog->execute();
        $newlog = null;

        $newsc = $db->prepare("UPDATE team SET score=score+'$sc' WHERE num='$tn'");
        $newsc->execute();
        $newsc = null;
    }
}
?>