/**
 * Created by alan on 2017/6/29.
 */
function team(num,team_data){
    var mem = team_data['mem_cur']+"/"+team_data['mem_all'];
    document.getElementById(num+"mem").innerHTML = mem;
    document.getElementById(num+"score").innerHTML = team_data["score"];
    if(team_data['reborn']!=0)document.getElementById(num+'reborn').style.color = null;
    else document.getElementById(num+'reborn').style.color = null;
}
function get_all_timer(){
    //Timer
    var all_data;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var all_data = JSON.parse(this.responseText);
        }
    };
    xhttp.open("GET", "control_panel_info.php", true);
    xhttp.send();
    var gamestate = all_data[1];
    var npc_list = all_data[2];
    for(var i =1;i<=8;i++)team(i,all_data[0][i]);
    document.getElementById('sword').innerHTML = all_data[1]['sword'];
    document.getElementById('pig').innerHTML = all_data[1]['pig'];
    document.getElementById('kop').innerHTML = all_data[1]['kop'];

     // Update the count down every 1 second
     var x = setInterval(function() {
     }, 5000);
}
