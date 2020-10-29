<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid;

use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;

/**
 * Represent config of the buttons located at the navigator panel.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class ToolbarSearch implements ConfigurationDefinitionInterface
{

    /**
     * Returns a new instance of the {@see \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch} class.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public static function createInstance()
    {
        return new ToolbarSearch();
    }

    /**
     * Search is performed according to the following rules: for text element when a Enter key is pressed
     * while inputting values and search is performed. For select element when the value changes.
     * The search parameter in grid is set to true and ajax call is made.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $autosearch = true;

    /**
     * Event which fires before a search. It is called before triggering the grid.
     * If the event return true triggering does not occur. In this case you can construct your own search parameters
     * and trigger the grid to search the data. Any other return value causes triggering.
     *
     * @var string
     */
    private $__eventHandler__beforeSearch = '';

    /**
     * Event which fires after a search.
     *
     * @var string
     */
    private $__eventHandler__afterSearch = '';

    /**
     * Event which fires before clearing entered values (i.e.,clearToolbar is activated).It is called before
     * clearing the data from search elements. If the event return true triggering does not occur.
     * In this case you can construct your own search parameters and trigger the grid.
     * Any other return value causes triggering.
     *
     * @var string
     */
    private $__eventHandler__beforeClear = '';

    /**
     * Event which fires after clearing entered values (i.e., clearToolbar activated).
     *
     * @var string
     */
    private $__eventHandler__afterClear = '';

    /**
     * Determines how the search should be applied. If this option is true see the autosearch option.
     * If the option is false then the search is performed immediately when the user pres some character.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $searchOnEnter = true;

    /**
     * Determines how to post the data on which we perform searching. When the this option is false
     * the posted data is in key:value pair, if the option is true, the posted data is equal on
     * those as in searchGrid method.
     *
     * Default value: false.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:advanced_searching#options
     *
     * @var boolean
     */
    private $stringResult = false;

    /**
     * This option is valid only if the option stringReasult is set to true and determines the group operation.
     *
     * Allowed values: 'AND' or 'OR'.
     *
     * Default value: 'AND'.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:advanced_searching#options
     *
     * @var string
     */
    private $groupOp = 'AND';

    /**
     * The option determines the default search operator when a search is performed.
     * If any valid option is set, then it will be used for the default operator in all fields.
     *
     * Default value: 'bw'.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config#colmodel_options
     *
     * @var string
     */
    private $defaultSearch = 'bw';

    /**
     * When set to true allows the user to select operations when searching. The click operations are created
     * near the search field. In this case possible operators that can appear can be configured
     * with sopt option in searchoptins in colModel.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $searchOperators = false;

    /**
     * This options is valid only when searchOperators is true. It appear when the user hover with a mouse
     * to the operation button. This can be overwritten with option searchtitle in searchoptions in colModel.
     *
     * Default value: '' (from language config).
     *
     * @var string
     */
    private $operandTitle = '';

    /**
     * The short text operation which is displayed to the user when a operation button is clicked.
     * By example for equal we display '=='.
     * The default setting of this object is:
     *    { "eq" :"==", "ne":"!", "lt":"<", "le":"<=", "gt":">", "ge":">=", "bw":"^", "bn":"!^", "in":"=",
     *    "ni":"!=", "ew":"\|", "en":"!@", "cn":"~", "nc":"!~", "nu":"#", "nn":"!#", "bt":"..."}.
     * Changes have effect only if the value symbol is changed. See searchOperators option.
     *
     * Default value: null.
     *
     * @var array
     */
    private $operands = null;

    /**
     * Defines the long texts for the particular operations when serching.
     * The default object is in language file and can be found as $.jgrid.search.odata.
     *
     * Default value: null;
     *
     * @var array
     */
    private $odata = null;


    /**
     * {@inheritDoc}
     * @see \Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface::getConfig()
     */
    public function getConfig()
    {
        $_config = [];

        foreach ($this as $_key => $_val) {
            if (is_string($_val)) {

                if (!empty($_val)) {
                    $_config[$_key] = trim($_val);
                }
            } elseif (is_null($_val)) {
                continue;
            } else {
                $_config[$_key] = $_val;
            }
        }

        return $_config;
    }

    /**
     * Search is performed according to the following rules: for text element when a Enter key is pressed
     * while inputting values and search is performed. For select element when the value changes.
     * The search parameter in grid is set to true and ajax call is made.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getAutosearch()
    {
        return $this->autosearch;
    }

    /**
     * Search is performed according to the following rules: for text element when a Enter key is pressed
     * while inputting values and search is performed. For select element when the value changes.
     * The search parameter in grid is set to true and ajax call is made.
     *
     * Default value: true.
     *
     * @param boolean $autosearch
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setAutosearch($autosearch)
    {
        $this->autosearch = $autosearch;

        return $this;
    }

    /**
     * Event which fires before a search. It is called before triggering the grid.
     * If the event return true triggering does not occur. In this case you can construct your own search parameters
     * and trigger the grid to search the data. Any other return value causes triggering.
     *
     * @return string
     */
    public function getBeforeSearchEventHandler()
    {
        return $this->__eventHandler__beforeSearch;
    }

    /**
     * Event which fires before a search. It is called before triggering the grid.
     * If the event return true triggering does not occur. In this case you can construct your own search parameters
     * and trigger the grid to search the data. Any other return value causes triggering.
     *
     * @param string $beforeSearchEventHandler
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setBeforeSearchEventHandler($beforeSearchEventHandler)
    {
        $this->__eventHandler__beforeSearch = $beforeSearchEventHandler;

        return $this;
    }

    /**
     * Event which fires after a search.
     *
     * @return string
     */
    public function getAfterSearchEventHandler()
    {
        return $this->__eventHandler__afterSearch;
    }

    /**
     * Event which fires after a search.
     *
     * @param string $afterSearchEventHandler
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setAfterSearchEventHandler($afterSearchEventHandler)
    {
        $this->__eventHandler__afterSearch = $afterSearchEventHandler;

        return $this;
    }

    /**
     * Event which fires before clearing entered values (i.e.,clearToolbar is activated).It is called before
     * clearing the data from search elements. If the event return true triggering does not occur.
     * In this case you can construct your own search parameters and trigger the grid.
     * Any other return value causes triggering.
     *
     * @return string
     */
    public function getBeforeClearEventHandler()
    {
        return $this->__eventHandler__beforeClear;
    }

    /**
     * Event which fires before clearing entered values (i.e.,clearToolbar is activated).It is called before
     * clearing the data from search elements. If the event return true triggering does not occur.
     * In this case you can construct your own search parameters and trigger the grid.
     * Any other return value causes triggering.
     *
     * @param string $beforeClearEventHandler
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setBeforeClearEventHandler($beforeClearEventHandler)
    {
        $this->__eventHandler__beforeClear = $beforeClearEventHandler;

        return $this;
    }

    /**
     * Event which fires after clearing entered values (i.e., clearToolbar activated).
     *
     * @return string
     */
    public function getAfterClearEventHandler()
    {
        return $this->__eventHandler__afterClear;
    }

    /**
     * Event which fires after clearing entered values (i.e., clearToolbar activated).
     *
     * @param string $afterClearEventHandler
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setAfterClearEventHandler($afterClearEventHandler)
    {
        $this->__eventHandler__afterClear = $afterClearEventHandler;

        return $this;
    }

    /**
     * Determines how the search should be applied. If this option is true see the autosearch option.
     * If the option is false then the search is performed immediately when the user pres some character.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getSearchOnEnter()
    {
        return $this->searchOnEnter;
    }

    /**
     * Determines how the search should be applied. If this option is true see the autosearch option.
     * If the option is false then the search is performed immediately when the user pres some character.
     *
     * Default value: true.
     *
     * @param boolean $searchOnEnter
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setSearchOnEnter($searchOnEnter)
    {
        $this->searchOnEnter = $searchOnEnter;

        return $this;
    }

    /**
     * Determines how to post the data on which we perform searching. When the this option is false
     * the posted data is in key:value pair, if the option is true, the posted data is equal on
     * those as in searchGrid method.
     *
     * Default value: false.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:advanced_searching#options
     *
     * @return boolean
     */
    public function getStringResult()
    {
        return $this->stringResult;
    }

    /**
     * Determines how to post the data on which we perform searching. When the this option is false
     * the posted data is in key:value pair, if the option is true, the posted data is equal on
     * those as in searchGrid method.
     *
     * Default value: false.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:advanced_searching#options
     *
     * @param boolean $stringResult
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setStringResult($stringResult)
    {
        $this->stringResult = $stringResult;

        return $this;
    }

    /**
     * This option is valid only if the option stringReasult is set to true and determines the group operation.
     *
     * Allowed values: 'AND' or 'OR'.
     *
     * Default value: 'AND'.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:advanced_searching#options
     *
     * @return string
     */
    public function getGroupOp()
    {
        return $this->groupOp;
    }

    /**
     * This option is valid only if the option stringReasult is set to true and determines the group operation.
     *
     * Allowed values: 'AND' or 'OR'.
     *
     * Default value: 'AND'.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:advanced_searching#options
     *
     * @param string $groupOp
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setGroupOp($groupOp)
    {
        $this->groupOp = $groupOp;

        return $this;
    }

    /**
     * The option determines the default search operator when a search is performed.
     * If any valid option is set, then it will be used for the default operator in all fields.
     *
     * Default value: 'bw'.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config#colmodel_options
     *
     * @return string
     */
    public function getDefaultSearch()
    {
        return $this->defaultSearch;
    }

    /**
     * The option determines the default search operator when a search is performed.
     * If any valid option is set, then it will be used for the default operator in all fields.
     *
     * Default value: 'bw'.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config#colmodel_options
     *
     * @param string $defaultSearch
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setDefaultSearch($defaultSearch)
    {
        $this->defaultSearch = $defaultSearch;

        return $this;
    }

    /**
     * When set to true allows the user to select operations when searching. The click operations are created
     * near the search field. In this case possible operators that can appear can be configured
     * with sopt option in searchoptins in colModel.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getSearchOperators()
    {
        return $this->searchOperators;
    }

    /**
     * When set to true allows the user to select operations when searching. The click operations are created
     * near the search field. In this case possible operators that can appear can be configured
     * with sopt option in searchoptins in colModel.
     *
     * Default value: false.
     *
     * @param boolean $searchOperators
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setSearchOperators($searchOperators)
    {
        $this->searchOperators = $searchOperators;

        return $this;
    }

    /**
     * This options is valid only when searchOperators is true. It appear when the user hover with a mouse
     * to the operation button. This can be overwritten with option searchtitle in searchoptions in colModel.
     *
     * Default value: '' (from language config).
     *
     * @return string
     */
    public function getOperandTitle()
    {
        return $this->operandTitle;
    }

    /**
     * This options is valid only when searchOperators is true. It appear when the user hover with a mouse
     * to the operation button. This can be overwritten with option searchtitle in searchoptions in colModel.
     *
     * Default value: '' (from language config).
     *
     * @param string $operandTitle
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setOperandTitle($operandTitle)
    {
        $this->operandTitle = $operandTitle;

        return $this;
    }

    /**
     * The short text operation which is displayed to the user when a operation button is clicked.
     * By example for equal we display '=='.
     * The default setting of this object is:
     *    { "eq" :"==", "ne":"!", "lt":"<", "le":"<=", "gt":">", "ge":">=", "bw":"^", "bn":"!^", "in":"=",
     *    "ni":"!=", "ew":"\|", "en":"!@", "cn":"~", "nc":"!~", "nu":"#", "nn":"!#", "bt":"..."}.
     * Changes have effect only if the value symbol is changed. See searchOperators option.
     *
     * Default value: ''.
     *
     * @return array
     */
    public function getOperands()
    {
        return $this->operands;
    }

    /**
     * The short text operation which is displayed to the user when a operation button is clicked.
     * By example for equal we display '=='.
     * The default setting of this object is:
     *    { "eq" :"==", "ne":"!", "lt":"<", "le":"<=", "gt":">", "ge":">=", "bw":"^", "bn":"!^", "in":"=",
     *    "ni":"!=", "ew":"\|", "en":"!@", "cn":"~", "nc":"!~", "nu":"#", "nn":"!#", "bt":"..."}.
     * Changes have effect only if the value symbol is changed. See searchOperators option.
     *
     * Default value: ''.
     *
     * @param array $operands
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setOperands($operands)
    {
        $this->operands = $operands;

        return $this;
    }

    /**
     * Defines the long texts for the particular operations when serching.
     * The default object is in language file and can be found as $.jgrid.search.odata.
     *
     * Default value: '';
     *
     * @return array
     */
    public function getOdata()
    {
        return $this->odata;
    }

    /**
     * Defines the long texts for the particular operations when serching.
     * The default object is in language file and can be found as $.jgrid.search.odata.
     *
     * Default value: '';
     *
     * @param array $odata
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ToolbarSearch
     */
    public function setOdata($odata)
    {
        $this->odata = $odata;

        return $this;
    }

}
