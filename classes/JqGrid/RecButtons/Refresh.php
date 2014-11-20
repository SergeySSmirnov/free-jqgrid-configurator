<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет конфигурацию кнопки "Обновить содержимое таблицы".
 * 
 * @category Controller
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-14 RUSproj, Sergey S. Smirnov
 */
 class JqGrid_RecButtons_Refresh {
 	
 	/**
 	 * @var string Задает класс значка из стиля jQuery, который должен соответствовать кнопке. Значение по умолчанию: '' (не задано).
 	 */
 	public $refreshIcon = '';
 	/**
 	 * @var string Название фанкции, которая должна запускаться после нажатия на кнопку "Обновить". Данная функция не имеет параметров. Значение по умолчанию: '' (не задано).
 	 */
 	public $afterRefreshFunction = '';
 	/**
 	 * @var string Название фанкции, которая должна запускаться до нажатия на кнопку "Обновить". Данная функция не имеет параметров. Значение по умолчанию: '' (не задано).
 	 */
 	public $beforeRefreshFunction = '';
 	/**
 	 * @var string Определяет как таблица должна обновляться. Возможные значения: firstpage (таблица перезагружает данные с первой страницы) или current (перезагрузка должна сохранить текущую сраницу и текущее выделение). Значение по умолчанию: '' (не задано).
 	 */
 	public $refreshState = '';
 	
 	
 	/**
 	 * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid. 
 	 * @param array $cfg Массив, который содержит исходные значения параметров, и, в который необходимо записать новые дополнительные параметры.
 	 * @return array Массив, содержащий итоговые значения параметров.
 	 */
 	public function getConfig($cfg) {
 		// Формируем массив основной конфигурации
 		if ($this->refreshIcon != '')
 			$cfg['recButtons']['refreshicon'] = $this->refreshIcon;
 		if ($this->afterRefreshFunction != '')
 			$cfg['recButtons']['afterRefreshFunction'] = $this->afterRefreshFunction;
 		if ($this->beforeRefreshFunction != '')
 			$cfg['recButtons']['beforeRefreshFunction'] = $this->beforeRefreshFunction;
 		if ($this->refreshState != '')
 			$cfg['recButtons']['refreshstate'] = $this->refreshState;
 		// Возвращаем результат
 		return $cfg;
 	} 
 	
 }
