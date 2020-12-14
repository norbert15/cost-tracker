$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

    if(localStorage.getItem("success")){
            $("#success-alert").removeAttr("hidden");
            localStorage.removeItem("success");
            setTimeout(() => {
                $("#success-alert").hide(1000);
            }, 2000);
    }

    if(localStorage.getItem("error")){
        $("#danger-alert").removeAttr("hidden");
        localStorage.removeItem("error");
        setTimeout(() => {
            $("#danger-alert").hide(1000);
        }, 2000);
    }

    $(".expendAdd").click(function(){
        const transportEx = $("#transportEx").val();
        const foodEx = $("#foodEx").val();
        const shoppingEX = $("#shoppingEX").val();
        const giftEx = $("#giftEx").val();
        const healthEx = $("#healthEx").val();
        const familyEx = $("#familyEx").val();
        const sportEx = $("#sportEx").val();
        


        $.post('addExp.php', {
            transportEx: transportEx,
            foodEx: foodEx,
            shoppingEX: shoppingEX,
            giftEx: giftEx,
            healthEx: healthEx,
            familyEx: familyEx,
            sportEx: sportEx
        },function(status){
            if(status === "faild"){
                localStorage.setItem("error", "sikertelen");
            }else{
                localStorage.setItem("success", "sikeres");
            }
        })
    })

    $(".add").click(function(){
        const income = $("#incomeAdd").val();
        const etc = $("#etcAdd").val();

        $.post('addIncome.php', {
            income: income,
            etc: etc
        },function(status){
             if(status === "faild"){
                localStorage.setItem("error", "sikertelen");
            }else{
                localStorage.setItem("success", "sikeres");
            }
        })
    })

})