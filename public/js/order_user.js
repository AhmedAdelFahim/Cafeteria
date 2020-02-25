$("#from").datepicker({ dateFormat: 'yy-mm-dd' }).on("change", function() {
    console.log($(this).val());
    window.location.href=`ordersUser.php?from=${$("#from").val()}&to=${$("#to").val()}`
}).datepicker('setDate', new Date(getUrlVars()['from']));

$("#to").datepicker({ dateFormat: 'yy-mm-dd' }).on("change", function() {
    console.log($(this).val(),$("#from").val());
    window.location.href=`ordersUser.php?from=${$("#from").val()}&to=${$("#to").val()}`
}).datepicker('setDate', new Date(getUrlVars()['to']));

$(".cancel").click(function (e) {
    window.location.href=`cancelorder.php?row=${e.target.id}`
});

function getUrlVars() {
    var vars = {};
    let params = window.location.search.split('?')[1].split('&');
    for(let i = 0 ; i < params.length ; i++)
    {
        let key = params[i].split('=')[0] ;
        let value = decodeURIComponent(params[i].split('=')[1]);
        vars[key] = value;
    }
    return vars;
}

console.log(getUrlVars())





