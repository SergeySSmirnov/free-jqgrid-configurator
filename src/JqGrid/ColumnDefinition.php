<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid;

use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;

/**
 * Represent JqGrid column configuration capabilities.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2020, RUSproj, Sergei S. Smirnov
 */
class ColumnDefinition implements ConfigurationDefinitionInterface
{

    /**
     * Returns a new instance of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition} class.
     *
     * @param string $columnName Unique column name.
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     * @throws \Exception Thrown when {@link $columnName} is empty.
     */
    public static function createInstance($columnName)
    {
        return new ColumnDefinition($columnName);
    }


    /**
     * Initialize a new instance of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition} class.
     *
     * @param string $columnName Unique column name.
     * @throws \Exception Thrown when {@link $columnName} is empty.
     */
    public function __construct($columnName)
    {
        if (empty($columnName)) {
            throw new \Exception('Column name can\'t be empty.');
        }

        $this->name = $columnName;
    }

    /**
     * Magic Getter.
     *
     * @param string $prop Property name.
     * @return mixed
     */
    public function __get($prop)
    {
        return isset($this->{$prop}) ? $this->{$prop} : null;
    }

    /**
     * Magic Setter.
     *
     * @param string $prop Property name.
     * @param mixed $value Property value.
     */
    public function __set($prop, $value)
    {
        $this->{$prop} = $value;
    }

    /**
     * Magic Isset.
     *
     * @param string $prop Property name.
     * @return boolean
     */
    public function __isset($prop)
    {
        return isset($this->{$prop});
    }

