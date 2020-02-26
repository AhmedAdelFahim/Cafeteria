let disabled = true;
let users = document.getElementById("users");

function showDetails(key)
{
    let details = document.getElementsByClassName(`details${key}`)[0];

    if(disabled) {
        details.style.display = "unset";
        details.style.width = '100%';
        disabled = false;
    }else{
        details.style.display = "none";
        disabled = true;
    }
    
}

users.addEventListener("change", () => {
    window.location = "checks.php?user="+users.value;
});