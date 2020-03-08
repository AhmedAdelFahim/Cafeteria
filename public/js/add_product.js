$(".add-category").click(function () {
    window.location.href = "AddCategory.php";
});


(function ($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var productName = $('.validate-input input[name="product_name"]');
    var price = $('.validate-input input[name="price"]');
    var category = $('.validate-input input[name="category"]');
    var productPicture = $('.validate-input input[name="Product_Picture"]');


    $('.validate-form').on('submit',function(event){
        var check = true;
        // event.preventDefault()
        if($(productName).val().trim().length === 0){
            showValidate(productName);
            check=false;
        }

        if (price === "") {
            showValidate(price);
            check=false;
        }
        if (category === "") {
            showValidate(category);
            check=false;
        }
       /* if (productPicture.val().trim().length === 0) {
            showValidate(productPicture);
            check=false;
        }*/

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
            hideValidate(this);
        });
    });

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }



})(jQuery);