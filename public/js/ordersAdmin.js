let action = document.querySelector(".action");

action.addEventListener('change',(e)=>{
    // console.log(e.target.value);
    // console.log(action.id);

    window.location.href= `changeState.php?id=${action.id}&status=${e.target.value}`
});
