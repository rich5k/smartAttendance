var months = ["January", "February", "March", "April", "May", "June", "July",
 "August", "September", "October", "November", "December"];
var now = new Date();

//get class days

var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
if (days[now.getDay()] == "Saturday"/*any of selected class's days*/){
    //get starting time of class
    var time1 = "00:54:00";//start time
    var date = months[now.getMonth()]+" "+ now.getDate()+", "+now.getFullYear();
    var start= new Date(date+" " +time1);
    
    //Get ending time of class
    var time2= "01:00:00";//end time
    
    var countDownDate = new Date(date + " " +time2).getTime();
    var x = setInterval(function() {
        if(new Date().getTime()>=start.getTime() ){
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("timer").innerHTML = hours + ":"
            + minutes + ":" + seconds;
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "TIME UP!!!";
            }
        }
    }, 1000);
    
}