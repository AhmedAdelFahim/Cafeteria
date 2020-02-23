let saveBtn = document.getElementById("save") ;
saveBtn.addEventListener('click', function(event){
event.preventDefault() ;
validate() ;
}) ;
function validate()
{
let productName = document.getElementById("product_name").value ;
let price = document.getElementById("price").value ;
let  category = document.getElementById("category").value ;
let productPicture = document.getElementById("product_picture").value ;
    if(productName === "")
    {
        document.getElementById("errorProductName").innerHTML="enter the product name" ;
    }

    if(price === "")
    {
        document.getElementById("errorPrice").innerHTML="enter the price" ;
    }
    if(category === "")
    {
        document.getElementById("errorCategory").innerHTML="enter the category" ;
    }
    if(productPicture === "")
    {
        document.getElementById("errorPicture").innerHTML="enter a product picture " ;

    }
}
 
