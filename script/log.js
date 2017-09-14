var log_open = false;
var del_item = null;
function get_log(id,stage) {
    get_php(function (_this) {
        var text ="";
        myObj = JSON.parse(_this.responseText);
        for(var entry in myObj){
            var idid="'d" + entry + "'";
            //console.log("idid:" + idid);
            text = '<section style="cursor: pointer;" class="score" id=' + idid + ' value="0" onclick="sel_item(' + idid + ')">Team: '+ myObj[entry][1] + '  Time: ' + myObj[entry][2].split(" ")[1].split(".")[0] + '</section>' + text;
        }
        document.getElementById(id).innerHTML = text;
    },"../function/list.php?which_stage=" + stage)
}
function change_page(id,stage) { //switch between main panel and modify panel
    init_team();
    if(log_open == false){
        if(stage == "8"){
            document.getElementById("switch").style.display = "none";
        }
        document.getElementById("main").style.display = "none";
        document.getElementById("modify").style.display = "block";
        document.getElementById("but_ok").style.display = "none";
        document.getElementById("but_del").style.display = "inline-block";
        document.getElementById("log").style.display = "inherit";
        document.getElementById("change").innerText="Back";
        get_log(id,stage);
        log_open = true;
    }
    else{
        if(stage == "8"){
            document.getElementById("switch").style.display = "block";
        }
        document.getElementById("main").style.display = "block";
        document.getElementById("modify").style.display = "none";
        document.getElementById("but_del").style.display = "none";
        document.getElementById("but_ok").style.display = "inline-block";
        document.getElementById("change").innerText="Edit";
        document.getElementById("log").innerHTML = "";
        log_open = false;
    }
}
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