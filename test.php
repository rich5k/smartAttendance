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
    <p id="timerInfo"></p>
    <p id="rTimerInfo"></p>
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
         if (days[now.getDay()] == "Monday"/*any of selected class's days*/){
            //get starting time of class
            var time1 = "20:30:00";//start time
            var date = months[now.getMonth()]+" "+ now.getDate()+", "+now.getFullYear();
            var start= new Date(date+" " +time1);
            
            //Get ending time of class
            var time2= "21:00:00";//end time
            console.log(new Date().getTime());
            
            var countDownDate = new Date(date + " " +time2).getTime();
            const randomTimes= [];
            var sTimeMins = (Math.floor((start.getTime() % (1000 * 60* 60 * 24))/(1000*60 *60) )+1)*60 + Math.floor((start.getTime() % (1000 * 60 * 60)) / (1000 * 60))
            var nTimeMins = (Math.floor((new Date().getTime() % (1000 * 60* 60 * 24))/(1000*60 *60) )+1)*60 + Math.floor((new Date().getTime() % (1000 * 60 * 60)) / (1000 * 60))
            var eTimeMins = (Math.floor((countDownDate % (1000 * 60* 60 * 24))/(1000*60 *60) )+1)*60 + Math.floor((countDownDate % (1000 * 60 * 60)) / (1000 * 60))
            document.getElementById("timerInfo").innerHTML = eTimeMins-nTimeMins;
            var diff1 =nTimeMins - sTimeMins;
            var startCheck = sTimeMins+5;
            var endCheck = eTimeMins-5;
            var middleInterval= endCheck-startCheck;
            console.log(sTimeMins);
            console.log(startCheck);
            console.log(eTimeMins);
            console.log(endCheck);
            var openPeriod1 = nTimeMins-diff1;
            var diff2 =eTimeMins-nTimeMins;
            var openPeriod1 = nTimeMins-diff2;
            var numChecks= 5;
            var numRandomChecks= numChecks-2;
            if(randomTimes.length<numRandomChecks){
                for(let i = 1; i<=numRandomChecks; i++){
                    randomTimes.push(Math.round(Math.random()*middleInterval));
                }
                console.log(randomTimes);
                randomTimes.sort(function(a,b){return a-b})
                console.log(randomTimes);

            }
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
                if(diff1>=5){
                    document.getElementById("timerInfo").innerHTML = "Five mins have passed";
                }
                else if(openPeriod1>3){
                    document.getElementById("timerInfo").innerHTML = "Check in time closed";
                }
                else if(diff2<=5){
                    document.getElementById("timerInfo").innerHTML = "Five mins to end class";
                }
                else if(openPeriod2>3){
                    document.getElementById("timerInfo").innerHTML = "Check in time2 closed";
                }
                for(let i = 1; i<=numRandomChecks; i++){
                    if(nTimeMins>=(randomTimes[i]+sTimeMins) && nTimeMins<=(randomTimes[i]+sTimeMins+3)){
                        document.getElementById("rTimerInfo").innerHTML = `Random check ${i} has started`;
                    }
                }

            }, 1000);
            
        }
    </script>
</body>
</html>