<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid\Buttons;

/**
 * Config of the "Refresh grid data" button.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class SearchButtonConfig
{

    /**
     * Set a icon to be displayed if the search action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: '' (from language file).
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
     * Default value: '' (from language file).
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
    private $__afterShowSearch = '';

    /**
     * This event fires (if defined) every time before the search dialog is shown.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__beforeShowSearch = '';

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
     * If set to true uses jqModal plugin (if present) to creat the dialogs.
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
     * Defines the width os the search dialog.
     *
     * Default value: 450.
     *
     * @var integer
     */
    private $width = 450;

    /**
     * Defines the height of the search dialog.
     *
     * Default value: 'auto'.
     *
     * @var string
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
    private $__onClose = '';

    /**
     * This function if defined is lunched every time the filter is redrawed - the filter is redrawed
     * every time when we add or delet rules or fields Tio this function we pass the search parameters as parameter.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__afterRedraw = '';

    /**
     * If defined this event fires when the search Button is clicked.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__onSearch = '';

    /**
     * If defined this function fire if reset button is activated.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__onReset = '';

    /**
     * If this option is set to true the search dialog will be closed if the user press ESC key.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $closeOnEscape = true;

    /**
     * This event occurs only once when the modal is created.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__onInitializeSearch = '';

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
     * If defined this should correspond to the tmplNames. See demo how to define template.
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
    public function getConfig($cfg) {
        $_config = [];

        foreach ($this as $_key => $_val) {
            if (is_string($_val)) {
                $_val = trim($_val);
                if (!empty($_val)) {
                    $_config[$_key] = $_val;
                }
            } elseif (is_null($_val)) {
                continue;
            } else {
                $_config[$_key] = $_val;
            }
        }

        unset($_config['searchicon'], $_config['searchtext'], $_config['searchtitle']);

        return [
                'searchicon' => $this->searchicon,
                'searchtext' => $this->searchtext,
                'searchtitle' => $this->searchtitle,
                '__searchButtonConfig' => $_config
        ];
    }

}
