<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет конфигурацию панели управления записями в таблице jqGrid.
 * 
 * @category Controller
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-14 RUSproj, Sergey S. Smirnov
 */
 class JqGrid_RecButtons {
 	
 	/**
 	 * @var bool Признак необходимости отобразить кнопку "Просмотреть выбранную запись". Значение по умолчанию: FALSE.
 	 */
 	public $view = FALSE;
 	/**
 	 * @var JqGrid_RecButtons_View Конфигурация кнопки "Просмотреть выбранную запись".
 	 */
 	public $viewConfig = NULL;
 	/**
 	 * @var bool Признак необходимости отобразить кнопку "Редактировать выбранную запись". Значение по умолчанию: TRUE.
 	 */
 	public $edit = TRUE;
 	/**
 	 * @var JqGrid_RecButtons_Edit Конфигурация кнопки "Редактировать выбранную запись".
 	 */
 	public $editConfig = NULL;
 	/**
 	 * @var bool Признак необходимости отобразить кнопку "Добавить новую запись". Значение по умолчанию: TRUE.
 	 */
 	public $add = TRUE;
 	/**
 	 * @var JqGrid_RecButtons_Add Конфигурация кнопки "Добавить новую запись".
 	 */
 	public $addConfig = NULL;
 	/**
 	 * @var bool Признак необходимости отобразить кнопку "Поиск записей". Значение по умолчанию: TRUE.
 	 */
 	public $search = TRUE;
 	/**
 	 * @var JqGrid_RecButtons_Search Конфигурация кнопки "Поиск записей".
 	 */
 	public $searchConfig = NULL;
 	/**
 	 * @var bool Признак необходимости отобразить кнопку "Обновить". Значение по умолчанию: TRUE.
 	 */
 	public $refresh = TRUE;
 	/**
 	 * @var JqGrid_RecButtons_Refresh Конфигурация кнопки "Обновить".
 	 */
 	public $refreshConfig = NULL;
 	/**
 	 * @var bool Признак необходимости отобразить кнопку "Удалить выбранную запись". Значение по умолчанию: TRUE.
 	 */
 	public $del = TRUE;
 	/**
 	 * @var JqGrid_RecButtons_Del Конфигурация кнопки "Удалить выбранную запись".
 	 */
 	public $delConfig = NULL;
 	/**
 	 * @var boolean Признак необходимости копировать все действия (кнопки) в верхней панели. Внимание, navGrid может быть применен только к верху. Тогда его id будет складываться из названия таблицы и "_toppager". Значение по умолчанию: FALSE. 
 	 */
 	public $cloneToTop = FALSE;
 	
 	
 	/**
 	 * Конструктор класса JqGrid_RecButtons.
 	 */
 	function __construct() {
 		$this->addConfig = new JqGrid_RecButtons_Add();
 		$this->delConfig = new JqGrid_RecButtons_Del();
 		$this->editConfig = new JqGrid_RecButtons_Edit();
 		$this->refreshConfig = new JqGrid_RecButtons_Refresh();
 		$this->searchConfig = new JqGrid_RecButtons_Search();
 		$this->viewConfig = new JqGrid_RecButtons_View();
 	}
 	
 	/**
 	 * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid. 
 	 */
 	public function getConfig() {
 		$cfg = array();
 		// Формируем массив основной конфигурации
 		$cfg['recButtons']['view'] = $this->view;
 		$cfg['recButtons']['edit'] = $this->edit;
 		$cfg['recButtons']['add'] = $this->add;
 		$cfg['recButtons']['search'] = $this->search;
 		$cfg['recButtons']['refresh'] = $this->refresh;
 		$cfg['recButtons']['del'] = $this->del;
 		if ($this->view === TRUE)
 			$cfg = $this->viewConfig->getConfig($cfg);
 		if ($this->edit === TRUE)
 			$cfg = $this->editConfig->getConfig($cfg);
 		if ($this->add === TRUE)
 			$cfg = $this->addConfig->getConfig($cfg);
 		if ($this->search === TRUE)
 			$cfg = $this->searchConfig->getConfig($cfg);
 		if ($this->del === TRUE)
 			$cfg = $this->delConfig->getConfig($cfg);
 		if ($this->refresh === TRUE)
 			$cfg = $this->refreshConfig->getConfig($cfg);
 		if ($this->cloneToTop === TRUE)
 			$cfg['recButtons']['cloneToTop'] = TRUE;
 			
 		// Возвращаем результат
 		return $cfg;
 	} 
 	
 }
