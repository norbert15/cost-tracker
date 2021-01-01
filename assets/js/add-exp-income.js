$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

    if(window.location.pathname.match("profile/cost")){
        $("#expends").addClass("font-weight-bold");
    }else if(window.location.pathname.match("profile/revenues")){
        $("#incomes").addClass("font-weight-bold");
    }

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

    $(".main").click(function () {
        select_by_index = $(this).attr("id");
    });

    $(".add-sum").click(function(){
        var sum = $(".one-sum:eq(" + select_by_index +")").val();
        var name = $(".one-name:eq(" + select_by_index + ")").val();

        $.post('../controller/profile/functions/add-sum-controller.php', {
            sum: sum,
            name: name
        },function(status){
            if(status == "failed"){
                localStorage.setItem("error", "sikertelen");
            }else if(status == "success"){
                localStorage.setItem("success", "sikeres");
                location.reload();
            }else{
                localStorage.setItem("error", "sikertelen");
            }
        });
    });
})