$(document).ready(function () {
    if (localStorage.getItem("success")) {
        $("#success-alert").removeAttr("hidden");
        localStorage.removeItem("success");
        setTimeout(() => {
            $("#success-alert").hide(1000);
        }, 2000);
    }

    //Üres-e a teljes név mező!!
    $("#register-name").blur(function () {
        const name = $("#register-name").val();
        if (name.length == 0) {
            $(".name").addClass("is-invalid");
        } else {
            $(".name").removeClass("is-invalid");
            $(".name").addClass("is-valid");
        }
    });

    //Üres-e az email cim mező!!
    $("#register-email").blur(function () {
        const email = $("#register-email").val();
        if (email.length == 0) {
            $(".email").addClass("is-invalid");
        } else {
            $(".email").removeClass("is-invalid");
        }
    });

    //Üres-e a jelszó mező!!
    $("#register-password").blur(function () {
        password = $("#register-password").val();
        if (password.length == 0) {
            $(".password").addClass("is-invalid");
        } else {
            $(".password").removeClass("is-invalid");
            $(".password").addClass("is-valid");
        }
    });

    //Üres-e a jelszó megerősítés mező!!
    $("#password-confirm").blur(function () {
        const password_confirm = $("#password-confirm").val();
        if (password_confirm.length == 0) {
            $("#password-confirm").addClass("is-invalid");
            $(".p-con").html("A mező kitöltése kötelező!");
        } else if (password_confirm != password) {
            $("#password-confirm").addClass("is-invalid");
            $(".p-con").html("A jelszavak nem egyeznek meg!");
        } else {
            $("#password-confirm").removeClass("is-invalid");
            $("#password-confirm").addClass("is-valid");
        }
    });

    //Regisztráció!!!!!!
    $("#signup").click(function () {
        const name = $("#register-name").val();
        const email = $("#register-email").val();
        const password = $("#register-password").val();
        const password_confirm = $("#password-confirm").val();
        var done = 0;

        if ($("#privacyStatement").is(":checked")) {
            $("#privacyStatement").removeClass("is-invalid");
            done++;
        } else {
            $("#privacyStatement").addClass("is-invalid");
            $(".ps").html("Az adatvédelmi nyilatkozat elfogadása kötelező!");
        }

        //Ha üres-e a mező vissza jelzés küldés!
        if (name.length == 0) {
            $(".name").addClass("is-invalid");
        } else {
            $(".name").removeClass("is-invalid");
            $(".name").addClass("is-valid");
            done++;
        }

        //Ha üres-e a mező vissza jelzés küldés!
        if (email.length == 0) {
            $(".email").addClass("is-invalid");
        } else {
            $(".email").removeClass("is-invalid");
            $(".email").addClass("is-valid");
            done++;
        }

        //Ha üres-e a mező vissza jelzés küldés!
        if (password.length == 0) {
            $(".password").addClass("is-invalid");
        } else if (password.length < 5) {
            $(".password").addClass("is-invalid");
            $(".passwordError").html(
                "A jelszónak legalább 5 karakterből kell állnia!"
            );
        } else {
            $(".password").removeClass("is-invalid");
            $(".password").addClass("is-valid");
            done++;
        }

        //Meg egyeznek-e a jelszavak!
        if (password_confirm.length == 0) {
            $("#password-confirm").addClass("is-invalid");
            $(".p-con").html("A mező kitöltése kötelező!");
        } else if (password_confirm != password) {
            $("#password-confirm").addClass("is-invalid");
            $(".p-con").html("A jelszavak nem egyeznek meg!");
        } else {
            $("#password-confirm").removeClass("is-invalid");
            $("#password-confirm").addClass("is-valid");
            done++;
        }

        if (done == 5) {
            $.ajax({
                type: "POST",
                url: "controller/register/register-controller.php",
                data: { name: name, email: email, password: password },
                dataType: "JSON",
                success: function (feedback) {
                    if (feedback.status === "error") {
                        $(".email").addClass("is-invalid");
                        $(".emailError").html(feedback.msg);
                    } else if (feedback.status === "success") {
                        localStorage.setItem("success", "sikeres");
                        window.location = "login";
                    }
                },
            });
        }
    });

    //Bejelentkezés!!!!
    $("#login").click(function () {
        const email = $("#email").val();
        const password = $("#password").val();
        var done = 0;

        if (email.length == 0) {
            $(".email").addClass("is-invalid");
        } else {
            $(".email").removeClass("is-invalid");
            done++;
        }

        if (password.length == 0) {
            $(".password").addClass("is-invalid");
        } else {
            $(".password").removeClass("is-invalid");
            done++;
        }

        if (done == 2) {
            $.ajax({
                type: "POST",
                url: "controller/login/login-controller.php",
                data: { email: email, password: password },
                dataType: "JSON",
                success: function (feedback) {
                    if (feedback.status) {
                        window.location = "profile";
                    } else if (feedback.error) {
                        $(".error").addClass("is-invalid");
                        $(".allError").html(feedback.message);
                    } else {
                        $("#danger-alert").removeAttr("hidden");
                        setTimeout(() => {
                            $("#danger-alert").hide(1000);
                        }, 2000);
                    }
                },
            });
        }
    });
});
