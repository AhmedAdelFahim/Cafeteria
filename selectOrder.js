let DateFrom = document.getElementById("from") ;
let DateTo = document.getElementById("to") ;
//let DateInput = document.querySelectorAll("Date") ;
let queryString = new Array() ;
DateFrom.addEventListener("change" , getDate) ;
//DateInput.forEach((type)=>{type.addEventListener("change" , getDate)}) ;
DateTo.addEventListener("change" , getDate) ;
function getDate()
{
    let datefrom = DateFrom.value ;
    let dateto = DateTo.value ;
    let toDate = "=2020-3-5" ;
    let url = "order.php?dateFrom="+ encodeURIComponent(datefrom) +"&dateTo = "+toDate+ encodeURIComponent(dateto) ;
    window.location.href = url ;
    if(queryString.length == 0)
    {
        if(window.location.search.split('?').length > 1)
        {
            let params = window.location.search.split('?')[1].split('&');
            for(let i = 0 ; i < params.length ; i++)
            {
                let key = params[i].split('=')[0] ;
                let value = decodeURIComponent(params[i].split('=')[1]);
                queryString[key] = value;
            }
        }
    }
}
// function getDateto()
// {
//     // let dateto = DateTo.value ;
//     // let url = "order.php?"+encodeURIComponent(dateto) ;
//     // window.location.href = url ;
//     if(queryString.length == 0)
//     {
//         if(window.location.search.split('?').length > 1)
//         {
//             let params = window.location.search.split('?')[1].split('&');
//             for(let i = 0 ; i < params.length ; i++)
//             {
//                 let key = params[i].split('=')[0] ;
//                 let value = decodeURIComponent(params[i].split('=')[1]);
//                 queryString[key] = value;
//             }
//         }
//     }
// }
