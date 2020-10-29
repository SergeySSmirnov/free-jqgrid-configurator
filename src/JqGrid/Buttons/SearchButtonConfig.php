<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid\Buttons;

use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;

/**
 * Config of the "Refresh grid data" button.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class SearchButtonConfig implements ConfigurationDefinitionInterface
{

    /**
     * Initialize a new instance of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig} class.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public static function createInstance()
    {
        return new SearchButtonConfig();
    }

    /**
     * Set a icon to be displayed if the search action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: 'ui-icon ui-icon-search' (from language file).
     *
     * @var string
     */
    private $searchicon = '';

    /**
     * The text than can be set in the search button.
     *
     * Default value: '' (from language file).
     *
     * @var string
     */
    private $searchtext = '';

    /**
     * The title that appear when we mouse over to the search button.
     *
     * Default value: 'Find records' (from language file).
     *
     * @var string
     */
    private $searchtitle = '';

    /**
     * Determine if the alert dialog can be closed if the user pres ESC key.
     *
     * Default value: true.
     *
     * @var bool
     */
    private $closeOnEscape = true;

    /**
     * This event fires (if defined) every time after the search dialog is shown.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__eventHandler__afterShowSearch = '';

    /**
     * This event fires (if defined) every time before the search dialog is shown.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__eventHandler__beforeShowSearch = '';

    /**
     * If set to true this closes the search dialog after the user apply a search - i.e. click on Find button.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $closeAfterSearch = true;

    /**
     * If set to true this closes the search dialog after the user apply a reset - i.e. click on Reset button.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $closeAfterReset = true;

    /**
     * Enables or disables draging of the modal.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $drag = true;

    /**
     * If set to true uses jqModal plugin (if present) to create the dialogs.
     * If set to true and the plugin is not present jqGrid uses its internal function to create dialog.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $jqModal = true;

    /**
     * Enables or disables resizing of the modal.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $resize = true;

    /**
     * Is set to true the search dialog becomes modal.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $modal = false;

    /**
     * Defines the width of the search dialog.
     *
     * Default value: 450.
     *
     * @var integer
     */
    private $width = 500;

    /**
     * Defines the height of the search dialog.
     *
     * Default value: 'auto'.
     *
     * @var integer|string
     */
    private $height = '';

    /**
     * The initial top position of modal dialog. The default value of 0 mean the top position
     * from the upper left corner of the grid. When jqModal option is true and jqModal plugin
     * is present any value different from 0 mean the top position from upper left corner of the window.
     *
     * Default value: 0.
     *
     * @var integer
     */
    private $top = 0;

    /**
     * The initial left position of modal dialog. The default value of 0 mean the left position
     * from the upper left corner of the grid. When jqModal option is true and jqModal plugin
     * is present any value different from 0 mean the left position from upper left corner of the window.
     *
     * Default value: 0.
     *
     * @var integer
     */
    private $left = 0;

    /**
     * The caption of the modal.
     *
     * Default value: '' (from language file).
     *
     * @var string
     */
    private $caption = '';

    /**
     * If set to true shows the query which is generated when the user defines the conditions for the search.
     * Valid only in advanced search. Again with this a button near search button appear which allows the user
     * to show or hide the query string interactively.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $showQuery = false;

    /**
     * Determines whether search should be applied on pressing Enter key.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $searchOnEnter = false;

    /**
     * If set to true this activates the advanced searching.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $multipleSearch = false;

    /**
     * If set to true this activates the advanced searching with a possibilities to define a complex conditions.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $multipleGroup = false;

    /**
     * If defined this event fires when the dialog is closed. Can return true or false. If the event return false the dialog will not be closed.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__eventHandler__onClose = '';

    /**
     * This function if defined is lunched every time the filter is redrawed - the filter is redrawed
     * every time when we add or delet rules or fields Tio this function we pass the search parameters as parameter.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__eventHandler__afterRedraw = '';

    /**
     * If defined this event fires when the search Button is clicked.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__eventHandler__onSearch = '';

    /**
     * If defined this function fire if reset button is activated.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__eventHandler__onReset = '';

    /**
     * This event occurs only once when the modal is created.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__eventHandler__onInitializeSearch = '';

    /**
     * When set to true the form is recreated every time the search dialog is activated with the new options from colModel (if they are changed).
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $recreateForm = false;

    /**
     * This option is valid only in navigator options. If set to true the dialog appear automatically when the grid is constructed for first time.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $showOnLoad = false;

    /**
     * If searchrules are defined this turn on of error checking.
     * If there is a error in the input the filter is not posted to the server and a error message appear.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $errorcheck = true;

    /**
     * If this option is set to 0 the overlay in grid is disabled and the user can interact with the grid while search dialog is active.
     *
     * Default value: 10.
     *
     * @var integer
     */
    private $overlay = 10;

    /**
     * If defined this should be a valid id in the DOM. Also if this option is set the filter is inserted as child of this element.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $layer = '';

    /**
     * Defines the name of the templates used for easy user input - by example like this: ['Template1', 'Template2', …].
     *
     * @var array
     */
    private $tmplNames = [];

    /**
     * If defined this should correspond to the TemplatesNames.
     *
     * Default value: [].
     *
     * @var object[]
     */
    private $tmplFilters = [];

    /**
     * If a template is defined a select element appear between the Reset and Find buttons.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $tmplLabel = '';

    /**
     * The starting z-index for the dialog. If you will see the dialog form under another
     * elements or dialogs you should use the parameter with some value higher as default value 950.
     * In the most cases it should be the value higher as 1000 - the default value of jQuery UI dialog.
     *
     * Default value: 950.
     *
     * @var integer
     */
    private $zIndex = 950;

    /**
     * {@inheritDoc}
     * @see \Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface::getConfig()
     */
    public function getConfig() {
        $_configFieldsExcept = ['searchicon', 'searchtext', 'searchtitle', '__eventHandler__afterRefresh'];
        $_btnConfigFieldName = '__searchButtonConfig';
        $_config = [$_btnConfigFieldName => []];

        foreach ($this as $_key => $_val) {
            if (is_string($_val)) {
                $_val = trim($_val);
                if (empty($_val)) {
                    continue;
                }
            } elseif (is_null($_val)) {
                continue;
            }

            if (in_array($_key, $_configFieldsExcept)) {
                $_config[$_key] = $_val;
            } else {
                $_config[$_btnConfigFieldName][$_key] = $_val;
            }
        }

        return $_config;
    }

    /**
     * Set a icon to be displayed if the search action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: 'ui-icon ui-icon-search' (from language file).
     *
     * @return string
     */
    public function getSearchIcon()
    {
        return $this->searchicon;
    }

    /**
     * Set a icon to be displayed if the search action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: 'ui-icon ui-icon-search' (from language file).
     *
     * @param string $searchIcon
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setSearchIcon($searchIcon)
    {
        $this->searchicon = $searchIcon;
        return $this;
    }

    /**
     * The text than can be set in the search button.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getSearchText()
    {
        return $this->searchtext;
    }

    /**
     * The text than can be set in the search button.
     *
     * Default value: '' (from language file).
     *
     * @param string $searchText
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setSearchText($searchText)
    {
        $this->searchtext = $searchText;
        return $this;
    }

    /**
     * The title that appear when we mouse over to the search button.
     *
     * Default value: 'Find records' (from language file).
     *
     * @return string
     */
    public function getSearchTitle()
    {
        return $this->searchtitle;
    }

    /**
     * The title that appear when we mouse over to the search button.
     *
     * Default value: 'Find records' (from language file).
     *
     * @param string $searchTitle
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setSearchTitle($searchTitle)
    {
        $this->searchtitle = $searchTitle;
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
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setCloseOnEscape($closeOnEscape)
    {
        $this->closeOnEscape = $closeOnEscape;
        return $this;
    }

    /**
     * This event fires (if defined) every time after the search dialog is shown.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getAfterShowSearch()
    {
        return $this->__eventHandler__afterShowSearch;
    }

    /**
     * This event fires (if defined) every time after the search dialog is shown.
     *
     * Default value: ''.
     *
     * @param string $afterShowSearch
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setAfterShowSearch($afterShowSearch)
    {
        $this->__eventHandler__afterShowSearch = $afterShowSearch;
        return $this;
    }

    /**
     * This event fires (if defined) every time before the search dialog is shown.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getBeforeShowSearch()
    {
        return $this->__eventHandler__beforeShowSearch;
    }

    /**
     * This event fires (if defined) every time before the search dialog is shown.
     *
     * Default value: ''.
     *
     * @param string $beforeShowSearch
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setBeforeShowSearch($beforeShowSearch)
    {
        $this->__eventHandler__beforeShowSearch = $beforeShowSearch;
        return $this;
    }

    /**
     * If set to true this closes the search dialog after the user apply a search - i.e. click on Find button.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getCloseAfterSearch()
    {
        return $this->closeAfterSearch;
    }

    /**
     * If set to true this closes the search dialog after the user apply a search - i.e. click on Find button.
     *
     * Default value: true.
     *
     * @param boolean $closeAfterSearch
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setCloseAfterSearch($closeAfterSearch)
    {
        $this->closeAfterSearch = $closeAfterSearch;
        return $this;
    }

    /**
     * If set to true this closes the search dialog after the user apply a reset - i.e. click on Reset button.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getCloseAfterReset()
    {
        return $this->closeAfterReset;
    }

    /**
     * If set to true this closes the search dialog after the user apply a reset - i.e. click on Reset button.
     *
     * Default value: true.
     *
     * @param boolean $closeAfterReset
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setCloseAfterReset($closeAfterReset)
    {
        $this->closeAfterReset = $closeAfterReset;
        return $this;
    }

    /**
     * Enables or disables draging of the modal.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getDrag()
    {
        return $this->drag;
    }

    /**
     * Enables or disables draging of the modal.
     *
     * Default value: true.
     *
     * @param boolean $drag
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setDrag($drag)
    {
        $this->drag = $drag;
        return $this;
    }

    /**
     * If set to true uses jqModal plugin (if present) to create the dialogs.
     * If set to true and the plugin is not present jqGrid uses its internal function to create dialog.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getJqModal()
    {
        return $this->jqModal;
    }

    /**
     * If set to true uses jqModal plugin (if present) to create the dialogs.
     * If set to true and the plugin is not present jqGrid uses its internal function to create dialog.
     *
     * Default value: true.
     *
     * @param boolean $jqModal
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setJqModal($jqModal)
    {
        $this->jqModal = $jqModal;
        return $this;
    }

    /**
     * Enables or disables resizing of the modal.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getResize()
    {
        return $this->resize;
    }

    /**
     * Enables or disables resizing of the modal.
     *
     * Default value: true.
     *
     * @param boolean $resize
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setResize($resize)
    {
        $this->resize = $resize;
        return $this;
    }

    /**
     * Is set to true the search dialog becomes modal.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getModal()
    {
        return $this->modal;
    }

    /**
     * Is set to true the search dialog becomes modal.
     *
     * Default value: false.
     *
     * @param boolean $modal
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setModal($modal)
    {
        $this->modal = $modal;
        return $this;
    }

    /**
     * Defines the width of the search dialog.
     *
     * Default value: 450.
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Defines the width of the search dialog.
     *
     * Default value: 450.
     *
     * @param integer $width
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Defines the height of the search dialog.
     *
     * Default value: 'auto'.
     *
     * @return string|integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Defines the height of the search dialog.
     *
     * Default value: 'auto'.
     *
     * @param string|integer $height
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * The initial top position of modal dialog. The default value of 0 mean the top position
     * from the upper left corner of the grid. When jqModal option is true and jqModal plugin
     * is present any value different from 0 mean the top position from upper left corner of the window.
     *
     * Default value: 0.
     *
     * @return integer
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * The initial top position of modal dialog. The default value of 0 mean the top position
     * from the upper left corner of the grid. When jqModal option is true and jqModal plugin
     * is present any value different from 0 mean the top position from upper left corner of the window.
     *
     * Default value: 0.
     *
     * @param integer $top
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setTop($top)
    {
        $this->top = $top;
        return $this;
    }

    /**
     * The initial left position of modal dialog. The default value of 0 mean the left position
     * from the upper left corner of the grid. When jqModal option is true and jqModal plugin
     * is present any value different from 0 mean the left position from upper left corner of the window.
     *
     * Default value: 0.
     *
     * @return integer
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * The initial left position of modal dialog. The default value of 0 mean the left position
     * from the upper left corner of the grid. When jqModal option is true and jqModal plugin
     * is present any value different from 0 mean the left position from upper left corner of the window.
     *
     * Default value: 0.
     *
     * @param integer $left
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setLeft($left)
    {
        $this->left = $left;
        return $this;
    }

    /**
     * The caption of the modal.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * The caption of the modal.
     *
     * Default value: '' (from language file).
     *
     * @param string $caption
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * If set to true shows the query which is generated when the user defines the conditions for the search.
     * Valid only in advanced search. Again with this a button near search button appear which allows the user
     * to show or hide the query string interactively.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getShowQuery()
    {
        return $this->showQuery;
    }

    /**
     * If set to true shows the query which is generated when the user defines the conditions for the search.
     * Valid only in advanced search. Again with this a button near search button appear which allows the user
     * to show or hide the query string interactively.
     *
     * Default value: false.
     *
     * @param boolean $showQuery
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setShowQuery($showQuery)
    {
        $this->showQuery = $showQuery;
        return $this;
    }

    /**
     * Determines whether search should be applied on pressing Enter key.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getSearchOnEnter()
    {
        return $this->searchOnEnter;
    }

    /**
     * Determines whether search should be applied on pressing Enter key.
     *
     * Default value: false.
     *
     * @param boolean $searchOnEnter
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setSearchOnEnter($searchOnEnter)
    {
        $this->searchOnEnter = $searchOnEnter;
        return $this;
    }

    /**
     * If set to true this activates the advanced searching.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getMultipleSearch()
    {
        return $this->multipleSearch;
    }

    /**
     * If set to true this activates the advanced searching.
     *
     * Default value: false.
     *
     * @param boolean $multipleSearch
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setMultipleSearch($multipleSearch)
    {
        $this->multipleSearch = $multipleSearch;
        return $this;
    }

    /**
     * If set to true this activates the advanced searching with a possibilities to define a complex conditions.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getMultipleGroup()
    {
        return $this->multipleGroup;
    }

    /**
     * If set to true this activates the advanced searching with a possibilities to define a complex conditions.
     *
     * Default value: false.
     *
     * @param boolean $multipleGroup
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setMultipleGroup($multipleGroup)
    {
        $this->multipleGroup = $multipleGroup;
        return $this;
    }

    /**
     * If defined this event fires when the dialog is closed. Can return true or false. If the event return false the dialog will not be closed.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getOnClose()
    {
        return $this->__eventHandler__onClose;
    }

    /**
     * If defined this event fires when the dialog is closed. Can return true or false. If the event return false the dialog will not be closed.
     *
     * Default value: ''.
     *
     * @param string $onClose
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setOnClose($onClose)
    {
        $this->__eventHandler__onClose = $onClose;
        return $this;
    }

    /**
     * This function if defined is lunched every time the filter is redrawed - the filter is redrawed
     * every time when we add or delet rules or fields Tio this function we pass the search parameters as parameter.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getAfterRedraw()
    {
        return $this->__eventHandler__afterRedraw;
    }

    /**
     * This function if defined is lunched every time the filter is redrawed - the filter is redrawed
     * every time when we add or delet rules or fields Tio this function we pass the search parameters as parameter.
     *
     * Default value: ''.
     *
     * @param string $afterRedraw
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setAfterRedraw($afterRedraw)
    {
        $this->__eventHandler__afterRedraw = $afterRedraw;
        return $this;
    }

    /**
     * If defined this event fires when the search Button is clicked.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getOnSearch()
    {
        return $this->__eventHandler__onSearch;
    }

    /**
     * If defined this event fires when the search Button is clicked.
     *
     * Default value: ''.
     *
     * @param string $onSearch
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setOnSearch($onSearch)
    {
        $this->__eventHandler__onSearch = $onSearch;
        return $this;
    }

    /**
     * If defined this function fire if reset button is activated.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getOnReset()
    {
        return $this->__eventHandler__onReset;
    }

    /**
     * If defined this function fire if reset button is activated.
     *
     * Default value: ''.
     *
     * @param string $onReset
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setOnReset($onReset)
    {
        $this->__eventHandler__onReset = $onReset;
        return $this;
    }

    /**
     * This event occurs only once when the modal is created.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getOnInitializeSearch()
    {
        return $this->__eventHandler__onInitializeSearch;
    }

    /**
     * This event occurs only once when the modal is created.
     *
     * Default value: ''.
     *
     * @param string $onInitializeSearch
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setOnInitializeSearch($onInitializeSearch)
    {
        $this->__eventHandler__onInitializeSearch = $onInitializeSearch;
        return $this;
    }

    /**
     * When set to true the form is recreated every time the search dialog is activated with the new options from colModel (if they are changed).
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getRecreateForm()
    {
        return $this->recreateForm;
    }

    /**
     * When set to true the form is recreated every time the search dialog is activated with the new options from colModel (if they are changed).
     *
     * Default value: false.
     *
     * @param boolean $recreateForm
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setRecreateForm($recreateForm)
    {
        $this->recreateForm = $recreateForm;
        return $this;
    }

    /**
     * This option is valid only in navigator options. If set to true the dialog appear automatically when the grid is constructed for first time.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getShowOnLoad()
    {
        return $this->showOnLoad;
    }

    /**
     * This option is valid only in navigator options. If set to true the dialog appear automatically when the grid is constructed for first time.
     *
     * Default value: false.
     *
     * @param boolean $showOnLoad
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setShowOnLoad($showOnLoad)
    {
        $this->showOnLoad = $showOnLoad;
        return $this;
    }

    /**
     * If searchrules are defined this turn on of error checking.
     * If there is a error in the input the filter is not posted to the server and a error message appear.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getErrorCheck()
    {
        return $this->errorcheck;
    }

    /**
     * If searchrules are defined this turn on of error checking.
     * If there is a error in the input the filter is not posted to the server and a error message appear.
     *
     * Default value: true.
     *
     * @param boolean $errorcheck
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setErrorCheck($errorcheck)
    {
        $this->errorcheck = $errorcheck;
        return $this;
    }

    /**
     * If this option is set to 0 the overlay in grid is disabled and the user can interact with the grid while search dialog is active.
     *
     * Default value: 10.
     *
     * @return integer
     */
    public function getOverlay()
    {
        return $this->overlay;
    }

    /**
     * If this option is set to 0 the overlay in grid is disabled and the user can interact with the grid while search dialog is active.
     *
     * Default value: 10.
     *
     * @param integer $overlay
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setOverlay($overlay)
    {
        $this->overlay = $overlay;
        return $this;
    }

    /**
     * If defined this should be a valid id in the DOM. Also if this option is set the filter is inserted as child of this element.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getLayer()
    {
        return $this->layer;
    }

    /**
     * If defined this should be a valid id in the DOM. Also if this option is set the filter is inserted as child of this element.
     *
     * Default value: ''.
     *
     * @param string $layer
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setLayer($layer)
    {
        $this->layer = $layer;
        return $this;
    }

    /**
     * Defines the name of the templates used for easy user input - by example like this: ['Template1', 'Template2', …].
     *
     * @return array
     */
    public function getTemplatesNames()
    {
        return $this->tmplNames;
    }

    /**
     * Defines the name of the templates used for easy user input - by example like this: ['Template1', 'Template2', …].
     *
     * @param array $tmplNames
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setTemplatesNames($tmplNames)
    {
        $this->tmplNames = $tmplNames;
        return $this;
    }

    /**
     * If defined this should correspond to the TemplatesNames.
     *
     * Default value: [].
     *
     * @return object[]
     */
    public function getTemplatesFilters()
    {
        return $this->tmplFilters;
    }

    /**
     * If defined this should correspond to the TemplatesNames.
     *
     * Default value: [].
     *
     * @param object[] $tmplFilters
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setTemplatesFilters($tmplFilters)
    {
        $this->tmplFilters = $tmplFilters;
        return $this;
    }

    /**
     * If a template is defined a select element appear between the Reset and Find buttons.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getTemplatesLabel()
    {
        return $this->tmplLabel;
    }

    /**
     * If a template is defined a select element appear between the Reset and Find buttons.
     *
     * Default value: ''.
     *
     * @param string $tmplLabel
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setTemplatesLabel($tmplLabel)
    {
        $this->tmplLabel = $tmplLabel;
        return $this;
    }

    /**
     * The starting z-index for the dialog. If you will see the dialog form under another
     * elements or dialogs you should use the parameter with some value higher as default value 950.
     * In the most cases it should be the value higher as 1000 - the default value of jQuery UI dialog.
     *
     * Default value: 950.
     *
     * @return integer
     */
    public function getZIndex()
    {
        return $this->zIndex;
    }

    /**
     * The starting z-index for the dialog. If you will see the dialog form under another
     * elements or dialogs you should use the parameter with some value higher as default value 950.
     * In the most cases it should be the value higher as 1000 - the default value of jQuery UI dialog.
     *
     * Default value: 950.
     *
     * @param integer $zIndex
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SearchButtonConfig
     */
    public function setZIndex($zIndex)
    {
        $this->zIndex = $zIndex;
        return $this;
    }

}
