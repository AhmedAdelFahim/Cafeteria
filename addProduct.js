let saveBtn = document.getElementById("save");
saveBtn.addEventListener('click', function (event) {
    if (validate() === true)
        event.preventDefault();

});
function validate() {
    let flag = false;
    let productName = document.getElementById("product_name").value;
    let price = document.getElementById("price").value;
    let category = document.getElementById("category").value;
    let productPicture = document.getElementById("product_picture").value;
    if (productName === "") {
        document.getElementById("errorProductName").innerHTML = "enter the product name";
        flag = true;
    }

    if (price === "") {
        document.getElementById("errorPrice").innerHTML = "enter the price";
        // console.log(price)
        flag = true;
    }
    if (category === "") {
        document.getElementById("errorCategory").innerHTML = "enter the category";
        flag = true;
    }
    if (productPicture === "") {
        document.getElementById("errorPicture").innerHTML = "enter a product picture ";
        flag = true;
    }
    return flag;
}

