$(document).ready(function(){

    $(".change-name").click(function(){
        var fullname = $("#fullname").val();
        var success_alert = document.getElementById("success-name");
        var error_alert = document.getElementById("error-name");

        if(fullname.length > 0){
            $.post('../controller/profile/functions/modify-controller.php',
            {
                fullname: fullname,
            }, function(feedback){
                if(feedback == "failed-update"){
                    $("#error-name").removeAttr("hidden");
                    setTimeout(() => {
                        error_alert.setAttribute("hidden", "");
                    }, 2000);
                }else if(feedback == "success"){
                    $("#success-name").removeAttr("hidden");
                    $("#fullname").removeClass("is-invalid");
                    setTimeout(() => {
                        success_alert.setAttribute("hidden", "");
                    }, 2000);
                }else{
                    $("#error-name").removeAttr("hidden");
                    setTimeout(() => {
                        error_alert.setAttribute("hidden", "");
                    }, 2000); 
                }
            })
        }else{
            $("#fullname").addClass("is-invalid");
        }
    });

    $(".change-password").click(function(){
        var old_password = $("#old-password").val();
        var new_password = $("#new-password").val();
        var new_password_confirm = $("#new-password-confirm").val();
        var success_alert = document.getElementById("success-password");
        var error_alert = document.getElementById("error-password");
        var done = 0;

        if(new_password.length < 5){
            $("#new-password").addClass("is-invalid");
            $(".error").html("A módosításhoz töltse ki az üres mezőket!");
        }else{
            $("#new-password").removeClass("is-invalid");
            $(".error").html("");
            done++;
        }

        if(new_password_confirm != new_password){
            $("#new-password-confirm").addClass("is-invalid");
        }else{
            $("#new-password-confirm").removeClass("is-invalid");
            done++;
        }

        if(done == 2){
            $.post('../controller/profile/functions/modify-controller.php', {
                old_password: old_password,
                new_password: new_password
            }, function(feedback){
                if(feedback == "failed-old"){
                    $("#old-password").addClass("is-invalid");
                }else if(feedback == "failed-update"){
                    $("#danger-password").removeAttr("hidden");
                    setTimeout(() => {
                        error_alert.setAttribute("hidden", "");
                    }, 2000);
                }else if(feedback == "success"){
                    $("#old-password").removeClass("is-invalid");
                    $("#succes-password").removeClass("text-danger");
                    $("#success-password").removeAttr("hidden");
                    setTimeout(() => {
                        success_alert.setAttribute("hidden", "");
                    }, 2000);
                }else{
                    $("#danger-password").removeAttr("hidden");
                    setTimeout(() => {
                        error_alert.setAttribute("hidden", "");
                    }, 2000);
                }
            });
        } 
    });

    $(".close-modify, .close").click(function(){
        $("#old-password").removeClass("is-invalid");
        $("#old-password").val("");
        $("#new-password").removeClass("is-invalid");
        $("#new-password").val("");
        $("#new-password-confirm").removeClass("is-invalid");
        $("#new-password-confirm").val("");
        $("#fullname").removeClass("is-invalid");
        $(".error").html("");
    });
})