<?php
namespace Rusproj\FreeJqGridConfigurator;

use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;
use Rusproj\FreeJqGridConfigurator\JqGrid\CustomButton;
use Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons;
use Rusproj\FreeJqGridConfigurator\JqGrid\JqgridEvents;

/**
 * Main config of the jqGrid.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2020, RUSproj, Sergei S. Smirnov
 */
class JqGrid implements ConfigurationDefinitionInterface
{

    /**
     * Returns a new instance of the {@see \Rusproj\FreeJqGridConfigurator\JqGrid} class.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public static function createInstance()
    {
        return new JqGrid();
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
     * A list of the jqGrid event handlers.
     *
     * @var []
     */
    private $__eventHandlers;


    /**
     * The class that is used for applying different styles to alternate (zebra) rows in the grid.
     * This option is valid only if the altRows option is set to true.
     * Default value: ''.
     */
    private $altclass = '';

    /**
     * Set a zebra-striped grid (alternate rows have different styles).
     * Default value: false.
     *
     * @var boolean
     */
    private $altRows = false;

    /**
     * When set to true encodes (html encode) the incoming (from server) and posted data (from editing modules).
     * For example < will be converted to &lt;.
     * Default value: false.
     *
     * @var boolean
     */
    private $autoencode = false;

    /**
     * When set to true, the grid width is recalculated automatically to the width of the parent element.
     * This is done only initially when the grid is created. In order to resize the grid when the parent element
     * changes width you should apply custom JS-code and use the setGridWidth method for this purpose.
     * Default value: true.
     *
     * @var boolean
     */
    private $autowidth = true;

    /**
     * Table caption.
     *
     * @var string
     */
    private $caption = '';

    /**
     * This option determines the padding + border width of the cell. Usually this should not be changed,
     * but if custom changes to the td element are made in the grid css file, this will need to be changed.
     * The initial value of 5 means paddingLef(2) + paddingRight (2) + borderLeft (1) = 5.
     * Default value: 5.
     *
     * @var integer
     */
    private $cellLayout = 5;

    /**
     * Enables or disables cell editing.
     * Default value: false.
     * See {@see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * @var boolean
     */
    private $cellEdit = false;

    /**
     * Determines where the contents of the cell are saved.
     * Allowed values: '', 'remote', 'clientArray'.
     * Default value: ''.
     * See {@see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * @var string
     */
    private $cellsubmit = '';

    /**
     * The URL where the cell is to be saved.
     * Default value: ''.
     * See {@see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * @var string
     */
    private $cellurl = '';

    /**
     * Defines a set of properties which override the default values in colModel.
     * For example if you want to make all columns not sortable, then only one propery here can be specified
     * instead of specifying it in all columns in colModel.
     * Default value: null.
     *
     * @var object
     */
    private $cmTemplate = null;

    /**
     * Columns definition array.
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition[]
     */
    private $colModel = [];

    /**
     * An array in which we place the names of the columns. This is the text that appears in the head of the grid (header layer).
     * The names are separated with commas. Note that the number of elements in this array
     * should be equal of the number elements in the colModel array.
     * Default value: [].
     *
     * @var array
     */
    private $colNames = [];

    /**
     * Local array of the data wich must be shown at the table (dataType = 'local').
     * Default value: [].
     *
     * @var array
     */
    private $data = [];

    /**
     * The string of data when datatype parameter is set to xmlstring or jsonstring.
     * Default value: ''.
     *
     * @var string
     */
    private $datastr = '';

    /**
     * Data type.
     * Allowed values: xml, xmlstring, json, jsonstring, local, javascript, function, clientSide.
     * Default value: 'json'.
     *
     * @var string
     */
    private $dataType = 'json';





    /**
     * CSS-фреймворк, используемый для стилизации таблиц.
     * Допустимые значения: '' (jQuery), 'bootstrap' или 'bootstrap4'. Значение по-умолчанию: ''.
     *
     * @var string
     */
    private $guiStyle = '';

    /**
     * Specify to use another font that used by default at the table.
     * Allowed values: '', 'fontAwesome', 'glyph', 'jQueryUI'.
     * Default value: 'fontAwesome'.
     *
     * @var string
     */
    private $iconSet = 'fontAwesome';

    /**
     * The prefix of the row identifier (id attribute of the tr-element.
     *
     * @var string
     */
    private $idPrefix = '';

    /**
     * Show the pager navigation bar on top of the grid.
     * Default value: false.
     *
     * @var boolean
     */
    private $toppager = false;

    /**
     * Show the pager navigation bar on bottom of the grid.
     * Default value: true.
     *
     * @var boolean
     */
    private $pager = true;

    /**
     * The comparing of strings is case insensitive on sorting operations.
     * Default value: true.
     *
     * @var boolean
     */
    private $ignoreCase = true;

    /**
     * Create tooltips on column headers.
     * Default value: false.
     *
     * @var boolean
     */
    private $headertitles = false;

    /**
     * Allow sorting by multiples columns.
     * Default value: false.
     *
     * @var boolean
     */
    private $multiSort = false;

    /**
     * Determines the position of the record information in the pager.
     * Allowed values: left, center, right.
     * Default value: right.
     *
     * @var string
     */
    private $recordpos = 'right';

    /**
     * An array to construct a select box element in the pager in which we can change the number of the visible rows.
     * When changed during the execution, this parameter replaces the rowNum parameter that is passed to the url.
     * If the array is empty, this element does not appear in the pager.
     * Default value: [5, 10, 15, 25, 50, 100, 250, 500, 1000, 1500].
     *
     * @var array
     */
    private $rowList = [5, 10, 15, 25, 50, 100, 250, 500, 1000, 1500];

    /**
     * Show row numbers.
     * Default value: false.
     *
     * @var boolean
     */
    private $rownumbers = false;

    /**
     * Rows numbers per page.
     * Default value: 25.
     *
     * @var integer
     */
    private $rowNum = 25;

    /**
     * Show sort icons before the table header text.
     * Default value: false.
     *
     * @var boolean
     */
    private $sortIconsBeforeText = false;

    /**
     * The column name which used by default sorting on table load.
     *
     * @var string
     */
    private $sortname = '';

    /**
     * Sort order for default sort column on table load.
     * Allowed values: 'asc', 'desc'.
     * Default value: 'asc'.
     *
     * @var string
     */
    private $sortorder = 'asc';

    /**
     * Allow three state sorting (asc, desc, none).
     * Default value: true.
     *
     * @var boolean
     */
    private $threeStateSort = true;

    /**
     * URL to retrive table data.
     *
     * @var string
     */
    private $url = '';

    /**
     * Show the status of the page in the pager navigation bar.
     * Default value: true.
     *
     * @var boolean
     */
    private $viewrecords = true;



//     private $searching = ['defaultSearch' => 'cn'];

    /**
     * The string of data when datatype parameter is set to xmlstring or jsonstring.
     * Default value: ''.
     *
     * @return string
     */
    public function getDataStr()
    {
        return $this->datastr;
    }

    /**
     * The string of data when datatype parameter is set to xmlstring or jsonstring.
     * Default value: ''.
     *
     * @param string $dataStr
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setDataStr($dataStr)
    {
        $this->datastr = $dataStr;
        return $this;
    }

    /**
     * An array in which we place the names of the columns. This is the text that appears in the head of the grid (header layer).
     * The names are separated with commas. Note that the number of elements in this array
     * should be equal of the number elements in the colModel array.
     * Default value: [].
     *
     * @return array
     */
    public function getColNames()
    {
        return $this->colNames;
    }