    /**
     * {@inheritDoc}
     * @see \Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface::getConfig()
     */
    public function getConfig() {
        $_config = [];

        foreach ($this as $_key => $_val) {
            if (is_array($_val)) {
                foreach ($_val as $_subKey => $_subVal) {
                    if ($_subVal instanceof ConfigurationDefinitionInterface) {
                        $_config[$_key][] = $_subVal->getConfig();
                    } else {
                        $_config[$_key][$_subKey] = $_subVal;
                    }
                }
            } elseif ($_val instanceof ConfigurationDefinitionInterface) {
                $_config[$_key] = $_val->getConfig();
            } else {
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
        }

        if (!$this->search) {
            unset($_config['stype'], $_config['searchoptions'], $_config['searchrules']);
        }

        return $_config;
    }

    /**
     * Type of text alignment within a column.
     *
     * Allowed values: 'left', 'center', 'right'.
     *
     * Default value: 'left'.
     *
     * @var string
     */
    private $align = 'left';

    /**
     * Auto resize column width on double click on the space between columns.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $autoResizable = true;

//     /**
//      * This function add attributes to the cell during the creation of the data - i.e dynamically.
//      * By example all valid attributes for the table cell can be used or a style attribute with different properties.
//      * The function should return string. Parameters passed to this function are:
//      *  - rowId - the id of the row;
//      *  - val - the value which will be added in the cell;
//      *  - rawObject - the raw object of the data row - i.e if datatype is json - array, if datatype is xml xml node;
//      *  - cm - all the properties of this column listed in the colModel;
//      *  - rdata - the data row which will be inserted in the row. This parameter is array of type name:value, where name is the name in colModel.
//      *
//      * @var string
//      */
//     private $cellattr = '';

    /**
     * CSS-classes wich applied to every td-cell of the column.
     * Multiple classes must be separated by space.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $classes = '';

    /**
     * Governs format of sorttype:date (when datetype is set to local) and editrules {date:true} fields.
     * Determines the expected date format for that column. Uses a PHP-like date formatting.
     * Currently “/”, “-”, and “.” are supported as date separators.
     *
     * Valid formats are:
     * <ul>
     *  <li> y,Y,yyyy for four digits year;</li>
     *  <li> YY, yy for two digits year;</li>
     *  <li> m,mm for months;</li>
     *  <li> d,dd for days.</li>
     * </ul>
     *
     * Default value: ''.
     *
     * @var string
     */
    private $datefmt = '';

    /**
     * The default value for the search field.
     * This option is used only in Custom Searching and will be set as initial search.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:custom_searching
     * @var string
     */
    private $defval = '';

    /**
     * Defines if the field is editable
     * This option is used in cell, inline and form modules.
     *
     * Default value: false.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules
     * @var boolean
     */
    private $editable = false;

    /**
     * Array of the options for edittype option.
     * To specify this value can be used one of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition}::editOptions*-methods.
     *
     * Default value: [].
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules#editable
     * @var array
     */
    private $editoptions = [];

    /**
     * Array of the additional rules for the editable field.
     *
     * Default value: [].
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules#editrules
     * @var array
     */
    private $editrules = [];

    /**
     * Defines the edit type for inline and form editing.
     *
     * Allowed values: 'text', 'textarea', 'select', 'checkbox', 'password', 'button', 'image', 'file'.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules#edittype
     * @var string
     */
    private $edittype = '';

    /**
     * Force to start sorting of the column by specified oder.
     *
     * Allowed value: '', 'asc', 'desc'.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $firstsortorder = '';

    /**
     * If set to true this option does not allow recalculation of the width of the column
     * if {@link \Rusproj\FreeJqGridConfigurator\JqGrid::setShrinkToFit()} option is set to true.
     * Also the width does not change if a setGridWidth JS-method is used to change the grid width.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $fixed = false;

    /**
     * Defines various options for form editing.
     * To specify this value can be used the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::formOptions()}-method.
     *
     * Default value: [].
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules#formoptions
     * @var array
     */
    private $formoptions = [];

    /**
     * Formatter options.
     * To specify this value can be used one of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition}::formatOptions*-methods.
     *
     * Default value: []
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:predefined_formatter
     * @var array
     */
    private $formatoptions = [];

    /**
     * The predefined types (string) or custom function name that controls the format of this field.
     * Format method applied to every column value.
     *
     * Allowed values: '', 'date', 'select', 'integer', 'number', 'currency', 'email', 'link', 'showlink', 'checkbox', 'actions'.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:predefined_formatter
     * @var string
     */
    private $formatter = '';

    /**
     * The function name used instead of predefined formatters.
     *
     * @var string
     */
    private $__eventHandler__formatter = '';

    /**
     * The function name used instead of predefined unformatter.
     *
     * @var string
     */
    private $__eventHandler__unformat = '';

    /**
     * If set to true determines that this column will be frozen after calling the setFrozenColumns method.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $frozen = false;

    /**
     * If set to true this column will not appear in the modal dialog where users can choose which columns to show or hide.
     *
     * Default value: false.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:show_hide_columns
     * @var boolean
     */
    private $hidedlg = false;

    /**
     * Defines if this column is hidden at initialization.
     *
     * Default value: false.
     *
     * @var bool
     */
    private $hidden = false;

    /**
     * Set the index name when sorting. Passed as sidx parameter.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $index = '';

    /**
     * Defines the json mapping for the column in the incoming json string.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:retrieving_data
     * @var string
     */
    private $jsonmap = '';

//     /**
//      * Overwrite the id (defined in readers) from server. Can be set as id for the unique row id.
//      * Only one column can have this property. This option have higher priority as those from the readers.
//      * If there are more than one key set the grid finds the first one and the second is ignored.
//      *
//      * Default value: false.
//      *
//      * @var boolean
//      */
//     private $key = false;

    /**
     * Column label.
     * This property used when {@link \Rusproj\FreeJqGridConfigurator\JqGrid::getColNames()} is empty.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $label = '';

    /**
     * Unique column name.
     * This property is required.
     *
     * @var string
     */
    private $name = '';

    /**
     * Column width can be sized.
     *
     * Default value: true.
     *
     * @var bool
     */
    private $resizable = true;

    /**
     * Column can be used in search.
     *
     * Default value: true.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config
     *
     * @var bool
     */
    private $search = true;

    /**
     * Search options.
     * To specify this value can be used {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::generateSearchOptions()} method.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config
     * @var array
     */
    private $searchoptions = ['sopt' => ['eq', 'ne', 'lt', 'le', 'gt', 'ge', 'bw', 'bn', 'in', 'ni', 'ew', 'en', 'cn', 'nc', 'nu', 'nn']];

    /**
     * Column values can be sorted.
     *
     * Default value: true.
     *
     * @var bool
     */
    private $sortable = true;

//     /**
//      * Custom function to make custom sorting when datatype is local.
//      * Three parameters a, b and direction are passed. The a and b parameters are values to be compared
//      * direction is numeric 1 and -1 for ascending and descending order. The function should return 1, -1 or 0.
//      *
//      * @var unknown
//      */
//     private $sortfunc = null;

    /**
     * Used when {@link \Rusproj\FreeJqGridConfigurator\JqGrid::getDataType()} is local.
     * Defines the type of the column for appropriate sorting.
     *
     * Allowed values:
     * <ul>
     *  <li>int/integer - for sorting integer;</li>
     *  <li>float/number/currency - for sorting decimal numbers;</li>
     *  <li>date - for sorting date;</li>
     *  <li>text - for text sorting;</li>
     *  <li>function - defines a custom function for sorting. To this function we pass the value to be sorted and it should return a value too.</li>
     * </ul>
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:retrieving_data#array_data
     * @var string
     */
    private $sorttype = '';

    /**
     * Data type at the search operation.
     *
     * Allowed values: 'text', 'select'.
     *
     * Default value: 'text'.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config
     * @var string
     */
    private $stype = 'text';

    /**
     * Describes the url from where we can get already-constructed select element.
     * Valid only in Custom Searching and edittype of select.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:custom_searching
     * @var string
     */
    private $surl = '';

    /**
     * Shortcut, which allows to specify all the options (and some other used for searching and editing) at once.
     *
     * Allowed values:
     * <ul>
     *  <li>'number';</li>
     *  <li>'booleanCheckbox' - will displays Boolean input data true and false as checkbox in case of usage {@link \Rusproj\FreeJqGridConfigurator\JqGrid::setIconSet()} as 'fontAwesome'.</li>
     * </ul>
     *
     * Default value: null.
     *
     * @see \Rusproj\FreeJqGridConfigurator\JqGrid::getCmTemplate()
     * @var object|string
     */
    private $template = '';

    /**
     * If this option is false the title is not displayed in that column when we hover a cell with the mouse.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $title = true;

    /**
     * Column initial width in pixels.
     *
     * Default value: 150.
     *
     * @var int
     */
    private $width = 150;

    /**
     * Defines the xml mapping for the column in the incomming xml file.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:retrieving_data
     * @var string
     */
    private $xmlmap = '';

//     /**
//      * Custom function to “unformat” a value of the cell when used in editing.
//      * Unformat is also called during sort operations.
//      * The value returned by unformat is the value compared during the sort.
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:custom_formatter
//      * @var unknown
//      */
//     private $unformat = null;

    /**
     * When the option is set to false the column does not appear in view Form.
     * This option is valid only when viewGridRow JS-method is activated.
     *
     * Default value: true.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:form_editing#viewgridrow
     * @var boolean
     */
    private $viewable = true;

    /**
     * Type of text alignment within a column.
     *
     * Allowed values: 'left', 'center', 'right'.
     *
     * Default value: 'left'.
     *
     * @return string
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * Type of text alignment within a column.
     *
     * Allowed values: 'left', 'center', 'right'.
     *
     * @param string $align
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setAlign($align)
    {
        $this->align = $align;
        return $this;
    }

    /**
     * Auto resize column width on double click on the space between columns.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getAutoResizable()
    {
        return $this->autoResizable;
    }

    /**
     * Auto resize column width on double click on the space between columns.
     *
     * Default value: true.
     *
     * @param boolean $autoResizable
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setAutoResizable($autoResizable)
    {
        $this->autoResizable = $autoResizable;
        return $this;
    }

    /**
     * CSS-classes wich applied to every td-cell of the column.
     * Multiple classes must be separated by space.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * CSS-classes wich applied to every td-cell of the column.
     * Multiple classes must be separated by space.
     *
     * @param string $classes
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setClasses($classes)
    {
        $this->classes = $classes;
        return $this;
    }

    /**
     * Governs format of sorttype:date (when datetype is set to local) and editrules {date:true} fields.
     * Determines the expected date format for that column. Uses a PHP-like date formatting.
     * Currently “/”, “-”, and “.” are supported as date separators.
     *
     * Valid formats are:
     * <ul>
     *  <li> y,Y,yyyy for four digits year;</li>
     *  <li> YY, yy for two digits year;</li>
     *  <li> m,mm for months;</li>
     *  <li> d,dd for days.</li>
     * </ul>
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getDateFormat()
    {
        return $this->datefmt;
    }

    /**
     * Governs format of sorttype:date (when datetype is set to local) and editrules {date:true} fields.
     * Determines the expected date format for that column. Uses a PHP-like date formatting.
     * Currently “/”, “-”, and “.” are supported as date separators.
     *
     * Valid formats are:
     * <ul>
     *  <li> y,Y,yyyy for four digits year;</li>
     *  <li> YY, yy for two digits year;</li>
     *  <li> m,mm for months;</li>
     *  <li> d,dd for days.</li>
     * </ul>
     *
     * @param string $dateFormat
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setDateFormat($dateFormat)
    {
        $this->datefmt = $dateFormat;
        return $this;
    }

    /**
     * The default value for the search field.
     * This option is used only in Custom Searching and will be set as initial search.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:custom_searching
     * @return string
     */
    public function getCustomSearchDefaultValue()
    {
        return $this->defval;
    }

    /**
     * The default value for the search field.
     * This option is used only in Custom Searching and will be set as initial search.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:custom_searching
     * @param string $defVal
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setCustomSearchDefaultValue($defVal)
    {
        $this->defval = $defVal;
        return $this;
    }

    /**
     * Defines if the field is editable
     * This option is used in cell, inline and form modules.
     *
     * Default value: false.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules
     * @return boolean
     */
    public function getIsEditable()
    {
        return $this->editable;
    }

    /**
     * Defines if the field is editable
     * This option is used in cell, inline and form modules.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules
     * @param boolean $isEditable
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setIsEditable($isEditable)
    {
        $this->editable = $isEditable;
        return $this;
    }

    /**
     * Array of the options for edittype option.
     * To specify this value can be used one of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition}::editOptions*-methods.
     *
     * Default value: [].
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules#editable
     * @return array
     */
    public function getEditOptions()
    {
        return $this->editoptions;
    }

    /**
     * Array of the options for edittype option.
     * To specify this value can be used one of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition}::editOptions*-methods.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules#editable
     * @param array $editOptions
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setEditOptions($editOptions)
    {
        $this->editoptions = $editOptions;
        return $this;
    }

    /**
     * Defines if the field is editable
     * This option is used in cell, inline and form modules.
     *
     * Default value: false.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules
     * @return array
     */
    public function getEditRules()
    {
        return $this->editrules;
    }

    /**
     * Defines if the field is editable
     * This option is used in cell, inline and form modules.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules
     * @param array $editRules
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setEditRules($editRules)
    {
        $this->editrules = $editRules;
        return $this;
    }

    /**
     * Defines the edit type for inline and form editing.
     *
     * Allowed values: 'text', 'textarea', 'select', 'checkbox', 'password', 'button', 'image', 'file'.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules#edittype
     * @return string
     */
    public function getEditType()
    {
        return $this->edittype;
    }

    /**
     * Defines the edit type for inline and form editing.
     *
     * Allowed values: 'text', 'textarea', 'select', 'checkbox', 'password', 'button', 'image', 'file'.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules#edittype
     * @param string $editType
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setEditType($editType)
    {
        $this->edittype = $editType;
        return $this;
    }

    /**
     * Force to start sorting of the column by specified oder.
     *
     * Allowed value: '', 'asc', 'desc'.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getFirstSortOrder()
    {
        return $this->firstsortorder;
    }

    /**
     * Force to start sorting of the column by specified oder.
     *
     * Allowed value: '', 'asc', 'desc'.
     *
     * @param string $firstSortOrder
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setFirstSortOrder($firstSortOrder)
    {
        $this->firstsortorder = $firstSortOrder;
        return $this;
    }

    /**
     * If set to true this option does not allow recalculation of the width of the column
     * if {@link \Rusproj\FreeJqGridConfigurator\JqGrid::setShrinkToFit()} option is set to true.
     * Also the width does not change if a setGridWidth JS-method is used to change the grid width.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getIsFixed()
    {
        return $this->fixed;
    }

    /**
     * If set to true this option does not allow recalculation of the width of the column
     * if {@link \Rusproj\FreeJqGridConfigurator\JqGrid::setShrinkToFit()} option is set to true.
     * Also the width does not change if a setGridWidth JS-method is used to change the grid width.
     *
     * @param boolean $fixed
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setIsFixed($fixed)
    {
        $this->fixed = $fixed;
        return $this;
    }

    /**
     * Defines various options for form editing.
     * To specify this value can be used the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::formOptions()}-method.
     *
     * Default value: [].
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules#formoptions
     * @return array
     */
    public function getFormOptions()
    {
        return $this->formoptions;
    }

    /**
     * Defines various options for form editing.
     * To specify this value can be used the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::formOptions()}-method.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules#formoptions
     * @param array $formOptions
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setFormOptions($formOptions)
    {
        $this->formoptions = $formOptions;
        return $this;
    }

    /**
     * Formatter options.
     * To specify this value can be used one of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition}::formatOptions*-methods.
     *
     * Default value: []
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:predefined_formatter
     * @return array
     */
    public function getFormatOptions()
    {
        return $this->formatoptions;
    }

    /**
     * Formatter options.
     * To specify this value can be used one of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition}::formatOptions*-methods.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:predefined_formatter
     * @param array $formatOptions
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setFormatOptions($formatOptions)
    {
        $this->formatoptions = $formatOptions;
        return $this;
    }

    /**
     * The predefined types (string) or custom function name that controls the format of this field.
     * Format method applied to every column value.
     *
     * Allowed values: '', 'date', 'select', 'integer', 'number', 'currency', 'email', 'link', 'showlink', 'checkbox', 'actions'.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:predefined_formatter
     * @return string
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * The predefined types (string) or custom function name that controls the format of this field.
     * Format method applied to every column value.
     *
     * Allowed values: '', 'date', 'select', 'integer', 'number', 'currency', 'email', 'link', 'showlink', 'checkbox', 'actions'.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:predefined_formatter
     * @param string $formatter
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setFormatter($formatter)
    {
        $this->formatter = $formatter;
        return $this;
    }

    /**
     * The function name used instead of predefined formatters.
     *
     * @return string
     */
    public function getFormatterFunction()
    {
        return $this->__eventHandler__formatter;
    }

    /**
     * The function name used instead of predefined formatters.
     *
     * @param string $formatterFunctionName
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setFormatterFunction($formatterFunctionName)
    {
        $this->__eventHandler__formatter = $formatterFunctionName;
        return $this;
    }

    /**
     * The function name used instead of predefined unformatter.
     *
     * @return string
     */
    public function getUnformatFunction()
    {
        return $this->__eventHandler__unformat;
    }

    /**
     * The function name used instead of predefined unformatter.
     *
     * @param string $unformatFunctionName
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setUnformatFunction($unformatFunctionName)
    {
        $this->__eventHandler__unformat = $unformatFunctionName;
        return $this;
    }

    /**
     * If set to true determines that this column will be frozen after calling the setFrozenColumns method.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getIsFrozen()
    {
        return $this->frozen;
    }

    /**
     * If set to true determines that this column will be frozen after calling the setFrozenColumns method.
     *
     * @param boolean $frozen
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setIsFrozen($frozen)
    {
        $this->frozen = $frozen;
        return $this;
    }

    /**
     * If set to true this column will not appear in the modal dialog where users can choose which columns to show or hide.
     *
     * Default value: false.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:show_hide_columns
     * @return boolean
     */
    public function getIsHideDlg()
    {
        return $this->hidedlg;
    }

    /**
     * If set to true this column will not appear in the modal dialog where users can choose which columns to show or hide.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:show_hide_columns
     * @param boolean $hideDlg
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setIsHideDlg($hideDlg)
    {
        $this->hidedlg = $hideDlg;
        return $this;
    }

    /**
     * Defines if this column is hidden at initialization.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getIsHidden()
    {
        return $this->hidden;
    }

    /**
     * Defines if this column is hidden at initialization.
     *
     * @param boolean $hidden
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setIsHidden($hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * Set the index name when sorting. Passed as sidx parameter.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Set the index name when sorting. Passed as sidx parameter.
     *
     * @param string $index
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }

    /**
     * Defines the json mapping for the column in the incoming json string.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:retrieving_data
     * @return string
     */
    public function getJsonMap()
    {
        return $this->jsonmap;
    }

    /**
     * Defines the json mapping for the column in the incoming json string.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:retrieving_data
     * @param string $jsonmap
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setJsonMap($jsonmap)
    {
        $this->jsonmap = $jsonmap;
        return $this;
    }

    /**
     * Column label.
     * This property used when {@link \Rusproj\FreeJqGridConfigurator\JqGrid::getColNames()} is empty.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Column label.
     * This property used when {@link \Rusproj\FreeJqGridConfigurator\JqGrid::getColNames()} is empty.
     *
     * @param string $label
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Unique column name.
     * This property is required.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Column width can be sized.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getIsResizable()
    {
        return $this->resizable;
    }

    /**
     * Column width can be sized.
     *
     * @param boolean $canResizable
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setIsResizable($canResizable)
    {
        $this->resizable = $canResizable;
        return $this;
    }

    /**
     * Column can be used in search.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getIsSearchable()
    {
        return $this->search;
    }

    /**
     * Column can be used in search.
     *
     * @param boolean $search
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setIsSearchable($search)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * Search options.
     * To specify this value can be used {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::generateSearchOptions()} method.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config
     * @return array
     */
    public function getSearchOptions()
    {
        return $this->searchoptions;
    }

    /**
     * Search options.
     * To specify this value can be used {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::generateSearchOptions()} method.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config
     * @param array $searchOptions
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setSearchOptions($searchOptions)
    {
        $this->searchoptions = $searchOptions;
        return $this;
    }

    /**
     * Column values can be sorted.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getIsSortable()
    {
        return $this->sortable;
    }

    /**
     * Column values can be sorted.
     *
     * @param boolean $isSortable
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setIsSortable($isSortable)
    {
        $this->sortable = $isSortable;
        return $this;
    }

    /**
     * Used when {@link \Rusproj\FreeJqGridConfigurator\JqGrid::getDataType()} is local.
     * Defines the type of the column for appropriate sorting.
     *
     * Allowed values:
     * <ul>
     *  <li>int/integer - for sorting integer;</li>
     *  <li>float/number/currency - for sorting decimal numbers;</li>
     *  <li>date - for sorting date;</li>
     *  <li>text - for text sorting;</li>
     *  <li>function - defines a custom function for sorting. To this function we pass the value to be sorted and it should return a value too.</li>
     * </ul>
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:retrieving_data#array_data
     * @return string
     */
    public function getSortType()
    {
        return $this->sorttype;
    }

    /**
     * Used when {@link \Rusproj\FreeJqGridConfigurator\JqGrid::getDataType()} is local.
     * Defines the type of the column for appropriate sorting.
     *
     * Allowed values:
     * <ul>
     *  <li>int/integer - for sorting integer;</li>
     *  <li>float/number/currency - for sorting decimal numbers;</li>
     *  <li>date - for sorting date;</li>
     *  <li>text - for text sorting;</li>
     *  <li>function - defines a custom function for sorting. To this function we pass the value to be sorted and it should return a value too.</li>
     * </ul>
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:retrieving_data#array_data
     * @param string $sortType
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setSortType($sortType)
    {
        $this->sorttype = $sortType;
        return $this;
    }

    /**
     * Data type at the search operation.
     *
     * Allowed values: 'text', 'select'.
     *
     * Default value: 'text'.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config
     * @return string
     */
    public function getSearchType()
    {
        return $this->stype;
    }

    /**
     * Data type at the search operation.
     *
     * Allowed values: 'text', 'select'.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config
     * @param string $sType
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setSearchType($sType)
    {
        $this->stype = $sType;
        return $this;
    }

    /**
     * Describes the url from where we can get already-constructed select element.
     * Valid only in Custom Searching and edittype of select.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:custom_searching
     * @return string
     */
    public function getSurl()
    {
        return $this->surl;
    }

    /**
     * Describes the url from where we can get already-constructed select element.
     * Valid only in Custom Searching and edittype of select.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:custom_searching
     * @param string $surl
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setSurl($surl)
    {
        $this->surl = $surl;
        return $this;
    }

    /**
     * Shortcut, which allows to specify all the options (and some other used for searching and editing) at once.
     *
     * Allowed values:
     * <ul>
     *  <li>'number';</li>
     *  <li>'booleanCheckbox' - will displays Boolean input data true and false as checkbox in case of usage {@link \Rusproj\FreeJqGridConfigurator\JqGrid::setIconSet()} as 'fontAwesome'.</li>
     * </ul>
     *
     * Default value: null.
     *
     * @see \Rusproj\FreeJqGridConfigurator\JqGrid::getCmTemplate()
     * @return object
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Shortcut, which allows to specify all the options (and some other used for searching and editing) at once.
     *
     * Allowed values:
     * <ul>
     *  <li>'number';</li>
     *  <li>'booleanCheckbox' - will displays Boolean input data true and false as checkbox in case of usage {@link \Rusproj\FreeJqGridConfigurator\JqGrid::setIconSet()} as 'fontAwesome'.</li>
     * </ul>
     *
     * @see \Rusproj\FreeJqGridConfigurator\JqGrid::getCmTemplate()
     * @param object $template
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * If this option is false the title is not displayed in that column when we hover a cell with the mouse.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function isTitle()
    {
        return $this->title;
    }

    /**
     * If this option is false the title is not displayed in that column when we hover a cell with the mouse.
     *
     * @param boolean $title
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Column initial width in pixels.
     *
     * Default value: 150.
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Column initial width in pixels.
     *
     * @param integer $width
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Defines the xml mapping for the column in the incomming xml file.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:retrieving_data
     * @return string
     */
    public function getXmlmap()
    {
        return $this->xmlmap;
    }

    /**
     * Defines the xml mapping for the column in the incomming xml file.
     *
     * Default value: ''.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:retrieving_data
     * @param string $xmlmap
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setXmlmap($xmlmap)
    {
        $this->xmlmap = $xmlmap;
        return $this;
    }

    /**
     * When the option is set to false the column does not appear in view Form.
     * This option is valid only when viewGridRow JS-method is activated.
     *
     * Default value: true.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:form_editing#viewgridrow
     * @return boolean
     */
    public function isViewable()
    {
        return $this->viewable;
    }

    /**
     * When the option is set to false the column does not appear in view Form.
     * This option is valid only when viewGridRow JS-method is activated.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:form_editing#viewgridrow
     * @param boolean $viewable
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setViewable($viewable)
    {
        $this->viewable = $viewable;
        return $this;
    }


    // ---------------------------------------------------------------------------------------
    // Helpers


//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'text' или editType = 'password'.
//      *
//      * @param number $size Размер отображаемой части поля в символах (если используется моноширинный шрифт, то размер будет фиксирован, в противном случае будет плавающим). Значение по умолчанию: 20.
//      * @param number $maxLength Максимальное число символов, которое можно ввести. Если задано значение 0 - ввод не ограничен. Значение по умолчанию: 0.
//      * @param string $placeholder Текст подсказки, отображаемой в пустом поле.  Значение по умолчанию: ''.
//      * @param string $pattern Регулярное выражение, устанавливающее шаблон ввода.  Значение по умолчанию: ''.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
//      */
//     public static function editOptionsText($size = 20, $maxLength = 0, $placeholder = '', $pattern = '') {
//         $cfg = [];
//         $cfg['size'] = $size;
//         if ($maxLength > 0) {
//             $cfg['maxlength'] = $maxLength;
//         }
//         if (!empty($placeholder)) {
//             $cfg['placeholder'] = $placeholder;
//         }
//         if (!empty($pattern)) {
//             $cfg['pattern'] = $pattern;
//         }
//         return $cfg;
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'textarea'.
//      *
//      * @param number $rows Высота отображаемой части поля в строках. Значение по умолчанию: 2.
//      * @param number $cols Ширина отображаемой части поля в символах (если используется моноширинный шрифт, то размер будет фиксирован, в противном случае будет плавающим). Значение по умолчанию: 20.
//      * @param number $maxLength Максимальное число символов, которое можно ввести. Если задано значение 0 - ввод не ограничен. Значение по умолчанию: 0.
//      * @param string $placeholder Текст подсказки, отображаемой в пустом поле.  Значение по умолчанию: ''.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
//      */
//     public static function editOptionsTextarea($rows = 2, $cols = 20, $maxLength = 0, $placeholder = '') {
//         $cfg = [];
//         $cfg['rows'] = $rows;
//         $cfg['cols'] = $cols;
//         if ($maxLength > 0) {
//             $cfg['maxlength'] = $maxLength;
//         }
//         if (!empty($placeholder)) {
//             $cfg['placeholder'] = $placeholder;
//         }
//         return $cfg;
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'checkbox'.
//      *
//      * @param string $true Значение, возвращаемое, если пользователь установил флажок.  Значение по умолчанию: 'yes'.
//      * @param string $false Значение, возвращаемое, если пользователь снял флажок.  Значение по умолчанию: 'no'.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
//      */
//     public static function editOptionsCheckbox($true = 'yes', $false = 'no') {
//         return ['value' => $true . ':' . $false];
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'select'.
//      *
//      * @param array/string $values Массив допустимых значений списка или адрес по которому можно получить данный список. В случае указания адреса, должна формироваться страница с содержимым вида: "<select><option value='1'>One</option><option value='2'>Two</option></select>"
//      * @param bool $multiselect Признак необходимости сформировать список с поддержкой множественного выбора. Значение по умолчанию: false.
//      * @param number $size Высота отображаемой части поля в строках. Значение по умолчанию: 5.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
//      */
//     public static function editOptionsSelect($values, $multiselect = false, $size = 5) {
//         $cfg = [];
//         $cfg['value'] = $values;
//         if ($multiselect) {
//             $cfg['multiple'] = $multiselect;
//             $cfg['size'] = $size;
//         }
//         return $cfg;
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions
//      * для типа редактирования editType = 'select', где данные будут запрашиваться по указанному URL.
//      *
//      * @param array/string $values Массив допустимых значений списка или адрес по которому можно получить данный список. В случае указания адреса, должна формироваться страница с содержимым вида: "<select><option value='1'>One</option><option value='2'>Two</option></select>"
//      * @param bool $multiselect Признак необходимости сформировать список с поддержкой множественного выбора. Значение по умолчанию: false.
//      * @param number $size Высота отображаемой части поля в строках. Значение по умолчанию: 5.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
//      */
//     public static function editOptionsSelectUrl($values, $multiselect = false, $size = 5) {
//         $cfg = [];
//         $cfg['dataUrl'] = $values;
//         if ($multiselect) {
//             $cfg['multiple'] = $multiselect;
//             $cfg['size'] = $size;
//         }
//         return $cfg;
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'button'.
//      *
//      * @param string $value Значение, возвращаемое при нажатии кнопки.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
//      */
//     public static function editOptionsButton($value) {
//         return ['value' => $value];
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'image'.
//      *
//      * @param string $src Путь к файлу картинки.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
//      */
//     public static function editOptionsImage($src) {
//         return ['src' => $src];
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'file'.
//      *
//      * @param string $alt Значение, выводимое вместо '...'.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
//      */
//     public static function editOptionsFile($alt) {
//         return ['alt' => $alt];
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров formOptions.
//      *
//      * @param number $rowpos Если больше 0, то определяет позицию элемента в соответствующей строке таблицы формы.
//      * @param number $colpos Если больше 0, то определяет позицию элемента в соответствующем столбце таблицы формы.
//      * @param string $label Если задано, то меняет содержимое надписи в поле описания (в label).
//      * @param string $elmprefix Если задано, то формирует дополнительный префикс, выводимый перед полем редактирования.
//      * @param string $elmsuffix Если задано, то формирует дополнительный постфикс, выводимый после поля редактирования.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения formOptions.
//      */
//     public static function formOptions($rowpos = 0, $colpos = 0, $label = '', $elmprefix = '', $elmsuffix = '') {
//         $cfg = [];
//         if ($rowpos > 0) {
//             $cfg['rowpos'] = $rowpos;
//         }
//         if ($colpos > 0) {
//             $cfg['colpos'] = $colpos;
//         }
//         if (!empty($label)) {
//             $cfg['label'] = $label;
//         }
//         if (!empty($elmprefix)) {
//             $cfg['elmprefix'] = $elmprefix;
//         }
//         if (!empty($elmsuffix)) {
//             $cfg['elmsuffix'] = $elmsuffix;
//         }
//         return $cfg;
//     }

    /**
     * Helper wich return array of search options.
     * This method can be used to prepare data to the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::setSearchOptions()} method.
     *
     * @param string $dataUrl URL to download select list. This URL must return rendered HTML select.
     * @param array $sopt Operators used to build search queries. Allowed values: eq, ne, lt, le, gt, ge, bw, bn, in, ni, ew, en, cn, nc, nu, nn.
     * @param string $defaultValue Search field default value.
     * @param array $value The option is used only for stype select and defines the select options in the search dialogs.
     *          When set for stype select and dataUrl option is not set, the value can be a string or object.
     *          If the option is a string it must contain a set of value:label pairs with the value separated from
     *          the label with a colon (:) and ended with(;).
     *          The string should not end with a (;)- editoptions:{value:“1:One;2:Two”}.
     *          If set as object it should be defined as pair value:name - editoptions:{value:{1:'One',2:'Two'}}.
     * @param boolean $searchHidden By default hidden elements in the grid are not searchable.
     *          In order to enable searching when the field is hidden set this option to true.
     * @param string $title Title of the field label.
     * @return array
     */
    public static function generateSearchOptions($dataUrl = '', $sopt = ['eq', 'ne', 'lt', 'le', 'gt', 'ge', 'bw', 'bn', 'in', 'ni', 'ew', 'en', 'cn', 'nc', 'nu', 'nn'], $defaultValue = null, $value = [], $searchHidden = false, $title = '')
    {
        $_config = [];

        if (!empty($dataUrl)) {
            $_config['dataUrl'] = $dataUrl;
        }

        if (count($sopt) > 0) {
            $_config['sopt'] = $sopt;
        }

        if (!is_null($defaultValue)) {
            $_config['defaultValue'] = $defaultValue;
        }

        if (count($value) > 0) {
            $_tempStr = '';
            foreach ($value as $_key => $_val) {
                $_tempStr .= $_key.':'.$_val.';';
            }

            $_config['value'] =  trim($_tempStr, ';');
        }

        if ($searchHidden) {
            $_config['searchhidden'] = true;
        }

        if (!empty($title)) {
            $_config['attr'] = (object)['title' => $title];
        }

        return $_config;
    }

    /**
     * Helper wich returns array of format options for columns with values of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::getFormatter()} = 'integer'.
     *
     * @param string $thousandsSeparator Determines the separator for the thousands.
     * @param string $defaulValue Default value if nothing in the data.
     * @return array
     */
    public static function formatOptionsInteger($thousandsSeparator = ' ', $defaulValue = '')
    {
        return ['thousandsSeparator' => $thousandsSeparator, 'defaulValue' => $defaulValue];
    }

    /**
     * Helper wich returns array of format options for columns with values of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::getFormatter()} = 'number'.
     *
     * @param string $thousandsSeparator Determines the separator for the thousands.
     * @param string $decimalSeparator Determines the separator for the decimals.
     * @param integer $decimalPlaces Determine how many decimal places we should have for the number.
     * @param string $defaulValue Default value if nothing in the data.
     * @return array
     */
    public static function formatOptionsNumber($thousandsSeparator = ' ', $decimalSeparator = ',', $decimalPlaces = 2, $defaulValue = '')
    {
        return ['thousandsSeparator' => $thousandsSeparator, 'decimalSeparator' => $decimalSeparator, 'decimalPlaces' => $decimalPlaces, 'defaulValue' => $defaulValue];
    }

    /**
     * Helper wich returns array of format options for columns with values of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::getFormatter()} = 'currency'.
     *
     * @param string $thousandsSeparator Determines the separator for the thousands.
     * @param string $decimalSeparator Determines the separator for the decimals.
     * @param integer $decimalPlaces Determine how many decimal places we should have for the number.
     * @param string $defaulValue Default value if nothing in the data.
     * @param string $prefix Text that is inserted before the number.
     * @param string $suffix Text that is added after the number.
     * @return array
     */
    public static function formatOptionsCurrency($thousandsSeparator = ' ', $decimalSeparator = ',', $decimalPlaces = 2, $defaulValue = '', $prefix = '', $suffix = '')
    {
        return ['thousandsSeparator' => $thousandsSeparator, 'decimalSeparator' => $decimalSeparator, 'decimalPlaces' => $decimalPlaces, 'defaulValue' => $defaulValue, 'prefix' => $prefix, 'suffix' => $suffix];
    }

    /**
     * Helper wich returns array of format options for columns with values of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::getFormatter()} = 'date'.
     *
     * @param string $srcFormat Source format. Default value: 'Y-m-d H:i:s'.
     * @param string $newFormat New format. Default value: 'd.m.Y H:i:s'.
     * @param string $parseRe A expression for parsing date strings.
     * @return array
     */
    public static function formatOptionsDate($srcFormat = 'Y-m-d H:i:s', $newFormat = 'd.m.Y H:i:s', $parseRe = '')
    {
        $_config = ['srcformat' => $srcFormat, 'newformat' => $newFormat];

        if (!empty($parseRe)) {
            $_config['parseRe'] = $parseRe;
        }

        return $_config;
    }

    /**
     * Helper wich returns array of format options for columns with values of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::getFormatter()} = 'email'.
     *
     * @return array
     */
    public static function formatOptionsEmail()
    {
        return [];
    }

    /**
     * Helper wich returns array of format options for columns with values of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::getFormatter()} = 'link'.
     *
     * @param string $target The default value of the target options is null. When this options is set, we construct a link with the target property set and the cell value put in the href tag.
     * @return array
     */
    public static function formatOptionsLink($target = '')
    {
        return !empty($target) ? ['target' => $target] : [];
    }

    /**
     * Helper wich returns array of format options for columns with values of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::getFormatter()} = 'showlink'.
     *
     * @param string $baseLinkUrl Base link.
     * @param string $showAction An additional value which is added after the {@link $baseLinkUrl}.
     * @param string $addParam An additional parameter that can be added after the {@link $idName} parameter.
     * @param string $target If set, is added as an additional attribute.
     * @param string $idName The first parameter that is added after the {@link $showAction}. By default, this is id.
     * @return array
     */
    public static function formatOptionsShowLink($baseLinkUrl = '', $showAction = '', $addParam = '', $target = '', $idName = '')
    {
        $_config = [];

        if (!empty($baseLinkUrl)) {
            $_config['baseLinkUrl'] = $baseLinkUrl;
        }

        if (!empty($showAction)) {
            $_config['showAction'] = $showAction;
        }

        if (!empty($addParam)) {
            $_config['addParam'] = $addParam;
        }

        if (!empty($target)) {
            $_config['target'] = $target;
        }

        if (!empty($idName)) {
            $_config['idName'] = $idName;
        }

        return $_config;
    }

    /**
     * Helper wich returns array of format options for columns with values of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::getFormatter()} = 'checkbox'.
     *
     * @param string $disabled Determines if the checkbox can be changed. If set to false, the values in checkbox can be changed.
     * @return array
     */
    public static function formatOptionsCheckbox($disabled = true)
    {
        return ['disabled' => $disabled];
    }

    /**
     * Helper wich returns array of format options for columns with values of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::getFormatter()} = 'select'.
     *
     * @param array|string $list An array of Key-Value (Input-Output) pairs. Also can be presented as a string in format: 'Key1:Value1;Key2:Value2;...'.
     * @param string $defaultValue Default value from {@link $list} parameter.
     * @return array
     */
    public static function formatOptionsSelect($list, $defaultValue = null)
    {
        $_config = [];

        if (is_array($list)) {
            if (count($list)) {
                $_paramVal = '';
                foreach ($list as $_key => $_val) {
                    $_paramVal .= $_key.':'.$_val.';';
                }
                $_config['value'] = trim($_paramVal, ';');
            }
        } elseif (is_string($list)) {
            $list = trim($list, " ;\t\n\r\0\x0B");
            if (!empty($list)) {
                $_config['value'] = $list;
            }
        }

        if (!is_null($defaultValue)) {
            $_config['defaultValue'] = $defaultValue;
        }

        return $_config;
    }

    /**
     * NOT IMPLEMENTED!
     *
     * Helper wich returns array of format options for columns with values of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::getFormatter()} = 'actions'.
     *
     * @throws \Exception Not implemented.
     */
    public static function formatActions()
    {
        throw new \Exception('Not implemented.');
    }

    /**
     * Helper generates column config which contains ID text data.
     *
     * @param string $name Column name.
     * @param string $label Column label.
     * @param integer $width Column width in pixels.
     * @param string $align Text align. Allowed values: 'left', 'center', 'right'.
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     * @throws \Exception Thrown when {@link $name} is empty.
     */
    public static function columnID($name, $label, $width = 150, $align = 'left')
    {
        return self::createInstance($name)
        ->setLabel($label)
        ->setWidth($width)
        ->setAlign($align)
        ->setSortType('text')
        ->setSearchType('text')
        ->setSearchOptions(self::generateSearchOptions('', ['eq', 'ne', 'lt', 'le', 'gt', 'ge']))
        ->setIsEditable(true)
        ->setEditType('text');
    }

    /**
     * Helper generates column config which contains number data.
     *
     * @param string $name Column name.
     * @param string $label Column label.
     * @param integer $width Column width in pixels.
     * @param string $align Text align. Allowed values: 'left', 'center', 'right'.
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     * @throws \Exception Thrown when {@link $name} is empty.
     */
    public static function columnNumber($name, $label, $width = 150, $align = 'left')
    {
        return self::createInstance($name)
        ->setLabel($label)
        ->setWidth($width)
        ->setAlign($align)
        ->setSortType('text')
        ->setSearchType('text')
        ->setSearchOptions(self::generateSearchOptions('', ['eq', 'ne', 'lt', 'le', 'gt', 'ge']))
        ->setIsEditable(true)
        ->setEditType('text');
    }

    /**
     * Helper generates column config which contains text data.
     *
     * @param string $name Column name.
     * @param string $label Column label.
     * @param integer $width Column width in pixels.
     * @param string $align Text align. Allowed values: 'left', 'center', 'right'.
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     * @throws \Exception Thrown when {@link $name} is empty.
     */
    public static function columnText($name, $label, $width = 250, $align = 'left')
    {
        return self::createInstance($name)
            ->setLabel($label)
            ->setWidth($width)
            ->setAlign($align)
            ->setSortType('text')
            ->setSearchType('text')
            ->setSearchOptions(self::generateSearchOptions('', ['cn', 'nc', 'eq', 'ne', 'lt', 'le', 'gt', 'ge', 'bw', 'bn', 'ew', 'en']))
            ->setIsEditable(true)
            ->setEditType('text');
    }

    /**
     * Helper generates column config which contains date data.
     *
     * @param string $name Column name.
     * @param string $label Column label.
     * @param integer $width Column width in pixels.
     * @param string $align Text align. Allowed values: 'left', 'center', 'right'.
     * @param string $srcFormat Source date format.
     * @param string $newFormat New date format.
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     * @throws \Exception Thrown when {@link $name} is empty.
     */
    public static function columnDate($name, $label, $width = 250, $align = 'left', $srcFormat = 'Y-m-d H:i:s', $newFormat = 'd.m.Y H:i:s')
    {
        return self::createInstance($name)
            ->setLabel($label)
            ->setWidth($width)
            ->setAlign($align)
            ->setSortType('date')
            ->setSearchType('text')
            ->setSearchOptions(self::generateSearchOptions('', ['eq', 'ne', 'lt', 'le', 'gt', 'ge']))
            ->setFormatter('date')
            ->setFormatOptions(self::formatOptionsDate($srcFormat, $newFormat))
            ->setDateFormat($srcFormat)
            ->setIsEditable(true)
            ->setEditType('text');
    }

    /**
     * Helper generates column config which contains date data.
     * Помощник формирует конфигурационный массив для столбца из списка значений без возможности поиска.
     *
     * @param string $name Column name.
     * @param string $label Column label.
     * @param array|string $list An array of Key-Value (Input-Output) pairs. Also can be presented as a string in format: 'Key1:Value1;Key2:Value2;...'.
     * @param integer $width Column width in pixels.
     * @param string $align Text align. Allowed values: 'left', 'center', 'right'.
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     * @throws \Exception Thrown when {@link $name} is empty.
     */
    public static function columnSelect($name, $label, $list, $width = 250, $align = 'left') {
        return self::createInstance($name)
            ->setLabel($label)
            ->setWidth($width)
            ->setAlign($align)
            ->setFormatter('select')
            ->setFormatOptions(self::formatOptionsSelect($list))
            ->setIsEditable(true)
            ->setEditType('select')
            ->setSearchType('select')
            ->setSearchOptions(self::generateSearchOptions('', ['eq', 'ne'], '', $list));
    }

    /**
     * Helper generates column config which contains boolean data.
     *
     * @param string $name Column name.
     * @param string $label Column label.
     * @param integer $width Column width in pixels.
     * @param string $align Text align. Allowed values: 'left', 'center', 'right'.
     * @param array $valuesList A list of values equals to the states (for search operations).
     * @return ColumnDefinition
     */
    public static function columnCheckbox($name, $label, $width = 50, $align = 'center', $valuesList = []) {
        return self::createInstance($name)
            ->setLabel($label)
            ->setWidth($width)
            ->setAlign($align)
            ->setFormatter('checkbox')
            ->setFormatOptions(self::formatOptionsCheckbox(false))
            ->setSearchType('select')
            ->setSearchOptions(self::generateSearchOptions('', ['eq', 'ne'], '', empty($valuesList) ? [0 => 'Not checked', 1 => 'Checked'] : $valuesList));
//             ->editType = 'checkbox';
//             ->editOptions = ColumnDefinition::editOptionsCheckbox('1', '0');

    }

}
