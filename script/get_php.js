/**
 * Created by alan on 2017/6/30.
 */
function get_php(do_func, php) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            do_func(this);
        }
    };
    xhttp.open("GET", php , true);
    xhttp.send();
}