    /**
     * An array in which we place the names of the columns. This is the text that appears in the head of the grid (header layer).
     * The names are separated with commas. Note that the number of elements in this array
     * should be equal of the number elements in the colModel array.
     * Default value: [].
     *
     * @param array $colNames
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setColNames($colNames)
    {
        $this->colNames = $colNames;
    }

    /**
     * Defines a set of properties which override the default values in colModel.
     * For example if you want to make all columns not sortable, then only one propery here can be specified
     * instead of specifying it in all columns in colModel.
     * Default value: [].
     *
     * @return object
     */
    public function getCmTemplate()
    {
        return $this->cmTemplate;
    }


    /**
     * Defines a set of properties which override the default values in colModel.
     * For example if you want to make all columns not sortable, then only one propery here can be specified
     * instead of specifying it in all columns in colModel.
     * Default value: [].
     *
     * @param object $cmTemplate
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setCmTemplate($cmTemplate)
    {
        $this->cmTemplate = $cmTemplate;
    }

    /**
     * The URL where the cell is to be saved.
     * Default value: ''.
     * See {@see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * @return string
     */
    public function getCellSaveUrl()
    {
        return $this->cellurl;
    }

    /**
     * The URL where the cell is to be saved.
     * Default value: ''.
     * See {@see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * @param string $cellUrl
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setCellSaveUrl($cellUrl)
    {
        $this->cellurl = $cellUrl;
        return $this;
    }

    /**
     * Determines where the contents of the cell are saved.
     * Allowed values: '', 'remote', 'clientArray'.
     * Default value: ''.
     * See {@see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * @return string
     */
    public function getCellsubmit()
    {
        return $this->cellsubmit;
    }

    /**
     * Determines where the contents of the cell are saved.
     * Allowed values: '', 'remote', 'clientArray'.
     * Default value: ''.
     * See {@see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * @param string $cellsubmit
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setCellsubmit($cellsubmit)
    {
        $this->cellsubmit = $cellsubmit;
        return $this;
    }

    /**
     * Enables or disables cell editing.
     * Default value: false.
     * See {@see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * @return boolean
     */
    public function getIsCellEditAllowed()
    {
        return $this->cellEdit;
    }

    /**
     * Enables or disables cell editing.
     * Default value: false.
     * See {@see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * @param boolean $cellEdit
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setIsCellEditAllowed($cellEdit)
    {
        $this->cellEdit = $cellEdit;
        return $this;
    }

    /**
     * This option determines the padding + border width of the cell. Usually this should not be changed,
     * but if custom changes to the td element are made in the grid css file, this will need to be changed.
     * The initial value of 5 means paddingLef(2) + paddingRight (2) + borderLeft (1) = 5.
     * Default value: 5.
     *
     * @return integer
     */
    public function getCellLayout()
    {
        return $this->cellLayout;
    }

    /**
     * This option determines the padding + border width of the cell. Usually this should not be changed,
     * but if custom changes to the td element are made in the grid css file, this will need to be changed.
     * The initial value of 5 means paddingLef(2) + paddingRight (2) + borderLeft (1) = 5.
     * Default value: 5.
     *
     * @param integer $cellLayout
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setCellLayout($cellLayout)
    {
        $this->cellLayout = $cellLayout;
        return $this;
    }

    /**
     * When set to true, the grid width is recalculated automatically to the width of the parent element.
     * This is done only initially when the grid is created. In order to resize the grid when the parent element
     * changes width you should apply custom JS-code and use the setGridWidth method for this purpose.
     * Default value: true.
     *
     * @return boolean
     */
    public function getIsAutoWidth()
    {
        return $this->autowidth;
    }

    /**
     * When set to true, the grid width is recalculated automatically to the width of the parent element.
     * This is done only initially when the grid is created. In order to resize the grid when the parent element
     * changes width you should apply custom JS-code and use the setGridWidth method for this purpose.
     * Default value: true.
     *
     * @param boolean $autoWidth
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setIsAutoWidth($autoWidth)
    {
        $this->autowidth = $autoWidth;
        return $this;
    }

    /**
     * When set to true encodes (html encode) the incoming (from server) and posted data (from editing modules).
     * For example < will be converted to &lt;.
     * Default value: false.
     *
     * @return boolean
     */
    public function getIsAutoEncode()
    {
        return $this->autoencode;
    }

    /**
     * When set to true encodes (html encode) the incoming (from server) and posted data (from editing modules).
     * For example < will be converted to &lt;.
     * Default value: false.
     *
     * @param boolean $autoEncode
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setIsAutoEncode($autoEncode)
    {
        $this->autoencode = $autoEncode;
        return $this;
    }

    /**
     * Set a zebra-striped grid (alternate rows have different styles).
     * Default value: false.
     *
     * @return boolean
     */
    public function getIsAltRows()
    {
        return $this->altRows;
    }

    /**
     * Set a zebra-striped grid (alternate rows have different styles).
     * Default value: false.
     *
     * @param boolean $altRows
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setIsAltRows($altRows)
    {
        $this->altRows = $altRows;
        return $this;
    }

    /**
     * The class that is used for applying different styles to alternate (zebra) rows in the grid.
     * This option is valid only if the altRows option is set to true.
     * Default value: ''.
     *
     * @return string
     */
    public function getAltClass()
    {
        return $this->altclass;
    }

    /**
     * The class that is used for applying different styles to alternate (zebra) rows in the grid.
     * This option is valid only if the altRows option is set to true.
     * Default value: ''.
     *
     * @param string $altClass
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setAltClass($altClass)
    {
        $this->altclass = $altClass;
        return $this;
    }

    /**
     * Determines the position of the record information in the pager.
     * Allowed values: left, center, right.
     * Default value: right.
     *
     * @return string
     */
    public function getRecordInfoPos()
    {
        return $this->recordpos;
    }

    /**
     * Determines the position of the record information in the pager.
     * Allowed values: left, center, right.
     * Default value: right.
     *
     * @param string $recordInfoPos
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setRecordInfoPos($recordInfoPos)
    {
        $this->recordpos = $recordInfoPos;
        return $this;
    }

    /**
     * Columns definition array.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition[]
     */
    public function getColModels()
    {
        return $this->colModel;
    }

    /**
     * Columns definition array.
     *
     * @param \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition[] $colModels
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setColModels($colModels)
    {
        $this->colModel = $colModels;
        return $this;
    }

    /**
     * Add column definition.
     *
     * @param \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition $colModel
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function addColumnModel($colModel)
    {
        $this->colModel[] = $colModel;
        return $this;
    }

    /**
     * CSS-фреймворк, используемый для стилизации таблиц.
     * Допустимые значения: '' (jQuery), 'bootstrap' или 'bootstrap4'. Значение по-умолчанию: ''.
     *
     * @return string
     */
    public function getGuiStyle()
    {
        return $this->guiStyle;
    }

    /**
     * CSS-фреймворк, используемый для стилизации таблиц.
     * Допустимые значения: '' (jQuery), 'bootstrap' или 'bootstrap4'. Значение по-умолчанию: ''.
     *
     * @param boolean $guiStyle
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setGuiStyle($guiStyle)
    {
        $this->guiStyle = $guiStyle;
        return $this;
    }

    /**
     * The column name which used by default sorting on table load.
     *
     * @return string
     */
    public function getSortName()
    {
        return $this->sortname;
    }

