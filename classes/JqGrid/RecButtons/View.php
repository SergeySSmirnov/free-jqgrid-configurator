<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет конфигурацию кнопки "Просмотреть выбранную запись".
 * 
 * @category Controller
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-15 RUSproj, Sergey S. Smirnov
 */
 class JqGrid_RecButtons_View {
 	
 	/**
 	 * @var string Задает класс значка из стиля jQuery, который должен соответствовать кнопке. Значение по умолчанию: '' (не задано).
 	 */
 	public $viewIcon = '';
 	/**
 	 * @var bool Признак необходимости закрывать все всплывающие окна при нажатии на клавишу "Esc". Значение по умолчанию: TRUE.
 	 */
 	public $closeOnEscape = TRUE;
 	
 	
 	/**
 	 * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid. 
 	 * @param array $cfg Массив, который содержит исходные значения параметров, и, в который необходимо записать новые дополнительные параметры.
 	 * @return array Массив, содержащий итоговые значения параметров.
 	 */
 	public function getConfig($cfg) {
 		// Формируем массив основной конфигурации
 		if (!empty($this->viewIcon))
 			$cfg['recButtons']['viewicon'] = $this->viewIcon;
 		// Формируем массив дополнительной конфигурации
 		$cfg['recButtonsView'] = array();
 		$cfg['recButtonsView']['closeOnEscape'] = $this->closeOnEscape;
 		// TODO: Необходимо описать дополнительные параметры просмотра записи.
 		 	
 		// Возвращаем результат
 		return $cfg;
 	} 
 	
 }
