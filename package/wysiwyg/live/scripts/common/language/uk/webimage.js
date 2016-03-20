function loadTxt() {
    document.getElementById("tab0").innerHTML = "FLICKR";
    document.getElementById("tab1").innerHTML = "Мої файли";
    document.getElementById("tab2").innerHTML = "Стилі";
    document.getElementById("tab3").innerHTML = "Ефекти";
    document.getElementById("lblTag").innerHTML = "Тег:";
    document.getElementById("lblFlickrUserName").innerHTML = "Користувач Flickr:";
    document.getElementById("lnkLoadMore").innerHTML = "Завантажити ще";
    document.getElementById("lblImgSrc").innerHTML = "URL зображення:";
    document.getElementById("lblWidthHeight").innerHTML = "Ширина x Висота:";
    
    var optAlign = document.getElementsByName("optAlign");
    optAlign[0].text = ""
    optAlign[1].text = "Зліва"
    optAlign[2].text = "Справа"

    document.getElementById("lblTitle").innerHTML = "Заголовок:";
    document.getElementById("lblAlign").innerHTML = "Вирівнювання:";
    document.getElementById("lblMargin").innerHTML = "Відступ: (Верх / Право / Низ / Ліво)";
    document.getElementById("lblSize1").innerHTML = "Маленький квадрат";
    document.getElementById("lblSize2").innerHTML = "Прев’ю";
    document.getElementById("lblSize3").innerHTML = "Маленький";
    document.getElementById("lblSize5").innerHTML = "Середній";
    document.getElementById("lblSize6").innerHTML = "Великий";

    document.getElementById("lblOpenLarger").innerHTML = "Відкрити великий розмір в лайтбоксі, або";
    document.getElementById("lblLinkToUrl").innerHTML = "Посилання URL:";
    document.getElementById("lblNewWindow").innerHTML = "Відкривати в новому вікні";
    document.getElementById("btnCancel").value = "Закрити";
    document.getElementById("btnSearch").value = " Пошук ";

    document.getElementById("lblMaintainRatio").innerHTML = "Зберігати пропорції";
    document.getElementById("resetdimension").innerHTML = "Скинути розміри";

    document.getElementById("btnRestore").value = "Повернути оригінал";
    document.getElementById("btnSaveAsNew").value = "Зберегти як новий"; 
}
function writeTitle() {
    document.write("<title>" + "Зображення" + "</title>")
}
function getTxt(s) {
    switch (s) {
        case "insert": return "Вставити";
        case "change": return "Ок";
        case "notsupported": return "Зовнішні зображення не підтримуються";
    }
}
