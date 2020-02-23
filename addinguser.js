console.log("AAA");
let saveBtn = document.getElementById("Save") ;

saveBtn.addEventListener('click', function(event){
    let f = validate();
    console.log(f);
    if(f=== true)
    {
        event.preventDefault() ;
    }
});

function validate()
{
    
let userName = document.getElementById("name").value ;
let Email = document.getElementById("email").value ;
let Password = document.getElementById("password").value ;
let confirmPass = document.getElementById("cPassword").value ;
let roomNumber = document.getElementById("room_No").value ;
let EXT = document.getElementById("Ext").value ;
let profilePic = document.getElementById("Profile").value ;
    let flag=false;
    console.log(userName.trim().length);
    if(userName.trim().length === 0)
    {
        document.getElementById("errorName").innerHTML="enter your name" ;
        console.log(flag,1);
        flag = true ;
    }

    if(Email.trim().length === 0)
    {
        document.getElementById("errorEmail").innerHTML="you must enter email" ;
        console.log(flag,2);
        flag = true ;
    }
    else
    {
        let checkEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(Email);
        if (!checkEmail)
        {
            document.getElementById("errorEmail").innerHTML="invalid email" ;
            console.log(flag,3);
            flag = true ;
        }
    }
    if(Password.trim().length === 0)
    {
        document.getElementById("errorPass").innerHTML="you must enter password" ;
        console.log(flag,4);
        flag = true ;
    }
    else
    {
        let Password = document.getElementById("password").value ;
        if( Password.length < 8 )
        {
            document.getElementById("errorPass").innerHTML="your password must greater than or equle to 8 char." ;
            console.log(flag,5);
            flag = true ;
        }
        let checkUnderScore = /[\'^£$%&*()}{@#~?><>,|=+¬-]/.test(Password) ;
        if(checkUnderScore)
        {
            document.getElementById("errorPass").innerHTML="your password contains only underScore" ;
            console.log(flag,6);
            flag = true ;
        }
        let checkUpper = /[A-Z]/.test(Password)
        if(checkUpper)
        {
            document.getElementById("errorPass").innerHTML="your passwordcan't contain upper case" ;
            console.log(flag,7);
            flag = true ;
        }
    }
    if(confirmPass.trim().length === 0)
    {
        document.getElementById("errorCpass").innerHTML="you must enter confirm password" ;
        console.log(flag,8);
        flag = true ;
    }
    else
    {
        if(confirmPass !== Password)
        {
            document.getElementById("errorCpass").innerHTML=" passwords aren't match!" ;
            console.log(flag,9);
            flag = true ;
        }
    }
    if(roomNumber.trim().length === 0)
    {
        document.getElementById("errorRoom").innerHTML="you must enter your room number" ;
        console.log(flag,10);
        flag = true ;
    }
    if(EXT === "")
    {
        document.getElementById("errorExt").innerHTML="you must enter ext" ;
        console.log(flag,11);
        flag = true ;
    }
    if(profilePic.trim().length === 0)
    {
        document.getElementById("errorPic").innerHTML="you must enter your picture " ;
        console.log(flag,12);
        flag = true ;

    }
    return flag ;
}
 
