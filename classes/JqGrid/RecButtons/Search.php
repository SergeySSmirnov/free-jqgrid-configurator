<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет конфигурацию кнопки "Поиск данных".
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-NOW RUSproj, Sergey S. Smirnov
 */
 class JqGrid_RecButtons_Search {
 	
 	/**
 	 * Задает класс значка из стиля jQuery, который должен соответствовать кнопке. Значение по умолчанию: '' (не задано).
 	 * @var string
 	 */
 	public $searchIcon = '';
 	/**
 	 * Признак необходимости закрывать все всплывающие окна при нажатии на клавишу "Esc". Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $closeOnEscape = TRUE;
 	/**
 	 * Признак необходимости закрывать окно поиска после нажатия на кнопку "Найти". Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $closeAfterSearch = TRUE;
 	/**
 	 * Признак возможности пользователю задать несколько критериев поиска. Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $multipleSearch = TRUE;
 	/**
 	 * Признак возможности группировки пользователем условий поиска по группам. Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $multipleGroup = TRUE;
 	/**
 	 * Признак необходимости отображения кнопки "Показать запрос". Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $showQuery = FALSE;
 	/**
 	 * Признак возможности использовать нажтие кнопки "Enter", аналогично нажатию кнопки "Найти". Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $searchOnEnter = TRUE;
 	/**
 	 * Массив, который позволяет шаблоны поиска. Шаблон поиска задается в виде ключ - имя шаблона, значение - массив, определяющий параметры запроса (структуру данного массива можно взять из POST запроса, который сформировал пользователь). Значение по умолчанию: array() (не задано).
 	 * @var array
 	 */
 	public $searchTemplates = array();
 	/**
 	 * Шаблон по умолчанию, который будет применяться всегда, если не задан фильтр. Значение по умолчанию: -1 (не задан).
 	 * @var int
 	 */
 	public $templateDefault = -1;
 	
 	
 	/**
 	 * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid. 
 	 * @param array $cfg Массив, который содержит исходные значения параметров, и, в который необходимо записать новые дополнительные параметры.
 	 * @return array Массив, содержащий итоговые значения параметров.
 	 */
 	public function getConfig($cfg) {
 		if (!empty($this->searchIcon))
 			$cfg['recButtons']['searchicon'] = $this->searchIcon;
 		$cfg['recButtonsSearch'] = array();
 		$cfg['recButtonsSearch']['closeOnEscape'] = $this->closeOnEscape;
 		$cfg['recButtonsSearch']['closeAfterSearch'] = $this->closeAfterSearch;
 		$cfg['recButtonsSearch']['multipleSearch'] = $this->multipleSearch;
 		$cfg['recButtonsSearch']['multipleGroup'] = $this->multipleGroup;
 		$cfg['recButtonsSearch']['showQuery'] = $this->showQuery;
 		$cfg['recButtonsSearch']['searchOnEnter'] = $this->searchOnEnter;
 		if (is_array($this->searchTemplates) && (count($this->searchTemplates) > 0)) {
 			$cfg['recButtonsSearch']['tmplNames'] = array('*** Отобразить все записи');
 			$cfg['recButtonsSearch']['tmplFilters'] = array(array('groupOp' => 'AND','rules' => array()));
 			foreach ($this->searchTemplates as $key => $val) {
	 			$cfg['recButtonsSearch']['tmplNames'][] = $key;
	 			$cfg['recButtonsSearch']['tmplFilters'][] = $val;
 			}
 			if (($this->templateDefault > -1) && (count($this->searchTemplates) > $this->templateDefault))
 				$cfg['recButtonsSearch']['tmplDefault'] = $this->templateDefault + 1;
 		}
 		
 		// TODO: Необходимо описать дополнительные параметры поиска записей.
 		 	
 		return $cfg;
 	} 
 	
 }
