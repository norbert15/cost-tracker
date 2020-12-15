$(document).ready(function(){

    $(".change-name").click(function(){
        var fullname = $("#fullname").val();

        if(fullname.length > 0){
            $.post('modify.php',
            {
                fullname: fullname,
            }, function(feedback){
                if(feedback == "faild-update"){
                    $("#error-name").removeAttr("hidden");
                    setTimeout(() => {
                        $("#error-name").hide(1000);
                    }, 2000);
                }else{
                    $("#success-name").removeAttr("hidden");
                    $("#fullname").removeClass("is-invalid");
                    setTimeout(() => {
                        $("#success-name").hide(1000);
                    }, 2000);
                }
            })
        }else{
            $("#fullname").addClass("is-invalid");
        }
    })

    $(".change-password").click(function(){
        var old_password = $("#old-password").val();
        var new_password = $("#new-password").val();
        var done = true;

        if(new_password.length < 5){
            $("#new-password").addClass("is-invalid");
            $(".error").html("A módosításhoz töltse ki az üres mezőket!");
            done = false;
        }else{
            $("#new-password").removeClass("is-invalid");
            $(".error").html("");
            done = true;
        }

        if(done){
            $.post('modify.php', {
                old_password: old_password,
                new_password: new_password
            }, function(feedback){
                if(feedback == "faild-old"){
                    $("#old-password").addClass("is-invalid");
                }else if(feedback == "faild-update"){
                    $("#danger-password").removeAttr("hidden");
                    setTimeout(() => {
                        $("#danger-password").hide(1000);
                    }, 2000);
                }else{
                    $("#old-password").removeClass("is-invalid");
                    $("#succes-password").removeClass("text-danger");
                    $("#success-password").removeAttr("hidden");
                    setTimeout(() => {
                        $("#success-password").hide(1000);
                    }, 2000);
                }
            })
        } 
    })

    $(".close-modify, .close").click(function(){
        $("#old-password").removeClass("is-invalid");
        $("#old-password").val("");
        $("#new-password").removeClass("is-invalid");
        $("#new-password").val("");
        $("#fullname").removeClass("is-invalid");
        $(".error").html("");
    })
})