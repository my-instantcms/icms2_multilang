<?php

	define('LANG_LOADING',                   'Завантаження...');
	define('LANG_SENDING',                   'Відправлення...');
	define('LANG_MORE',                      'Детальніше');
	define('LANG_VERSION',                   'Версія');

    //CONTENT
    define('LANG_CONTENT_TYPE',              'Тип контенту');
    define('LANG_CONTENT_TYPE_SETTINGS',     'Налаштувати %s');
    define('LANG_CONTENT_ADD_ITEM',          'Створити %s');
    define('LANG_CONTENT_EDIT_ITEM',         'Редагувати %s');
    define('LANG_CONTENT_DELETE_ITEM',       'Видалити %s');
    define('LANG_CONTENT_DELETE_ITEM_CONFIRM',  'Ви впевнені що хочете видалити %s?');
    define('LANG_CONTENT_NOT_APPROVED',      'Очікує перевірки');
    define('LANG_CONTENT_NOT_IS_PUB',		 'Не публікується');

    define('LANG_SHOW_FILTER',               'Показати фільтр');
    define('LANG_FILTER',                    'Фільтр');
    define('LANG_FILTERS',                   'Фільтри');
    define('LANG_FILTER_FIELD',              'Фільтр по полю');
    define('LANG_FILTER_ADD',                'Додати фільтр');
    define('LANG_FILTER_LIKE',               'містить');
    define('LANG_FILTER_LIKE_BEGIN',         'починається з');
    define('LANG_FILTER_LIKE_END',           'закінчується на');
    define('LANG_FILTER_DATE_YOUNGER',       'не старіше, днів');
    define('LANG_FILTER_DATE_OLDER',         'не молодше, днів');
    define('LANG_FILTER_NOT_NULL',           'заповнено');
    define('LANG_FILTER_IS_NULL',            'не заповнено');
    define('LANG_FILTER_APPLY',              'Фільтрувати');
    define('LANG_FILTER_URL',                'Посилання');
	define('LANG_FILTER_SAVE_DIFF_ORDER',    'Зберігати різну сортування');
    define('LANG_SORTING_FIELD',             'Сортування по полю');
    define('LANG_SORTING',                   'Сортування');
    define('LANG_SORTING_ADD',               'Додати правило');
    define('LANG_SORTING_ASC',               'За зростанням');
    define('LANG_SORTING_DESC',              'За зменшенням');
    define('LANG_PHOTO',                     'Зображення');
    define('LANG_PHOTOS',                    'Фотографії');
    define('LANG_COMMENTS',                  'Коментарі');
    define('LANG_RATING',                    'Рейтинг');
    define('LANG_KARMA',                     'Репутація');
    define('LANG_KARMA_UP',                  'Підняти');
    define('LANG_KARMA_DOWN',                'Опустити');
    define('LANG_CSS_CLASS',                 'Клас CSS');
    define('LANG_CSS_CLASS_WRAP',            'Клас CSS для контейнера');
    define('LANG_CSS_CLASS_TITLE',           'Клас CSS для заголовка');
    define('LANG_CSS_CLASS_BODY',            'Клас CSS для тіла');
    define('LANG_GROUP',                     'Група');
    define('LANG_GROUPS',                    'Групи');
    define('LANG_WROTE_IN_GROUP',            'в групі');
    define('LANG_DESIGN',		     'Дизайн');	

    //WIDGETS
    define('LANG_WP_SYSTEM',                 'Системні');
    define('LANG_WP_CUSTOM',                 'Користувацькі');
    define('LANG_WP_ALL_PAGES',              'Всі сторінки');
    define('LANG_WP_HOME_PAGE',              'Головна сторінка');
    define('LANG_WIDGET_TAB_PREV',           'Об’єднувати з попереднім віджетом');
    define('LANG_WIDGET_TITLE_LINKS',        'Посилання в заголовку віджета');
    define('LANG_WIDGET_TITLE_LINKS_HINT',   'У форматі <b><em>Тема | URL</em></b>, наприклад <b><em>Яндекс | http://www.yandex.ru</em></b> <br>Якщо посилання взято у фігурні дужки <b>{}</b> воно буде показано тільки авторизованим користувачам<br>Одне посилання в кожному рядку');
    define('LANG_WIDGET_WRAPPER_TPL',		 'Шаблон контейнера');
    define('LANG_WIDGET_WRAPPER_TPL_HINT',	 'Назва файла із папки <b>widgets</b> вашого шаблону, без розширення <b>.tpl.php</b>');
    define('LANG_WIDGET_BODY_TPL',			 'Шаблон віджету');
    define('LANG_WIDGET_BODY_TPL_HINT',	     'Назва файлу із папки <b>%s</b> вашого шаблону, без розширення <b>.tpl.php</b>');

    //PARSERS
    define('LANG_PARSER_CAPTION',            'Заголовок');
    define('LANG_PARSER_STRING',             'Текстове поле');
    define('LANG_PARSER_HIDDEN',             'Приховане поле');
    define('LANG_PARSER_NUMBER',             'Число');
    define('LANG_PARSER_NUMBER_FILTER_RANGE','Фільтр по діапазону');
    define('LANG_PARSER_NUMBER_UNITS',       'Одиниця виміру');
    define('LANG_PARSER_CITY',               'Місто');
    define('LANG_PARSER_CITY_FILTER_HINT',   'ID міста');
    define('LANG_PARSER_CHECKBOX',           'Прапор');
    define('LANG_PARSER_TEXT',               'Текст');
    define('LANG_PARSER_TEXT_MAX_LEN',       'Максимальна довжина');
    define('LANG_PARSER_TEXT_MIN_LEN',       'Мінімальна довжина');
	define('LANG_PARSER_SHOW_SYMBOL_COUNT',  'Показувати кількість символів при введенні');
    define('LANG_PARSER_HTML',               'Текст HTML');
    define('LANG_PARSER_HTML_EDITOR',        'Редактор HTML');
    define('LANG_PARSER_HTML_FILTERING',     'Обробляти типографом');
    define('LANG_PARSER_HTML_TEASER_LEN',    'Обрізати текст при перегляді списку');
    define('LANG_PARSER_HTML_TEASER_LEN_HINT','Текст буде обрізаний до вказаної довжини, форматування буде видалено');
    define('LANG_PARSER_BBCODE',             'Текст: BB-code');
    define('LANG_PARSER_LIST',               'Список');
    define('LANG_PARSER_LIST_FILTER_HINT',   'Номер варіанту');
    define('LANG_PARSER_LIST_FILTER_MULTI',  'Множинний вибір у фільтрі');
    define('LANG_PARSER_LIST_GROUPS',        'Список груп користувачів');
    define('LANG_PARSER_LIST_GROUPS_SHOW_GUESTS',     'Показувати пункт "Гості"');
    define('LANG_PARSER_LIST_IS_MULTIPLE',   'Дозволити вибір декількох варіантів');
    define('LANG_PARSER_LIST_MULTIPLE',      'Список: мультивибір');
    define('LANG_PARSER_LIST_MULTIPLE_SHOW_ALL',      'Показувати пункт "Все"');
    define('LANG_PARSER_URL',                'Посилання');
    define('LANG_PARSER_URL_REDIRECT',       'Посилання через редирект');
    define('LANG_PARSER_URL_AUTO_HTTP',      'Автоматично додавати http://');
    define('LANG_PARSER_AGE',                'Вік');
    define('LANG_PARSER_AGE_DATE_TITLE',     'Заголовок дати початку відліку');
    define('LANG_PARSER_AGE_FILTER_RANGE',   'Фільтр по діапазону');
	define('LANG_PARSER_AGE_FROM_DATE',      'Вважати від зазначеної дати');
    define('LANG_PARSER_AGE_FROM_DATE_HINT', 'Якщо не вказано, відлік буде вестися від поточного значення часу');
    define('LANG_PARSER_DATE',               'Дата');
    define('LANG_PARSER_DATE_FILTER_HINT',   'РРРР-ММ-ДД');
    define('LANG_PARSER_DATE_SHOW_TIME',     'Показувати час');
    define('LANG_PARSER_USER',               'Користувач');
    define('LANG_PARSER_USER_FILTER_HINT',   'ID користувача');
    define('LANG_PARSER_USERS',              'Список користувачів');
    define('LANG_PARSER_IMAGE',              'Зображення');
    define('LANG_PARSER_IMAGES',             'Набір зображень');
	define('LANG_PARSER_IMAGE_ALLOW_IMPORT_LINK', 'Дозволити додавання за посиланням');
    define('LANG_PARSER_IMAGE_SIZE_UPLOAD',  'Створювати прев’ю-зображення');
    define('LANG_PARSER_IMAGE_SIZE_TEASER',  'Розмір в списку');
    define('LANG_PARSER_IMAGE_SIZE_FULL',    'Розмір в записі');
    define('LANG_PARSER_IMAGE_SIZE_MICRO',   'Мікро');
    define('LANG_PARSER_IMAGE_SIZE_SMALL',   'Маленький');
    define('LANG_PARSER_IMAGE_SIZE_NORMAL',  'Середній');
    define('LANG_PARSER_IMAGE_SIZE_BIG',     'Великий');
    define('LANG_PARSER_IMAGE_SIZE_ORIGINAL','Оригінальний');
    define('LANG_PARSER_COLOR',              'Колір');
    define('LANG_PARSER_FILE',               'Файл');
    define('LANG_PARSER_FILE_LABEL',         'Тема посилання на файл');
    define('LANG_PARSER_FILE_LABEL_NAME',    'Им’я файлу');
    define('LANG_PARSER_FILE_LABEL_GET',     'Завантажити');
    define('LANG_PARSER_FILE_EXTS',          'Допустимі розширення');
    define('LANG_PARSER_FILE_EXTS_HINT',     'Список розширень через кому');
    define('LANG_PARSER_FILE_EXTS_FIELD_HINT',     'Допустимі типи файлів: %s');
    define('LANG_PARSER_FILE_SIZE_FIELD_HINT',     'Максимальний розмір: %s');
    define('LANG_PARSER_FILE_MAX_SIZE',      'Максимальний розмір, Мб');
    define('LANG_PARSER_FILE_MAX_SIZE_PHP',  'Чи не більше ніж %d Мб (обмеження в налаштуваннях PHP)');
    define('LANG_PARSER_FILE_SHOW_SIZE',     'Показувати розмір файлу');
    define('LANG_PARSER_CURRENT_TIME',       'Теперішній час');
    define('LANG_PARSER_IN_FULLTEXT_SEARCH', 'Бере участь в повнотекстовому пошуку');
    define('LANG_PARSER_IN_FULLTEXT_SEARCH_HINT', 'Увага! При зміні цієї опції індекс буде перебудований. На великих таблицях це може зайняти багато часу.');
	define('LANG_PARSER_ADD_FROM_LINK', 'додати по посиланню');
    define('LANG_PARSER_ENTER_IMAGE_LINK', 'Введіть посилання на зображення');
    define('LANG_OR', 'або');

    //USERS
    define('LANG_USER',                      'Користувач');
    define('LANG_USERS',                     'Користувачі');
    define('LANG_AUTHOR',                    'Автор');
    define('LANG_REGISTRATION',              'Реєстрація');
    define('LANG_USER_REGISTRATION',         'Реєстрація користувача');
    define('LANG_CREATE_ACCOUNT',            'Створіть акаунт');
    define('LANG_LOG_IN',                    'Увійти');
    define('LANG_LOG_IN_ACCOUNT',            'Увійдіть, використовуючи Ваш акаунт');
    define('LANG_LOG_IN_OPENID',             'Увійдіть через соціальні мережі');
    define('LANG_LOG_OUT',                   'Вийти');
    define('LANG_NO_ACCOUNT',                'Немає акаунту?');
    define('LANG_REG_FIRST_TIME',            'Вперше у нас?');
    define('LANG_REG_ALREADY',               'Вже зареєстровані?');
    define('LANG_EMAIL',                     'E-mail');
    define('LANG_PASSWORD',                  'Пароль');
    define('LANG_RETYPE_PASSWORD',           'Повторіть пароль');
    define('LANG_USER_GROUP',                'Група');
    define('LANG_USER_IS_ADMIN',             'Адміністратор');
    define('LANG_LOGIN_ERROR',               'Вхід не виконаний. Перевірте e-mail та пароль');
    define('LANG_LOGIN_REQUIRED',            'Для доступу до запитаної сторінки необхідна авторизація');
    define('LANG_LOGIN_ADMIN_ONLY',          'Увійти на відключений сайт може тільки адміністратор');
    define('LANG_NICKNAME',                  'Нікнейм');
    define('LANG_ADMIN',                     'Адміністратор');
    define('LANG_EMAIL_FIND',                'Знайти за фрагментом e-mail');
    define('LANG_FIND',                      'Знайти');
    define('LANG_MY_PROFILE',                'Мій профіль');
    define('LANG_PROFILE',                   'Профіль');
    define('LANG_CITY',                      'Місто');
    define('LANG_COMPANY',                   'Компанія');
    define('LANG_PHONE',                     'Телефон');
    define('LANG_NAME',                      'Ім’я');
    define('LANG_SURNAME',                   'Прізвище');
    define('LANG_CHANGE_PASS',               'Змінити пароль');
    define('LANG_OLD_PASS',                  'Поточний пароль');
    define('LANG_OLD_PASS_INCORRECT',        'Поточний пароль вказаний неправильно');
    define('LANG_NEW_PASS',                  'Новий пароль');
    define('LANG_RETYPE_NEW_PASS',           'Повторіть новий пароль');
    define('LANG_PASS_CHANGED',              'Пароль успішно змінений');
    define('LANG_REMEMBER_ME',               'Запам’ятати мене');
    define('LANG_PLEASE_LOGIN',              'Назвіться, будь ласка');
    define('LANG_LOGIN_ADMIN',               'Вхід для адміністраторів');
    define('LANG_ONLINE',                    'Онлайн');
	define('LANG_USERS_PROFILE_LAST_IP',     'Останній IP');
    define('LANG_USERS_PROFILE_LOGDATE',     'Останній візит');

    //MODERATION
    define('LANG_MODERATION',                'Модерація');
    define('LANG_MODERATOR',                 'Модератор');
    define('LANG_MODERATORS',                'Модератори');
    define('LANG_MODERATION_APPROVE',        'Дозволити публікацію');
    define('LANG_MODERATION_APPROVED',       'Сторінка опублікована');
    define('LANG_MODERATION_APPROVED_BY',    'Перевірено модератором');
    define('LANG_MODERATION_PM_AUTHOR',      'Написати автору');
    define('LANG_MODERATION_NOTICE',         'Матеріал буде опублікований після перевірки модератором');
    define('LANG_MODERATION_IDLE',           'Надіслано повідомлення модератору %s');
    define('LANG_MODERATION_NO_TASKS',       'Немає матеріалів, які потребують перевірки');

    //PERMISSIONS
    define('LANG_PERMISSIONS',               'Доступ');
    define('LANG_PERM_RULE',                 'Правило доступу');
    define('LANG_PERM_OPTION_NULL',          'Ні');
    define('LANG_PERM_OPTION_OWN',           'Тільки свої');
    define('LANG_PERM_OPTION_ALL',           'Всі');
    define('LANG_SHOW_TO_GROUPS',            'Показувати групам');
    define('LANG_HIDE_FOR_GROUPS',           'Не показувати групам');

	//AUTHORIZATION
	define('LANG_AUTH_LOGIN',			 'Логін');
	define('LANG_AUTH_PASSWORD',		 'Пароль');

    //PASSWORD RESTORE
    define('LANG_FORGOT_PASS',               'Забули пароль?');

	//SYSTEM ERRORS
	define('LANG_ERROR',					 'Помилка');
	define('LANG_FORM_ERRORS',				 'Знайдено помилки у формі');
	define('LANG_TRACE_STACK',				 'Останні виклики');
	define('ERR_COMPONENT_NOT_FOUND',		 'Необхідний компонент не знайдений');
	define('ERR_MODEL_NOT_FOUND',			 'Модель даних не знайдена');
	define('ERR_TEMPLATE_NOT_FOUND', 		 'Не знайдено шаблону для відображення');
	define('ERR_LIBRARY_NOT_FOUND', 		 'Бібліотека не знайдена');
	define('ERR_FILE_NOT_FOUND',             'Файл не знайдено');
	define('ERR_CLASS_NOT_FOUND', 		 	 'Клас не знайдено');
	define('ERR_MODULE_NOT_FOUND', 		 	 'Модуль не знайдено');
	define('ERR_DATABASE_QUERY', 		 	 '<b>Помилка в запиті БД</b>: <p>%s</p>');
    	define('ERR_DATABASE_CONNECT', 		 	 'Помилка з’єднання з базою даних');
	define('ERR_PAGE_NOT_FOUND', 		 	 'Сторінку не знайдено');
	define('ERR_SITE_OFFLINE',               'Сайт відключений');
	define('ERR_SITE_OFFLINE_FULL',          'Сайт відключений. <a href="%s">Увімкнути</a>');

    //UPLOAD ERRORS
    define('LANG_UPLOAD_ERR_OK',             'Файл успішно завантажений');
    define('LANG_UPLOAD_ERR_INI_SIZE', 		 'Розмір файлу перевищує допустимий: %s');
    define('LANG_UPLOAD_ERR_FORM_SIZE',      'Розмір файлу перевищує допустимий');
    define('LANG_UPLOAD_ERR_PARTIAL', 		 'Файл був завантажений не повністю');
    define('LANG_UPLOAD_ERR_NO_FILE', 		 'Файл не був завантажений');
    define('LANG_UPLOAD_ERR_NO_TMP_DIR',     'Не знайдена папка для тимчасових файлів на сервері');
    define('LANG_UPLOAD_ERR_CANT_WRITE', 	 'Помилка запису файлу на диск');
    define('LANG_UPLOAD_ERR_EXTENSION', 	 'Завантаження файлу було перервано');
    define('LANG_UPLOAD_ERR_MIME',           'Файл має невідповідний формат');

    //MONEY
    define('LANG_CURRENCY',                  'грн.');

	//VALIDATION ERRORS
	define('ERR_VALIDATE_REQUIRED',          'Заповніть поле');
	define('ERR_VALIDATE_MIN',               'Занадто маленьке значення (мінімум: %s)');
	define('ERR_VALIDATE_MAX',               'Занадто велике значення (максимум: %s)');
	define('ERR_VALIDATE_MIN_LENGTH',        'Занадто коротке значення (мін. довжина: %s)');
	define('ERR_VALIDATE_MAX_LENGTH',        'Занадто довге значення (макс. довжина: %s)');
	define('ERR_VALIDATE_EMAIL',             'Невірний формат електронної пошти');
	define('ERR_VALIDATE_REGEXP',            'Невірний формат');
	define('ERR_VALIDATE_ALPHANUMERIC',      'Тільки латинські букви і цифри');
        define('ERR_VALIDATE_SYSNAME',           'Тільки латинські букви (в нижньому регістрі), цифри та знаки підкреслення');
        define('ERR_VALIDATE_SLUG',              'Тільки латинські букви (в нижньому регістрі), цифри, дефіс та прямий слеш');
	define('ERR_VALIDATE_DIGITS',            'Введіть лише цифри');
	define('ERR_VALIDATE_NUMBER',            'Введіть число');
	define('ERR_VALIDATE_UNIQUE',            'Значення вже використовується');
	define('ERR_VALIDATE_INVALID',           'Зазначено неприпустиме значення');

	define('LANG_VALIDATE_REQUIRED',         'Поле має бути заповнене');
	define('LANG_VALIDATE_DIGITS',           'Тільки цілі цифри');
	define('LANG_VALIDATE_NUMBER',           'Тільки числа');
	define('LANG_VALIDATE_ALPHANUMERIC',     'Тільки латинські букви і цифри');
	define('LANG_VALIDATE_EMAIL',            'Адреса електронної пошти');
	define('LANG_VALIDATE_UNIQUE',           'Унікальне значення');

	define('ERR_REQ_EMAIL', 		 	 	 'Необхідно вказати e-mail!');
	define('ERR_EMPTY_FIELDS', 			 	 'Виявлені порожні поля!');
	define('ERR_NICKNAME_EXISTS', 			 'Нікнейм &laquo;%s&raquo; зайнятий');
	define('ERR_WRONG_OLD_PASS', 		 	 'Помилка зміни пароля: Старий пароль вказаний невірно');
	define('ERR_NEW_PASS_MISMATCH', 		 'Помилка зміни пароля: Паролі не співпали');
	define('ERR_NEW_PASS_REQUIRED', 		 'Потрібно вказати новий пароль двічі!');

	//CAPTCHA
	define('LANG_CAPTCHA_CODE', 		 	 'Захист від спаму');
	define('LANG_CAPTCHA_ERROR', 		 	 'Неправильно вказано код захисту від спаму');

	//LISTS
    define('LANG_NO_ITEMS', 		 		 'Немає елементів для перегляду');

	//ACTIONS
    define('LANG_ADD_CATEGORY',              'Створити категорію');
    define('LANG_ADD_CATEGORY_QUICK',        'або створити нову категорію всередині обраної');
    define('LANG_EDIT_CATEGORY',             'Редагувати категорію');
    define('LANG_DELETE_CATEGORY',           'Видалити категорію');
    define('LANG_DELETE_CATEGORY_CONFIRM',   'Ви впевнені що хочете видалити категорію?\nВесь вміст також буде видалено!');
    define('LANG_ADD_FOLDER_QUICK',          'або створити нову папку');
    define('LANG_EDIT_FOLDER',               'Редагувати папку');
    define('LANG_DELETE_FOLDER',             'Видалити папку');
    define('LANG_DELETE_FOLDER_CONFIRM',     'Ви впевнені, що хочете видалити папку?\nВесь вміст також буде видалено!');

	define('LANG_BASIC_OPTIONS',             'Загальні');
	define('LANG_YES',                       'Так');
	define('LANG_NO',                        'Ні');
	define('LANG_LIST_LIMIT',                'Записів в списку');
	define('LANG_LIST_ALL',					 'Показати всі');
	define('LANG_LIST_EMPTY',                'Немає елементів для відображення');
	define('LANG_LIST_NONE_SELECTED',        'Нічого не виділено');
	define('LANG_DOWNLOAD',                  'Завантажити');
	define('LANG_UPLOAD',                    'Передати');
	define('LANG_SELECT_UPLOAD',             'Вибрати і передати');
	define('LANG_DROP_TO_UPLOAD',            'Перетягніть файли сюди, щоб передати');
	define('LANG_CREATE',                    'Cтворити');
	define('LANG_APPLY',                     'Застосувати');
	define('LANG_ACCEPT',                    'Прийняти');
	define('LANG_DECLINE',                   'Відхилити');
	define('LANG_CONFIRM',                   'Підтвердити');
	define('LANG_INVITE',                    'Запросити');
	define('LANG_ADD', 						 'Додати');
	define('LANG_ADD_CONTENT',				 'Створити сторінку');
	define('LANG_ADD_USER',                  'Створити користувача');
	define('LANG_ADD_NEWS',					 'Створити новину');
	define('LANG_ADD_MENU',				 	 'Створити меню');
	define('LANG_ADD_MENUITEM',				 'Створити пункт меню');
	define('LANG_MENU_MORE',                 'Ще');
	define('LANG_VIEW', 					 'Перегляд');
	define('LANG_EDIT', 					 'Редагувати');
	define('LANG_EDIT_SELECTED',			 'Редагувати виділені');
	define('LANG_SHOW', 					 'Показати');
	define('LANG_SHOW_ALL',                  'Показати всі');
	define('LANG_SHOW_SELECTED',			 'Показати виділені');
	define('LANG_ADMIN_SELECTED', 			 'Зробити обраних адміністраторами');
	define('LANG_UNADMIN_SELECTED',			 'Зняти адміністраторські права у виділених');
	define('LANG_HIDE', 					 'Приховати');
	define('LANG_HIDE_SELECTED',			 'Приховати виділені');
	define('LANG_CONFIG', 					 'Налаштування');
	define('LANG_DELETE', 					 'Видалити');
	define('LANG_DELETE_SELECTED',			 'Видалити виділені');
	define('LANG_DELETE_SELECTED_CONFIRM',   'Видалити виділені елементи?');
	define('LANG_MOVE',                      'Перенести');
	define('LANG_MOVE_TO_CATEGORY',          'Перенести в категорію');
	define('LANG_ON',	 					 'Увімкнути');
	define('LANG_OFF', 						 'Вимкнути.');
	define('LANG_SAVE',						 'Зберегти');
	define('LANG_SAVE_CHANGES',              'Зберегти зміни');
	define('LANG_SAVE_ORDER',                'Зберегти порядок');
	define('LANG_SAVING',                    'Збереження...');
	define('LANG_PREVIEW',                   'Передперегляд');
	define('LANG_SEND',						 'Надіслати');
	define('LANG_INSTALL',					 'Встановити');
	define('LANG_INSERT',					 'Вставити');
	define('LANG_CANCEL',					 'Скасувати');
	define('LANG_BACK',					 	 'Назад');
	define('LANG_IN_QUEUE',					 'Об’єктів на черзі');
	define('LANG_SELECT',                    'Вибрати');
	define('LANG_SELECT_ALL',				 'Виділити все');
	define('LANG_DESELECT_ALL',				 'Зняти все');
	define('LANG_INVERT_ALL',				 'Інвертувати');
	define('LANG_CLOSE',                     'Закрити');
	define('LANG_CONTINUE',                  'Продовжити');
    define('LANG_OPTIONS',                   'Опції');
    define('LANG_REPLY',                     'Відповісти');
    define('LANG_REPLY_SPELLCOUNT',          'відповідь|відповіді|відповідей');
    define('LANG_FROM',                      'від');
    define('LANG_TO',                        'до');
    define('LANG_IS_ENABLED',                'Активність');
    define('LANG_HELP',                      'Допомога');
    define('LANG_HELP_URL',                  'http://docs.instantcms.ru');

	//NAVIGATION
    define('LANG_HOME',                      'Головна');
    define('LANG_BACK_TO_HOME',              'Повернутись на головну');
	define('LANG_PAGE_NEXT', 				 'Наступна');
	define('LANG_PAGE_PREV',                 'Попередня');
	define('LANG_PAGE_FIRST', 				 'Перша');
	define('LANG_PAGE_LAST',                 'Остання');
	define('LANG_PAGES', 					 'Сторінки');
	define('LANG_PAGE', 					 'Сторінка');
	define('LANG_PAGE_ADD',                  'Додати сторінку');
	define('LANG_PAGE_DELETE',               'Видалити сторінку');
	define('LANG_PAGE_CURRENT_DELETE',       'Видалити поточну сторінку');
	define('LANG_PAGES_SHOWN',               'Показані %d-%d з %d');
	define('LANG_PAGES_SHOW_PERPAGE',        'Показувати по');

	//FORMS
	define('LANG_SUBMIT', 					 'Надіслати');

	//LAYOUT
	define('LANG_PAGE_BODY',                 'Тіло сторінки');
	define('LANG_PAGE_MENU',                 'Меню сторінки');
	define('LANG_PAGE_HEADER',               'Шапка сторінки');
	define('LANG_PAGE_FOOTER',               'Підвал сторінки');
	define('LANG_PAGE_LOGO',                 'Логотип');
	define('LANG_MENU',                      'Меню');
	define('LANG_TITLE', 					 'Заголовок');
	define('LANG_SHOW_TITLE',                'Показувати заголовок');
	define('LANG_SYSTEM_NAME',               'Системне ім’я');
	define('LANG_SYSTEM_EDIT_NOTICE',	     '<b>Увага:</b> при зміні системного імені поле буде створено заново та всі поточні дані будуть втрачені!');
	define('LANG_DESCRIPTION',               'Опис');
	define('LANG_INFORMATION',               'Інформація');
	define('LANG_CONTENT', 					 'Вміст');
	define('LANG_CATEGORY',                  'Категорія');
	define('LANG_CATEGORY_TITLE',            'Назва категорії');
    define('LANG_FOLDER',                    'Папка');
	define('LANG_ROOT_NODE',                 'Корінь');
	define('LANG_ROOT_CATEGORY',             'Коренева категорія');
	define('LANG_PARENT_CATEGORY',           'Батьківська категорія');
	define('LANG_ADDITIONAL_CATEGORIES',	 'Додаткові категорії');
	define('LANG_MESSAGE', 					 'Текст повідомлення');
	define('LANG_DATE', 					 'Дата');
	define('LANG_DATE_PUB',                  'Дата публікації');
	define('LANG_PUBLICATION',				 'публікація');
	define('LANG_SLUG',                      'URL');
	define('LANG_PRIVACY',                   'Конфіденційність');
	define('LANG_PRIVACY_PUBLIC',            'Показувати всім');
	define('LANG_PRIVACY_PRIVATE',           'Показувати тільки друзям');
        define('LANG_PRIVACY_PRIVATE_HINT',      'Це приватний запис. Його можуть переглянути тільки друзі автора.');
	define('LANG_ON_FRONT',				 	 'На головній');
	define('LANG_SHOWED',					 'Показано');
	define('LANG_ORDER',					 'Порядок');
	define('LANG_ORDER_DOWN',				 'Перемістити вниз');
	define('LANG_ORDER_UP',					 'Перемістити вгору');
	define('LANG_HITS',                      'Перегляди');

    //SEO
    define('LANG_SEO',                       'SEO');
    define('LANG_SEO_TITLE',                 'Заголовок (тайтл) сторінки');
    define('LANG_SEO_KEYS',                  'Ключові слова');
    define('LANG_SEO_KEYS_HINT',             'Ключові слова сторінки, через кому');
    define('LANG_SEO_DESC',                  'Опис');
    define('LANG_SEO_DESC_HINT',             'Короткий опис сторінки для пошукових систем');
    define('LANG_TAGS',                      'Теги');
    define('LANG_TAGS_HINT',                 'Ключові слова, через кому');

    //FILES
    define('LANG_B',               'байт');
    define('LANG_KB',              'Кб');
    define('LANG_MB',              'Мб');
    define('LANG_GB',              'Гб');
    define('LANG_TB',              'Тб');
    define('LANG_PB',              'Пб');

	//UNITS
    define('LANG_UNIT1',                     'одиниця');
    define('LANG_UNIT2',                     'одиниці');
    define('LANG_UNIT10',                    'одиниць');
	define('LANG_CH1',                       'символ');
    define('LANG_CH2',                       'символу');
    define('LANG_CH10',                      'символів');

    define('LANG_ISLEFT',                    'залишилося');

    //DATES
    define('LANG_ALL',                       'Всі');
    define('LANG_JUST_NOW',                  'Тільки що');
    define('LANG_SECONDS_AGO',               'Менше хвилини');
    define('LANG_YESTERDAY',                 'Вчора');
    define('LANG_TODAY',                     'Сьогодні');
    define('LANG_TOMORROW',                  'Завтра');
    define('LANG_WEEK',                      'Тиждень');
    define('LANG_WEEK1',                     'тиждень');
    define('LANG_WEEK2',                     'тижня');
    define('LANG_WEEK10',                    'тижнів');
    define('LANG_THIS_WEEK',                 'На цьому тижні');
    define('LANG_THIS_MONTH',                'Найближчий місяць');
    define('LANG_EVENTS_THIS_WEEK',          'Події цього тижня');
    define('LANG_CALENDAR',                  'Календар');
    define('LANG_TIME_ZONE',                 'Часовий пояс');
    define('LANG_YEAR',                      'Рік');
    define('LANG_YEARS',                     'Роки');
    define('LANG_YEAR1',                     'рік');
    define('LANG_YEAR2',                     'роки');
    define('LANG_YEAR10',                    'років');
    define('LANG_MONTHS',                    'Місяці');
    define('LANG_MONTH',                     'Місяць');
    define('LANG_MONTH1',                    'місяць');
    define('LANG_MONTH2',                    'місяці');
    define('LANG_MONTH10',                   'місяців');
    define('LANG_DAYS',                      'Дні');
    define('LANG_DAY1',                      'день');
    define('LANG_DAY2',                      'дні');
    define('LANG_DAY10',                     'днів');
    define('LANG_HOURS',                     'Години');
    define('LANG_HOUR1',                     'година');
    define('LANG_HOUR2',                     'години');
    define('LANG_HOUR10',                    'годин');
    define('LANG_MINUTES',                   'Хвилини');
    define('LANG_MINUTE1',                   'хвилина');
    define('LANG_MINUTE2',                   'хвилини');
    define('LANG_MINUTE10',                  'хвилин');
    define('LANG_SECONDS',                   'Секунди');
    define('LANG_SECOND1',                   'секунда');
    define('LANG_SECOND2',                   'секунди');
    define('LANG_SECOND10',                  'секунд');
    define('LANG_DATE_AGO',                  '%s назад');

    //MAIL
    define('LANG_MAIL_DEFAULT_ALT',          'Для перегляду повідомлення знадобиться поштовий клієнт з підтримкою HTML');

    define('LANG_POWERED_BY_INSTANTCMS',     'Працює на <a href="http://instantcms.ru/">InstantCMS</a>');
    define('LANG_ICONS_BY_FATCOW',           'Іконки від <a href="http://www.fatcow.com/free-icons">FatCow</a>');
    define('LANG_DEBUG_QUERY_TIME',          'Запит зайняв');
