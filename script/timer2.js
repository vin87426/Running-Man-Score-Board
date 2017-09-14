/**
 * Created by alan on 2017/6/29.
 */
var x =null;
var timer = null;
var countDownTime = null;
function paddingLeft(num){
    if(num >= 10) return num;
    else return "0" + num;
}

function get_time(){
    //Timer

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            countDownTime = new Date(this.responseText).getTime();
        }
    };
    xhttp.open("GET", "../function/ask_end_time.php", true);
    xhttp.send();

     // Update the count down every 1 second

}
function time_info(){
    // Get todays date and time
    if (countDownTime == null)get_time();
    var now = new Date().getTime();
    // Find the distance between now an the count down date
    var distance = countDownTime - now;
    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // Display the result in the element with id="demo"
    document.getElementById("timer").innerHTML = paddingLeft( hours ) + ":" + paddingLeft( minutes ) + ":" + paddingLeft( seconds );

    // If the count down is finished, write some text
    if (distance < 60000) {
        document.getElementById("timer").style.color = "#FF0000";
    }else{
        document.getElementById("timer").style.color = "#000000";
    }
    if (distance < 0) {
        document.getElementById("timer").innerHTML = "00:00:00";
        document.getElementById("final").style.display = "inherit";
    }else document.getElementById("final").style.display = "none";
    if(Math.floor(distance/1200000)%2==0)level_state=0;
    else level_state = 1;
    var level_minutes = Math.floor((distance-Math.floor(distance/1200000)*1200000) / (1000*60));
    var level_seconds = Math.floor((distance-Math.floor(distance/1200000)*1200000)% (1000 * 60) / (1000));
    level_time = paddingLeft(level_minutes) + " : " +paddingLeft(level_seconds);
    update_level();
}
setInterval(function () {
    get_time();
},10000);