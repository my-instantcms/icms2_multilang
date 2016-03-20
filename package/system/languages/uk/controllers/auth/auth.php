<?php

    define('LANG_AUTH_CONTROLLER',          'Авторизація та реєстрація');

    define('LANG_AUTHORIZATION',            'Авторизація');

    define('LANG_AUTH_RESTRICTIONS',            'Обмеження і заборони');
    define('LANG_AUTH_RESTRICTED_EMAILS',       'Заборонені адреси e-mail');
    define('LANG_AUTH_RESTRICTED_EMAILS_HINT',  'Одна адреса на рядок, можна використовувати символ * для підстановки будь-якого значення');
    define('LANG_AUTH_RESTRICTED_EMAIL',        'Використання e-mail адреси <b>%s</b> заборонено');

    define('LANG_AUTH_RESTRICTED_NAMES',        'Заборонені нікнейми');
    define('LANG_AUTH_RESTRICTED_NAMES_HINT',   'Один нікнейм на рядок, можна використовувати символ * для підстановки будь-якого значення');
    define('LANG_AUTH_RESTRICTED_NAME',         'Використання никнейма <b>%s</b> заборонено');

    define('LANG_AUTH_RESTRICTED_IPS',          'Заборонені IP-адреси для реєстрації');
    define('LANG_AUTH_RESTRICTED_IPS_HINT',     'Одна адреса на рядок, можна використовувати символ * для підстановки будь-якого значення');
    define('LANG_AUTH_RESTRICTED_IP',           'Реєстрація з IP-адреси <b>%s</b> заборонена');

    define('LANG_AUTH_INVITES',                 'Запрошення');
    define('LANG_AUTH_INVITES_AUTO',            'Видавати запрошення зареєстрованим користувачам');
    define('LANG_AUTH_INVITES_AUTO_HINT',       'Користувачі зможуть відправляти запрошення своїм знайомим');
    define('LANG_AUTH_INVITES_STRICT',          'Прив’язувати запрошення до e-mail');
    define('LANG_AUTH_INVITES_STRICT_HINT',     'Якщо увімкнено, зареєструватися за кодом запрошення можна буде тільки з тим e-mail, на який цей код був відправлений');
    define('LANG_AUTH_INVITES_PERIOD',          'Видавати запрошення раз в період');
    define('LANG_AUTH_INVITES_QTY',             'Скільки запрошень видавати');
    define('LANG_AUTH_INVITES_KARMA',           'Видавати запрошення тільки користувачам з репутацією вище');
    define('LANG_AUTH_INVITES_RATING',          'Видавати запрошення тільки користувачам з рейтингом вище');
    define('LANG_AUTH_INVITES_DATE',            'Видавати запрошення тільки користувачам, які знаходяться на сайті не менше');

    define('LANG_REG_INVITED_ONLY',             'Реєстрація проводиться тільки за запрошеннями');
    define('LANG_REG_INVITE_CODE',              'Код запрошення');
    define('LANG_REG_WRONG_INVITE_CODE',        'Код запрошення вказано неправильно');
    define('LANG_REG_WRONG_INVITE_CODE_EMAIL',  'Код запрошення призначений для іншого e-mail');

    define('LANG_REG_CFG_IS_ENABLED',           'Реєстрація увімкнена');
    define('LANG_REG_CFG_DISABLED_NOTICE',      'Причина відключення реєстрації');
    define('LANG_REG_CFG_IS_INVITES',           'Реєстрація тільки за запрошеннями');

    define('LANG_REG_CFG_REG_CAPTCHA',          'Показувати капчу для захисту від спамових реєстрацій');
    define('LANG_REG_CFG_AUTH_CAPTCHA',         'Показувати капчу після невдалої авторизації');

    define('LANG_REG_CFG_VERIFY_EMAIL',        'Вимагати підтвердження e-mail при реєстрації');
    define('LANG_REG_CFG_VERIFY_EMAIL_HINT',   'Після реєстрації користувач блокується до переходу за посиланням з отриманого листа');
    define('LANG_REG_CFG_VERIFY_EXPIRATION',   'Видаляти непідтверджені акаунти через, годин');
    define('LANG_REG_CFG_VERIFY_LOCK_REASON',  'Необхідно підтвердити адресу e-mail');
    define('LANG_REG_CFG_DEF_GROUP_ID',	       'Поміщати нових користувачів в групи');

    define('LANG_REG_INCORRECT_EMAIL',       'Некоректна адреса електронної пошти');
    define('LANG_REG_EMAIL_EXISTS',          'Зазначена адреса електронної пошти вже зареєстрована');
    define('LANG_REG_PASS_NOT_EQUAL',        'Паролі не співпали');
    define('LANG_REG_PASS_EMPTY',            'Необхідно вказати пароль');
    define('LANG_REG_SUCCESS',               'Реєстрація пройшла успішно');
    define('LANG_REG_SUCCESS_NEED_VERIFY',   'На адресу <b>%s</b>відправлено листа. Перейдіть за посиланням в листі, щоб активувати Ваш акаунт');
    define('LANG_REG_SUCCESS_VERIFIED',      'Адреса e-mail успішно підтверджена. Ви можете авторизуватися на сайті');

    define('LANG_PASS_RESTORE',              'Відновлення пароля');
    define('LANG_EMAIL_NOT_FOUND',           'Зазначений E-mail не знайдено в нашій базі');
    define('LANG_TOKEN_SENDED',              'На вказану адресу E-mail відправлені інструкції по відновленню пароля');
    define('LANG_RESTORE_NOTICE',            'Будь ласка, вкажіть адресу E-mail, яку ви вводили при реєстрації.<br/>На вказану адресу будуть вислані інструкції по відновленню пароля.');
