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

    $(".main").click(function () {
        select_by_index = $(this).attr("id");
    });

    $(".add-sum").click(function(){
        var sum = $(".one-sum:eq(" + select_by_index +")").val();
        var name = $(".one-name:eq(" + select_by_index + ")").val();

        $.post('add-income-or-expenditure.php', {
            sum: sum,
            name: name
        },function(status){
            console.log(status);
            if(status === "failed"){
                localStorage.setItem("error", "sikertelen");
            }else{
                localStorage.setItem("success", "sikeres");
                location.reload();
            }
        });
    });
})