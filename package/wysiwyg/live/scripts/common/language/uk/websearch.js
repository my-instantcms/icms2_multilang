function loadTxt() {
    document.getElementById("lblSearch").innerHTML = "Знайти:";
    document.getElementById("lblReplace").innerHTML = "Замінити:";
    document.getElementById("lblMatchCase").innerHTML = "Враховувати регістр";
    document.getElementById("lblMatchWhole").innerHTML = "Співпадіння повністю";

    document.getElementById("btnSearch").value = "Знайти дальше"; ;
    document.getElementById("btnReplace").value = "Замінити";
    document.getElementById("btnReplaceAll").value = "Замінити все";
}
function getTxt(s) {
    switch (s) {
        case "Finished searching": return "Досягнуто кінця документа.\nПродовжити пошук з початку?";
        default: return "";
    }
}
function writeTitle() {
    document.write("<title>Знайти і замінити</title>")
}
