
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
    var name = $('.validate-input input[name="name"]');
    var email = $('.validate-input input[name="email"]');
    var password = $('.validate-input input[name="pass"]');
    var confirmPassword = $('.validate-input input[name="cpass"]');
    var roomNo = $('.validate-input input[name="roomNo"]');
    var ext = $('.validate-input input[name="ext"]');
    var profilePicture = $('.validate-input input[name="profil"]');


    $('.validate-form').on('submit',function(event){
        var check = true;
        // event.preventDefault()
        if($(name).val().trim() == ''){
            showValidate(name);
            check=false;
        }


        if($(email).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            showValidate(email);
            check=false;
        }

        if(password.val().trim().length < 8)
        {
            showValidate(password);
            check=false;
        }

        if(password.val() !== confirmPassword.val())
        {
            showValidate(confirmPassword);
            check=false;
        }

        if(roomNo.val().trim().length === 0)
        {
            showValidate(roomNo);
            check=false;
        }
        if(ext.val().trim().length === 0)
        {
            showValidate(ext);
            check=false;
        }
        if(profilePicture.val().trim().length === 0)
        {
            showValidate(profilePicture);
            check=false;

        }

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