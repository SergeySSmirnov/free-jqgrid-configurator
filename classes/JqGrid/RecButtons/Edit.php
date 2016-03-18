<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет конфигурацию кнопки "Редактировать выбранную запись".
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-15 RUSproj, Sergey S. Smirnov
 */
 class JqGrid_RecButtons_Edit {
 	
 	/**
 	 * @var string Задает класс значка из стиля jQuery, который должен соответствовать кнопке. Значение по умолчанию: '' (не задано).
 	 */
 	public $editIcon = '';
 	/**
 	 * @var bool Назначить кнопке другой обработчик нажатия. Значение по умолчанию: FALSE.
 	 */
 	public $editFunc = FALSE;
 	/**
 	 * @var string Название функции, которая должна запускаться вместо действия по умолчанию. Данная функция должна иметь один параметр - идентификатор строки. Значение по умолчанию: 'editForm_Show'.
 	 */
 	public $editFunctionName = 'editForm_Show';
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
 		if (!empty($this->editIcon))
 			$cfg['recButtons']['editicon'] = $this->editIcon;
 		if ($this->editFunc === TRUE)
 			$cfg['recButtons']['editFunctionName'] = $this->editFunctionName;
 		// Формируем массив дополнительной конфигурации
 		$cfg['recButtonsEdit'] = array();
 		$cfg['recButtonsEdit']['closeOnEscape'] = $this->closeOnEscape;
 		// TODO: Необходимо описать дополнительные параметры редактирования записи.
 		
 		// Возвращаем результат
 		return $cfg;
 	} 
 	
 }
