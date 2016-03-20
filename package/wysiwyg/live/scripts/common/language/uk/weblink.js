function loadTxt() {
    document.getElementById("lblProtocol").innerHTML= "Протокол:";
    
    document.getElementById("tab0").innerHTML = "Мої файли";
    document.getElementById("tab1").innerHTML = "Стилі";
    document.getElementById("lblUrl").innerHTML = "URL:";
    document.getElementById("lblName").innerHTML = "Ім’я:";
    document.getElementById("lblTitle").innerHTML = "Заголовок:";
    document.getElementById("lblTarget1").innerHTML = "Відкривати в поточному вікні";
    document.getElementById("lblTarget2").innerHTML = "Відкривати в новому вікні";
    document.getElementById("lblTarget3").innerHTML = "Відкривати в лайтбоксі";
    document.getElementById("lnkNormalLink").innerHTML = "Звичайне посилання &raquo;";    
    document.getElementById("btnCancel").value = "Закрити";
    
}
function writeTitle() {
    document.write("<title>" + "Посилання" + "</title>")
}
function getTxt(s) {
    switch (s) {
        case "insert": return "Вставити";
        case "change": return "Ок";
    }
}