    /**
     * The column name which used by default sorting on table load.
     *
     * @param string $sortName
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setSortName($sortName)
    {
        $this->sortname = $sortName;
        return $this;
    }

    /**
     * Sort order for default sort column on table load.
     * Allowed values: 'asc', 'desc'.
     * Default value: 'asc'.
     *
     * @return string
     */
    public function getSortOrder()
    {
        return $this->sortorder;
    }

    /**
     * Sort order for default sort column on table load.
     * Allowed values: 'asc', 'desc'.
     * Default value: 'asc'.
     *
     * @param string $sortOrder
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortorder = $sortOrder;
        return $this;
    }

    /**
     * Specify to use another font that used by default at the table.
     * Allowed values: '', 'fontAwesome', 'glyph', 'jQueryUI'.
     * Default value: 'fontAwesome'.
     *
     * @return string
     */
    public function getIconSet()
    {
        return $this->iconSet;
    }

    /**
     * Specify to use another font that used by default at the table.
     * Allowed values: '', 'fontAwesome', 'glyph', 'jQueryUI'.
     * Default value: 'fontAwesome'.
     *
     * @param string $iconSet
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setIconSet($iconSet)
    {
        $this->iconSet = $iconSet;
        return $this;
    }

    /**
     * The prefix of the row identifier (id attribute of the tr-element.
     *
     * @return string
     */
    public function getIdPrefix()
    {
        return $this->idPrefix;
    }

    /**
     * The prefix of the row identifier (id attribute of the tr-element.
     *
     * @param unknown $idPrefix
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setIdPrefix($idPrefix)
    {
        $this->idPrefix = $idPrefix;
        return $this;
    }

    /**
     * Show row numbers.
     * Default value: false.
     *
     * @return boolean
     */
    public function getShowRowNumbers()
    {
        return $this->rownumbers;
    }

    /**
     * Show row numbers.
     * Default value: false.
     *
     * @param boolean $rowNumbers
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setShowRowNumbers($rowNumbers)
    {
        $this->rownumbers = $rowNumbers;
        return $this;
    }

    /**
     * Table caption.
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Table caption.
     *
     * @param unknown $caption
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * Show the pager navigation bar on top of the grid.
     * Default value: false.
     *
     * @return boolean
     */
    public function getShowTopPager()
    {
        return $this->toppager;
    }

    /**
     * Show the pager navigation bar on top of the grid.
     * Default value: false.
     *
     * @param unknown $topPager
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setShowTopPager($topPager)
    {
        $this->toppager = $topPager;
        return $this;
    }

    /**
     * Show the pager navigation bar on bottom of the grid.
     * Default value: true.
     *
     * @return boolean
     */
    public function getShowBottomPager()
    {
        return $this->pager;
    }

    /**
     * Show the pager navigation bar on bottom of the grid.
     * Default value: true.
     *
     * @param boolean $pager
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setShowBottomPager($pager)
    {
        $this->pager = $pager;
        return $this;
    }

    /**
     * Rows numbers per page.
     * Default value: 25.
     *
     * @return number
     */
    public function getRowNum()
    {
        return $this->rowNum;
    }

    /**
     * Rows numbers per page.
     * Default value: 25.
     *
     * @param integer $rowNum
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setRowNum($rowNum)
    {
        $this->rowNum = $rowNum;
        return $this;
    }

    /**
     * Show the status of the page in the right part of the pager navigation bar.
     * Default value: true.
     *
     * @return boolean
     */
    public function getViewRecords()
    {
        return $this->viewrecords;
    }

    /**
     * Show the status of the page in the right part of the pager navigation bar.
     * Default value: true.
     *
     * @param boolean $viewRecords
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setViewRecords($viewRecords)
    {
        $this->viewrecords = $viewRecords;
        return $this;
    }

    /**
     * The comparing of strings is case insensitive on sorting operations.
     * Default value: true.
     *
     * @return boolean
     */
    public function getIgnoreCase()
    {
        return $this->ignoreCase;
    }

    /**
     * The comparing of strings is case insensitive on sorting operations.
     * Default value: true.
     *
     * @param boolean $ignoreCase
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setIgnoreCase($ignoreCase)
    {
        $this->ignoreCase = $ignoreCase;
        return $this;
    }

    /**
     * Allow three state sorting (asc, desc, none).
     * Default value: true.
     *
     * @return boolean
     */
    public function isThreeStateSort()
    {
        return $this->threeStateSort;
    }

    /**
     * Allow three state sorting (asc, desc, none).
     * Default value: true.
     *
     * @param boolean $threeStateSort
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setThreeStateSort($threeStateSort)
    {
        $this->threeStateSort = $threeStateSort;
        return $this;
    }

    /**
     * Show sort icons before the table header text.
     * Default value: false.
     *
     * @return boolean
     */
    public function getShowSortIconsBeforeText()
    {
        return $this->sortIconsBeforeText;
    }

    /**
     * Show sort icons before the table header text.
     * Default value: false.
     *
     * @param unknown $showSortIconsBeforeText
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setShowSortIconsBeforeText($showSortIconsBeforeText)
    {
        $this->sortIconsBeforeText = $showSortIconsBeforeText;
        return $this;
    }

    /**
     * Create tooltips on column headers.
     * Default value: false.
     *
     * @return boolean
     */
    public function getShowHeaderTitles()
    {
        return $this->headertitles;
    }

    /**
     * Create tooltips on column headers.
     * Default value: false.
     *
     * @param boolean $showHeaderTitles
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setShowHeaderTitles($showHeaderTitles)
    {
        $this->headertitles = $showHeaderTitles;
        return $this;
    }

    /**
     * Allow sorting by multiples columns.
     * Default value: false.
     *
     * @return boolean
     */
    public function getAllowMultiSort()
    {
        return $this->multiSort;
    }

    /**
     * Allow sorting by multiples columns.
     * Default value: false.
     *
     * @param boolean $multiSort
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setAllowMultiSort($multiSort)
    {
        $this->multiSort = $multiSort;
        return $this;
    }

    /**
     * URL to retrive table data.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * URL to retrive table data.
     *
     * @param string $url
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Data type.
     * Allowed values: xml, xmlstring, json, jsonstring, local, javascript, function, clientSide.
     * Default value: 'json'.
     *
     * @return string
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * Data type.
     * Allowed values: xml, xmlstring, json, jsonstring, local, javascript, function, clientSide.
     * Default value: 'json'.
     *
     * @param string $dataType
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
        return $this;
    }

    /**
     * Local array of the data wich must be shown at the table (dataType = 'local').
     * Default value: [].
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Local array of the data wich must be shown at the table (dataType = 'local').
     * Default value: [].
     *
     * @param array $data
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * An array to construct a select box element in the pager in which we can change the number of the visible rows.
     * When changed during the execution, this parameter replaces the rowNum parameter that is passed to the url.
     * If the array is empty, this element does not appear in the pager.
     * Default value: [5, 10, 15, 25, 50, 100, 250, 500, 1000, 1500].
     *
     * @return array
     */
    public function getRowList()
    {
        return $this->rowList;
    }

