<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid;

use Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\AddButton;
use Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\DeleteButton;
use Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\EditButton;
use Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\RefreshButton;
use Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\SearchButton;
use Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\ViewButton;

/**
 * Класс, который представляет конфигурацию панели управления записями в таблице jqGrid.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class RecButtons
{
    /**
     * Признак необходимости отобразить кнопку "Просмотреть выбранную запись". Значение по умолчанию: false.
     *
     * @var bool
     */
    public $view = false;

    /**
     * Конфигурация кнопки "Просмотреть выбранную запись".
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\ViewButton
     */
    public $viewConfig = null;

    /**
     * Признак необходимости отобразить кнопку "Редактировать выбранную запись". Значение по умолчанию: true.
     *
     * @var bool
     */
    public $edit = true;

    /**
     * Конфигурация кнопки "Редактировать выбранную запись".
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\EditButton
     */
    public $editConfig = null;

    /**
     * Признак необходимости отобразить кнопку "Добавить новую запись". Значение по умолчанию: true.
     *
     * @var bool
     */
    public $add = true;

    /**
     * Конфигурация кнопки "Добавить новую запись".
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\AddButton
     */
    public $addConfig = null;

    /**
     * Признак необходимости отобразить кнопку "Копировать запись". Значение по умолчанию: false.
     *
     * @var bool
     */
    public $copy = false;

    /**
     * Признак необходимости отобразить кнопку "Поиск записей". Значение по умолчанию: true.
     *
     * @var bool
     */
    public $search = true;

    /**
     * Конфигурация кнопки "Поиск записей".
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\SearchButton
     */
    public $searchConfig = null;

    /**
     * Признак необходимости отобразить кнопку "Обновить". Значение по умолчанию: true.
     *
     * @var bool
     */
    public $refresh = true;

    /**
     * Конфигурация кнопки "Обновить".
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\RefreshButton
     */
    public $refreshConfig = null;

    /**
     * Признак необходимости отобразить кнопку "Удалить выбранную запись". Значение по умолчанию: true.
     *
     * @var bool
     */
    public $del = true;

    /**
     * Конфигурация кнопки "Удалить выбранную запись".
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons\DeleteButton
     */
    public $delConfig = null;

    /**
     * Признак необходимости копировать все действия (кнопки) в верхней панели. Внимание, navGrid может быть применен только к верху.
     * Тогда его id будет складываться из названия таблицы и "_toppager". Значение по умолчанию: false.
     *
     * @var boolean
     */
    public $cloneToTop = false;

    /**
     * Конструктор класса RecButtons.
     */
    function __construct() {
        $this->addConfig = new AddButton();
        $this->delConfig = new DeleteButton();
        $this->editConfig = new EditButton();
        $this->refreshConfig = new RefreshButton();
        $this->searchConfig = new SearchButton();
        $this->viewConfig = new ViewButton();
    }

    /**
     * Формирует массив конфигурационных параметров.
     *
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
