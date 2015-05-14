<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет конфигурацию панели постраничной навигации по таблице jqGrid.
 * 
 * @category Controller
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-15 RUSproj, Sergey S. Smirnov
 */
 class JqGrid_Pager {
 	
 	/**
 	 * @var string Задает действительный идентификатор html-элемента, который будет содержать панель навигации по записям таблицы. Значение по умолчанию: '#pager'.
 	 */
 	public $pager = '#pager';
 	/**
 	 * @var string Позиция кнопок навигации на панели. Допустимые значения: left, center, right. Значение по умолчанию: center.
 	 */
 	public $pagerPos = 'center';
 	/**
 	 * @var bool Признак необходимости отображать кнопки навигации. Значение по умолчанию: TRUE.
 	 */
 	public $pgButtons = TRUE;
 	/**
 	 * @var bool Признак необходимости отображать поле ввода нужной страницы с записями. Значение по умолчанию: TRUE.
 	 */
 	public $pgInput = TRUE;
 	/**
 	 * @var string Позиция числа отображаемых записей на панели. Допустимые значения: left, center, right. Значение по умолчанию: right.
 	 */
 	public $recordPos = 'right';
 	/**
 	 * @var array Задает массив чисел, представляющих выпадающий список числа отображаемых записей. Если массив не задан, список не отображается.
 	 */
 	public $rowList = array(0, 5, 10, 15, 25, 50, 100, 250, 500);
 	/**
 	 * @var int Задает число записей таблицы, отображаемых по умолчанию за один раз. Кроме численного значения возможно задать значение 0, которое позволяет отобразить все записи таблицы. Значение по умолчанию: 15.
 	 */
 	public $rowNum = 15;
 	/**
 	 * @var bool Задает признак необходимости отображения информации о числе отображаемых записей из общего числа записей. Значение по умолчанию: TRUE.
 	 */
 	public $viewRecords = TRUE;
 	
 	
 	/**
 	 * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid. 
 	 */
 	public function getConfig() {
 		$cfg = array();
 		// Формируем массив основной конфигурации
 		if (!empty($this->pager)) {
	 		$cfg['pager'] = $this->pager;
	 		$cfg['pagerpos'] = $this->pagerPos;
	 		$cfg['pgbuttons'] = $this->pgButtons;
	 		$cfg['pginput'] = $this->pgInput;
 		}
 		if ($this->viewRecords === TRUE) {
	 		$cfg['viewrecords'] = TRUE;
 			$cfg['recordpos'] = $this->recordPos;
 		}
 		$cfg['rowList'] = $this->rowList;
 		$cfg['rowNum'] = $this->rowNum;
 		// Возвращаем результат
 		return $cfg;
 	} 
 	
 }