    /**
     * An array to construct a select box element in the pager in which we can change the number of the visible rows.
     * When changed during the execution, this parameter replaces the rowNum parameter that is passed to the url.
     * If the array is empty, this element does not appear in the pager.
     * Default value: [5, 10, 15, 25, 50, 100, 250, 500, 1000, 1500].
     *
     * @param array $rowList
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setRowList($rowList)
    {
        $this->rowList = $rowList;
        return $this;
    }


//     /**
//      * URL, по которому доступен JqGrid. Значение по умолчанию: /js/jqGrid/.
//      *
//      * @var string
//      */
//     public $jqGridURL = '/js/jqGrid/';

//     /**
//      *  Массив js-скриптов, которые необходимо загрузить до загрузки jqGrid. Значение по умолчанию: [] (не определено).
//      *
//      * @var array
//      */
//     public $addonJS = [];

//     /**
//      * Массив css-стилей, которые необходимо загрузить до загрузки jqGrid. Значение по умолчанию: [] (не определено).
//      *
//      * @var array
//      */
//     public $addonCSS = [];

//     /**
//      * Признак необходимости загрузить плагин ...
//      *
//      * @var bool
//      */
//     public $plugin_addons = false;

//     /**
//      * Признак необходимости загрузить плагин ...
//      *
//      * @var bool
//      */
//     public $plugin_postext = false;

//     /**
//      * Признак необходимости загрузить плагин ...
//      *
//      * @var bool
//      */
//     public $plugin_setcolumns = false;

//     /**
//      * Признак необходимости загрузить плагин предназначенный для формирования меню.
//      *
//      * @var bool
//      */
//     public $plugin_contextmenu = false;

//     /**
//      * Признак необходимости загрузить плагин ...
//      *
//      * @var bool
//      */
//     public $plugin_searchFilter = false;

//     /**
//      * Признак необходимости загрузить плагин ...
//      *
//      * @var bool
//      */
//     public $plugin_tablednd = false;

//     /**
//      * Признак необходимости загрузить плагин предназначенный для управления сортировкой и удалением столбцов.
//      *
//      * @var bool
//      */
//     public $plugin_multiselect = true;

//     /**
//      * Массив пользовательских кнопок, добавляемых на панель управления. Значение по умолчанию: [].
//      *
//      * @var \Rusproj\FreeJqGridConfigurator\JqGrid\CustomButton[]
//      */
//     public $customButtons = [];

//     /**
//      * Признак необходимости добавить кнопку копирования выбранной записи. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $addCopyButton = false;

//     /**
//      * Признак необходимости добавить кнопку заморозки столбцов. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $addButtonFreze = false;

//     /**
//      * Признак необходимости добавить кнопку сортировки столбцов. Значение по умолчанию: true.
//      *
//      * @var bool
//      */
//     public $addButtonSortColumns = true;

//     /**
//      * Задает идентификатор элемента, который будет содержать табличную часть. Значение по умолчанию: '#list'.
//      *
//      * @var string
//      */
//     public $tableId = '#list';


//     /**
//      * Признак того, что в таблице разрешена группировка столбцов. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $grouping = false;

//     /**
//      * Высота таблицы. Допустимые значения: число (высота в пикселах), '100%', 'auto'. Значение по умолчанию: '100%'.
//      *
//      * @var int|string
//      */
//     public $height = '100%';

//     /**
//      * Признак необходимости первоначально таблицу отобразить в свернутом в заголовок виде, при этом данные будут
//      * загружены только после первого отображения таблицы. Данный параметр имеет место в том случае,
//      * если задано свойство Caption. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $hiddenGrid = false;

//     /**
//      * Признак необходимости отобразить в заголовке кнопку сворачивания/разворачивания таблицы.
//      * Данный параметр имеет место в том случае, если задано свойство Caption. Значение по умолчанию: true.
//      *
//      * @var bool
//      */
//     public $hideGrid = true;

//     /**
//      * Признак необходимости отображения подсветки строки, над которой в текущий момент находится курсор мыши.
//      * Значение по умолчанию: true.
//      *
//      * @var bool
//      */
//     public $hoverRows = true;

//     /**
//      * Признак того, что данные загружаются в таблицу только один раз. После загрузки параметр datatype устанавливается
//      * в значение local. Все последующие операции с данными производятся локально. Если задано разбиение на страницы,
//      * то оно будет недоступно. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $loadOnce = false;

//     /**
//      * Определяет поведение jqGrid во время запроса данных. Возможные значения: disable (отключить индикатор прогресса,
//      * можно задать свой индикатор), enable (отображать надпись, опеределенную в языковом файле), block (отображать надпись,
//      * опеределенную в языковом файле, но при этом заблокировать все элементы управления). Значение по умолчанию: 'block'.
//      *
//      * @var string
//      */
//     public $loadui = 'block';

//     /**
//      * Тип запроса. Допустимые значения: POST или GET. Значение по умолчанию: POST.
//      *
//      * @var string
//      */
//     public $mType = 'POST';

//     /**
//      * Признак необходимости разрешить возможность множественного выбора строк. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $multiSelect = false;

//     /**
//      * Признак необходимости разрешить выбор строки только при щелчке по соответствующему полю, в противном случае щелчок по любой
//      * строке обнулит выбор (стиль yahoo). Данный параметр имеет место в том случае, если значение свойства multiSelect установлено
//      * в true. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $multiBoxOnly = false;

//     /**
//      * Ширина столбца с элементами управления для выбора строк. Данный параметр имеет место в том случае, если значение свойства
//      * multiSelect установлено в true. Значение по умолчанию: 20.
//      *
//      * @var int
//      */
//     public $multiSelectWidth = 20;

//     /**
//      * Конфигурационные параметры кнопок управления записями.
//      *
//      * @var \Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons
//      */
//     public $recButtonsConfig = null;

//     /**
//      * Конфигурационные параметры панели постраничной навигации.
//      *
//      * @var \Rusproj\FreeJqGridConfigurator\JqGrid\Pager
//      */
//     public $pager = null;

//     /**
//      * Название css-класса, который добавляется к заголовкам колонок таблицы, которые могут менять свой размер.
//      * Значение по умолчнию: '' (не задано).
//      *
//      * @var string
//      */
//     public $resizeClass = '';

//     /**
//      * Задает ширину столбца, отображающего номера строк. Данный параметр имеет действие в том случае,
//      * если свойство rownNmbers равно true. Значение по умолчанию: 30.
//      *
//      * @var int
//      */
//     public $rowNumWidth = 30;

//     /**
//      * Задает признак необходимости использовать динамическую прокрутку. При этом будет отключена панель навигации.
//      * Кроме того, значение свойства Height таблицы должно быть задано в пикселах, а не процентах или 'auto'.
//      * Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $scroll = false;

//     /**
//      * Ширина вертикальной полосы прокрутки. Данный параметр имеет место в том случае, если свойство scroll установлено в true.
//      * Значение по умолчанию: 18.
//      *
//      * @var int
//      */
//     public $scrollOffset = 18;

//     /**
//      * Временная задержка до запроса данных. Данный параметр имеет место в том случае, если свойство scroll установлено в true.
//      * Значение по умолчанию: 200.
//      *
//      * @var int
//      */
//     public $scrollTimeout = 100;

//     /**
//      * Задает признак того, что необходимо выполнить прокрутку к выбранной строке при использовании метода setSelection.
//      * Данный параметр имеет место в том случае, если свойство scroll установлено в true. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $scrollRows = false;

//     /**
//      * Задает признак необходимости подгонять ширину столбцов пропорционально их заданной ширине в пикселах в соответствии с
//      * шириной таблицы. Значение по умолчнию: true.
//      *
//      * @var bool
//      */
//     public $shrinkToFit = true;

//     /**
//      * Задает признак возможности менять порядок столбцов за счет их перетаскивания за заголовок. Значение по умолчнию: false.
//      *
//      * @var bool
//      */
//     public $sortable = false;

//     /**
//      * Задает признак возмжности использовать субтаблицы (вложенные таблицы). При этом слева появится дополнительный столбец,
//      * который позволит скрывать или отображать субтаблицы для каждой записи основной таблицы. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $subGrid = false;

//     /**
//      * Массив дополнительных параметров субтаблиц. Данный параметр имеет место, если значение свойства sortOrder установлено в true.
//      * Значение по умолчанию: [] (не задано).
//      *
//      * @var array
//      */
//     public $subGridOptions = [];

//     /**
//      * Массив, описывающий модель вложенных субтаблиц. Для задания параметров отдельных столбцов удобно пользваться
//      * статическими методами класса ColumnConfig или задав необходимые свойства экземпляру класса и вызвав метод getConfig().
//      * Данный параметр имеет место, если значение свойства sortOrder установлено в true. Значение по умолчанию: [] (не задано).
//      *
//      * @var array
//      */
//     public $subGridModel = [];

//     /**
//      * Задает URL адрес для получения данных субтаблиц. В результате будет добавлен (как параметр) id строки к данному адресу.
//      * Если необходимо передавать дополнительные параметры, необходимо определить их в свойстве subGridModel.
//      * Данный параметр имеет место, если значение свойства sortOrder установлено в true. Значение по умолчанию: '' (не задано).
//      *
//      * @var string
//      */
//     public $subGridUrl = '';

//     /**
//      * Задает ширину субтаблицы. Данный параметр имеет место, если значение свойства sortOrder установлено в true.
//      * Значение по умолчанию: 20 (не задано).
//      *
//      * @var int
//      */
//     public $subGridWidth = 20;

//     /**
//      * Задает расположение панели инструментов. Первый параметр массива определяет признак необходимости включить панель инструментов.
//      * Второй определяет место создания панели. Возможные значения: top (наверху, перед таблицей), bottom (внизу, после таблицы),
//      * both (вверху и внизу). Значение по умолчанию: [false, 'both'].
//      *
//      * @var array
//      */
//     public $toolbar = [false, 'both'];

//     /**
//      * Задает признак необходимости представления данных в виде дерева. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $treeGrid = false;

//     /**
//      * Задает метод, используемый treeGreed. Возможные значения: nested (вложенный) или adjacency (смежный).
//      * Данный параметр имеет место, если значение свойства treeGred установлено в true. Значение по умолчанию: nested.
//      *
//      * @var string
//      */
//     public $treeGridModel = 'nested';

//     /**
//      * Задает значки, используемые для представления дерева. Необходима следующая структура массива:
//      * {plus:'ui-icon-triangle-1-e',minus:'ui-icon-triangle-1-s',leaf:'ui-icon-radio-off'}.
//      * Данный параметр имеет место, если значение свойства treeGred установлено в true.
//      * Значение по умолчанию: [] (не определено).
//      *
//      * @var array
//      */
//     public $treeIcons = [];

//     /**
//      * Расширяет свойство colModel в базовой таблице. Описанные здесь поля добавляются в конец свойства colModel и скрываются.
//      * Это означает, что данные, возвращаемые с сервера должны иметь значения для этих полей. Данный параметр имеет место,
//      * если значение свойства treeGred установлено в true. Значение по умолчанию: [] (не определено).
//      *
//      * @var array
//      */
//     public $treeReader = [];

//     /**
//      * Определят уровень, с которого начинается корень treeGreed. Данный параметр имеет место,
//      * если значение свойства treeGred установлено в true. Значение по умолчанию: 0.
//      *
//      * @var int
//      */
//     public $treeRootLevel = 0;

//     /**
//      * Задает признак того, что кнопки сортировки должны отображаться у каждого столбца, по которому возможна сортировка данных.
//      * Значение по умолчанию: true.
//      *
//      * @var bool
//      */
//     public $viewSortColsVisibleIcons = true;

//     /**
//      * Задает признакт того, что столбец будет отсортирован при щелчке по любому месту заголовка. Значение по умолчанию: true.
//      *
//      * @var bool
//      */
//     public $viewSortColsClickableHeaders = true;

//     /**
//      * Задает конечную ширину таблицы. Если значение не задано, то ширина таблицы будет складываться из суммы ширин всех столбцов,
//      * в противном случае на основе свойства shrinkToFit. Значение по умолчанию: 0 (не задано).
//      *
//      * @var int
//      */
//     public $width = 0;

//     /**
//      * Признак необходимости добавить форму перед таблицей. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $headerForm = false;

//     /**
//      * Задает действительный идентификатор html-элемента, который будет содержать подгружаемую форму,
//      * расположенную перед таблицей. Значение по умолчанию: '#hForm'.
//      *
//      * @var string
//      */
//     public $headerFormHtmlID = '#hForm';

//     /**
//      * Название функции, осуществляющей загрузку и отрисовку формы. Значение по умолчанию: '' (не определено).
//      *
//      * @var string
//      */
//     public $headerFormCompleteFunction = '';

//     /**
//      *
//      *
//      * @var bool
//      */
//     public $existsDateCol = false;

//     /**
//      *
//      *
//      * @var string
//      */
//     public $dateColIndexes = '';


