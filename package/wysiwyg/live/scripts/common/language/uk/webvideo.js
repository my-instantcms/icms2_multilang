function loadTxt() {
    document.getElementById("tab0").innerHTML = "Постер";
    document.getElementById("tab1").innerHTML = "Відео MPEG4";
    document.getElementById("tab2").innerHTML = "Відео Ogg";
    document.getElementById("tab3").innerHTML = "Відео WebM";
    document.getElementById("lbImage").innerHTML = "Постер/прев’ю (.png або .jpg):";
    document.getElementById("lblMP4").innerHTML = "Відео MPEG4 (.mp4):";
    document.getElementById("lblOgg").innerHTML = "Відео Ogg (.ogv):";
    document.getElementById("lblWebM").innerHTML = "Відео WebM (.webm):";
    document.getElementById("lblDimension").innerHTML = "Розмір відео (ширина x висота):";
    document.getElementById("divNote1").innerHTML = "Детальніше про HTML5 відео: <a href='http://www.w3schools.com/html5/html5_video.asp' target='_blank'>www.w3schools.com/html5/html5_video.asp</a>." +
        "Підтримуються три формати відео: MP4, WebM (для MSIE 9+), і Ogg (для FireFox). Кожен браузер буде використовувати підтримуваний ним формат." +
        "Також необхідне зображення прев’ю (постер).";
    document.getElementById("divNote2").innerHTML = "Щоб перетворити відео в HTML5-сумісний формат (MP4, WebM & Ogg) ви можете використовувати: <a href='http://www.mirovideoconverter.com/' target='_blank'>www.mirovideoconverter.com</a>";

    document.getElementById("btnCancel").value = "Закрити";
    document.getElementById("btnInsert").value = "Вставити";
}
function writeTitle() {
    document.write("<title>" + "HTML5 відео" + "</title>")
}
