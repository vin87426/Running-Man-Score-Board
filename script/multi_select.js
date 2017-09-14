/**
 * Created by alan on 2017/6/30.
 */
var color_array = ["rgb(195,104,165)","rgb(243,127,139)","rgb(247,199,127)"," rgb(255,244,104)","rgb(154,242,129)","rgb(127,204,160)","rgb(128,208,245)","rgb(67,125,183)"];
var selected =["0","0","0","0","0","0","0","0","0"];
// select or not select a team
function multi_select(checked){
    console.log(checked);
    // team has not been selected
    if(selected[checked] == "0") {
        document.getElementById(checked).style.background = color_array[checked-1];
        selected[checked] = "1";
    }
    // team has already been selected
    else {
        document.getElementById(checked).style.background = "#000000";
        selected[checked] = "0";
    }
}
function init_team() {
    for(var j=1;j<9;j++){
        document.getElementById(j).style.background = "#000000";
        selected[j] = "0";
    }
}
// send team data when click "OK!"
function add(stage) {
    //connect string
    var team="";
    for(var i=8;i>0;i--) team += selected[i];
    console.log("Team: " + team);
    //send stage 2 and team data
    get_php(function (_this) {
        if(team != "00000000") alert(_this.responseText);
    }, "../function/add_score.php?which_stage=" + stage + "&which_team=" + team );
    init_team();
};
function reborn(stage) {
    //connect string
    var team="";
    for(var i=8;i>0;i--) team += selected[i];
    console.log("Team: " + team);
    //send stage 2 and team data
    get_php(function (_this) {
        if(team != "00000000") alert(_this.responseText);
    }, "../function/reborn.php?which_team=" + team );
    init_team();
    refresh();
};