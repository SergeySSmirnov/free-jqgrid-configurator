<?php
namespace RUSproj\Kohana\JqGrid\JqGrid;

use RUSproj\Kohana\JqGrid\JqGrid\RecButtons\ {
    JqGrid_RecButtons_Add,
    JqGrid_RecButtons_Edit,
    JqGrid_RecButtons_Del,
    JqGrid_RecButtons_Search,
    JqGrid_RecButtons_View,
    JqGrid_RecButtons_Refresh
};

/**
 * Класс, который представляет конфигурацию панели управления записями в таблице jqGrid.
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-NOW RUSproj, Sergey S. Smirnov
 */
class JqGrid_RecButtons
{
    /**
     * Признак необходимости отобразить кнопку "Просмотреть выбранную запись". Значение по умолчанию: false.
     * @var bool
     */
    public $view = false;

    /**
     * Конфигурация кнопки "Просмотреть выбранную запись".
     * @var JqGrid_RecButtons_View
     */
    public $viewConfig = null;

    /**
     * Признак необходимости отобразить кнопку "Редактировать выбранную запись". Значение по умолчанию: true.
     * @var bool
     */
    public $edit = true;

    /**
     * Конфигурация кнопки "Редактировать выбранную запись".
     * @var JqGrid_RecButtons_Edit
     */
    public $editConfig = null;

    /**
     * Признак необходимости отобразить кнопку "Добавить новую запись". Значение по умолчанию: true.
     * @var bool
     */
    public $add = true;

    /**
     * Конфигурация кнопки "Добавить новую запись".
     * @var JqGrid_RecButtons_Add
     */
    public $addConfig = null;

    /**
     * Признак необходимости отобразить кнопку "Копировать запись". Значение по умолчанию: false.
     * @var bool
     */
    public $copy = false;

    // /**
    // * Конфигурация кнопки "Копировать запись".
    // * @var JqGrid_RecButtons_Copy
    // */
    // public $copyConfig = null;

    /**
     * Признак необходимости отобразить кнопку "Поиск записей". Значение по умолчанию: true.
     * @var bool
     */
    public $search = true;

    /**
     * Конфигурация кнопки "Поиск записей".
     * @var JqGrid_RecButtons_Search
     */
    public $searchConfig = null;

    /**
     * Признак необходимости отобразить кнопку "Обновить". Значение по умолчанию: true.
     * @var bool
     */
    public $refresh = true;

    /**
     * Конфигурация кнопки "Обновить".
     * @var JqGrid_RecButtons_Refresh
     */
    public $refreshConfig = null;

    /**
     * Признак необходимости отобразить кнопку "Удалить выбранную запись". Значение по умолчанию: true.
     * @var bool
     */
    public $del = true;

    /**
     * Конфигурация кнопки "Удалить выбранную запись".
     * @var JqGrid_RecButtons_Del
     */
    public $delConfig = null;

    /**
     * Признак необходимости копировать все действия (кнопки) в верхней панели. Внимание, navGrid может быть применен только к верху. Тогда его id будет складываться из названия таблицы и "_toppager". Значение по умолчанию: false.
     * @var boolean
     */
    public $cloneToTop = false;

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
        $cfg = [];
        $cfg['recButtons']['view'] = $this->view;
        $cfg['recButtons']['edit'] = $this->edit;
        $cfg['recButtons']['add'] = $this->add;
        $cfg['recButtons']['search'] = $this->search;
        $cfg['recButtons']['refresh'] = $this->refresh;
        $cfg['recButtons']['del'] = $this->del;
        if ($this->view) {
            $cfg = $this->viewConfig->getConfig($cfg);
        }
        if ($this->edit) {
            $cfg = $this->editConfig->getConfig($cfg);
        }
        if ($this->add) {
            $cfg = $this->addConfig->getConfig($cfg);
        }
        if ($this->search) {
            $cfg = $this->searchConfig->getConfig($cfg);
        }
        if ($this->del) {
            $cfg = $this->delConfig->getConfig($cfg);
        }
        if ($this->refresh) {
            $cfg = $this->refreshConfig->getConfig($cfg);
        }
        if ($this->cloneToTop) {
            $cfg['recButtons']['cloneToTop'] = true;
        }
        return $cfg;
    }

}
