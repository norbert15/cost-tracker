$(document).ready(function(){
    //Hónap váltás

    //Elvesz a hónapból, igy az előző honapot fogja mutatni
    $("#previous-month").click(function(){
        const extract = -1;
        $.post('test.php',{
            extract: extract
        })
    })

    //Hozzáad egyet a hónaphoz, igy a következőt fogja mutani
    $("#next-month").click(function(){
        const add = 1;
        $.post('test.php',{
            add: add
        })
    })

})