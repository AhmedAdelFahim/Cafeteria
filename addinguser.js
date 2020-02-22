let saveBtn = document.getElementById("Save") ;
saveBtn.addEventListener('click', function(event){
event.preventDefault() ;
validate() ;
}) ;
function validate()
{
let userName = document.getElementById("name").value ;
let Email = document.getElementById("email").value ;
let Password = document.getElementById("password").value ;
let confirmPass = document.getElementById("cPassword").value ;
let roomNumber = document.getElementById("room_No").value ;
let EXT = document.getElementById("Ext").value ;
let profilePic = document.getElementById("Profile").value ;
    if(userName === "")
    {
        document.getElementById("errorName").innerHTML="enter your name" ;
    }

    if(Email == "")
    {
        document.getElementById("errorEmail").innerHTML="you must enter email" ;
    }
    else
    {
        let checkEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(Email);
        if (!checkEmail)
        {
            document.getElementById("errorEmail").innerHTML="invalid email" ;
        }
    }
    if(Password === "")
    {
        document.getElementById("errorPass").innerHTML="you must enter password" ;
    }
    else
    {
        let Password = document.getElementById("password").value ;
        if( Password.length < 8 )
        {
            document.getElementById("errorPass").innerHTML="your password must greater than or equle to 8 char." ;
        }
        let checkUnderScore = /[\'^£$%&*()}{@#~?><>,|=+¬-]/.test(Password) ;
        if(checkUnderScore)
        {
            document.getElementById("errorPass").innerHTML="your password contains only underScore" ;
        }
        let checkUpper = /[A-Z]/.test(Password)
        if(checkUpper)
        {
            document.getElementById("errorPass").innerHTML="your passwordcan't contain upper case" ;
        }
    }
    if(confirmPass === "")
    {
        document.getElementById("errorCpass").innerHTML="you must enter confirm password" ;
    }
    else
    {
        if(confirmPass !== Password)
        {
            document.getElementById("errorCpass").innerHTML=" passwords aren't match!" ;
        }
    }
    if(roomNumber === "")
    {
        document.getElementById("errorRoom").innerHTML="you must enter your room number" ;
    }
    if(EXT === "")
    {
        document.getElementById("errorExt").innerHTML="you must enter ext" ;
    }
    if(profilePic === "")
    {
        document.getElementById("errorPic").innerHTML="you must enter your picture " ;

    }
}
 
