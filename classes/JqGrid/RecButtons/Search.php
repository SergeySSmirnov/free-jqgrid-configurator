<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет конфигурацию кнопки "Поиск данных".
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-15 RUSproj, Sergey S. Smirnov
 */
 class JqGrid_RecButtons_Search {
 	
 	/**
 	 * @var string Задает класс значка из стиля jQuery, который должен соответствовать кнопке. Значение по умолчанию: '' (не задано).
 	 */
 	public $searchIcon = '';
 	/**
 	 * @var bool Признак необходимости закрывать все всплывающие окна при нажатии на клавишу "Esc". Значение по умолчанию: TRUE.
 	 */
 	public $closeOnEscape = TRUE;
 	/**
 	 * @var bool Признак необходимости закрывать окно поиска после нажатия на кнопку "Найти". Значение по умолчанию: TRUE.
 	 */
 	public $closeAfterSearch = TRUE;
 	/**
 	 * @var bool Признак возможности пользователю задать несколько критериев поиска. Значение по умолчанию: TRUE.
 	 */
 	public $multipleSearch = TRUE;
 	/**
 	 * @var bool Признак возможности группировки пользователем условий поиска по группам. Значение по умолчанию: TRUE.
 	 */
 	public $multipleGroup = TRUE;
 	/**
 	 * @var bool Признак необходимости отображения кнопки "Показать запрос". Значение по умолчанию: FALSE.
 	 */
 	public $showQuery = FALSE;
 	/**
 	 * @var bool Признак возможности использовать нажтие кнопки "Enter", аналогично нажатию кнопки "Найти". Значение по умолчанию: TRUE.
 	 */
 	public $searchOnEnter = TRUE;
 	/**
 	 * @var array Массив, который позволяет шаблоны поиска. Шаблон поиска задается в виде ключ - имя шаблона, значение - массив, определяющий параметры запроса (структуру данного массива можно взять из POST запроса, который сформировал пользователь). Значение по умолчанию: array() (не задано).
 	 */
 	public $searchTemplates = array();
 	/**
 	 * @var int Шаблон по умолчанию, который будет применяться всегда, если не задан фильтр. Значение по умолчанию: -1 (не задан).
 	 */
 	public $templateDefault = -1;
 	
 	
 	/**
 	 * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid. 
 	 * @param array $cfg Массив, который содержит исходные значения параметров, и, в который необходимо записать новые дополнительные параметры.
 	 * @return array Массив, содержащий итоговые значения параметров.
 	 */
 	public function getConfig($cfg) {
 		// Формируем массив основной конфигурации
 		if (!empty($this->searchIcon))
 			$cfg['recButtons']['searchicon'] = $this->searchIcon;
 		// Формируем массив дополнительной конфигурации
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
 		 	
 		// Возвращаем результат
 		return $cfg;
 	} 
 	
 }