    /**
     * Initialize instance of the JqGrid.
     */
    function __construct() {
//         $this->recButtonsConfig = new RecButtons();
//         $this->pager = new Pager();
    }

    /**
     * Returns configuration as an array of key-value pairs.
     *
     * @return array
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



//         // Формируем заданные пользовательские кнопки
//         if ($this->addCopyButton || $this->addButtonFreze || $this->addButtonSortColumns) {
//             if ($this->addCopyButton) {
//                 $this->customButtons[] = CustomButton::addButton('editForm_Copy', '', 'ui-icon-copy', 'Копировать выделенную запись', 'first');
//             }
//             $this->customButtons[] = CustomButton::addSeparator();
//             if ($this->addButtonSortColumns) {
//                 $this->customButtons[] = CustomButton::addButton('columnChooser', '', 'ui-icon-shuffle', 'Переупорядочивание и скрытие колонок');
//             }
//             if ($this->addButtonFreze) {
//                 $this->customButtons[] = CustomButton::addButton('columnFreze', '', 'ui-icon-unlocked', 'Заморозить/разморозить фиксированные столбцы');
//             }
//         }
//         if (count($this->customButtons) > 0) {
//             $_config['custom_buttons'] = [];
//             foreach ($this->customButtons as $button) {
//                 $_config['custom_buttons'][] = $button->getConfig();
//             }
//         }

//         // Формируем массив подключаемых плагинов
//         $_config['plugins'] = [];
//         $_config['plugins']['js'] = $this->addonJS;
//         $_config['plugins']['css'] = $this->addonCSS;
//         if ($this->plugin_addons) {
//             $_config['plugins']['js'][] = $this->jqGridURL . 'plugins/grid.addons.js';
//         }
//         if ($this->plugin_postext) {
//             $_config['plugins']['js'][] = $this->jqGridURL . 'plugins/grid.postext.js';
//         }
//         if ($this->plugin_setcolumns) {
//             $_config['plugins']['js'][] = $this->jqGridURL . 'plugins/grid.setcolumns.js';
//         }
//         if ($this->plugin_contextmenu) {
//             $_config['plugins']['js'][] = $this->jqGridURL . 'plugins/jquery.contextmenu.js';
//         }
//         if ($this->plugin_searchFilter) {
//             $_config['plugins']['js'][] = $this->jqGridURL . 'plugins/jquery.searchFilter.js';
//             $_config['plugins']['css'][] = $this->jqGridURL . 'plugins/jquery.searchFilter.css';
//         }
//         if ($this->plugin_tablednd) {
//             $_config['plugins']['js'][] = $this->jqGridURL . 'plugins/jquery.tablednd.js';
//         }
//         if ($this->plugin_multiselect || $this->addButtonSortColumns) {
//             $_config['plugins']['js'][] = $this->jqGridURL . 'plugins/ui.multiselect.js';
//             $_config['plugins']['css'][] = $this->jqGridURL . 'plugins/ui.multiselect.css';
//         }
//         $_config['plugins']['js'][] = $this->jqGridURL . 'jqGrid.min.js';
//         $_config['plugins']['css'][] = $this->jqGridURL . 'jqGrid.min.css';
//         $_config['plugins']['js'][] = $this->jqGridURL . 'jqGrid.locale-ru.js';

//         // Формируем массив основной конфигурации
//         $_config = [];
//         if ($this->altRows) {
//             $_config['altRows'] = true;
//             if (!empty($this->altClass)) {
//                 $_config['altclass'] = $this->altClass;
//             }
//         }
//         if (!empty($this->caption)) {
//             $_config['caption'] = $this->caption;
//             $_config['hiddengrid'] = $this->hiddenGrid;
//             $_config['hidegrid'] = $this->hideGrid;
//         }
//         $_config['datatype'] = $this->dataType;
//         if ((($this->dataType === 'xmlstring') || ($this->dataType === 'jsonstring')) && !empty($this->dataStr)) {
//             $_config['datastr'] = $this->dataStr;
//         } elseif (count($this->data) > 0) {
//             $_config['data'] = $this->data;
//         }
//         if ($this->multiSelect) {
//             $_config['multiselect'] = true;
//             $_config['multiboxonly'] = $this->multiBoxOnly;
//             $_config['multiselectWidth'] = $this->multiSelectWidth;
//         }
//         if ($this->scroll) {
//             $_config['scroll'] = true;
//             $_config['scrollOffset'] = $this->scrollOffset;
//             $_config['scrollTimeout'] = $this->scrollTimeout;
//             $_config['scrollrows'] = $this->scrollRows;
//         }
//         if ($this->sortable) {
//             $_config['sortable'] = true;
//             if (!in_array('multiselect', $_config['plugins'])) {
//                 $_config['plugins'][] = 'multiselect';
//             }
//         }
//         if ($this->subGrid) {
//             $_config['subGrid'] = true;
//             $_config['subGridOptions'] = $this->subGridOptions;
//             $_config['subGridModel'] = $this->subGridModel;
//             $_config['subGridUrl'] = $this->subGridUrl;
//             $_config['subGridWidth'] = $this->subGridWidth;
//             $_config['subGridWidth'] = $this->subGridWidth;
//         }
//         if ($this->toolbar[0]) {
//             $_config['toolbar'] = $this->toolbar;
//         }
//         if ($this->treeGrid) {
//             $_config['$treeGrid'] = true;
//             $_config['treeGridModel'] = $this->treeGridModel;
//             if (count($this->treeIcons) > 0) {
//                 $_config['treeIcons'] = $this->treeIcons;
//             }
//             if (count($this->treeReader) > 0) {
//                 $_config['treeReader'] = $this->treeReader;
//             }
//             $_config['tree_root_level'] = $this->treeRootLevel;
//         }
//         if ($this->headerForm) {
//             $_config['headerForm']['htmlID'] = $this->headerFormHtmlID;
//             if (!empty($this->headerFormCompleteFunction)) {
//                 $_config['headerForm']['completeFunction'] = $this->headerFormCompleteFunction;
//             }
//         }

//         // Добавляем конфигурационные данные, формируемые другими классами
//         $_config = array_merge($_config, $this->pager->getConfig());
//         $_config = array_merge($_config, $this->recButtonsConfig->getConfig());

        return $_config;
    }

    /**
     * This event fires after every inserted row.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the inserted row;</li>
     *  <li>rowdata is an array of the data to be inserted into the row. This is array of type name: value, where the name is a name from colModel;</li>
     *  <li>rowelem is the element from the response. If the data is xml this is the xml element of the row; if the data is json this is array containing all the data for the row.</li>
     * </ul>
     *
     *  Note: this event does not fire if gridview option is set to true.
     *
     * @return string
     */
    public function getAfterInsertRow()
    {
        return $this->__eventHandlers['afterInsertRow'] ?? null;
    }

