<?php

/**
 * Returns months names for current language
 * @return array
 */
function lang_months(){
    return array(
        'січня', 'лютого', 'березня', 'квітня', 'травня', 'червня',
        'липня', 'серпня', 'вересня', 'жовтня', 'листопада', 'грудня'
    );
}

/**
 * Returns days names for current language
 * @return array
 */
function lang_days(){
    return array(
        'нд', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'
    );
}

/**
 * Returns date for current language
 * @param string $date_string
 * @return string
 */
function lang_date($date_string){

    $eng_months = array(
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    );

    return str_replace($eng_months, lang_months(), $date_string);

}

/**
 * Converts string from current language to SLUG
 * @return string
 */
function lang_slug($string){

    $string    = strip_tags(trim($string));
    $string    = mb_strtolower($string, 'utf-8');
    $string    = str_replace(' ', '-', $string);

    $slug = preg_replace ('/[^a-zа-яё0-9\-\/]/u', '-', $string);
    $slug = preg_replace('/([-]+)/i', '-', $slug);
    $slug = trim($slug, '-');

    $uk_en = array(
                    'ё'=>'yo','ъ'=>'','ы'=>'y','э'=>'e',
                    'а'=>'a','б'=>'b','в'=>'v','г'=>'h','ґ'=>'g','д'=>'d',
                    'е'=>'e','є'=>'ye','ж'=>'zh','з'=>'z','и'=>'y','і'=>'i',
                    'ї'=>'yi','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n',
                    'о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u',
                    'ф'=>'f','х'=>'kh','ц'=>'ts','ч'=>'ch','ш'=>'sh','щ'=>'shch',
                    'ю'=>'yu','я'=>'ya','ь'=>'','\''=>''
                    );

    foreach($uk_en as $uk=>$en){
        $slug = str_replace($uk, $en, $slug);
    }

    if (!$slug){ $slug = 'untitled'; }
	if (is_numeric($slug)){ $slug .= strtolower(date('F')); }

    return $slug;

}

/**
 * Set locale information
 * @return mixed
 */
function lang_setlocale() {
    return setlocale(LC_ALL, 'ru_RU.UTF-8');
}
