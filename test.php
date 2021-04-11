<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test file</title>
</head>
<body>
    <p id="timer"></p>

    <script>
        var item =document.getElementById("timer");
        // item.innerHTML="Yay! Js is working."
        var months = ["January", "February", "March", "April", "May", "June", "July",
        "August", "September", "October", "November", "December"];
        var now = new Date();
        console.log(now.getDay());
        //get class days

        var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        console.log(days);
         if (days[now.getDay()] == "Sunday"/*any of selected class's days*/){
            //get starting time of class
            var time1 = "16:00:00";//start time
            var date = months[now.getMonth()]+" "+ now.getDate()+", "+now.getFullYear();
            var start= new Date(date+" " +time1);
            
            //Get ending time of class
            var time2= "16:30:00";//end time
            console.log(new Date().getTime());
            
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
                        document.getElementById("timer").innerHTML = "LOCKED";
                    }
                }
                else{
                    document.getElementById("timer").innerHTML = "Not time for class";
                }
            }, 1000);
            
        }
    </script>
</body>
</html>