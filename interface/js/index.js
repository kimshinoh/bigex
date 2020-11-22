var modal = document.getElementById(1)
var add = document.getElementById('add')
var deletePro = document.getElementById('deletePro')
function showFormAdd(){
    modal.style.display = 'block'
    add.style.display = "block"
    deletePro.style.display = 'none'
}
function returnMain(){
    add.style.display = 'none'
    modal.style.display = 'none'
}
function showFormDelete(){
    modal.style.display = 'block'
    deletePro.style.display = "block"
}
