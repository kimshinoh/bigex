var modal = document.getElementById(1)
var add = document.getElementById('add')
var deletePro = document.getElementById('deletePro')
function showFormAdd() {
    modal.style.display = 'block'
    add.style.display = "block"
    deletePro.style.display = 'none'
}
function returnMain() {
    add.style.display = 'none'
    modal.style.display = 'none'
}
function showFormDelete() {
    modal.style.display = 'block'
    deletePro.style.display = "block"
}
var checkList = document.getElementById('list1');
if(checkList){
checkList.getElementsByClassName('anchor')[0].onclick = function (evt) {
    if (checkList.classList.contains('visible'))
        checkList.classList.remove('visible');
    else
        checkList.classList.add('visible');
    }
}
function numberWithCommas(x) {

    return  x.split('.').join('').toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    

}
// add.onclick = ()=> {
//     checkList.classList.remove('visible');
// }

