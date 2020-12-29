var oXHR = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

function reportStatus() {
    if (oXHR.readyState == 4)               // REQUEST COMPLETED.
        showTheList(this.responseXML);      // ALL SET. NOW SHOW XML DATA.
}
oXHR.onreadystatechange = reportStatus;
oXHR.open("GET", "./sach.xml", true);      // true = ASYNCHRONOUS REQUEST (DESIRABLE), false = SYNCHRONOUS REQUEST.
oXHR.send();
function showTheList(xml) {
    var divBooks = document.getElementById('html');      // THE PARENT DIV.
    var Book_List = xml.getElementsByTagName('book');       // THE XML TAG NAME.

    for (var i = 0; i < Book_List.length; i++) {
        divBooks.innerHTML += Book_List[i].getElementsByTagName('author')[0].childNodes[0].nodeValue;
        divBooks.innerHTML += '<br />';

    }
};