let action = document.getElementsByClassName("action");
console.log(action.length)
for(let i=0;i<action.length;++i){

    action[i].addEventListener('change',(e)=>{
        console.log(e.target.value);
        console.log(action.id);

        window.location.href= `changeState.php?id=${action[i].id}&status=${e.target.value}`
    });
}
