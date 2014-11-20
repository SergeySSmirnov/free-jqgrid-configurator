<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет конфигурацию кнопки "Добавить новую запись".
 * 
 * @category Controller
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-14 RUSproj, Sergey S. Smirnov
 */
 class JqGrid_RecButtons_Add {
 	
 	/**
 	 * @var string Задает класс значка из стиля jQuery, который должен соответствовать кнопке. Значение по умолчанию: '' (не задано).
 	 */
 	public $addIcon = '';
 	/**
 	 * @var bool Назначить кнопке другой обработчик нажатия. Значение по умолчанию: FALSE.
 	 */
 	public $addFunc = FALSE;
 	/**
 	 * @var string Название функции, которая должна запускаться вместо действия по умолчанию. Данная функция не имеет параметров. Значение по умолчанию: 'editForm_Show'.
 	 */
 	public $addFunctionName = 'editForm_Show';
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
 		if ($this->addIcon != '')
 			$cfg['recButtons']['addicon'] = $this->addIcon;
 		if ($this->addFunc)
	 		$cfg['recButtons']['addFunctionName'] = $this->addFunctionName;
 		// Формируем массив дополнительной конфигурации
 		$cfg['recButtonsAdd'] = array();
 		$cfg['recButtonsAdd']['closeOnEscape'] = $this->closeOnEscape;
 		// TODO: Необходимо описать дополнительные параметры добавления записи.
 			
 		// Возвращаем результат
 		return $cfg;
 	} 
 	
 }
