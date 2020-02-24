$("#all-products").find(".card").click(function(e){
    let row = $("<tr></tr>");
    let nameTd = $("<td></td>").text($(this).find(".card-header:first-child").text())
    let numberTd = $("<td></td>");

    let priceTd = $("<td></td>");
    let priceStr=($(this).find(".card-body > h4")[0]).innerText;
    priceTd.append(`<h4 class="display-inline">${priceStr}</h4>`)
    priceTd.append("<h4 class='display-inline'>$</h4>");
    let removeBtnTd = $("<td></td>")
    let removeBtn = $("<button></button>").text("X");
    removeBtnTd.append(removeBtn);
    let numberInput = $("<input />").attr({
        type:"number",
        MIN:"1",
        STEP:"1",
        VALUE:"1",
        id:`${$(this).attr("id")}`
    });

    $("#total").text(Number($("#total").text()) + Number(priceStr));
    numberInput.change(function (e) {
        $("#total").text(Number($("#total").text()) - Number($(this).parent().parent().find("*")[3].firstChild.textContent));
        $(this).parent().parent().find("*")[3].firstChild.textContent=priceStr*$(this).parent().parent().find("*")[2].value
        $("#total").text(Number($("#total").text()) + Number($(this).parent().parent().find("*")[3].firstChild.textContent));
    })
    numberTd.append(numberInput);
    row.append(nameTd,numberTd,priceTd,removeBtnTd);
    $("#order-card-body").prepend(row);
    $(this).unbind("click");
});

let request;

$("#order-form").submit(function (event) {
    event.preventDefault();
    if (request) {
        request.abort();
    }

    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    let $inputs = $form.find("input");
    let products=[]
    for(let i=0;i<$inputs.length-1;++i){
        products.push({
            id:$inputs[i].id,
            value:$inputs[i].value
        });
    }

    $inputs.prop("disabled", true);
    let $textarea = $form.find("textarea");
    let $room = $form.find("select");
    // let $total = $("#total").text();
    request = $.ajax({
        url: "http://localhost/Cafeteria/insertOrder.php",
        type: "post",
        data:{products: JSON.stringify(products),
            notes:$textarea.val(),
            roomNo:$room.val(),
            total:$("#total").text()
        }
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        location.href = location.href
        console.log("Hooray, it worked!",response);

    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });
})