<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет конфигурацию пользовательской кнопки, добавляемой на панель инструментов jqGrid.
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-15 RUSproj, Sergey S. Smirnov
 */
 class JqGrid_CustomButton {
 	
 	/**
 	 * @var bool Признак того, что эемент будет представлен кнопкой. Если значение равно FALSE, то элемент будет представлен разделителем. Значение по умолчанию: TRUE.
 	 */
 	public $isButton = TRUE;
 	/**
 	 * @var string Позиция кнопки на панели инструментов. Возможные значения: 'first' или 'last'. Значение по умолчанию: 'last'.
 	 */
 	public $position = 'last';
 	/**
 	 * @var string Заголовок кнопки. Значение по умолчанию: ''.
 	 */
 	public $btnCaption = '';
 	/**
 	 * @var string Название изображения кнопки, которое определено в наборе UI. Значение по умолчанию: '' (не определено).
 	 */
 	public $btnIcon = '';
 	/**
 	 * @var string Имя функции, которая будет выполняться при нажатии на кнопку. Значение по умолчанию: '' (не определено).
 	 */
 	public $btnOnClickFcnName = '';
 	/**
 	 * @var string Текст всплывающей подсказки над кнопкой. Значение по умолчанию: ''.
 	 */
 	public $btnTitle = '';
// 	public $btnCursor = '';
 	/**
 	 * @var string Имя идентификатора кнопки (используется для последующих манипуляций). Значение по умолчанию: '' (не определено).
 	 */
 	public $btnId = '';
 	/**
 	 * @var string Имя класса разделителя. Данное свойство используется если свойство isButton = FALSE. Значение по умолчанию: '' (не определено).
 	 */
 	public $sepClass = '';
 	/**
 	 * @var string Контент, который будет добавлен в блок разделителя. Данное свойство используется если свойство isButton = FALSE. Значение по умолчанию: '' (не определено).
 	 */
 	public $sepContent = '';
 	
 	/**
 	 * Формирует конфигурацию пользовательской кнопки для панели инструментов на основе переданных параметров.
 	 * @param string $onClickFcn Имя функции, которая должна срабатывать при нажатии на кнопку.
 	 * @param string $caption Заголовок кнопки.
 	 * @param string $buttonIcon Название изображения кнопки, которое определено в наборе UI.
 	 * @param string $title Текст всплывающей подсказки.
 	 * @param string $position Позиция разделителя. 
 	 * @param string $id Имя идентификатора кнопки.
 	 * @return JqGrid_CustomButton
 	 */
 	public static function addButton($onClickFcn, $caption = '', $buttonIcon = '', $title = '', $position = '', $id = '') {
 		$btn = new JqGrid_CustomButton();
 		$btn->btnOnClickFcnName = $onClickFcn;
 		$btn->btnCaption = $caption;
 		$btn->btnIcon = $buttonIcon;
 		$btn->btnTitle = $title;
 		$btn->btnId = $id;
 		$btn->position = $position;
 		return $btn;
 	}
 	/**
 	 * Формирует конфигурацию разделителя для панели инструментов на основе переданных параметров.
 	 * @param string $class Имя класса разделителя.
 	 * @param string $content Контент, который будет добавлен в блок разделителя.
 	 * @param string $position Позиция разделителя. 
 	 */
 	public static function addSeparator($class = '', $content = '', $position = '') {
 		$btn = new JqGrid_CustomButton();
 		$btn->isButton = FALSE;
 		$btn->sepClass = $class;
 		$btn->sepContent = $content;
 		$btn->position = $position;
 		return $btn;
  	}
 	
 	/**
 	 * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid. 
 	 */
 	public function getConfig() {
 		$cfg = array();
 		// Формируем массив основной конфигурации
 		$cfg['btn'] = $this->isButton;
 		if ($this->isButton === TRUE) {
			$cfg['caption'] = $this->btnCaption; 			
	 		if (!empty($this->btnIcon))
	 			$cfg['buttonicon'] = $this->btnIcon; 			
	 		if (!empty($this->btnOnClickFcnName))
	 			$cfg['onClickButtonFcnName'] = $this->btnOnClickFcnName; 			
	 		if (!empty($this->btnTitle))
	 			$cfg['title'] = $this->btnTitle; 			
	 		if (!empty($this->btnId))
	 			$cfg['id'] = $this->btnId; 			
//	 		$cfg['cursor'] = $this->btnCursor;
 		} else {
 			if (!empty($this->sepClass))
 				$cfg['sepclass'] = $this->sepClass;
 			if (!empty($this->sepContent))
 				$cfg['sepcontent'] = $this->sepContent;
 		} 			
	 	if (!empty($this->position))
	 		$cfg['position'] = $this->position;
 		// Возвращаем результат
 		return $cfg;
 	} 
 	
 }
