/*----------------- Mobile OTP Verification ------------------*/
function sendOTP() { 
    // alert("test");
    $(".error").html("").hide();
    
    var number = $("#mobile").val();
    var name = $("#firstname").val();
        // var input = {
        //     "mobile_number" : number,
        //     "name" : name,
        //     "action" : "send_otp"
        // };
        // $.ajax({
        //     url : 'controller.php',
        //     type : 'POST',
        //     data : input,
        //     success : function(response) {
        //         $(".container").html(response);
        //         console.log(response);
        //     }
        // });
    jQuery.ajax({
        url: "controller.php",
        type: "POST",
        data:{
            "action": "send_otp",
            "mobile_number":number,
            "name" : name         
        },
        success: function(data){
            alert("success");
            // if(data==1){
            //     alert("Game added to Favourites");
            //     window.location.href = 'index.php';
            // }
            // if(data==0){
            //     alert("Game Removed from the Favourites");
            //     // $('.game-1 .fav-icon').removeClass('fav_active');
            //     // $('.game-1 .fav-icon').addClass('no-active');
            //     window.location.href = 'index.php';
            // }
        }
    });
 
}
function verifyOTP() {
    $(".error").html("").hide();
    $(".success").html("").hide();
    var otp = $("#mobileOtp").val();
    var input = {
        "otp" : otp,
        "action" : "verify_otp"
    };
    if (otp.length == 4 && otp != null) {
        $.ajax({
            url : 'controller.php',
            type : 'POST',
            dataType : "json",
            data : input,
            success : function(response) {
                window.location = "app_index.php";
            },
            error : function() {
                alert("failed!!");
            }
        });
    } else {
        alert('You have entered wrong OTP.');
    }
}
