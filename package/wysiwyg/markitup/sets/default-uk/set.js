// ----------------------------------------------------------------------------
// markItUp!
// ----------------------------------------------------------------------------
// Copyright (C) 2011 Jay Salvat
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
// Html tags
// http://en.wikipedia.org/wiki/html
// ----------------------------------------------------------------------------
// Basic set. Feel free to add more tags
// ----------------------------------------------------------------------------
var mySettings = {
    resizeHandle: false,
	onShiftEnter:  	{keepDefault:false, replaceWith:'<br />\n'},
	onCtrlEnter:  	{keepDefault:true},
	onTab:    		{keepDefault:false, replaceWith:'    '},
	markupSet:  [
		{name:'Жирний', key:'B', openWith:'<b>', closeWith:'</b>', className: 'btnBold'},
		{name:'Курсив', key:'I', openWith:'<i>', closeWith:'</i>', className: 'btnItalic'},
		{name:'Підчеркнутий', key:'U', openWith:'<u>', closeWith:'</u>', className: 'btnUnderline'},
		{name:'Зачеркнутий', key:'S', openWith:'<s>', closeWith:'</s>', className: 'btnStroke'},
		{name:'Список', openWith:'    <li>', closeWith:'</li>', multiline:true, openBlockWith:'<ul>\n', closeBlockWith:'\n</ul>', className: 'btnOl'},
		{name:'Нумерований список', openWith:'    <li>', closeWith:'</li>', multiline:true, openBlockWith:'<ol>\n', closeBlockWith:'\n</ol>', className: 'btnUl'},
		{name:'Цитата', openWith:'<blockquote>[![Текст цитати]!]', closeWith:'</blockquote>', className: 'btnQuote'},
        	{name:'Посилання', key:'L', openWith:'<a target="_blank" href="[![Адреса посилання:!:http://]!]">', closeWith:'</a>', placeHolder:'Заголовок посилання...', className: 'btnLink'},
		{name:'Фото із Інтернету', replaceWith:'<img src="[![Адреса фото:!:http://]!]" alt="[![Опис]!]" />', className: 'btnImg'},
		{name:'Фото з комп’ютера', className: 'btnImgUpload', beforeInsert: function(markItUp) { InlineUpload.display(markItUp) }},
		{name:'Відео YouTube', openWith:'<youtube>[![Посилання на ролик YouTube]!]', closeWith:'</youtube>', className: 'btnVideoYoutube'},
        	{name:'Код', openWith:'<code>', closeWith:'</code>', className: 'btnCode'}
	]
}
