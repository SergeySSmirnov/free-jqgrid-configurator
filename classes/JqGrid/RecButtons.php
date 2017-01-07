<?php defined('SYSPATH') OR die('No direct access allowed.');
 
/**
 * Класс, который представляет конфигурацию панели управления записями в таблице jqGrid.
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-NOW RUSproj, Sergey S. Smirnov
 */
 class JqGrid_RecButtons {
 	
 	/**
 	 * Признак необходимости отобразить кнопку "Просмотреть выбранную запись". Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $view = FALSE;
 	/**
 	 * Конфигурация кнопки "Просмотреть выбранную запись".
 	 * @var JqGrid_RecButtons_View
 	 */
 	public $viewConfig = NULL;
 	/**
 	 * Признак необходимости отобразить кнопку "Редактировать выбранную запись". Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $edit = TRUE;
 	/**
 	 * Конфигурация кнопки "Редактировать выбранную запись".
 	 * @var JqGrid_RecButtons_Edit
 	 */
 	public $editConfig = NULL;
 	/**
 	 * Признак необходимости отобразить кнопку "Добавить новую запись". Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $add = TRUE;
 	/**
 	 * Конфигурация кнопки "Добавить новую запись".
 	 * @var JqGrid_RecButtons_Add
 	 */
 	public $addConfig = NULL;
 	/**
 	 * Признак необходимости отобразить кнопку "Копировать запись". Значение по умолчанию: FALSE.
 	 * @var bool
 	 */
 	public $copy = FALSE;
 	/**
 	 * Конфигурация кнопки "Копировать запись".
 	 * @var JqGrid_RecButtons_Copy
 	 */
 	public $copyConfig = NULL;
 	/**
 	 * Признак необходимости отобразить кнопку "Поиск записей". Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $search = TRUE;
 	/**
 	 * Конфигурация кнопки "Поиск записей".
 	 * @var JqGrid_RecButtons_Search
 	 */
 	public $searchConfig = NULL;
 	/**
 	 * Признак необходимости отобразить кнопку "Обновить". Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $refresh = TRUE;
 	/**
 	 * Конфигурация кнопки "Обновить".
 	 * @var JqGrid_RecButtons_Refresh
 	 */
 	public $refreshConfig = NULL;
 	/**
 	 * Признак необходимости отобразить кнопку "Удалить выбранную запись". Значение по умолчанию: TRUE.
 	 * @var bool
 	 */
 	public $del = TRUE;
 	/**
 	 * Конфигурация кнопки "Удалить выбранную запись".
 	 * @var JqGrid_RecButtons_Del
 	 */
 	public $delConfig = NULL;
 	/**
 	 * Признак необходимости копировать все действия (кнопки) в верхней панели. Внимание, navGrid может быть применен только к верху. Тогда его id будет складываться из названия таблицы и "_toppager". Значение по умолчанию: FALSE.
 	 * @var boolean 
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
 	 * @return array Массив, содержащий конфигурацию для инициализации таблицы JqGrid. 
 	 */
 	public function getConfig() {
 		$cfg = array();
 		$cfg['recButtons']['view'] = $this->view;
 		$cfg['recButtons']['edit'] = $this->edit;
 		$cfg['recButtons']['add'] = $this->add;
 		$cfg['recButtons']['search'] = $this->search;
 		$cfg['recButtons']['refresh'] = $this->refresh;
 		$cfg['recButtons']['del'] = $this->del;
 		if ($this->view)
 			$cfg = $this->viewConfig->getConfig($cfg);
 		if ($this->edit)
 			$cfg = $this->editConfig->getConfig($cfg);
 		if ($this->add)
 			$cfg = $this->addConfig->getConfig($cfg);
 		if ($this->search)
 			$cfg = $this->searchConfig->getConfig($cfg);
 		if ($this->del)
 			$cfg = $this->delConfig->getConfig($cfg);
 		if ($this->refresh)
 			$cfg = $this->refreshConfig->getConfig($cfg);
 		if ($this->cloneToTop)
 			$cfg['recButtons']['cloneToTop'] = TRUE;
 		return $cfg;
 	} 
 	
 }
