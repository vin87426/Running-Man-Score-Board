/**
 * Created by alan on 2017/6/30.
 */
var team=0;
var color_array = ["rgb(195,104,165)","rgb(243,127,139)","rgb(247,199,127)"," rgb(255,244,104)","rgb(154,242,129)","rgb(127,204,160)","rgb(128,208,245)","rgb(67,125,183)"];
var selected =["0","0","0","0","0","0","0","0","0"];
// select or not select a team
function select_team(checked){
    if(team == checked){
        document.getElementById(team).style.background = "#000000";
        team=0;
        console.log("team: 0");
        return;
    }
    team = checked;
    console.log("team: " + checked);
    for(var i=1;i<9;i++){
        if(i == checked){
            document.getElementById(i).style.background = color_array[checked-1];
        }
        else {
            document.getElementById(i).style.background = "#000000";
        }
    }
}
function kingkill() {
    if(team != "0"){
        var fun = function (_this) {
            get_sword();
            alert(_this.responseText);
        };
        get_php(fun,"../function/king_kill.php?which_team=" + team);
        document.getElementById(team).style.background = "#000000";
        team = 0;
    }
}
function pigkill(status) {
    if(team != "0"){
        var fun = function (_this) {
            alert(_this.responseText);
            get_sword();
        };
        get_php(fun,"../function/kill.php?which_team=" + team +"&kill=" + status);
        document.getElementById(team).style.background = "#000000";
        team = 0;
    }
}
function go_out(king) {
    var fun = function (_this) {
        alert(_this.responseText);
    };
    get_php(fun,"../function/gogo.php?king="+king+"&out=1");
}
function go_home(king) {
    var fun = function (_this) {
        alert(_this.responseText);
    };
    get_php(fun,"../function/gogo.php?king="+king+"&out=0");
}
function get_sword() {
    var fun = function (_this) {
        document.getElementById("swordcnt").innerText = _this.responseText;
        console.log("refreshing!");
    };
    get_php(fun,"../function/sword_number.php");
}

function minus_sword() {
    var fun = function (_this) {
        get_sword();
        alert(_this.responseText);
    };
    get_php(fun,"../function/king_kill.php?which_team=0");
}
get_sword();
setInterval(get_sword, 10000);