    /**
     * This event fires after every inserted row.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the inserted row;</li>
     *  <li>rowdata is an array of the data to be inserted into the row. This is array of type name: value, where the name is a name from colModel;</li>
     *  <li>rowelem is the element from the response. If the data is xml this is the xml element of the row; if the data is json this is array containing all the data for the row.</li>
     * </ul>
     *
     *  Note: this event does not fire if gridview option is set to true.
     *
     * @param string $afterInsertRow
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setAfterInsertRow($afterInsertRow)
    {
        $this->__eventHandlers['afterInsertRow'] = $afterInsertRow;
        return $this;
    }

    /**
     * This event fire before proccesing the data from the server.
     *
     * Parameters:
     * <ul>
     *  <li>data;</li>
     *  <li>status;</li>
     *  <li>xhr.</li>
     * </ul>
     *
     * Note that the data is formatted depended on the value of the datatype parameter - i.e if the datatype is 'json' for example the data is JavaScript object.
     *
     * @return string
     */
    public function getBeforeProcessing()
    {
        return $this->__eventHandlers['beforeProcessing'] ?? null;
    }

    /**
     * This event fire before proccesing the data from the server.
     *
     * Parameters:
     * <ul>
     *  <li>data;</li>
     *  <li>status;</li>
     *  <li>xhr.</li>
     * </ul>
     *
     * Note that the data is formatted depended on the value of the datatype parameter - i.e if the datatype is 'json' for example the data is JavaScript object.
     *
     * @param string $beforeProcessing
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setBeforeProcessing($beforeProcessing)
    {
        $this->__eventHandlers['beforeProcessing'] = $beforeProcessing;
        return $this;
    }

    /**
     * This event fire before requesting any data. Also does not fire if datatype is function. If the event return false the request is not made to the server.
     *
     * Parameters: none.
     *
     * @return string
     */
    public function getBeforeRequest()
    {
        return $this->__eventHandlers['beforeRequest'] ?? null;
    }

    /**
     * This event fire before requesting any data. Also does not fire if datatype is function. If the event return false the request is not made to the server.
     *
     * Parameters: none.
     *
     * @param string $beforeRequest
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setBeforeRequest($beforeRequest)
    {
        $this->__eventHandlers['beforeRequest'] = $beforeRequest;
        return $this;
    }

    /**
     * This event fire when the user click on the row, but before select them.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>e is the event object.</li>
     * </ul>
     *
     * This event should return boolean true or false. If the event return true the selection is done.
     * If the event return false the row is not selected and any other action if defined does not occur.
     *
     * @return string
     */
    public function getBeforeSelectRow()
    {
        return $this->__eventHandlers['beforeSelectRow'] ?? null;
    }

