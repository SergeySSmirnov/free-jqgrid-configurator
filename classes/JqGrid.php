<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет основную конфигурацию таблицы jqGrid.
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-NOW RUSproj, Sergey S. Smirnov
 */
 class JqGrid {
 	
 	/**
 	 * URL, по которому доступен JqGrid. Значение по умолчанию: /media/js/jqGrid/.
 	 * @var string
 	 */
 	public $jqGridURL = '/media/js/jqGrid/';
 	/**
 	 *  Массив js-скриптов, которые необходимо загрузить до загрузки jqGrid. Значение по умолчанию: array() (не определено).
 	 * @var array
 	 */
 	public $addonJS = array();
 	/**
 	 * Массив css-стилей, которые необходимо загрузить до загрузки jqGrid. Значение по умолчанию: array() (не определено).
 	 * @var array
 	 */
 	public $addonCSS = array();
 	
 	/**
 	 * Признак необходимости загрузить плагин ...
 	 * @var bool
 	 */
 	public $plugin_addons = FALSE;
 	/**
 	 * Признак необходимости загрузить плагин ...
 	 * @var bool
 	 */
 	public $plugin_postext = FALSE;
 	/**
 	 * Признак необходимости загрузить плагин ...
 	 * @var bool
 	 */
 	public $plugin_setcolumns = FALSE;
 	/**
 	 * Признак необходимости загрузить плагин предназначенный для формирования меню.
 	 * @var bool 
 	 */
 	public $plugin_contextmenu = FALSE;
 	/**
 	 * Признак необходимости загрузить плагин ...
 	 * @var bool 
 	 */
 	public $plugin_searchFilter = FALSE;
 	/**
 	 * Признак необходимости загрузить плагин ...
 	 * @var bool
 	 */
 	public $plugin_tablednd = FALSE;
 	/**
 	 * Признак необходимости загрузить плагин предназначенный для управления сортировкой и удалением столбцов.
 	 * @var bool
 	 */
 	public $plugin_multiselect = TRUE;
 	
 	/**
 	 * Массив пользовательских кнопок, добавляемых на панель управления. Значение по умолчанию: array().
 	 * @var JqGrid_CustomButton[]
 	 */
 	public $customButtons = array();
 	
 	/**
 	 * Признак необходимости добавить кнопку копирования выбранной записи. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $addCopyButton = FALSE;
 	/**
 	 * Признак необходимости добавить кнопку заморозки столбцов. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $addButtonFreze = FALSE;
 	/**
 	 * Признак необходимости добавить кнопку сортировки столбцов. Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $addButtonSortColumns = TRUE;
 	
 	
 	/**
 	 * Задает идентификатор элемента, который будет содержать табличную часть. Значение по умолчанию: '#list'.
 	 * @var string
 	 */
 	public $tableId = '#list';
 	
 	
 	/**
 	 * Задает признак необходимости задать двухстрочное оформление сетки таблицы (для четных и нечетных строк используются свои стили). Значение по умолчанию: FALSE.
 	 * @var boolean
 	 */
 	public $altRows = FALSE;
 	/**
 	 * Имя css-класса, используемого для оформления четных строк при двухстрочном оформлении сетки таблицы. Данный параметр имеет действие если altRows=TRUE. Значение по умолчнию: '' (не задано).
 	 * @var string
 	 */
 	public $altClass = '';
 	/**
 	 * Призак необходимости автоматического задания ширины таблицы и ширины столбцов в зависимости от ширины родительского контейнера. Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $autoWidth = TRUE;
 	/**
 	 * Задает заголовок таблицы. Значение по умолчанию: '' (не задано).
 	 * @var string
 	 */
 	public $caption = '';
 	/**
 	 * Данная опция определяет отступы слева и справа в ячейке + ширина границы клетки. Данное свойство следует менять только в том случае, если изменяется css-свойство для элемента td таблицы. Значение по умолчанию: -1 (не задано).
 	 * @var int
 	 */
 	public $cellLayout = -1;
 	/**
 	 * Разрешает или запрещает редактирование отдельных ячеек при одинарном клике по ней. Требует задания свойств cellSubmit и cellUrl. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $cellEdit = FALSE;
 	/**
 	 * Задает контекст сохранения ячейки. Данный параметр имеет действие если cellEdit=TRUE. Возможные значения: remote (новое значение будет отправлено на сервер) и clientArray (новое значение будет сохранено локально). Значение по умолчанию: 'remote'.
 	 * @var string
 	 */
 	public $cellSubmit = 'remote';
 	/**
 	 * URL-адрес, на который будет отправлено новое знчение ячейки. Данный параметр имеет действие если cellEdit=TRUE. Значение по умолчанию: '' (не задано).
 	 * @var string
 	 */
 	public $cellUrl = '';
 	/**
 	 * Задает массив описаний всех выводимых полей. Для задания параметров отдельных столбцов удобно пользваться статическими методами класса ColumnConfig или задав необходимые свойства экземпляру класса. Значение по умолчанию: array() (не задано).
 	 * @var jqGrid_Column[]
 	 */
 	public $colModel = array();
 	/**
 	 * Задает массив названий всех выводимых полей. Число записей в данном массиве должно соответсвовать числу записей в массиве свойства colModel. В качестве альтернативы, названия столбцов можно задавать в конфигурационном массиве colModel. Данное свойство имеет силу, если задано свойство colModel. Значение по умолчанию: array() (не задано).
 	 * @var array
 	 */
 	public $colNames = array();
 	/**
 	 * Тип данных, которые необходимо отобразить в таблице. Доступные значения: xml, xmlstring (xml-данные, представленые строкой), json, jsonstring (json-данные, представленые строкой), local (данные, определенные на стороне киента массивом данных), javascript (данные, представленные как javascript), function (пользовательская функция для получения данных), clientSide (ручная загрузка данных через массив данных). Значение по умолчанию: 'json'.
 	 * @var string 
 	 */
 	public $dataType = 'json';
 	/**
 	 * Массив данных, которые необходимо разместить в таблице. Значение по умолчанию: array() (данные не определены).
 	 * @var array
 	 */
 	public $data = array();
 	/**
 	 * Строка данных, которая представляет массив данных в формате xml или json, которые должны быть размещены в таблице. Данный параметр действителен в том случае, если значение свойства dataType равны xmlstring или jsonstring. Значение по умолчанию: '' (данные не определены).
 	 * @var string
 	 */
 	public $dataStr = '';
 	/**
 	 * Задает URL адрес для отправки отредактированных данных на сервер при построчном редактировании или редактировании данных в форме. Значение по умолчанию: ''.
 	 * @var string
 	 */
 	public $editUrl = '';
// 	public $ExpandColClick = TRUE;
// 	public $ExpandColumn = '';
 	/**
 	 * Признак того, что при изменении ширины столбца, размер граничного столбца будет уменьшатся вместо смещения. Значение по умолчнию: FALSE.
 	 * @var bool
 	 */
 	public $forceFit = FALSE;
// 	public $gridstate = '';
//	public $gridview = FALSE;
 	/**
 	 * Признак того, что в таблице разрешена группировка столбцов. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $grouping = FALSE;
 	/**
 	 * Признак того, что к заголовку колонки необходимо добавить атрибут заголовка. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $headerTitles = FALSE;
 	/**
 	 * Высота таблицы. Допустимые значения: число (высота в пикселах), '100%', 'auto'. Значение по умолчанию: '100%'.
 	 * @var int|string 
 	 */
 	public $height = '100%';
 	/**
 	 * Признак необходимости первоначально таблицу отобразить в свернутом в заголовок виде, при этом данные будут загружены только после первого отображения таблицы. Данный параметр имеет место в том случае, если задано свойство Caption. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $hiddenGrid = FALSE;
 	/**
 	 * Признак необходимости отобразить в заголовке кнопку сворачивания/разворачивания таблицы. Данный параметр имеет место в том случае, если задано свойство Caption. Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $hideGrid = TRUE;
 	/**
 	 * Признак необходимости отображения подсветки строки, над которой в текущий момент находится курсор мыши. Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $hoverRows = TRUE;
 	/**
 	 * Префикс, добавляемый к идентификатору строки когда она создается. Значение по умолчанию: '' (на задано).
 	 * @var string
 	 */
 	public $idPrefix = '';
 	/**
 	 * Признак необходимости сделать сортировку и поиск регистрозависимой. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $ignoreCase = FALSE;
// 	public $inlineData = array();
// 	public $jsonReader = array();
// 	public $lastpage = 0;
 	/**
 	 * Признак того, что данные загружаются в таблицу только один раз. После загрузки параметр datatype устанавливается в значение local. Все последующие операции с данными производятся локально. Если задано разбиение на страницы, то оно будет недоступно. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $loadOnce = FALSE;
 	/**
 	 * Определяет поведение jqGrid во время запроса данных. Возможные значения: disable (отключить индикатор прогресса, можно задать свой индикатор), enable (отображать надпись, опеределенную в языковом файле), block (отображать надпись, опеределенную в языковом файле, но при этом заблокировать все элементы управления). Значение по умолчанию: 'block'.
 	 * @var string
 	 */
 	public $loadui = 'block';
 	/**
 	 * Тип запроса. Допустимые значения: POST или GET. Значение по умолчанию: POST.
 	 * @var string
 	 */
 	public $mType = 'POST';
 	/**
 	 * Признак необходимости разрешить возможность множественного выбора строк. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $multiSelect = FALSE;
 	/**
 	 * Признак необходимости разрешить выбор строки только при щелчке по соответствующему полю, в противном случае щелчок по любой строке обнулит выбор (стиль yahoo). Данный параметр имеет место в том случае, если значение свойства multiSelect установлено в TRUE. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $multiBoxOnly = FALSE;
 	/**
 	 * Ширина столбца с элементами управления для выбора строк. Данный параметр имеет место в том случае, если значение свойства multiSelect установлено в TRUE. Значение по умолчанию: 20.
 	 * @var int
 	 */
 	public $multiSelectWidth = 20;
 	/**
 	 * Признак необходимости использовать сортировку по нескольким столбцам. В случае если данные загружаются с сервера, то при каждом щелчке по заголовку столбца, в отправляемом параметре sidx будет формироваться перечисление столбцов по которым проводить сортировку. Значение по умолчанию: FALSE.
 	 * @var bool 
 	 */
 	public $multiSort = FALSE;
 	/**
 	 * Конфигурационные параметры кнопок управления записями.
 	 * @var jqGrid_recButtons
 	 */
 	public $recButtonsConfig = NULL;
 	/**
 	 * Конфигурационные параметры панели постраничной навигации.
 	 * @var jqGrid_Pager
 	 */
 	public $pager = NULL;
// 	public $prmNames = array(page => 'page', rows => 'rows', sort => 'sidx', order => 'sord', search => '_search', nd => 'nd', id => 'id', oper => 'oper', editoper => 'edit', addoper => 'add', deloper => 'del', subgridid => 'id', npage => null, totalrows => 'totalrows');
// 	public $postData = array();
 	/**
 	 * Название css-класса, который добавляется к заголовкам колонок таблицы, которые могут менять свой размер. Значение по умолчнию: '' (не задано).
 	 * @var string 
 	 */
 	public $resizeClass = '';
 	/**
 	 * Задает признак необходимости отображать номера строк. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $rowNumbers = FALSE;
// 	public $rowTotal = -1;
 	/**
 	 * Задает ширину столбца, отображающего номера строк. Данный параметр имеет действие в том случае, если свойство rownNmbers равно true. Значение по умолчанию: 30.
 	 * @var int
 	 */
 	public $rowNumWidth = 30;
 	/**
 	 * Задает признак необходимости использовать динамическую прокрутку. При этом будет отключена панель навигации. Кроме того, значение свойства Height таблицы должно быть задано в пикселах, а не процентах или 'auto'. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $scroll = FALSE;
 	/**
 	 * Ширина вертикальной полосы прокрутки. Данный параметр имеет место в том случае, если свойство scroll установлено в TRUE. Значение по умолчанию: 18.
 	 * @var int
 	 */
 	public $scrollOffset = 18;
 	/**
 	 * Временная задержка до запроса данных. Данный параметр имеет место в том случае, если свойство scroll установлено в TRUE. Значение по умолчанию: 200.
 	 * @var int
 	 */
 	public $scrollTimeout = 100;
 	/**
 	 * Задает признак того, что необходимо выполнить прокрутку к выбранной строке при использовании метода setSelection. Данный параметр имеет место в том случае, если свойство scroll установлено в TRUE. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $scrollRows = FALSE;
 	/**
 	 * Задает признак необходимости подгонять ширину столбцов пропорционально их заданной ширине в пикселах в соответствии с шириной таблицы. Значение по умолчнию: TRUE.
 	 * @var bool 
 	 */
 	public $shrinkToFit = TRUE;
 	/**
 	 * Задает признак возможности менять порядок столбцов за счет их перетаскивания за заголовок. Значение по умолчнию: FALSE.
 	 * @var bool
 	 */
 	public $sortable = FALSE;
 	/**
 	 * Задает столбец, по которому производится сортировка по умолчанию при загрузке таблицы. Значение по умолчанию: '' (не задано).
 	 * @var string
 	 */
 	public $sortCol = '';
 	/**
 	 * Задает порядок сортировки. Возможные значения: asc или desc. Значение по умолчанию: 'asc'.
 	 * @var string
 	 */
 	public $sortOrder = 'asc';
 	/**
 	 * Задает признак возмжности использовать субтаблицы (вложенные таблицы). При этом слева появится дополнительный столбец, который позволит скрывать или отображать субтаблицы для каждой записи основной таблицы. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $subGrid = FALSE;
 	/**
 	 * Массив дополнительных параметров субтаблиц. Данный параметр имеет место, если значение свойства sortOrder установлено в TRUE. Значение по умолчанию: array() (не задано).
 	 * @var array
 	 */
 	public $subGridOptions = array();
 	/**
 	 * Массив, описывающий модель вложенных субтаблиц. Для задания параметров отдельных столбцов удобно пользваться статическими методами класса ColumnConfig или задав необходимые свойства экземпляру класса и вызвав метод getConfig(). Данный параметр имеет место, если значение свойства sortOrder установлено в TRUE. Значение по умолчанию: array() (не задано).
 	 * @var array
 	 */
 	public $subGridModel = array();
// 	public $subGridType = NULL;
 	/**
 	 * Задает URL адрес для получения данных субтаблиц. В результате будет добавлен (как параметр) id строки к данному адресу. Если необходимо передавать дополнительные параметры, необходимо определить их в свойстве subGridModel. Данный параметр имеет место, если значение свойства sortOrder установлено в TRUE. Значение по умолчанию: '' (не задано).
 	 * @var string
 	 */
 	public $subGridUrl = '';
 	/**
 	 * Задает ширину субтаблицы. Данный параметр имеет место, если значение свойства sortOrder установлено в TRUE. Значение по умолчанию: 20 (не задано).
 	 * @var int
 	 */
 	public $subGridWidth = 20;
 	/**
 	 * Задает расположение панели инструментов. Первый параметр массива определяет признак необходимости включить панель инструментов. Второй определяет место создания панели. Возможные значения: top (наверху, перед таблицей), bottom (внизу, после таблицы), both (вверху и внизу). Значение по умолчанию: array(false, 'both').
 	 * @var array  
 	 */
 	public $toolbar = array(FALSE, 'both');
 	/**
 	 * Задает признак необходимости дополнительно разместить панель выбора страницы перед таблицей (наверху). Значение по умолчанию: FALSE.
 	 * @var bool 
 	 */
 	public $toppager = FALSE;
// 	public $treedatatype = NULL;
 	/**
 	 * Задает признак необходимости представления данных в виде дерева. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $treeGrid = FALSE;
 	/**
 	 * Задает метод, используемый treeGreed. Возможные значения: nested (вложенный) или adjacency (смежный). Данный параметр имеет место, если значение свойства treeGred установлено в TRUE. Значение по умолчанию: nested.
 	 * @var string
 	 */
 	public $treeGridModel = 'nested';
 	/**
 	 * Задает значки, используемые для представления дерева. Необходима следующая структура массива: {plus:'ui-icon-triangle-1-e',minus:'ui-icon-triangle-1-s',leaf:'ui-icon-radio-off'}. Данный параметр имеет место, если значение свойства treeGred установлено в TRUE. Значение по умолчанию: array() (не определено).
 	 * @var array
 	 */
 	public $treeIcons = array();
 	/**
 	 * Расширяет свойство colModel в базовой таблице. Описанные здесь поля добавляются в конец свойства colModel и скрываются. Это означает, что данные, возвращаемые с сервера должны иметь значения для этих полей. Данный параметр имеет место, если значение свойства treeGred установлено в TRUE. Значение по умолчанию: array() (не определено).
 	 * @var array
 	 */
 	public $treeReader = array();
 	/**
 	 * Определят уровень, с которого начинается корень treeGreed. Данный параметр имеет место, если значение свойства treeGred установлено в TRUE. Значение по умолчанию: 0.
 	 * @var int
 	 */
 	public $treeRootLevel = 0; 
 	/**
 	 * Задает URL адрес, который вернет данные для таблицы. Значение по умолчанию: '' (не определено).
 	 * @var string
 	 */
 	public $url = '';
// 	public $userData = array();
// 	public $userDataOnFooter = FALSE;
 	/**
 	 * Задает признак того, что кнопки сортировки должны отображаться у каждого столбца, по которому возможна сортировка данных. Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $viewSortColsVisibleIcons = TRUE;
 	/**
 	 * Задает признакт того, что столбец будет отсортирован при щелчке по любому месту заголовка. Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $viewSortColsClickableHeaders = TRUE;
 	/**
 	 * Задает конечную ширину таблицы. Если значение не задано, то ширина таблицы будет складываться из суммы ширин всех столбцов, в противном случае на основе свойства shrinkToFit. Значение по умолчанию: 0 (не задано).
 	 * @var int
 	 */
 	public $width = 0;
// 	public $xmlReader = array();
 	/**
 	 * Признак необходимости добавить форму перед таблицей. Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $headerForm = FALSE;
 	/**
 	 * Задает действительный идентификатор html-элемента, который будет содержать подгружаемую форму, расположенную перед таблицей. Значение по умолчанию: '#hForm'.
 	 * @var string
 	 */
 	public $headerFormHtmlID = '#hForm';
 	/**
 	 * Название функции, осуществляющей загрузку и отрисовку формы. Значение по умолчанию: '' (не определено).
 	 * @var string
 	 */
 	public $headerFormCompleteFunction = '';
 	
 	
 	/**
 	 * 
 	 * @var bool
 	 */
 	public $existsDateCol = FALSE;
 	/**
 	 * 
 	 * @var string
 	 */
 	public $dateColIndexes = '';
 	
 	/**
	 * Конструктор класса JqGrid.
 	 */
 	function __construct() {
 		$this->recButtonsConfig = new JqGrid_RecButtons();
 		$this->pager = new JqGrid_Pager();
 	}
 	
 	/**
 	 * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid.
 	 * @return array Массив, содержащий конфигурацию для инициализации таблицы JqGrid. 
 	 */
 	public function getConfig() {
 		$cfg = array();

 		// Формируем заданные пользовательские кнопки
 		if ($this->addCopyButton || $this->addButtonFreze || $this->addButtonSortColumns) {
 			if ($this->addCopyButton)
 				$this->customButtons[] = JqGrid_CustomButton::addButton('editForm_Copy', '', 'ui-icon-copy', 'Копировать выделенную запись', 'first');
 			$this->customButtons[] = JqGrid_CustomButton::addSeparator();
 			if ($this->addButtonSortColumns)
 				$this->customButtons[] = JqGrid_CustomButton::addButton('columnChooser', '', 'ui-icon-shuffle', 'Переупорядочивание и скрытие колонок');
 			if ($this->addButtonFreze)
 				$this->customButtons[] = JqGrid_CustomButton::addButton('columnFreze', '', 'ui-icon-unlocked', 'Заморозить/разморозить фиксированные столбцы');
 		}
 		if (count($this->customButtons) > 0) {
 			$cfg['custom_buttons'] = array();
 			foreach ($this->customButtons as $button)
 				$cfg['custom_buttons'][] = $button->getConfig();
 		}
 		
 		// Формируем массив подключаемых плагинов
 		$cfg['plugins'] = array();
 		$cfg['plugins']['js'] = $this->addonJS;
 		$cfg['plugins']['css'] = $this->addonCSS;
 		if ($this->plugin_addons) $cfg['plugins']['js'][] = $this->jqGridURL.'plugins/grid.addons.js';
 		if ($this->plugin_postext) $cfg['plugins']['js'][] = $this->jqGridURL.'plugins/grid.postext.js';
 		if ($this->plugin_setcolumns) $cfg['plugins']['js'][] = $this->jqGridURL.'plugins/grid.setcolumns.js';
 		if ($this->plugin_contextmenu) $cfg['plugins']['js'][] = $this->jqGridURL.'plugins/jquery.contextmenu.js';
 		if ($this->plugin_searchFilter) {
 			$cfg['plugins']['js'][] = $this->jqGridURL.'plugins/jquery.searchFilter.js';
 			$cfg['plugins']['css'][] = $this->jqGridURL.'plugins/jquery.searchFilter.css';
 		}
 		if ($this->plugin_tablednd)
 			$cfg['plugins']['js'][] = $this->jqGridURL.'plugins/jquery.tablednd.js';
 		if ($this->plugin_multiselect || $this->addButtonSortColumns) {
 			$cfg['plugins']['js'][] = $this->jqGridURL.'plugins/ui.multiselect.js';
 			$cfg['plugins']['css'][] = $this->jqGridURL.'plugins/ui.multiselect.css';
 		}
 		$cfg['plugins']['js'][] = $this->jqGridURL.'jqGrid.min.js';
 		$cfg['plugins']['css'][] = $this->jqGridURL.'jqGrid.min.css';
 		$cfg['plugins']['js'][] = $this->jqGridURL.'jqGrid.locale-ru.js';
 		
 		// Формируем массив основной конфигурации
 		$cfg['config'] = array();
 		if ($this->altRows) {
 			$cfg['config']['altRows'] = TRUE;
 			if (!empty($this->altClass))
 				$cfg['config']['altclass'] = $this->altClass;
 		}
 		$cfg['config']['autowidth'] = $this->autoWidth;
 		if (!empty($this->caption)) {
 			$cfg['config']['caption'] = $this->caption;
 			$cfg['config']['hiddengrid'] = $this->hiddenGrid;
 			$cfg['config']['hidegrid'] = $this->hideGrid;
 		}
 		if ($this->cellLayout !== -1)
 			$cfg['config']['cellLayout'] = $this->cellLayout;
 		if ($this->cellEdit) {
 			$cfg['config']['cellEdit'] = TRUE;
 			$cfg['config']['cellsubmit'] = $this->cellSubmit;
 			$cfg['config']['cellurl'] = $this->cellUrl;
 		}
 		$cfg['config']['datatype'] = $this->dataType;
 		if ((($this->dataType === 'xmlstring') || ($this->dataType === 'jsonstring')) && !empty($this->dataStr)) {
 			$cfg['config']['datastr'] = $this->dataStr;
 		} elseif (count($this->data) > 0) {
 			$cfg['config']['data'] = $this->data;
 		}
 		if (!empty($this->editUrl))
 			$cfg['config']['editurl'] = $this->editUrl;
 		if ($this->forceFit)
 			$cfg['config']['forceFit'] = TRUE;
 		if ($this->grouping)
 			$cfg['config']['grouping'] = TRUE;
 		if ($this->headerTitles)
 			$cfg['config']['headertitles'] = TRUE;
 		$cfg['config']['height'] = $this->height;
 		if ($this->hoverRows === FALSE)
 			$cfg['config']['hoverrows'] = $this->hoverRows;
 		if (!empty($this->idPrefix))
 			$cfg['config']['idPrefix'] = $this->idPrefix;
 		if ($this->ignoreCase)
 			$cfg['config']['ignoreCase'] = TRUE;
 		if ($this->loadOnce)
 			$cfg['config']['loadonce'] = TRUE;
 		$cfg['config']['loadui'] = $this->loadui;
 		$cfg['config']['mtype'] = $this->mType;
 		if ($this->multiSelect) {
 			$cfg['config']['multiselect'] = TRUE;
 			$cfg['config']['multiboxonly'] = $this->multiBoxOnly;
 			$cfg['config']['multiselectWidth'] = $this->multiSelectWidth;
 		}
 		if ($this->multiSort)
 			$cfg['config']['multiSort'] = TRUE;
 		if (!empty($this->resizeClass))
 			$cfg['config']['resizeclass'] = $this->resizeClass;
 		if ($this->rowNumbers) {
 			$cfg['config']['rownumbers'] = TRUE;
 			$cfg['config']['rownumWidth'] = $this->rowNumWidth;
 		}
 		if ($this->scroll) {
 			$cfg['config']['scroll'] = TRUE;
 			$cfg['config']['scrollOffset'] = $this->scrollOffset;
 			$cfg['config']['scrollTimeout'] = $this->scrollTimeout;
 			$cfg['config']['scrollrows'] = $this->scrollRows;
 		}
 		if ($this->shrinkToFit === FALSE)
 			$cfg['config']['shrinkToFit'] = FALSE;
 		if ($this->sortable) {
 			$cfg['config']['sortable'] = TRUE;
 			if (!in_array('multiselect', $cfg['plugins']))
 				$cfg['plugins'][] = 'multiselect';
 		}
 		if (!empty($this->sortCol)) {
 			$cfg['config']['sortname'] = $this->sortCol;
 			$cfg['config']['sortorder'] = $this->sortOrder;
 		}
 		if ($this->subGrid) {
 			$cfg['config']['subGrid'] = TRUE;
 			$cfg['config']['subGridOptions'] = $this->subGridOptions;
 			$cfg['config']['subGridModel'] = $this->subGridModel;
 			$cgf['config']['subGridUrl'] = $this->subGridUrl;
 			$cfg['config']['subGridWidth'] = $this->subGridWidth;
 			$cfg['config']['subGridWidth'] = $this->subGridWidth;
 		}
 		if ($this->toolbar[0])
 			$cfg['config']['toolbar'] = $this->toolbar;
 		if ($this->toppager)
 			$cfg['config']['toppager'] = TRUE;
 		if ($this->treeGrid) {
 			$cfg['config']['$treeGrid'] = TRUE;
 			$cfg['config']['treeGridModel'] = $this->treeGridModel;
 			if (count($this->treeIcons) > 0)
 				$cfg['config']['treeIcons'] = $this->treeIcons;
 			if (count($this->treeReader) > 0)
 				$cfg['config']['treeReader'] = $this->treeReader;
 			$cfg['config']['tree_root_level'] = $this->treeRootLevel;
 		}
 		if (!empty($this->url))
 			$cfg['config']['url'] = $this->url;
 		$cfg['config']['viewsortcols'] = array($this->viewSortColsVisibleIcons, 'vertical', $this->viewSortColsClickableHeaders);
 		if ($this->width > 0)
 			$cfg['config']['width'] = $this->width;
 		if ($this->headerForm) {
 			$cfg['headerForm']['htmlID'] = $this->headerFormHtmlID;
 			if (!empty($this->headerFormCompleteFunction))
 				$cfg['headerForm']['completeFunction'] = $this->headerFormCompleteFunction;
 		}
 		
 		// Формируем дополнительные параметры
 		$cfg['config']['tableId'] = $this->tableId;
 		$cfg['config']['existsDateCol'] = $this->existsDateCol;
 		$cfg['config']['dateColIndexes'] = $this->dateColIndexes;
 		
 		// Добавляем конфигурационные данные, формируемые другими классами
 		$cfg['config'] = array_merge($cfg['config'], $this->pager->getConfig());
 		$cfg = array_merge($cfg, $this->recButtonsConfig->getConfig());
 		if (count($this->colModel) > 0) {
 			foreach ($this->colModel as $column)
 				$cfg['config']['colModel'][] = $column->getConfig();
 			if (count($this->colModel) === count($this->colNames))
 				$cfg['config']['colNames'] = $this->colNames;
 		}
 		
 		// Возвращаем результат
 		return $cfg;
 	} 
 	
 }
