function loadTxt() {
    document.getElementById("tab0").innerHTML = "Шрифти";
    //document.getElementById("tab1").innerHTML = "BASIC FONTS";
    document.getElementById("tab2").innerHTML = "Розмір";
    document.getElementById("tab3").innerHTML = "Тіні";
    document.getElementById("tab4").innerHTML = "Параграфи";
    document.getElementById("tab5").innerHTML = "Списки";

    document.getElementById("lblColor").innerHTML = "Колір:";
    document.getElementById("lblHighlight").innerHTML = "Фон:";
    document.getElementById("lblLineHeight").innerHTML = "Висота рядка:";
    document.getElementById("lblLetterSpacing").innerHTML = "Міжсимвольний інтервал:";
    document.getElementById("lblWordSpacing").innerHTML = "Інтервал між словами:";
    document.getElementById("lblNote").innerHTML = "Ця можливість недоступна в IE.";
    document.getElementById("divShadowClear").innerHTML = "Очистити";    
}
function writeTitle() {
    document.write("<title>" + "Текст" + "</title>")
}
function getTxt(s) {
    switch (s) {
        case "DEFAULT SIZE": return "По-замовчуванню";
        case "Heading 1": return "Заголовок 1";
        case "Heading 2": return "Заголовок 2";
        case "Heading 3": return "Заголовок 3";
        case "Heading 4": return "Заголовок 4";
        case "Heading 5": return "Заголовок 5";
        case "Heading 6": return "Заголовок 6";
        case "Preformatted": return "Код";
        case "Normal": return "Нормальний";
        case "Google Font": return "Шрифт Google:";
    }
}
