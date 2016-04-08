# MultiLang
Компонент Мультиязычности для InstantCMS 2.4.*

- [Установка](#Установка)
- [Знакомства с интерфейсом](#Знакомства-с-интерфейсом)
- [Перевод материалов](#Перевод-материалов)
- [Проблемы с переводом Меню и Виджетов](#Проблемы-с-переводом-Меню-и-Виджетов)

## Установка

Перед установкой компонента лучше всего отключить кеширование в общих настройках сайта, если оно включено.

#### Автоматический способ установки
* Скачайте компонент;
* Зайдите в Админку - Компоненты - Установить пакет дополнения;
* Выберите архив, который скачали и нажмите Продолжить;
* На странице «Информация о пакете» нажмите Установить;
* Заполните реквизиты для доступа по FTP (необходимо для загрузки файлов компонента на сайт);
* Установка завершена.

#### Ручной способ установки
Используйте в случае, если доступ по FTP на сайт невозможен, либо вы не уверены в том, как правильно указать реквизиты FTP в автоматическом установщике.
* В архиве компонента, откройте папку package;
* Все содержимое этой папки загрузите в корень вашего сайта (если по ftp, то в двоичном режиме);
* Далее сделайте все то же самое, что написано выше, в «Автоматическом способе», но в п.5 поставьте чекбокс «Пропустить этот шаг» и нажмите «Установить».

## Знакомства с интерфейсом
![Интерфейс](http://my-instantcms.ru/upload/u1/ml_interface.jpg "Интерфейс")

## Перевод материалов
Что бы перевести материал, меню или виджет, надо в выбрать соответствующий раздел в Навигации, потом в появившемся списке выбрать запись для перевода. 
![Интерфейс](http://my-instantcms.ru/upload/u1/ml_translate.jpg "Интерфейс")

## Проблемы с переводом Меню и Виджетов
По умолчанию, компонент не переводить меню и заголовок виджетов, даже если вы в админке добавили перевод. К сожалению мне не удалось переводить их без изменение системных файлов, по этому ниже будет код, который поможеть переводить меню и виджетов.

###### Открыть файл \system\controllers\menu\model.php в строку 128 добавить
```php
$menus = cmsEventsManager::hook('menu_translate', $menus);
```

Должно получиться так
```php
if($menus){
	$menus = cmsEventsManager::hook('menu_translate', $menus);
        foreach ($menus as $menu) {
            $result[$menu['menu_name']][$menu['id']] = $menu;
        }
}
```

###### Открыть файл \system\controllers\widgets\model.php в конце найти
```php
public function getWidgetsForPages($pages_list, $template){

    $this->useCache('widgets.bind');

    return $this->
                select('w.controller', 'controller')->
                select('w.name', 'name')->
                join('widgets', 'w', 'w.id = i.widget_id')->
                filterEqual('template', $template)->
                filterNotNull('is_enabled')->
                filterIn('page_id', $pages_list)->
                orderBy('i.page_id, i.position, i.ordering')->forceIndex('page_id')->
                get('widgets_bind', function($item, $model){
                    $item['options'] = cmsModel::yamlToArray($item['options']);
                    $item['groups_view'] = cmsModel::yamlToArray($item['groups_view']);
                    $item['groups_hide'] = cmsModel::yamlToArray($item['groups_hide']);
                    return $item;
                });

}
```

Заменить на
```php
public function getWidgetsForPages($pages_list, $template){

      $this->useCache('widgets.bind');

      $widgets = $this->
                  select('w.controller', 'controller')->
                  select('w.name', 'name')->
                  join('widgets', 'w', 'w.id = i.widget_id')->
                  filterEqual('template', $template)->
                  filterNotNull('is_enabled')->
                  filterIn('page_id', $pages_list)->
                  orderBy('i.page_id, i.position, i.ordering')->forceIndex('page_id')->
                  get('widgets_bind', function($item, $model){
                      $item['options'] = cmsModel::yamlToArray($item['options']);
                      $item['groups_view'] = cmsModel::yamlToArray($item['groups_view']);
                      $item['groups_hide'] = cmsModel::yamlToArray($item['groups_hide']);
                      return $item;
                  });
	$widgets = cmsEventsManager::hook('widgets_translate', $widgets);
	return $widgets;
  }
```
