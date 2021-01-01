$(document).ready(function(){
    //Hónap váltás

    //Elvesz a hónapból, igy az előző honapot fogja mutatni
    $("#previous-month").click(function(){
        const extract = -1;
        $.post('../controller/profile/functions/change-months-controller.php',{
            extract: extract
        })
    })

    //Hozzáad egyet a hónaphoz, igy a következőt fogja mutani
    $("#next-month").click(function(){
        const add = 1;
        $.post('../controller/profile/functions/change-months-controller.php',{
            add: add
        })
    })

})