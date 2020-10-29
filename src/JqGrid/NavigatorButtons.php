<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid;

use Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\AddButtonConfig;
use Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\DeleteButtonConfig;
use Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\EditButtonConfig;
use Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\RefreshButtonConfig;
use Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig;
use Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\ViewButtonConfig;
use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;

/**
 * Represent config of the buttons located at the navigator panel.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class NavigatorButtons implements ConfigurationDefinitionInterface
{

    /**
     * Returns a new instance of the {@see \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons} class.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public static function createInstance()
    {
        return new NavigatorButtons();
    }

    /**
     * Add "View selected row" button if true.
     *
     * Default value: false.
     *
     * @var bool
     */
    private $view = false;

    /**
     * Config of the "View selected row" button.
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\ViewButtonConfig
     */
    private $viewConfig = null;

    /**
     * Add "Edit selected record" button if true.
     *
     * Default value: true.
     *
     * @var bool
     */
    private $edit = true;

    /**
     * Config of the "Edit selected record" button.
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\EditButtonConfig
     */
    private $editConfig = null;

    /**
     * Add "Create a new record" button if true.
     * When the button is clicked a editGridRow with parameter new method is executed.
     *
     * Default value: true.
     *
     * @var bool
     */
    private $add = true;

    /**
     * Config of the "Create a new record" button.
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\AddButtonConfig
     */
    private $addConfig = null;

    /**
     * Add "Search records" button if true.
     *
     * Default value: true.
     *
     * @var bool
     */
    private $search = true;

    /**
     * Config of the "Search records" button.
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    private $searchConfig = null;

    /**
     * Add "Refresh grid data" button if true.
     *
     * Default value: true.
     *
     * @var bool
     */
    private $refresh = true;

    /**
     * Config of the "Refresh grid data" button.
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\RefreshButtonConfig
     */
    private $refreshConfig = null;

    /**
     * Add "Delete selected record" button if true.
     *
     * Default value: true.
     *
     * @var bool
     */
    private $del = true;

    /**
     * Config of the "Delete selected record" button.
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\DeleteButtonConfig
     */
    private $delConfig = null;

    /**
     * Clones all the actions from the bottom pager to the top pager if defined.
     * Note that the navGrid can be applied to the top pager only. The id of the top pager is a combination of grid id and “_toppager”.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $cloneToTop = false;

    /**
     * Determine if the alert dialog can be closed if the user pres ESC key.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $closeOnEscape = true;

    /**
     * Determines the position of the Navigator buttons in the pager. Can be left, center and right.
     *
     * Default value: 'left'.
     *
     * @var string
     */
    private $position = 'left';

    /**
     * A list of the custom buttons configs.
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig[]|\Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SeparatorConfig[]
     */
    private $__customButtons = [];

    /**
     * Initialize a new instance of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons} class.
     */
    function __construct() {
        $this->addConfig = new AddButtonConfig();
        $this->delConfig = new DeleteButtonConfig();
        $this->editConfig = new EditButtonConfig();
        $this->refreshConfig = new RefreshButtonConfig();
        $this->searchConfig = new SearchButtonConfig();
        $this->viewConfig = new ViewButtonConfig();
    }

    /**
     * {@inheritDoc}
     * @see \Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface::getConfig()
     */
    public function getConfig() {
        $_config = [];
        $_config['add'] = $this->add;
        $_config['cloneToTop'] = $this->cloneToTop;
        $_config['closeOnEscape'] = $this->closeOnEscape;
        $_config['del'] = $this->del;
        $_config['edit'] = $this->edit;
        $_config['refresh'] = $this->refresh;
        $_config['search'] = $this->search;
        $_config['view'] = $this->view;

        if ($this->add) {
            $_config = array_merge_recursive($_config, $this->addConfig->getConfig());
        }

        if ($this->del) {
            $_config = array_merge_recursive($_config, $this->delConfig->getConfig());
        }

        if ($this->edit) {
            $_config = array_merge_recursive($_config, $this->editConfig->getConfig());
        }

        if ($this->refresh) {
            $_config = array_merge_recursive($_config, $this->refreshConfig->getConfig());
        }

        if ($this->search) {
            $_config = array_merge_recursive($_config, $this->searchConfig->getConfig());
        }

        if ($this->view) {
            $_config = array_merge_recursive($_config, $this->viewConfig->getConfig());
        }

        if (count($this->__customButtons)) {
            foreach ($this->__customButtons as $_btnConfig) {
                $_config['__customButtons'][] = $_btnConfig->getConfig();
            }
        }

        return (object)$_config;
    }

    /**
     * Add "View selected row" button if true.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getEnableViewButton()
    {
        return $this->view;
    }

    /**
     * Add "View selected row" button if true.
     *
     * Default value: false.
     *
     * @param boolean $view
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setEnableViewButton($view)
    {
        $this->view = $view;
        return $this;
    }

    /**
     * Config of the "View selected row" button.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\ViewButtonConfig
     */
    public function getViewConfig()
    {
        return $this->viewConfig;
    }

    /**
     * Config of the "View selected row" button.
     *
     * @param \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\ViewButtonConfig $viewConfig
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setViewConfig($viewConfig)
    {
        $this->viewConfig = $viewConfig;
        return $this;
    }

    /**
     * Add "Edit selected record" button if true.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getEnableEditButton()
    {
        return $this->edit;
    }

    /**
     * Add "Edit selected record" button if true.
     *
     * Default value: true.
     *
     * @param boolean $edit
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setEnableEditButton($edit)
    {
        $this->edit = $edit;
        return $this;
    }

    /**
     * Config of the "Edit selected record" button.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\EditButtonConfig
     */
    public function getEditConfig()
    {
        return $this->editConfig;
    }

    /**
     * Config of the "Edit selected record" button.
     *
     * @param \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\EditButtonConfig $editConfig
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setEditConfig($editConfig)
    {
        $this->editConfig = $editConfig;
        return $this;
    }

    /**
     * If defined replaces the build in edit function. Parameter passed to this function is the id of the edited row.
     *
     * Default value: ''.
     *
     * @param string $editFunc
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setEditFunction($editFunc)
    {
        $this->editConfig->setDelFunc($editFunc);
        return $this;
    }

    /**
     * Add "Create a new record" button if true.
     * When the button is clicked a editGridRow with parameter new method is executed.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getEnableAddButton()
    {
        return $this->add;
    }

    /**
     * Add "Create a new record" button if true.
     * When the button is clicked a editGridRow with parameter new method is executed.
     *
     * Default value: true.
     *
     * @param boolean $add
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setEnableAddButton($add)
    {
        $this->add = $add;
        return $this;
    }

    /**
     * Config of the "Create a new record" button.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\AddButtonConfig
     */
    public function getAddConfig()
    {
        return $this->addConfig;
    }

    /**
     * Config of the "Create a new record" button.
     *
     * @param \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\AddButtonConfig $addConfig
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setAddConfig($addConfig)
    {
        $this->addConfig = $addConfig;
        return $this;
    }

    /**
     * If defined replaces the build in add function.
     *
     * @param string $delFunc
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setAddFunction($addFunc)
    {
        $this->addConfig->setAddFunc($addFunc);
        return $this;
    }

    /**
     * Add "Search records" button if true.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getEnableSearchButton()
    {
        return $this->search;
    }

    /**
     * Add "Search records" button if true.
     *
     * Default value: true.
     *
     * @param boolean $search
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setEnableSearchButton($search)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * Config of the "Search records" button.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function getSearchConfig()
    {
        return $this->searchConfig;
    }

    /**
     * Config of the "Search records" button.
     *
     * @param \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig $searchConfig
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setSearchConfig($searchConfig)
    {
        $this->searchConfig = $searchConfig;
        return $this;
    }

    /**
     * Add "Refresh grid data" button if true.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getEnableRefreshButton()
    {
        return $this->refresh;
    }

    /**
     * Add "Refresh grid data" button if true.
     *
     * Default value: true.
     *
     * @param boolean $refresh
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setEnableRefreshButton($refresh)
    {
        $this->refresh = $refresh;
        return $this;
    }

    /**
     * Config of the "Refresh grid data" button.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\RefreshButtonConfig
     */
    public function getRefreshConfig()
    {
        return $this->refreshConfig;
    }

    /**
     * Config of the "Refresh grid data" button.
     *
     * @param \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\RefreshButtonConfig $refreshConfig
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setRefreshConfig($refreshConfig)
    {
        $this->refreshConfig = $refreshConfig;
        return $this;
    }

    /**
     * If defined this event fire after the refresh button is clicked.
     *
     * Default value: ''.
     *
     * @param string $afterRefresh
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setAfterRefreshFunction($afterRefresh)
    {
        $this->refreshConfig->setAfterRefresh($afterRefresh);
        return $this;
    }

    /**
     * If defined this event fire before the refresh button is clicked.
     *
     * Default value: ''.
     *
     * @param string $beforeRefresh
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setBeforeRefreshFunction($beforeRefresh)
    {
        $this->refreshConfig->setBeforeRefresh($beforeRefresh);
        return $this;
    }

    /**
     * Add "Delete selected record" button if true.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getEnableDelButton()
    {
        return $this->del;
    }

    /**
     * Add "Delete selected record" button if true.
     *
     * Default value: true.
     *
     * @param boolean $del
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setEnableDelButton($del)
    {
        $this->del = $del;
        return $this;
    }

    /**
     * Config of the "Delete selected record" button.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\DeleteButtonConfig
     */
    public function getDelConfig()
    {
        return $this->delConfig;
    }

    /**
     * Config of the "Delete selected record" button.
     *
     * @param \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\DeleteButtonConfig $delConfig
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setDelConfig($delConfig)
    {
        $this->delConfig = $delConfig;
        return $this;
    }

    /**
     * If defined replaces the build in del function. Parameter passed to this function is the id of the edited row.
     *
     * Default value: ''.
     *
     * @param string $delFunc
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setDelFunction($delFunc)
    {
        $this->delConfig->setDelFunc($delFunc);
        return $this;
    }

    /**
     * Clones all the actions from the bottom pager to the top pager if defined.
     * Note that the navGrid can be applied to the top pager only. The id of the top pager is a combination of grid id and “_toppager”.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getCloneToTop()
    {
        return $this->cloneToTop;
    }

    /**
     * Clones all the actions from the bottom pager to the top pager if defined.
     * Note that the navGrid can be applied to the top pager only. The id of the top pager is a combination of grid id and “_toppager”.
     *
     * Default value: false.
     *
     * @param boolean $cloneToTop
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setCloneToTop($cloneToTop)
    {
        $this->cloneToTop = $cloneToTop;
        return $this;
    }

    /**
     * Determine if the alert dialog can be closed if the user pres ESC key.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getCloseOnEscape()
    {
        return $this->closeOnEscape;
    }

    /**
     * Determine if the alert dialog can be closed if the user pres ESC key.
     *
     * Default value: true.
     *
     * @param boolean $closeOnEscape
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setCloseOnEscape($closeOnEscape)
    {
        $this->closeOnEscape = $closeOnEscape;
        return $this;
    }

    /**
     * Determines the position of the Navigator buttons in the pager. Can be left, center and right.
     *
     * Default value: 'left'.
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Determines the position of the Navigator buttons in the pager. Can be left, center and right.
     *
     * Default value: 'left'.
     *
     * @param string $position
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * A list of the custom buttons configs.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig[]|\Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SeparatorConfig[]
     */
    public function getCustomButtons()
    {
        return $this->__customButtons;
    }

    /**
     * Add custom button config to the CustomButtons list.
     *
     * @param \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig|\Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SeparatorConfig $customButton
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function addCustomButton($customButton)
    {
        $this->__customButtons[] = $customButton;
        return $this;
    }

    /**
     * A list of the custom buttons configs.
     *
     * @param \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig[]|\Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SeparatorConfig[] $customButtons
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function setCustomButtons($customButtons)
    {
        $this->__customButtons = $customButtons;
        return $this;
    }

}
