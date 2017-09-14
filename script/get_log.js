function get_log(id,stage) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var text ="";
            myObj = JSON.parse(this.responseText);
            for(var entry in myObj){
                var idid="'d" + entry + "'";
                //console.log("idid:" + idid);
                text = '<section class="score" id=' + idid + ' value="0" onclick="sel_item(' + idid + ')">Team: '+ myObj[entry][1] + '  Time: ' + myObj[entry][2].split(" ")[1].split(".")[0] + '</section>' + text;
            }
            document.getElementById(id).innerHTML = text;
        }
    };
    xmlhttp.open("GET", "../function/list.php?which_stage=" + stage, true);
    xmlhttp.send();
}
var del_item = null;
function sel_item(checked) {
    if(del_item == checked) {
        document.getElementById(del_item).style.background = "white";
        del_item = null;
        return;
    }
    del_item = checked;
    console.log("selected: " + myObj[del_item.slice(1)][0]);
    for(var entry in myObj) {
        var idid="d" + entry;
        //console.log("idid: " + idid +"checked: " + checked);
        if(idid == checked) {
            //console.log("match" + idid);
            document.getElementById(idid).style.background = "#d0d0d0";
        }
        else {
            //console.log("mismatch" + idid);
            document.getElementById(idid).style.background = "white";
        }
    }
}
function del(id,stage){
    if(del_item != null){
        document.getElementById(id).innerHTML = "";
        get_php(function (_this) {
            get_log(id,stage);
        },"../function/delete_score.php?which_stage=2&ididid=" + myObj[del_item.slice(1)][0]);
        console.log("delete: " + myObj[del_item.slice(1)][0]);
        del_item = null;
    }
}