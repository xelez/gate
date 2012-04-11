<?php
/**
*
* acp_attachments [Russian]
*
* @package language
* @version $Id$
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
exit;
}

if (empty($lang) || !is_array($lang))
{
$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_ATTACHMENT_SETTINGS_EXPLAIN'		=> 'Здесь Вы можете настроить основные параметры вложений и связанных с ними специальных разделов.',
	'ACP_EXTENSION_GROUPS_EXPLAIN'			=> 'Здесь Вы можете добавлять, удалять и изменять группы расширений. Также здесь можно отключать определенные группы расширений, назначать на группы специальные разделы, изменять режим загрузки вложений, а также указать значок, который будет отображаться перед вложением, принадлежащим определенной группе.',
	'ACP_MANAGE_EXTENSIONS_EXPLAIN'			=> 'Здесь Вы можете управлять разрешенными расширениями. Для активации расширений посетите страницу «Группы расширений». Мы настоятельно рекомендуем не разрешать потенциально опасные расширения (такие, как <code>php</code>, <code>php3</code>, <code>php4</code>, <code>phtml</code>, <code>pl</code>, <code>cgi</code>, <code>py</code>, <code>rb</code>, <code>asp</code>, <code>aspx</code> и так далее…).',
	'ACP_ORPHAN_ATTACHMENTS_EXPLAIN'		=> 'Здесь Вы можете видеть потерянные файл. Обычно такие файлы появляются из-за того, что пользователи прикрепляют файлы, но не отправляют сообщение. Вы можете удалить такие файлы или прикрепить их к существующим сообщениям. Во втором случае Вам потребуется правильный идентификатор сообщения(ID), который Вы должны указать самостоятельно. После этого загруженное вложение будет прикреплено к указанному Вами сообщению',
	'ADD_EXTENSION'							=> 'Добавить расширение',
	'ADD_EXTENSION_GROUP'					=> 'Добавление группы расширений',
	'ADMIN_UPLOAD_ERROR'					=> 'Ошибки при попытке прикрепления файла: «%s».',
	'ALLOWED_FORUMS'						=> 'Разрешить в форумах',
	'ALLOWED_FORUMS_EXPLAIN'				=> 'Возможность отправлять назначенные расширения в выбранных (или во всех при их выборе) форумах.',
	'ALLOWED_IN_PM_POST'					=> 'Разрешена',
	'ALLOW_ATTACHMENTS'						=> 'Разрешить вложения',
	'ALLOW_ALL_FORUMS'						=> 'Во всех форумах',
	'ALLOW_IN_PM'							=> 'Разрешить в личных сообщениях',
	'ALLOW_PM_ATTACHMENTS'					=> 'Разрешить вложения в личных сообщениях',
	'ALLOW_SELECTED_FORUMS'					=> 'Только в выбранных',
	'ASSIGNED_EXTENSIONS'					=> 'Назначенные расширения',
	'ASSIGNED_GROUP'						=> 'назначенная группа расширений',
	'ATTACH_EXTENSIONS_URL'					=> 'Расширения',
	'ATTACH_EXT_GROUPS_URL'					=> 'Группы расширений',
	'ATTACH_ID'								=> 'ID',
	'ATTACH_MAX_FILESIZE'					=> 'Максимальный размер файла',
	'ATTACH_MAX_FILESIZE_EXPLAIN'			=> 'Максимальный размер каждого загружаемого файла. Значение 0 соответствует неограниченному размеру.',
	'ATTACH_MAX_PM_FILESIZE'				=> 'Максимальный размер в личных сообщениях',
	'ATTACH_MAX_PM_FILESIZE_EXPLAIN'		=> 'Максимальный размер для каждого файла, вложенного в личное сообщение. Если ввесли "0", он будет неограничен.',
	'ATTACH_ORPHAN_URL'						=> 'Потерянные вложения',
	'ATTACH_POST_ID'						=> 'ID сообщения',
	'ATTACH_QUOTA'							=> 'Общая квота вложений',
	'ATTACH_QUOTA_EXPLAIN'					=> 'Максимально доступное дисковое пространство для вложений. Значение 0 соответствует неограниченному размеру.',
	'ATTACH_TO_POST'						=> 'Прикрепить файл к сообщению',

	'CAT_FLASH_FILES'				=> 'Файлы Flash',
	'CAT_IMAGES'					=> 'Рисунки',
	'CAT_QUICKTIME_FILES'			=> 'Фильмы QuickTime',
	'CAT_RM_FILES'					=> 'Файлы RealMedia',
	'CAT_WM_FILES'					=> 'Файлы Windows Media',
	'CHECK_CONTENT'					=> 'Проверить вложения',
	'CHECK_CONTENT_EXPLAIN'			=> 'Некоторые браузеры могут быть обмануты при определении mime типа закачиваемых файлов. Данное средство позволяет проверить и предотвратить закачивание таких вложений.',
	'CREATE_GROUP'					=> 'Создать группу',
	'CREATE_THUMBNAIL'				=> 'Создавать миниатюры',
	'CREATE_THUMBNAIL_EXPLAIN'		=> 'Всегда создавать миниатюры.',

	'DEFINE_ALLOWED_IPS'				=> 'Разрешенные IP-адреса и узлы',
	'DEFINE_DISALLOWED_IPS'				=> 'Запрещенные IP-адреса и узлы',
	'DOWNLOAD_ADD_IPS_EXPLAIN'			=> 'Вводите каждый IP-адрес или имя узла на новой строке. Для указания диапазона IP-адресов разделите начало и конец диапазона дефисом (-), или используйте подстановочный знак (*) в качестве шаблона.',
	'DOWNLOAD_REMOVE_IPS_EXPLAIN'		=> 'Вы можете удалить (или удалить из исключенных) за один раз несколько IP-адресов. Для выбора нескольких адресов используйте соответствующую для Вашего компьютера и браузера комбинацию мыши и клавиатуры. Исключенные IP-адреса отображаются на синем фоне.',
	'DISPLAY_INLINED'					=> 'Показывать рисунки в сообщениях',
	'DISPLAY_INLINED_EXPLAIN'			=> 'Если выбрать «Нет», то рисунки, вложенные в сообщения, будут отображаться в виде ссылок.',
	'DISPLAY_ORDER'						=> 'Порядок отображения вложений',
	'DISPLAY_ORDER_EXPLAIN'				=> 'Отображение вложений по времени размещения.',

	'EDIT_EXTENSION_GROUP'				=> 'Редактирование группы расширений',
	'EXCLUDE_ENTERED_IP'				=> 'Включите эту опцию для исключения указанного IP-адреса или узла из списка разрешенных.',
	'EXCLUDE_FROM_ALLOWED_IP'			=> 'Исключить IP-адрес из разрешенных',
	'EXCLUDE_FROM_DISALLOWED_IP'		=> 'Исключить IP-адреса или имена узлов из запрещенных',
	'EXTENSIONS_UPDATED'				=> 'Расширение успешно обновлено.',
	'EXTENSION_EXIST'					=> 'Расширение %s уже существует.',
	'EXTENSION_GROUP'					=> 'Группа расширений',
	'EXTENSION_GROUPS'					=> 'Группы расширений',
	'EXTENSION_GROUP_DELETED'			=> 'Группа расширений успешно удалена.',
	'EXTENSION_GROUP_EXIST'				=> 'Группа расширений %s уже существует.',
	
	'EXT_GROUP_ARCHIVES'			=> 'Архиры',
	'EXT_GROUP_DOCUMENTS'			=> 'Документы',
	'EXT_GROUP_DOWNLOADABLE_FILES'	=> 'Скачиваемые файлы',
	'EXT_GROUP_FLASH_FILES'			=> 'Flash-файлы',
	'EXT_GROUP_IMAGES'				=> 'Изображения',
	'EXT_GROUP_PLAIN_TEXT'			=> 'Текстовые файлы',
	'EXT_GROUP_QUICKTIME_MEDIA'		=> 'Quicktime Media',
	'EXT_GROUP_REAL_MEDIA'			=> 'Real Media',
	'EXT_GROUP_WINDOWS_MEDIA'		=> 'Windows Media',
	
	'GO_TO_EXTENSIONS'			=> 'Перейти на страницу управления расширениями',
	'GROUP_NAME'				=> 'Имя группы',

	'IMAGE_LINK_SIZE'				=> 'Размеры рисунков для ссылки',
	'IMAGE_LINK_SIZE_EXPLAIN'		=> 'Если рисунок больше указанных размеров, то вместо него будет отображена ссылка для загрузки этого рисунка. Введите размеры 0?0 для отключения этой возможности.',
	'IMAGICK_PATH'					=> 'Путь к программе ImageMagick',
	'IMAGICK_PATH_EXPLAIN'			=> 'Полный путь к программе ImageMagick. Например, <samp>/usr/bin/</samp>.',

	'MAX_ATTACHMENTS'					=> 'Максимальное количество вложений в сообщении',
	'MAX_ATTACHMENTS_PM'				=> 'Максимальное количество вложений в личном сообщении',
	'MAX_EXTGROUP_FILESIZE'				=> 'Максимальный размер файла',
	'MAX_IMAGE_SIZE'					=> 'Максимальные размеры рисунков',
	'MAX_IMAGE_SIZE_EXPLAIN'			=> 'Максимальные размеры загружаемых рисунков. Введите 0?0 для отключения проверки размеров.',
	'MAX_THUMB_WIDTH'					=> 'Максимальная ширина миниатюр',
	'MAX_THUMB_WIDTH_EXPLAIN'			=> 'Ширина создаваемых миниатюр не будет превышать указанного размера.',
	'MIN_THUMB_FILESIZE'				=> 'Минимальный размер файла миниатюр',
	'MIN_THUMB_FILESIZE_EXPLAIN'		=> 'Не создавать миниатюры для рисунков меньше указанного размера.',
	'MODE_INLINE'						=> 'Inline',
	'MODE_PHYSICAL'						=> 'Physical',

	'NOT_ALLOWED_IN_PM'				=> 'Запрещена в личных сообщениях',
	'NOT_ALLOWED_IN_PM_POST'		=> 'Не разрешена',
	'NOT_ASSIGNED'					=> 'Не назначена',
	'NO_EXT_GROUP'					=> 'Нет',
	'NO_EXT_GROUP_NAME'				=> 'Не задано имя группы',
	'NO_EXT_GROUP_SPECIFIED'		=> 'Не указана группа расширений.',
	'NO_FILE_CAT'					=> 'Нет',
	'NO_IMAGE'						=> 'Без значка',
	'NO_THUMBNAIL_SUPPORT'			=> 'Поддержка миниатюр отключена, поскольку не найдено доступной библиотеки GD или установленной программы ImageMagick.',
	'NO_UPLOAD_DIR'					=> 'Указанная Вами папка для загрузки не существует.',
	'NO_WRITE_UPLOAD'				=> 'Указанная Вами папка для загрузки недоступна для записи. Измените права доступа для этой папки, разрешив серверу запись в нее.',

	'ONLY_ALLOWED_IN_PM'		=> 'Разрешена только в личных сообщениях',
	'ORDER_ALLOW_DENY'			=> 'Разрешить',
	'ORDER_DENY_ALLOW'			=> 'Запретить',

	'REMOVE_ALLOWED_IPS'		=> 'Удаление или удаление из исключенных <em>разрешенных</em> IP-адресов или узлов',
	'REMOVE_DISALLOWED_IPS'		=> 'Удаление или удаление из исключенных <em>запрещенных</em> IP-адресов или узлов',

	'SEARCH_IMAGICK'					=> 'Найти ImageMagick',
	'SECURE_ALLOW_DENY'					=> 'Список разрешенных и запрещенных',
	'SECURE_ALLOW_DENY_EXPLAIN'			=> 'Изменение поведения по умолчанию списка разрешенных и запрещенных при включении безопасных загрузок на <strong>белый список</strong> (Разрешить) или на <strong>черный список</strong> (Запретить).',
	'SECURE_DOWNLOADS'					=> 'Включить безопасные загрузки',
	'SECURE_DOWNLOADS_EXPLAIN'			=> 'С включенной опцией все загрузки будут ограничены указанными Вами IP-адресами и узлами.',
	'SECURE_DOWNLOAD_NOTICE'			=> 'Безопасные загрузки не включены. Настройки ниже будут применены после включения безопасных загрузок.',
	'SECURE_DOWNLOAD_UPDATE_SUCCESS'=> 'Список IP-адресов успешно обновлен.',
	'SECURE_EMPTY_REFERRER'				=> 'Разрешить пустой источник перехода',
	'SECURE_EMPTY_REFERRER_EXPLAIN'		=> 'Безопасные загрузки основаны на указании источника перехода (referrers). Вы хотите разрешить загрузки с отсутствующим источником перехода?',
	'SETTINGS_CAT_IMAGES'				=> 'Настройки раздела изображений',
	'SPECIAL_CATEGORY'					=> 'Специальный раздел',
	'SPECIAL_CATEGORY_EXPLAIN'			=> 'Специальные разделы отличаются способом отображения вложений в сообщениях.',
	'SUCCESSFULLY_UPLOADED'				=> 'Загрузка успешно завершена.',
	'SUCCESS_EXTENSION_GROUP_ADD'		=> 'Группа расширений успешно добавлена.',
	'SUCCESS_EXTENSION_GROUP_EDIT'		=> 'Группа расширений успешно обновлена.',

	'UPLOADING_FILES'					=> 'Загрузка файлов',
	'UPLOADING_FILE_TO'					=> 'Загрузка файла «%1$s» в сообщение под номером %2$d…',
	'UPLOAD_DENIED_FORUM'				=> 'У Вас нет прав на загрузку файлов в форум «%s».',
	'UPLOAD_DIR'						=> 'Папка для загрузки',
	'UPLOAD_DIR_EXPLAIN'				=> 'Папка для хранения вложений. Примечание: если Вы измените эту папку, в то время как в ней уже имеются загруженные файлы, то Вам придется вручную скопировать эти файлы в новую папку.',
	'UPLOAD_ICON'						=> 'Значок загрузки',
	'UPLOAD_NOT_DIR'					=> 'Указанный путь для загрузки файлов не является папкой.',
));

?>