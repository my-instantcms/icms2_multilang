function loadTxt() {
    document.getElementById("tab0").innerHTML = "Малюнок";
    document.getElementById("tab1").innerHTML = "Налаштування";
    document.getElementById("tab3").innerHTML = "Збережено";

    document.getElementById("lblWidthHeight").innerHTML = "Розмір полотна:";
    
    var optAlign = document.getElementsByName("optAlign");
    optAlign[0].text = ""
    optAlign[1].text = "Зліва"
    optAlign[2].text = "Справа"

    document.getElementById("lblTitle").innerHTML = "Заголовок:";
    document.getElementById("lblAlign").innerHTML = "Вирівнювання:";
    document.getElementById("lblSpacing").innerHTML = "Верт.відступ:";
    document.getElementById("lblSpacingH").innerHTML = "Гор.відступ:";

    document.getElementById("btnCancel").value = "Закрити";
}
function writeTitle() {
    document.write("<title>" + "Малюнок" + "</title>")
}
function getTxt(s) {
    switch (s) {
        case "insert": return "Вставити";
        case "change": return "Ок";
        case "DELETE": return "Видалити";
    }
}
