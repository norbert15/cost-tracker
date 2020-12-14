$(document).ready(function(){
    if(localStorage.getItem("success")){
        $("#success-alert").removeAttr("hidden");
        localStorage.removeItem("success");
        setTimeout(() => {
            $("#success-alert").hide(1000);
        }, 2000);
    }

    //Üres-e a teljes név mező!!
    $("#register-name").blur(function(){
        const name = $("#register-name").val();
        if(name.length == 0){
            $(".name").addClass("is-invalid");
        }else{
            $(".name").removeClass("is-invalid");
            $(".name").addClass("is-valid");
        }
    })

    //Üres-e az email cim mező!!
    $("#register-email").blur(function(){
        const email = $("#register-email").val();
        if(email.length == 0){
            $(".email").addClass("is-invalid");
        }else{
            $(".email").removeClass("is-invalid");
        }
    })

    //Üres-e a jelszó mező!!
    $("#register-password").blur(function(){
        const password = $("#register-password").val();
        if(password.length == 0){
            $(".password").addClass("is-invalid");
        }else{
            $(".password").removeClass("is-invalid");
            $(".password").addClass("is-valid");
        } 
    })

    //Regisztráció!!!!!!
    $("#signup").click(function(){
        const name = $("#register-name").val();
        const email = $("#register-email").val();
        const password = $("#register-password").val();
        var done = true;

        //Ha üres-e a mező vissza jelzés küldés!
        if(name.length == 0){
            $(".name").addClass("is-invalid");
            done = false;
        }else{
            $(".name").removeClass("is-invalid");
            $(".name").addClass("is-valid");
            done = true;
        }

        //Ha üres-e a mező vissza jelzés küldés!
        if(email.length == 0){
            $(".email").addClass("is-invalid");
            done = false;
        }else{
            $(".email").removeClass("is-invalid");
            $(".email").addClass("is-valid");
            done = true;
        }

        //Ha üres-e a mező vissza jelzés küldés!
        if(password.length == 0){
            $(".password").addClass("is-invalid");
            done = false;
        }else if(password.length < 5){
            $(".password").addClass("is-invalid");
            $(".passwordError").html("A jelszónak legalább 5 karakterből kell állnia!");
            done = false;
        }else{
            $(".password").removeClass("is-invalid");
            $(".password").addClass("is-valid");
            done = true;
        }  

        if(done){
            $.ajax({
                type: "POST",
                url: "..\\registration\\result.php",
                data: {"name": name , "email": email, "password": password},
                dataType: 'JSON',
                success : function(feedback){
                    if(feedback.status === "error"){
                        $(".email").addClass("is-invalid");
                        $(".emailError").html(feedback.message);
                    }else if(feedback.status === "success"){
                        localStorage.setItem("success", "sikeres");
                        window.location = "..\\login\\login-page.php";
                    }
                }
            })
        }
    })

    //Bejelentkezés!!!!
    $("#login").click(function(){
        const email = $("#email").val();
        const password = $("#password").val();
        var done = true;

        if(email.length == 0){
            $(".email").addClass("is-invalid");
            done = false;
        }else{
            $(".email").removeClass("is-invalid");
            done = true;
        }

        if(password.length == 0){
            $(".password").addClass("is-invalid");
            done = false;
        }else{
            $(".password").removeClass("is-invalid");
            done = true;
        }  

        if(done){
            $.ajax({
                type: "POST",
                url: "..\\login\\result-login.php",
                data: {"email": email, "password": password},
                dataType: 'JSON',
                success : function(feedback){
                    if(feedback.status === "success"){
                        window.location = "..\\profile\\profile.php";
                    }else if(feedback.status === "error"){
                        $(".error").addClass("is-invalid");
                        $(".allError").html(feedback.message);
                    }
                }
            })
        }
    })
})