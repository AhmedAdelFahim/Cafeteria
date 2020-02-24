function showUpdateNotification() {
    let updateNotificationDiv = document.getElementsByClassName("updateNotificationDiv")[0];
    let pTag = document.createElement("p");

    let textNode = document.createTextNode("user updated successfully");

    pTag.appendChild(textNode);

    updateNotificationDiv.appendChild(pTag)

    pTag.setAttribute("style", "color:#2E8B57; margin-top:10px; font-size:15px");
}

setTimeout(showUpdateNotification, 1);

window.onload = function() {
    window.setTimeout(fadeout, 3000);  //hide UpdateNotification after 3sec
}

function fadeout() {
    document.getElementById('updateDiv').style.opacity = '0';
}