    /**
     * This event fire when the user click on the row, but before select them.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>e is the event object.</li>
     * </ul>
     *
     * This event should return boolean true or false. If the event return true the selection is done.
     * If the event return false the row is not selected and any other action if defined does not occur.
     *
     * @param string $beforeSelectRow
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setBeforeSelectRow($beforeSelectRow)
    {
        $this->__eventHandlers['beforeSelectRow'] = $beforeSelectRow;
        return $this;
    }

    /**
     * This fires after all the data is loaded into the grid and all other processes are complete.
     * Also the event fires independent from the datatype parameter and after sorting paging and etc.
     *
     * Parameters: none.
     *
     * @return string
     */
    public function getGridComplete()
    {
        return $this->__eventHandlers['gridComplete'] ?? null;
    }

    /**
     * This fires after all the data is loaded into the grid and all other processes are complete.
     * Also the event fires independent from the datatype parameter and after sorting paging and etc.
     *
     * Parameters: none.
     *
     * @param string $gridComplete
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setGridComplete($gridComplete)
    {
        $this->__eventHandlers['gridComplete'] = $gridComplete;
        return $this;
    }

    /**
     * A pre-callback to modify the XMLHttpRequest object (xhr) before it is sent. Use this to set custom headers etc.
     *
     * Parameters:
     * <ul>
     *  <li>xhr;</li>
     *  <li>settings.</li>
     * </ul>
     *
     * Returning false will cancel the request.
     *
     * @return string
     */
    public function getLoadBeforeSend()
    {
        return $this->__eventHandlers['loadBeforeSend'] ?? null;
    }

    /**
     * A pre-callback to modify the XMLHttpRequest object (xhr) before it is sent. Use this to set custom headers etc.
     *
     * Parameters:
     * <ul>
     *  <li>xhr;</li>
     *  <li>settings.</li>
     * </ul>
     *
     * Returning false will cancel the request.
     *
     * @param string $loadBeforeSend
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setLoadBeforeSend($loadBeforeSend)
    {
        $this->__eventHandlers['loadBeforeSend'] = $loadBeforeSend;
        return $this;
    }

    /**
     * This event is executed immediately after every server request.
     *
     * Parameters:
     * <ul>
     *  <li>data Data from the response depending on datatype grid parameter.</li>
     * </ul>
     *
     * @return string
     */
    public function getLoadComplete()
    {
        return $this->__eventHandlers['loadComplete'] ?? null;
    }

    /**
     * This event is executed immediately after every server request.
     *
     * Parameters:
     * <ul>
     *  <li>data Data from the response depending on datatype grid parameter.</li>
     * </ul>
     *
     * @param string $loadComplete
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setLoadComplete($loadComplete)
    {
        $this->__eventHandlers['loadComplete'] = $loadComplete;
        return $this;
    }

    /**
     * A function to be called if the request fails.
     *
     * Parameters:
     * <ul>
     *  <li>xhr - XMLHttpRequest object;</li>
     *  <li>status - a string describing the type of error;</li>
     *  <li>error - an optional exception object.</li>
     * </ul>
     *
     * @return string
     */
    public function getLoadError()
    {
        return $this->__eventHandlers['loadError'] ?? null;
    }

    /**
     * A function to be called if the request fails.
     *
     * Parameters:
     * <ul>
     *  <li>xhr - XMLHttpRequest object;</li>
     *  <li>status - a string describing the type of error;</li>
     *  <li>error - an optional exception object.</li>
     * </ul>
     *
     * @param string $loadError
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setLoadError($loadError)
    {
        $this->__eventHandlers['loadError'] = $loadError;
        return $this;
    }

    /**
     * Fires when click on particular cell in the grid.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>iCol is the index of the cell;</li>
     *  <li>cellcontent is the content of the cell;</li>
     *  <li>e is the event object.</li>
     * </ul>
     *
     * Note that this available when we not use cell editing module and is disabled when using cell editing.
     *
     * @return string
     */
    public function getOnCellSelect()
    {
        return $this->__eventHandlers['onCellSelect'] ?? null;
    }

    /**
     * Fires when click on particular cell in the grid.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>iCol is the index of the cell;</li>
     *  <li>cellcontent is the content of the cell;</li>
     *  <li>e is the event object.</li>
     * </ul>
     *
     * Note that this available when we not use cell editing module and is disabled when using cell editing.
     *
     * @param string $onCellSelect
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setOnCellSelect($onCellSelect)
    {
        $this->__eventHandlers['onCellSelect'] = $onCellSelect;
        return $this;
    }

    /**
     * Raised immediately after row was double clicked.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>iRow is the index of the row (do not mix this with the rowid);</li>
     *  <li>iCol is the index of the cell;</li>
     *  <li>e is the event object.</li>
     * </ul>
     *
     * @return string
     */
    public function getOnDblClickRow()
    {
        return $this->__eventHandlers['ondblClickRow'] ?? null;
    }

    /**
     * Raised immediately after row was double clicked.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>iRow is the index of the row (do not mix this with the rowid);</li>
     *  <li>iCol is the index of the cell;</li>
     *  <li>e is the event object.</li>
     * </ul>
     *
     * @param string $ondblClickRow
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setOnDblClickRow($ondblClickRow)
    {
        $this->__eventHandlers['ondblClickRow'] = $ondblClickRow;
        return $this;
    }

    /**
     * Fire after clicking to hide or show grid (hidegrid:true).
     *
     * Parameters:
     * <ul>
     *  <li>gridstate is the state of the grid - can have two values - visible or hidden.</li>
     * </ul>
     *
     * @return string
     */
    public function getOnHeaderClick()
    {
        return $this->__eventHandlers['onHeaderClick'] ?? null;
    }

    /**
     * Fire after clicking to hide or show grid (hidegrid:true).
     *
     * Parameters:
     * <ul>
     *  <li>gridstate is the state of the grid - can have two values - visible or hidden.</li>
     * </ul>
     *
     * @param string $onHeaderClick
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setOnHeaderClick($onHeaderClick)
    {
        $this->__eventHandlers['onHeaderClick'] = $onHeaderClick;
        return $this;
    }

    /**
     * This event fires after click on [page button] and before populating the data.
     * Also works when the user enters a new page number in the page input box (and presses [Enter])
     * and when the number of requested records is changed via the select box.
     *
     * Parameters:
     * <ul>
     *  <li>pgButton.</li>
     * </ul>
     *
     * If this event return 'stop' the processing is stopped and you can define your own custom paging.
     *
     * @return string
     */
    public function getOnPaging()
    {
        return $this->__eventHandlers['onPaging'] ?? null;
    }

    /**
     * This event fires after click on [page button] and before populating the data.
     * Also works when the user enters a new page number in the page input box (and presses [Enter])
     * and when the number of requested records is changed via the select box.
     *
     * Parameters:
     * <ul>
     *  <li>pgButton.</li>
     * </ul>
     *
     * If this event return 'stop' the processing is stopped and you can define your own custom paging.
     *
     * @param string $onPaging
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setOnPaging($onPaging)
    {
        $this->__eventHandlers['onPaging'] = $onPaging;
        return $this;
    }

    /**
     * Raised immediately after row was right clicked.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>iRow is the index of the row (do not mix this with the rowid);</li>
     *  <li>iCol is the index of the cell;</li>
     *  <li>e is the event object.</li>
     * </ul>
     *
     * Note - this event does not work in Opera browsers, since Opera does not support oncontextmenu event.
     *
     * @return string
     */
    public function getOnRightClickRow()
    {
        return $this->__eventHandlers['onRightClickRow'] ?? null;
    }

