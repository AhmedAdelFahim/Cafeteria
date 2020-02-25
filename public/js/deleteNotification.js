function showDeleteNotification() {
    let notificationDiv = document.getElementsByClassName("notificationDiv")[0];
    let pTag = document.createElement("p");

    let textNode = document.createTextNode("user deleted successfully");

    pTag.appendChild(textNode);

    notificationDiv.appendChild(pTag)

    pTag.setAttribute("style", "color:red; margin-top:10px; margin-left:14px; font-size:15px");
}

setTimeout(showDeleteNotification, 1);

window.onload = function() {
    window.setTimeout(fadeout, 3000);  //hide UpdateNotification after 3sec
}

function fadeout() {
    document.getElementById('notificationDiv').style.opacity = '0';
}
