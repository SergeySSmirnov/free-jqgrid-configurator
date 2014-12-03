<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет основную конфигурацию таблицы jqGrid.
 * 
 * @category Controller
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-14 RUSproj, Sergey S. Smirnov
 */
 class JqGrid {
 	
 	/**
 	 * @var array Массив js-скриптов, которые необходимо загрузить до загрузки jqGrid. Значение по умолчанию: array() (не определено).
 	 */
 	public $addonJS = array();
 	/**
 	 * @var array Массив css-стилей, которые необходимо загрузить до загрузки jqGrid. Значение по умолчанию: array() (не определено).
 	 */
 	public $addonCSS = array();
 	
 	/**
 	 * @var bool Признак необходимости загрузить плагин
 	 */
 	public $plugin_addons = FALSE;
 	/**
 	 * @var bool Признак необходимости загрузить плагин
 	 */
 	public $plugin_postext = FALSE;
 	/**
 	 * @var bool Признак необходимости загрузить плагин
 	 */
 	public $plugin_setcolumns = FALSE;
 	/**
 	 * @var bool Признак необходимости загрузить плагин предназначенный для формирования меню.
 	 */
 	public $plugin_contextmenu = FALSE;
 	/**
 	 * @var bool Признак необходимости загрузить плагин
 	 */
 	public $plugin_searchFilter = FALSE;
 	/**
 	 * @var bool Признак необходимости загрузить плагин
 	 */
 	public $plugin_tablednd = FALSE;
 	/**
 	 * @var bool Признак необходимости загрузить плагин предназначенный для управления сортировкой и удалением столбцов.
 	 */
 	public $plugin_multiselect = TRUE;
 	
 	/**
 	 * @var array of JqGrid_CustomButton Массив пользовательских кнопок, добавляемых на панель управления. Значение по умолчанию: array().
 	 */
 	public $customButtons = array();
 	
 	/**
 	 * @var bool Признак необходимости добавить кнопку заморозки столбцов. Значение по умолчанию: TRUE.
 	 */
 	public $addButtonFreze = FALSE;
 	/**
 	 * @var bool Признак необходимости добавить кнопку сортировки столбцов. Значение по умолчанию: TRUE.
 	 */
 	public $addButtonSortColumns = TRUE;
 	
 	
 	/**
 	 * @var string Задает идентификатор элемента, который будет содержать табличную часть. Значение по умолчанию: '#list'.
 	 */
 	public $tableId = '#list';
 	
 	
 	/**
 	 * @var boolean Задает признак необходимости задать двухстрочное оформление сетки таблицы (для четных и нечетных строк используются свои стили). Значение по умолчанию: FALSE.
 	 */
 	public $altRows = FALSE;
 	/**
 	 * @var string Имя css-класса, используемого для оформления четных строк при двухстрочном оформлении сетки таблицы. Данный параметр имеет действие если altRows=TRUE. Значение по умолчнию: '' (не задано).
 	 */
 	public $altClass = '';
 	/**
 	 * @var bool Призак необходимости автоматического задания ширины таблицы и ширины столбцов в зависимости от ширины родительского контейнера. Значение по умолчанию: TRUE.
 	 */
 	public $autoWidth = TRUE;
 	/**
 	 * @var string Задает заголовок таблицы. Значение по умолчанию: '' (не задано).
 	 */
 	public $caption = '';
 	/**
 	 * @var int Данная опция определяет отступы слева и справа в ячейке + ширина границы клетки. Данное свойство следует менять только в том случае, если изменяется css-свойство для элемента td таблицы. Значение по умолчанию: -1 (не задано).
 	 */
 	public $cellLayout = -1;
 	/**
 	 * @var bool Разрешает или запрещает редактирование отдельных ячеек при одинарном клике по ней. Требует задания свойств cellSubmit и cellUrl. Значение по умолчанию: FALSE.
 	 */
 	public $cellEdit = FALSE;
 	/**
 	 * @var string Задает контекст сохранения ячейки. Данный параметр имеет действие если cellEdit=TRUE. Возможные значения: remote (новое значение будет отправлено на сервер) и clientArray (новое значение будет сохранено в локально). Значение по умолчанию: 'remote'.
 	 */
 	public $cellSubmit = 'remote';
 	/**
 	 * @var string URL-адрес, на который будет отправлено новое знчение ячейки. Данный параметр имеет действие если cellEdit=TRUE. Значение по умолчанию: '' (не задано).
 	 */
 	public $cellUrl = '';
 	/**
 	 * @var jqGrid_Column[] Задает массив описаний всех выводимых полей. Для задания параметров отдельных столбцов удобно пользваться статическими методами класса ColumnConfig или задав необходимые свойства экземпляру класса. Значение по умолчанию: array() (не задано).
 	 */
 	public $colModel = array();
 	/**
 	 * @var array Задает массив названий всех выводимых полей. Число записей в данном массиве должно соответсвовать числу записей в массиве свойства colModel. В качестве альтернативы, названия столбцов можно задавать в конфигурационном массиве colModel. Данное свойство имеет силу, если задано свойство colModel. Значение по умолчанию: array() (не задано).
 	*/
 	public $colNames = array();
 	/**
 	 * @var string Тип данных, которые необходимо отобразить в таблице. Доступные значения: xml, xmlstring (xml-данные, представленые строкой), json, jsonstring (json-данные, представленые строкой), local (данные, определенные на стороне киента массивом данных), javascript (данные, представленные как javascript), function (пользовательская функция для получения данных), clientSide (ручная загрузка данных через массив данных). Значение по умолчанию: 'json'. 
 	 */
 	public $dataType = 'json';
 	/**
 	 * @var array Массив данных, которые необходимо разместить в таблице. Значение по умолчанию: array() (данные не определены).
 	 */
 	public $data = array();
 	/**
 	 * @var string Строка данных, которая представляет массив данных в формате xml или json, которые должны быть размещены в таблице. Данный параметр действителен в том случае, если значение свойства dataType равны xmlstring или jsonstring. Значение по умолчанию: '' (данные не определены).
 	 */
 	public $dataStr = '';
 	/**
 	 * @var string Задает URL адрес для отправки отредактированных данных на сервер при построчном редактировании или редактировании данных в форме. Значение по умолчанию: ''.
 	 */
 	public $editUrl = '';
// 	public $ExpandColClick = TRUE;
// 	public $ExpandColumn = '';
 	/**
 	 * @var bool Признак того, что при изменении ширины столбца, размер граничного столбца будет уменьшатся вместо смещения. Значение по умолчнию: FALSE.
 	 */
 	public $forceFit = FALSE;
// 	public $gridstate = '';
//	public $gridview = FALSE;
 	/**
 	 * @var Признак того, что в таблице разрешена группировка столбцов. Значение по умолчанию: FALSE.
 	 */
 	public $grouping = FALSE;
 	/**
 	 * @var bool Признак того, что к заголовку колонки необходимо добавить атрибут заголовка. Значение по умолчанию: FALSE.
 	 */
 	public $headerTitles = FALSE;
 	/**
 	 * @var int/string Высота таблицы. Допустимые значения: число (высота в пикселах), '100%', 'auto'. Значение по умолчанию: '100%'. 
 	 */
 	public $height = '100%';
 	/**
 	 * @var bool Признак необходимости первоначально таблицу отобразить в свернутом в заголовок виде, при этом данные будут загружены только после первого отображения таблицы. Данный параметр имеет место в том случае, если задано свойство Caption. Значение по умолчанию: FALSE.
 	 */
 	public $hiddenGrid = FALSE;
 	/**
 	 * @var bool Признак необходимости отобразить в заголовке кнопку сворачивания/разворачивания таблицы. Данный параметр имеет место в том случае, если задано свойство Caption. Значение по умолчанию: TRUE.
 	 */
 	public $hideGrid = TRUE;
 	/**
 	 * @var bool Признак необходимости отображения подсветки строки, над которой в текущий момент находится курсор мыши. Значение по умолчанию: TRUE.
 	 */
 	public $hoverRows = TRUE;
 	/**
 	 * @var string Префикс, добавляемый к идентификатору строки когда она создается. Значение по умолчанию: '' (на задано).
 	 */
 	public $idPrefix = '';
 	/**
 	 * @var bool Признак необходимости сделать сортировку и поиск регистрозависимой. Значение по умолчанию: FALSE.
 	 */
 	public $ignoreCase = FALSE;
// 	public $inlineData = array();
// 	public $jsonReader = array();
// 	public $lastpage = 0;
 	/**
 	 * @var bool Признак того, что данные загружаются в таблицу только один раз. После загрузки параметр datatype устанавливается в значение local. Все последующие операции с данными производятся локально. Если задано разбиение на страницы, то оно будет недоступно. Значение по умолчанию: FALSE.
 	 */
 	public $loadOnce = FALSE;
 	/**
 	 * @var string Определяет поведение jqGrid во время запроса данных. Возможные значения: disable (отключить индикатор прогресса, можно задать свой индикатор), enable (отображать надпись, опеределенную в языковом файле), block (отображать надпись, опеределенную в языковом файле, но при этом заблокировать все элементы управления). Значение по умолчанию: 'block'.
 	 */
 	public $loadui = 'block';
 	/**
 	 * @var string Тип запроса. Допустимые значения: POST или GET. Значение по умолчанию: POST.
 	 */
 	public $mType = 'POST';
 	/**
 	 * @var bool Признак необходимости разрешить возможность множественного выбора строк. Значение по умолчанию: FALSE.
 	 */
 	public $multiSelect = FALSE;
 	/**
 	 * @var bool Признак необходимости разрешить выбор строки только при щелчке по соответствующему полю, в противном случае щелчок по любой строке обнулит выбор (стиль yahoo). Данный параметр имеет место в том случае, если значение свойства multiSelect установлено в TRUE. Значение по умолчанию: FALSE.
 	 */
 	public $multiBoxOnly = FALSE;
 	/**
 	 * @var int Ширина столбца с элементами управления для выбора строк. Данный параметр имеет место в том случае, если значение свойства multiSelect установлено в TRUE. Значение по умолчанию: 20.
 	 */
 	public $multiSelectWidth = 20;
 	/**
 	 * @var bool Признак необходимости использовать сортировку по нескольким столбцам. В случае если данные загружаются с сервера, то при каждом щелчке по заголовку столбца, в отправляемом параметре sidx будет формироваться перечисление столбцов по которым проводить сортировку. Значение по умолчанию: FALSE. 
 	 */
 	public $multiSort = FALSE;
 	/**
 	 * @var jqGrid_recButtons Конфигурационные параметры кнопок управления записями.
 	 */
 	public $recButtonsConfig = NULL;
 	/**
 	 * @var jqGrid_Pager Конфигурационные параметры панели постранияной навигации.
 	 */
 	public $pager = NULL;
// 	public $prmNames = array(page => 'page', rows => 'rows', sort => 'sidx', order => 'sord', search => '_search', nd => 'nd', id => 'id', oper => 'oper', editoper => 'edit', addoper => 'add', deloper => 'del', subgridid => 'id', npage => null, totalrows => 'totalrows');
// 	public $postData = array();
 	/**
 	 * @var string Название css-класса, который добавляется к заголовкам колонок таблицы, которые могут менять свой размер. Значение по умолчнию: '' (не задано). 
 	 */
 	public $resizeClass = '';
 	/**
 	 * @var bool Задает признак необходимости отображать номера строк. Значение по умолчанию: FALSE.
 	 */
 	public $rowNumbers = FALSE;
// 	public $rowTotal = -1;
 	/**
 	 * @var int Задает ширину столбца, отображающего номера строк. Данный параметр имеет действие в том случае, если свойство rownNmbers равно true. Значение по умолчанию: 30.
 	 */
 	public $rowNumWidth = 30;
 	/**
 	 * @var bool Задает признак необходимости использовать динамическую прокрутку. При этом будет отключена панель навигации. Кроме того, значение свойства Height таблицы должно быть задано в пикселах, а не процентах или 'auto'. Значение по умолчанию: FALSE.
 	 */
 	public $scroll = FALSE;
 	/**
 	 * @var int Ширина вертикальной полосы прокрутки. Данный параметр имеет место в том случае, если свойство scroll установлено в TRUE. Значение по умолчанию: 18.
 	 */
 	public $scrollOffset = 18;
 	/**
 	 * @var int Временная задержка до запроса данных. Данный параметр имеет место в том случае, если свойство scroll установлено в TRUE. Значение по умолчанию: 200.
 	 */
 	public $scrollTimeout = 100;
 	/**
 	 * @var bool Задает признак того, что необходимо выполнить прокрутку к выбранной строке при использовании метода setSelection. Данный параметр имеет место в том случае, если свойство scroll установлено в TRUE. Значение по умолчанию: FALSE.
 	 */
 	public $scrollRows = FALSE;
 	/**
 	 * @var bool Задает признак необходимости подгонять ширину столбцов пропорционально их заданной ширине в пикселах в соответствии с шириной таблицы. Значение по умолчнию: TRUE. 
 	 */
 	public $shrinkToFit = TRUE;
 	/**
 	 * @var bool Задает признак возможности менять порядок столбцов за счет их перетаскивания за заголовок. Значение по умолчнию: FALSE.
 	 */
 	public $sortable = FALSE;
 	/**
 	 * @var string Задает столбец, по которому производится сортировка по умолчанию при загрузке таблицы. Значение по умолчанию: '' (не задано).
 	 */
 	public $sortCol = '';
 	/**
 	 * @var string Задает порядок сортировки. Возможные значения: asc или desc. Значение по умолчанию: 'asc'.
 	 */
 	public $sortOrder = 'asc';
 	/**
 	 * @var bool Задает признак возмжности использовать субтаблицы (вложенные таблицы). При этом слева появится дополнительный столбец, который позволит скрывать или отображать субтаблицы для каждой записи основной таблицы. Значение по умолчанию: FALSE.
 	 */
 	public $subGrid = FALSE;
 	/**
 	 * @var array Массив дополнительных параметров субтаблиц. Данный параметр имеет место, если значение свойства sortOrder установлено в TRUE. Значение по умолчанию: array() (не задано).
 	 */
 	public $subGridOptions = array();
 	/**
 	 * @var array Массив, описывающий модель вложенных субтаблиц. Для задания параметров отдельных столбцов удобно пользваться статическими методами класса ColumnConfig или задав необходимые свойства экземпляру класса и вызвав метод getConfig(). Данный параметр имеет место, если значение свойства sortOrder установлено в TRUE. Значение по умолчанию: array() (не задано).
 	 */
 	public $subGridModel = array();
// 	public $subGridType = NULL;
 	/**
 	 * @var string Задает URL адрес для получения данных субтаблиц. В результате будет добавлен (как параметр) id строки к данному адресу. Если необходимо передавать дополнительные параметры, необходимо определить их в свойстве subGridModel. Данный параметр имеет место, если значение свойства sortOrder установлено в TRUE. Значение по умолчанию: '' (не задано).
 	 */
 	public $subGridUrl = '';
 	/**
 	 * @var int Задает ширину субтаблицы. Данный параметр имеет место, если значение свойства sortOrder установлено в TRUE. Значение по умолчанию: 20 (не задано).
 	 */
 	public $subGridWidth = 20;
 	/**
 	 * @var array() Задает расположение панели инструментов. Первый параметр массива определяет признак необходимости включить панель инструментов. Второй определяет место создания панели. Возможные значения: top (наверху, перед таблицей), bottom (внизу, после таблицы), both (вверху и внизу). Значение по умолчанию: array(false, 'both').  
 	 */
 	public $toolbar = array(FALSE, 'both');
 	/**
 	 * @var bool Задает признак необходимости дополнительно разместить панель выбора страницы перед таблицей (наверху). Значение по умолчанию: FALSE. 
 	 */
 	public $toppager = FALSE;
// 	public $treedatatype = NULL;
 	/**
 	 * @var bool Задает признак необходимости представления данных в виде дерева. Значение по умолчанию: FALSE.
 	 */
 	public $treeGrid = FALSE;
 	/**
 	 * @var string Задает метод, используемый treeGreed. Возможные значения: nested (вложенный) или adjacency (смежный). Данный параметр имеет место, если значение свойства treeGred установлено в TRUE. Значение по умолчанию: nested.
 	 */
 	public $treeGridModel = 'nested';
 	/**
 	 * @var array Задает значки, используемые для представления дерева. Необходима следующая структура массива: {plus:'ui-icon-triangle-1-e',minus:'ui-icon-triangle-1-s',leaf:'ui-icon-radio-off'}. Данный параметр имеет место, если значение свойства treeGred установлено в TRUE. Значение по умолчанию: array() (не определено).
 	 */
 	public $treeIcons = array();
 	/**
 	 * @var array Расширяет свойство colModel в базовой таблице. Описанные здесь поля добавляются в конец свойства colModel и скрываются. Это означает, что данные, возвращаемые с сервера должны иметь значения для этих полей. Данный параметр имеет место, если значение свойства treeGred установлено в TRUE. Значение по умолчанию: array() (не определено).
 	 */
 	public $treeReader = array();
 	/**
 	 * @var int Определят уровень, с которого начинается корень treeGreed. Данный параметр имеет место, если значение свойства treeGred установлено в TRUE. Значение по умолчанию: 0.
 	 */
 	public $treeRootLevel = 0; 
 	/**
 	 * @var string Задает URL адрес, который вернет данные для таблицы. Значение по умолчанию: '' (не определено).
 	 */
 	public $url = '';
// 	public $userData = array();
// 	public $userDataOnFooter = FALSE;
 	/**
 	 * @var bool Задает признак того, что кнопки сортировки должны отображаться у каждого столбца, по которому возможна сортировка данных. Значение по умолчанию: TRUE.
 	 */
 	public $viewSortColsVisibleIcons = TRUE;
 	/**
 	 * @var bool Задает признакт того, что столбец будет отсортирован при щелчке по любому месту заголовка. Значение по умолчанию: TRUE.
 	 */
 	public $viewSortColsClickableHeaders = TRUE;
 	/**
 	 * @var int Задает конечную ширину таблицы. Если значение не задано, то ширина таблицы будет складываться из суммы ширин всех столбцов, в противном случае на основе свойства shrinkToFit. Значение по умолчанию: 0 (не задано).
 	 */
 	public $width = 0;
// 	public $xmlReader = array();
 	
 	
 	/**
 	 * @var bool
 	 */
 	public $existsDateCol = FALSE;
 	/**
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
 	 */
 	public function getConfig() {
 		$cfg = array();
 		// Формируем нужные кнопки
 		if (($this->addButtonFreze === TRUE) || ($this->addButtonSortColumns === TRUE)) {
 			$this->customButtons[] = JqGrid_CustomButton::addSeparator();
 			if ($this->addButtonSortColumns === TRUE)
 				$this->customButtons[] = JqGrid_CustomButton::addButton('columnChooser', '', 'ui-icon-arrowthick-2-e-w', 'Переупорядочивание и скрытие колонок');
 			if ($this->addButtonFreze === TRUE)
 				$this->customButtons[] = JqGrid_CustomButton::addButton('columnFreze', '', 'ui-icon-unlocked', 'Заморозить/разморозить фиксированные столбцы');
 		}

 		// Формируем массив пользовательских кнопок
 		if (count($this->customButtons) > 0) {
 			$cfg['custom_buttons'] = array();
 			foreach ($this->customButtons as $button)
 				$cfg['custom_buttons'][] = $button->getConfig();
 		}

 		// Формируем массив подключаемых плагинов
 		$cfg['plugins'] = array();
 		$cfg['plugins']['js'] = $this->addonJS;
 		$cfg['plugins']['css'] = $this->addonCSS;
 		if ($this->plugin_addons === TRUE) $cfg['plugins']['js'][] = '/media/js/jqGrid/plugins/grid.addons.js';
 		if ($this->plugin_postext === TRUE) $cfg['plugins']['js'][] = '/media/js/jqGrid/plugins/grid.postext.js';
 		if ($this->plugin_setcolumns === TRUE) $cfg['plugins']['js'][] = '/media/js/jqGrid/plugins/grid.setcolumns.js';
 		if ($this->plugin_contextmenu === TRUE) $cfg['plugins']['js'][] = '/media/js/jqGrid/plugins/jquery.contextmenu.js';
 		if ($this->plugin_searchFilter === TRUE) {
 			$cfg['plugins']['js'][] = '/media/js/jqGrid/plugins/jquery.searchFilter.js';
 			$cfg['plugins']['css'][] = '/media/js/jqGrid/plugins/jquery.searchFilter.css';
 		}
 		if ($this->plugin_tablednd === TRUE) $cfg['plugins']['js'][] = '/media/js/jqGrid/plugins/jquery.tablednd.js';
 		if (($this->plugin_multiselect === TRUE) || ($this->addButtonSortColumns === TRUE)) {
 			$cfg['plugins']['js'][] = '/media/js/jqGrid/plugins/ui.multiselect.js';
 			$cfg['plugins']['css'][] = '/media/js/jqGrid/plugins/ui.multiselect.css';
 		}
 		$cfg['plugins']['js'][] = '/media/js/jqGrid/jqGrid.min.js';
 		$cfg['plugins']['css'][] = '/media/js/jqGrid/jqGrid.min.css';
 		$cfg['plugins']['js'][] = '/media/js/jqGrid/jqGrid.locale-ru.js';
 		
 		// Формируем массив основной конфигурации
 		$cfg['config'] = array();
 		if ($this->altRows === TRUE) {
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
 		if ($this->cellEdit === TRUE) {
 			$cfg['config']['cellEdit'] = TRUE;
 			$cfg['config']['cellsubmit'] = $this->cellSubmit;
 			$cfg['config']['cellurl'] = $this->cellUrl;
 		}
 		$cfg['config']['datatype'] = $this->dataType;
 		if (($this->dataType === 'xmlstring') || ($this->dataType === 'jsonstring')) {
 			if (!empty($this->dataStr))
 				$cfg['config']['datastr'] = $this->dataStr;
 		} else {
 			if (count($this->data) > 0)
 				$cfg['config']['data'] = $this->data;
 		}
 		if (!empty($this->editUrl))
 			$cfg['config']['editurl'] = $this->editUrl;
 		if ($this->forceFit === TRUE)
 			$cfg['config']['forceFit'] = TRUE;
 		if ($this->grouping === TRUE)
 			$cfg['config']['grouping'] = TRUE;
 		if ($this->headerTitles === TRUE)
 			$cfg['config']['headertitles'] = TRUE;
 		$cfg['config']['height'] = $this->height;
 		if ($this->hoverRows === FALSE)
 			$cfg['config']['hoverrows'] = $this->hoverRows;
 		if (!empty($this->idPrefix))
 			$cfg['config']['idPrefix'] = $this->idPrefix;
 		if ($this->ignoreCase === TRUE)
 			$cfg['config']['ignoreCase'] = TRUE;
 		if ($this->loadOnce === TRUE)
 			$cfg['config']['loadonce'] = TRUE;
 		$cfg['config']['loadui'] = $this->loadui;
 		$cfg['config']['mtype'] = $this->mType;
 		if ($this->multiSelect === TRUE) {
 			$cfg['config']['multiselect'] = TRUE;
 			$cfg['config']['multiboxonly'] = $this->multiBoxOnly;
 			$cfg['config']['multiselectWidth'] = $this->multiSelectWidth;
 		}
 		if ($this->multiSort === TRUE)
 			$cfg['config']['multiSort'] = TRUE;
 		if (!empty($this->resizeClass))
 			$cfg['config']['resizeclass'] = $this->resizeClass;
 		if ($this->rowNumbers === TRUE) {
 			$cfg['config']['rownumbers'] = TRUE;
 			$cfg['config']['rownumWidth'] = $this->rowNumWidth;
 		}
 		if ($this->scroll === TRUE) {
 			$cfg['config']['scroll'] = TRUE;
 			$cfg['config']['scrollOffset'] = $this->scrollOffset;
 			$cfg['config']['scrollTimeout'] = $this->scrollTimeout;
 			$cfg['config']['scrollrows'] = $this->scrollRows;
 		}
 		if ($this->shrinkToFit === FALSE)
 			$cfg['config']['shrinkToFit'] = FALSE;
 		if ($this->sortable === TRUE) {
 			$cfg['config']['sortable'] = TRUE;
 			if (!in_array('multiselect', $cfg['plugins']))
 				$cfg['plugins'][] = 'multiselect';
 		}
 		if (!empty($this->sortCol)) {
 			$cfg['config']['sortname'] = $this->sortCol;
 			$cfg['config']['sortorder'] = $this->sortOrder;
 		}
 		if ($this->subGrid === TRUE) {
 			$cfg['config']['subGrid'] = TRUE;
 			$cfg['config']['subGridOptions'] = $this->subGridOptions;
 			$cfg['config']['subGridModel'] = $this->subGridModel;
 			$cgf['config']['subGridUrl'] = $this->subGridUrl;
 			$cfg['config']['subGridWidth'] = $this->subGridWidth;
 			$cfg['config']['subGridWidth'] = $this->subGridWidth;
 		}
 		if ($this->toolbar[0] === TRUE)
 			$cfg['config']['toolbar'] = $this->toolbar;
 		if ($this->toppager === TRUE)
 			$cfg['config']['toppager'] = TRUE;
 		if ($this->treeGrid === TRUE) {
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
