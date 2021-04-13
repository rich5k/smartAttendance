// Updates the clock
function updateTime(){
    var d = new Date();
    $("#page-time").text(d.getHours()+":"+d.getMinutes()+":"+d.getSeconds() + (d.getHours()<12? 'AM' : 'PM'));

}

// Initializes the camera
function initCamera(){
    Webcam.set(
    {
        height: 350,
        width: 350,
        image_format: 'jpeg',
        jpeg_quality:90,
        flip_horiz: true
    });

    Webcam.attach("#camera");
}

$(document).ready(function(){
    // Calls the updateTime function every second to 
    // update the clock
    // console.log("This is a test: "+$("#disabledButton").attr("class"));
    setInterval(updateTime, 1000);

    $(".check").on("click", function(){
        initCamera();
    });

    // Handles the error events
    Webcam.on( 'error', function(err) {
        // Displays the file upload box if no camera is detected
        msg1="NotFoundError: Requested device not found";
        msg2="NotAllowedError: Permission denied";
        if(err.toString()==msg1){
                text="<div class='form-group'><label for='file-input'>Upload your image here</label><input type='file' accept='image/*' id='file-input'></div>";               
                $(".cam-group1").hide();
                $(".cam-group1a").html(text);
                $(".cam-group1a").toggle();
                $('#file-input').on('change', function(e){
                    $(".cam-group1a").hide();
                    $(".cam-group3").toggle();
                    setTimeout(function(){
                        $("#staticBackdrop").modal('toggle');
                        $(".cam-group3").hide();
                    }, 2000);
                });
        // Prompts user to change permissions settings if camera access is 
        // is denied  
        }else if(err.toString()==msg2){
            alert("You denied permission to access your camera. PLease go to your setiings to change the permissions the app has.");
        }
            
    });
    
    // Freezes th video stream to show a preview of the image taken
    // when the 
    $("#pic-snap").on("click", function(){
        Webcam.freeze();
        // Webcam.snap(function(data_url){
        //     captured_image= "<img src='"+data_url+"'/>";
        //     $("#capture-window").html(captured_image);
        // });
        $(this).hide();
        $(".cam-group2").show();
    });

    // Closes modal after picure has been taken
    $("#save-photo").click(function(){
        $(".cam-group1").hide();
        $(".cam-group2").hide();
        $(".cam-group3").show();
        setTimeout(function(){
            $("#staticBackdrop").modal('toggle');
            $(".cam-group1").show();
            $("#pic-snap").show();
            $(".cam-group3").hide();
        }, 2000);
    });
    $('#staticBackdrop').on('shown.bs.modal', function () {
        initCamera();
    })

    // Turns off webcam when modal closes
    $('#staticBackdrop').on('hidden.bs.modal', function (event) {
        Webcam.reset();
    });

    // Retakes the photo
    $("#retake-photo").click(function(){
        Webcam.unfreeze();
        $(".cam-group2").toggle();
        $("#pic-snap").toggle();
    });
});