    /**
     * Raised immediately after row was right clicked.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>iRow is the index of the row (do not mix this with the rowid);</li>
     *  <li>iCol is the index of the cell;</li>
     *  <li>e is the event object.</li>
     * </ul>
     *
     * Note - this event does not work in Opera browsers, since Opera does not support oncontextmenu event.
     *
     * @param string $onRightClickRow
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setOnRightClickRow($onRightClickRow)
    {
        $this->__eventHandlers['onRightClickRow'] = $onRightClickRow;
        return $this;
    }

    /**
     * This event fires when multiselect option is true and you click on the header checkbox.
     *
     * Parameters:
     * <ul>
     *  <li>aRowids array of the selected rows (rowid's);</li>
     *  <li>status - boolean variable determining the status of the header check box - true if checked, false if not checked.</li>
     * </ul>
     *
     * Note that the aRowids alway contain the ids when header checkbox is checked or unchecked.
     *
     * @return string
     */
    public function getOnSelectAll()
    {
        return $this->__eventHandlers['onSelectAll'] ?? null;
    }

    /**
     * This event fires when multiselect option is true and you click on the header checkbox.
     *
     * Parameters:
     * <ul>
     *  <li>aRowids array of the selected rows (rowid's);</li>
     *  <li>status - boolean variable determining the status of the header check box - true if checked, false if not checked.</li>
     * </ul>
     *
     * Note that the aRowids alway contain the ids when header checkbox is checked or unchecked.
     *
     * @param string $onSelectAll
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setOnSelectAll($onSelectAll)
    {
        $this->__eventHandlers['onSelectAll'] = $onSelectAll;
        return $this;
    }

    /**
     * Raised immediately after row was clicked.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>status is the status of the selection;</li>
     *  <li>e is the event object. Can be used when multiselect is set to true. true if the row is selected, false if the row is deselected.</li>
     * </ul>
     *
     * @return string
     */
    public function getOnSelectRow()
    {
        return $this->__eventHandlers['onSelectRow'] ?? null;
    }

    /**
     * Raised immediately after row was clicked.
     *
     * Parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>status is the status of the selection;</li>
     *  <li>e is the event object. Can be used when multiselect is set to true. true if the row is selected, false if the row is deselected.</li>
     * </ul>
     *
     * @param string $onSelectRow
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setOnSelectRow($onSelectRow)
    {
        $this->__eventHandlers['onSelectRow'] = $onSelectRow;
        return $this;
    }

    /**
     * Raised immediately after sortable column was clicked and before sorting the data.
     *
     * Parameters:
     * <ul>
     *  <li>index is the index name from colModel;</li>
     *  <li>iCol is the index of column;</li>
     *  <li>sortorder is the new sorting order - can be 'asc' or 'desc'.</li>
     * </ul>
     *
     * If this event return 'stop' the sort processing is stopped and you can define your own custom sorting.
     *
     * @return string
     */
    public function getOnSortCol()
    {
        return $this->__eventHandlers['onSortCol'] ?? null;
    }

    /**
     * Raised immediately after sortable column was clicked and before sorting the data.
     *
     * Parameters:
     * <ul>
     *  <li>index is the index name from colModel;</li>
     *  <li>iCol is the index of column;</li>
     *  <li>sortorder is the new sorting order - can be 'asc' or 'desc'.</li>
     * </ul>
     *
     * If this event return 'stop' the sort processing is stopped and you can define your own custom sorting.
     *
     * @param string $onSortCol
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setOnSortCol($onSortCol)
    {
        $this->__eventHandlers['onSortCol'] = $onSortCol;
        return $this;
    }

    /**
     * This event is called when the new table row is inserted.
     * It can be used to set additional style and class attributes of the row dynamically.
     *
     * Parameters:
     * <ul>
     *  <li>rowData is array with the cell data;</li>
     *  <li>currObj is the current row represented in the source like json or xml;</li>
     *  <li>rowId is the id of the row.</li>
     * </ul>
     *
     * The event should return a object something like this {“style” : “somestyle”, “class”: “someclass”}.
     *
     * Note that you can set any attribute to the row. It is important to note that the event does fire only
     * when a new row is inserted - this mean that it can not be used with methods which updated the row like setRowData.
     *
     * @return string
     */
    public function getRowAttr()
    {
        return $this->__eventHandlers['rowattr'] ?? null;
    }

    /**
     * This event is called when the new table row is inserted.
     * It can be used to set additional style and class attributes of the row dynamically.
     *
     * Parameters:
     * <ul>
     *  <li>rowData is array with the cell data;</li>
     *  <li>currObj is the current row represented in the source like json or xml;</li>
     *  <li>rowId is the id of the row.</li>
     * </ul>
     *
     * The event should return a object something like this {“style” : “somestyle”, “class”: “someclass”}.
     *
     * Note that you can set any attribute to the row. It is important to note that the event does fire only
     * when a new row is inserted - this mean that it can not be used with methods which updated the row like setRowData.
     *
     * @param string $rowattr
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setRowAttr($rowattr)
    {
        $this->__eventHandlers['rowattr'] = $rowattr;
        return $this;
    }

    /**
     * Event which is called when we start resize a column.
     *
     * Parameters:
     * <ul>
     *  <li>event is the event object;</li>
     *  <li>index is the index of the column in colModel.</li>
     * </ul>
     *
     * @return string
     */
    public function getResizeStart()
    {
        return $this->__eventHandlers['resizeStart'] ?? null;
    }

    /**
     * Event which is called when we start resize a column.
     *
     * Parameters:
     * <ul>
     *  <li>event is the event object;</li>
     *  <li>index is the index of the column in colModel.</li>
     * </ul>
     *
     * @param string $resizeStart
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setResizeStart($resizeStart)
    {
        $this->__eventHandlers['resizeStart'] = $resizeStart;
        return $this;
    }

    /**
     * Event which is called after the column is resized.
     *
     * Parameters:
     * <ul>
     *  <li>newwidth is the is the new width of the column;</li>
     *  <li>index is the index of the column in colModel.</li>
     * </ul>
     *
     * @return string
     */
    public function getResizeStop()
    {
        return $this->__eventHandlers['resizeStop'] ?? null;
    }

    /**
     * Event which is called after the column is resized.
     *
     * Parameters:
     * <ul>
     *  <li>newwidth is the is the new width of the column;</li>
     *  <li>index is the index of the column in colModel.</li>
     * </ul>
     *
     * @param string $resizeStart
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setResizeStop($resizeStart)
    {
        $this->__eventHandlers['resizeStop'] = $resizeStart;
        return $this;
    }

    /**
     * If set this event can serialize the data passed to the ajax request. The function should return the serialized data.
     * This event can be used when a custom data should be passed to the server - e.g - JSON string, XML string and etc.
     *
     * Parameters:
     * <ul>
     *  <li>postData.</li>
     * </ul>
     *
     * @return string
     */
    public function getSerializeGridData()
    {
        return $this->__eventHandlers['serializeGridData'] ?? null;
    }

    /**
     * If set this event can serialize the data passed to the ajax request. The function should return the serialized data.
     * This event can be used when a custom data should be passed to the server - e.g - JSON string, XML string and etc.
     *
     * Parameters:
     * <ul>
     *  <li>postData.</li>
     * </ul>
     *
     * @param string $serializeGridData
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setSerializeGridData($serializeGridData)
    {
        $this->__eventHandlers['serializeGridData'] = $serializeGridData;
        return $this;
    }


}
