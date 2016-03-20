function loadTxt() {
    document.getElementById("tab0").innerHTML = "Вставити";
    document.getElementById("tab1").innerHTML = "Змінити";
    document.getElementById("tab2").innerHTML = "Автоформат";
    document.getElementById("btnDelTable").value = "Видалити обрану таблицю";
    document.getElementById("btnIRow1").value = "Новий рядок (вище)";
    document.getElementById("btnIRow2").value = "Новий рядок (нижче)";
    document.getElementById("btnICol1").value = "Новий стовпчик (зліва)";
    document.getElementById("btnICol2").value = "Новий стовпчик (справа)";
    document.getElementById("btnDelRow").value = "Видалити рядок";
    document.getElementById("btnDelCol").value = "Видалити стовпчик";
    document.getElementById("btnMerge").value = "Об’єднати ячейки";
    document.getElementById("lblFormat").innerHTML = "Формат:";
    document.getElementById("lblTable").innerHTML = "Таблиця";
    document.getElementById("lblCell").innerHTML = "Ячейка";
    document.getElementById("lblEven").innerHTML = "Парні рядки";
    document.getElementById("lblOdd").innerHTML = "Непарні рядки";
    document.getElementById("lblCurrRow").innerHTML = "Поточний рядок";
    document.getElementById("lblCurrCol").innerHTML = "Поточний стовпчик";
    document.getElementById("lblBg").innerHTML = "Фон:";
    document.getElementById("lblText").innerHTML = "Текст:";
    document.getElementById("lblBorder").innerHTML = "Рамки:";
    document.getElementById("lblThickness").innerHTML = "Товщина:";
    document.getElementById("lblBorderColor").innerHTML = "Колір:";
    document.getElementById("lblCellPadding").innerHTML = "Відступ в ячейках:";
    document.getElementById("lblFullWidth").innerHTML = "Повна ширина";
    document.getElementById("lblAutofit").innerHTML = "Авто";
    document.getElementById("lblFixedWidth").innerHTML = "Ширина:";
    document.getElementById("lnkClean").innerHTML = "Очистити";
    document.getElementById("lblTextAlign").innerHTML = "Вирівнювання тексту:";
    document.getElementById("btnAlignLeft").value = "Зліва";
    document.getElementById("btnAlignCenter").value = "По центру";
    document.getElementById("btnAlignRight").value = "Справа";
    document.getElementById("btnAlignTop").value = "Зверху";
    document.getElementById("btnAlignMiddle").value = "По центру";
    document.getElementById("btnAlignBottom").value = "Знизу";

    document.getElementById("lblColor").innerHTML = "Колір:";
    document.getElementById("lblCellSize").innerHTML = "Розмір ячейки:";
    document.getElementById("lblCellWidth").innerHTML = "Ширина:";
    document.getElementById("lblCellHeight").innerHTML = "Висота:";
}
function writeTitle() {
    document.write("<title>" + "Таблиця" + "</title>")
}
function getTxt(s) {
    switch (s) {
        case "Clean Formatting": return "Очистити форматування";
    }
}
