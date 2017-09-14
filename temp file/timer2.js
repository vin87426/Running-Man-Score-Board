/**
 * Created by alan on 2017/6/29.
 */

function paddingLeft(num){
    if(num >= 10) return num;
    else return "0" + num;
}

function get_time(){
    //Timer
    var countDownTime;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            countDownTime = new Date(this.responseText).getTime() + 7200000;
        }
    };
    xhttp.open("GET", "ask_end_time.php", true);
    xhttp.send();

     // Update the count down every 1 second
     var x = setInterval(function() {

         // Get todays date and time
         var now = new Date().getTime();

         // Find the distance between now an the count down date
         var distance = countDownTime - now;
         var stage_state = Math.floor(distance/(20*60*1000))%2;
         // Time calculations for days, hours, minutes and seconds
         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
         var seconds = Math.floor((distance % (1000 * 60)) / 1000);

         var stage_distance = ((Math.floor(distance/(20*60*1000)) + 1) * 20 *60 *1000) - distance;
         var stage_hours = Math.floor((stage_distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         var stage_minutes = Math.floor((stage_distance % (1000 * 60 * 60)) / (1000 * 60));
         var stage_seconds = Math.floor((stage_distance % (1000 * 60)) / 1000);
         var stage_time_text = paddingLeft( stage_hours ) + ":" + paddingLeft( stage_minutes ) + ":" + paddingLeft( stage_seconds );
         // Display the result in the element with id="demo"
         document.getElementById("timer").innerHTML = paddingLeft( hours ) + ":" + paddingLeft( minutes ) + ":" + paddingLeft( seconds );

         // If the count down is finished, write some text
         if (distance < 60000) {
             document.getElementById("timer").style.color = "#FF0000";
         }
         if (distance < 0) {
             clearInterval(x);
             document.getElementById("timer").innerHTML = "00:00:00";
         }
         if(stage_state == 0){
             document.getElementById("stage1").style.display = "inherit";
             document.getElementById("stage1").style.display = "inherit";
             document.getElementById("stage1").style.display = "inherit";
             document.getElementById("stage1").style.display = "inherit";
             document.getElementById("stage1").style.display = "inherit";
             document.getElementById("stage1").style.display = "inherit";

             document.getElementById("stage1").innerHTML = stage_time_text;
             document.getElementById("stage2").innerHTML = stage_time_text;
             document.getElementById("stage3").innerHTML = stage_time_text;
         }else{
             document.getElementById("stage1").style.display = "inherit";
             document.getElementById("stage1").style.display = "inherit";
             document.getElementById("stage1").style.display = "inherit";
             document.getElementById("stage1").style.display = "inherit";
             document.getElementById("stage1").style.display = "inherit";
             document.getElementById("stage1").style.display = "inherit";

             document.getElementById("stage4").innerHTML = stage_time_text;
             document.getElementById("stage5").innerHTML = stage_time_text;
             document.getElementById("stage6").innerHTML = stage_time_text;
         }
     }, 1000);
}
