<?php
namespace Rusproj\FreeJqGridConfigurator;

use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;
use Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons;

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
     * Config of the buttons located at the navigator panel.
     *
     * @var \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    private $__navigatorButtons = null;


    /**
     * The class that is used for applying different styles to alternate (zebra) rows in the grid.
     * This option is valid only if the altRows option is set to true.
     *
     * Default value: ''.
     */
    private $altclass = '';

    /**
     * Set a zebra-striped grid (alternate rows have different styles).
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $altRows = false;

    /**
     * When set to true encodes (html encode) the incoming (from server) and posted data (from editing modules).
     * For example < will be converted to &lt;.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $autoencode = false;

    /**
     * When set to true, the grid width is recalculated automatically to the width of the parent element.
     * This is done only initially when the grid is created. In order to resize the grid when the parent element
     * changes width you should apply custom JS-code and use the setGridWidth method for this purpose.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $autowidth = true;

    /**
     * Table caption.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $caption = '';

    /**
     * This option determines the padding + border width of the cell. Usually this should not be changed,
     * but if custom changes to the td element are made in the grid css file, this will need to be changed.
     * The initial value of 5 means paddingLef(2) + paddingRight (2) + borderLeft (1) = 5.
     *
     * Default value: 5.
     *
     * @var integer
     */
    private $cellLayout = 5;

    /**
     * Enables or disables cell editing.
     * See {@link http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $cellEdit = false;

    /**
     * Determines where the contents of the cell are saved.
     * Allowed values: '', 'remote', 'clientArray'.
     * See {@link http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $cellsubmit = '';

    /**
     * The URL where the cell is to be saved.
     * See {@link http://www.trirand.com/jqgridwiki/doku.php?id=wiki:cell_editing} for more details.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $cellurl = '';

    /**
     * Defines a set of properties which override the default values in colModel.
     * For example if you want to make all columns not sortable, then only one propery here can be specified
     * instead of specifying it in all columns in colModel.
     *
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
     *
     * Default value: [].
     *
     * @var array
     */
    private $colNames = [];

    /**
     * Local array of the data wich must be shown at the table (dataType = 'local').
     *
     * Default value: [].
     *
     * @var array
     */
    private $data = [];

    /**
     * The string of data when datatype parameter is set to xmlstring or jsonstring.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $datastr = '';

    /**
     * Data type.
     * Allowed values: xml, xmlstring, json, jsonstring, local, javascript, function, clientSide.
     *
     * Default value: 'json'.
     *
     * @var string
     */
    private $dataType = 'json';

//     /**
//      * This option should be set to true if an event or a plugin is attached to the table cell.
//      * The option uses jQuery empty for the the row and all its children elements.
//      * This of course has speed overhead, but prevents memory leaks.
//      * This option should be set to true if a sortable rows and/or columns are activated.
//      *
//      * Default value: false.
//      *
//      * @var boolean
//      */
//     private $deepempty = false;

//     /**
//      * Deselects currently selected row(s) when a sort is applied.
//      * Applicable only when used datatype : local.
//      *
//      * Default value: true.
//      *
//      * @var boolean
//      */
//     private $deselectAfterSort = true;

//     /**
//      * Determines the direction of text in the grid.
//      * When set to rtl (Right To Left) the grid automatically changes the direction of the text.
//      * It is important to note that in one page we can have two (or more) grids
//      * where the one can have direction ltr while the other can have direction rtl.
//      * This option works only in Firefox 3.x versions and Internet Explorer versions >=6.
//      * Currently Safari, Google Chrome and Opera do not completely support changing the direction to rtl.
//      * The most common problem in Firefox is that the default settings of the browser do not support rtl.
//      *
//      * Default value: 'ltr'.
//      *
//      * @var string
//      */
//     private $direction = 'ltr';

    /**
     * Defines the url for inline and form editing.
     * May be set to clientArray to manually post data to server.
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:inline_editing_s_clientarray
     *
     * @var string
     */
    private $editurl = '';

//     /**
//      * The string to display when the returned (or the current) number of records in the grid is zero.
//      * This option is valid only if viewrecords option is set to true.
//      *
//      * Default value: '' (See lang file).
//      *
//      * @var string
//      */
//     private $emptyrecords = '';

//     /**
//      * When true, the tree grid (see treeGrid) is expanded and/or collapsed when we click anywhere on the text in the expanded column.
//      * In this case it is not necessary to click exactly on the icon.
//      *
//      * Default value: true.
//      *
//      * @var string
//      */
//     private $ExpandColClick = true;

//     /**
//      * Indicates which column (name from colModel) should be used to expand the tree grid.
//      * If not set the first one is used. Valid only when the treeGrid option is set to true.
//      *
//      * Default value: ''.
//      *
//      * @var string
//      */
//     private $ExpandColumn = '';

//     /**
//      * If set to true this will place a footer table with one row below the gird records and above the pager.
//      * The number of columns equal those specified in colModel.
//      *
//      * Default value: false.
//      *
//      * @var boolean
//      */
//     private $footerrow = false;

//     /**
//      * If set to true, and a column's width is changed, the adjacent column (to the right)
//      * will resize so that the overall grid width is maintained (e.g., reducing the width of
//      * column 2 by 30px will increase the size of column 3 by 30px).
//      * In this case there is no horizontal scrollbar.
//      * Note: This option is not compatible with shrinkToFit option - i.e if shrinkToFit is set to false, forceFit is ignored.
//      *
//      * Default value: false.
//      *
//      * @var boolean
//      */
//     private $forceFit = false;

//     /**
//      * Determines the current state of the grid (i.e. when used with hiddengrid, hidegrid and caption options). 4
//      * Can have either of two states: visible or hidden.
//      *
//      * Default value: 'visible'.
//      *
//      * @var string
//      */
//     private $gridstate = 'visible';

//     /**
//      * In the previous versions of jqGrid including 3.4.X, reading a relatively large data set (number of rows >= 100 ) caused speed problems.
//      * The reason for this was that as every cell was inserted into the grid we applied about 5 to 6 jQuery calls to it.
//      * Now this problem is resolved; we now insert the entry row at once with a jQuery append.
//      * The result is impressive - about 3 to 5 times faster. What will be the result if we insert all the data at once?
//      * Yes, this can be done with a help of gridview option (set it to true). The result is a grid that is 5 to 10 times faster.
//      * Of course, when this option is set to true we have some limitations.
//      * If set to true we can not use treeGrid, subGrid, or the afterInsertRow event.
//      * If you do not use these three options in the grid you can set this option to true and enjoy the speed.
//      *
//      * Default value: false.
//      *
//      * @var boolean
//      */
//     private $gridview = false;

//     /**
//      * Enables grouping in grid.
//      *
//      * Default value: false.
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:grouping
//      *
//      * @var boolean
//      */
//     private $grouping = false;

    /**
     * CSS-фреймворк, используемый для стилизации таблиц.
     * Допустимые значения: '' (jQuery), 'bootstrap' или 'bootstrap4'. Значение по-умолчанию: ''.
     *
     * @var string
     */
    private $guiStyle = '';

    /**
     * Create tooltips on column headers.
     * Default value: false.
     *
     * @var boolean
     */
    private $headertitles = false;

//     /**
//      * The height of the grid. Can be set as number (in this case we mean pixels) or
//      * as percentage (only 100% is acceped) or value of auto is acceptable.
//      *
//      * Default value: 150.
//      *
//      * @var integer
//      */
//     private $height = 150;

//     /**
//      * If set to true the grid is initially is hidden.
//      * The data is not loaded (no request is sent) and only the caption layer is shown.
//      * When the show/hide button is clicked for the first time to show grid,
//      * the request is sent to the server, the data is loaded, and grid is shown.
//      * From this point we have a regular grid. This option has effect only if
//      * the caption property is not empty and the hidegrid property (see below) is set to true.
//      *
//      * Default value: false.
//      *
//      * @var boolean
//      */
//     private $hiddengrid = false;

//     /**
//      * Enables or disables the show/hide grid button, which appears on the right side of the caption layer.
//      * Takes effect only if the caption property is not an empty string.
//      *
//      * Default value: true.
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:how_it_works
//      *
//      * @var boolean
//      */
//     private $hidegrid = true;

//     /**
//      * When set to false the effect of mouse hovering over the grid data rows is disabled.
//      *
//      * Default value: true.
//      *
//      * @var boolean
//      */
//     private $hoverrows = true;

    /**
     * Specify to use another font that used by default at the table.
     *
     * Allowed values: '', 'fontAwesome', 'glyph', 'jQueryUI'.
     *
     * Default value: 'fontAwesome'.
     *
     * @var string
     */
    private $iconSet = 'fontAwesome';

    /**
     * The prefix of the row identifier (id attribute of the tr-element).
     *
     * Default value: ''.
     *
     * @var string
     */
    private $idPrefix = '';

    /**
     * The comparing of strings is case insensitive on sorting operations.
     *
     * Default value: true.
     *
     * @var boolean
     */
    private $ignoreCase = true;

//     /**
//      * An array used to add content to the data posted to the server when we are in inline editing.
//      *
//      * @var object
//      */
//     private $inlineData = (object)[];

//     /**
//      * An array which describes the structure of the expected json data.
//      *
//      * Default value: [].
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:retrieving_data#json_data
//      *
//      * @var array
//      */
//     private $jsonReader = []

//     /**
//      * If this flag is set to true, the grid loads the data from the server only once (using the appropriate datatype).
//      * After the first request, the datatype parameter is automatically changed to local and all further
//      * manipulations are done on the client side. The functions of the pager (if present) are disabled.
//      *
//      * Default value: false.
//      *
//      * @var boolean
//      */
//     private $loadonce = false;

//     /**
//      * This option controls what to do when an ajax operation is in progress.
//      *
//      * Allowed values:
//      *  <ul>
//      *   <li>disable - disables the jqGrid progress indicator. This way you can use your own indicator.</li>
//      *   <li>enable (default) - shows the text set in the loadtext property (default value is Loading…) in the center of the grid.</li>
//      *   <li>block - displays the text set in the loadtext property and blocks all actions in the grid until the ajax request completes. Note that this disables paging, sorting and all actions on toolbar, if any.</li>
//      *  </ul>
//      *
//      * Default value: 'enable'.
//      *
//      * @var string
//      */
//     private $loadui = 'enable';

//     /**
//      * Defines the type of request to make.
//      *
//      * Allowed values:
//      *  <ul>
//      *   <li>GET</li>
//      *   <li>POST</li>
//      *  <ul>
//      *
//      * Default value: 'GET'.
//      *
//      * @var string
//      */
//     private $mtype = 'GET';

    /**
     * This parameter makes sense only when the multiselect option is set to true.
     * Defines the key which should be pressed when we make multiselection.
     *
     * Allowed values:
     *  <ul>
     *   <li>shiftKey - the user should press Shift Key;</li>
     *   <li>altKey - the user should press Alt Key;</li>
     *   <li>ctrlKey - the user should press Ctrl Key.</li>
     *  <ul>
     *
     * Default value: ''.
     *
     * @var string
     */
    private $multikey = '';

    /**
     * This option works only when the multiselect option is set to true.
     * When multiselect is set to true, clicking anywhere on a row selects that row;
     * when multiboxonly is also set to true, the multiselection is done only when the checkbox is clicked (Yahoo style).
     * Clicking in any other row (suppose the checkbox is not clicked) deselects all rows and selects the current row.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $multiboxonly = false;

    /**
     * If this flag is set to true a multi selection of rows is enabled.
     * A new column at left side containing checkboxes is added. Can be used with any datatype option.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $multiselect = false;

    /**
     * Determines the width of the checkbox column created when the multiselect option is enabled.
     *
     * Default value: 20.
     *
     * @var integer
     */
    private $multiselectWidth = 20;

    /**
     * If set to true enables the multisorting. The options work if the datatype is local.
     * In case when the data is obtained from the server the sidx parameter contain the order clause.
     * It is a comma separated string in format field1 asc, field2 desc …, fieldN. Note that the last field does not not have asc or desc.
     * It should be obtained from sord parameter when the option is true the behavior is a s follow.
     * The first click of the header field sort the field depending on the firstsortoption parameter in colModel or sortorder grid parameter.
     * The next click sort it in reverse order. The third click removes the sorting from this field.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $multiSort = false;

//     /**
//      * Set the initial page number when we make the request.
//      * This parameter is passed to the url for use by the server routine retrieving the data.
//      *
//      * Default value: 1.
//      *
//      * @var integer
//      */
//     private $page = 1;

    /**
     * Defines that we want to use a pager bar to navigate through the records.
     * This must be a valid HTML element or True (in this case pager will be located after table wrapper).
     * Note that the navigation layer (the “pager” div) can be positioned anywhere you want, determined by your HTML.
     *
     * Default value: true.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:pager
     *
     * @var boolean|string
     */
    private $pager = true;

//     /**
//      * Determines the position of the pager in the grid.
//      * By default the pager element when created is divided in 3 parts
//      * (one part for pager, one part for navigator buttons and one part for record information).
//      *
//      * Default value: 'center'.
//      *
//      * @var string
//      */
//     private $pagerpos = 'center';

//     /**
//      * Determines if the Pager buttons should be shown if pager is available.
//      * Also valid only if pager is set correctly. The buttons are placed in the pager bar.
//      *
//      * Default value: true.
//      *
//      * @var boolean
//      */
//     private $pgbuttons = true;

//     /**
//      * Determines if the input box, where the user can change the number of the requested page, should be available.
//      * The input box appears in the pager bar.
//      *
//      * Default value: true.
//      *
//      * @var boolean
//      */
//     private $pginput = true;

//     /**
//      * This array is appended directly to the url.
//      * This is an associative array and can be used this way: {name1:value1…}.
//      * See API methods for manipulation.
//      *
//      * Default value: [].
//      *
//      * @var array
//      */
//     private $postData = [];

    /**
     * Determines the position of the record information in the pager.
     *
     * Allowed values: 'left', 'center', 'right'.
     *
     * Default value: 'right'.
     *
     * @var string
     */
    private $recordpos = 'right';

//     /**
//      * Assigns a class to columns that are resizable so that we can show a resize handle only for ones that are resizable.
//      *
//      * Default value: ''
//      *
//      * @var string
//      */
//     private $resizeclass = '';

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

//     /**
//      * When set this parameter can instruct the server to load the total number of rows needed to work on.
//      * Note that rowNum determines the total records displayed in the grid,
//      * while rowTotal determines the total number of rows on which we can operate.
//      * When this parameter is set, we send an additional parameter to the server named totalrows.
//      * You can check for this parameter, and if it is available you can replace the rows parameter with this one.
//      * Mostly this parameter can be combined with loadonce parameter set to true.
//      *
//      * Default value: ''.
//      *
//      * @var integer
//      */
//     private $rowTotal = '';

//     /**
//      * Determines the width of the row number column if rownumbers option is set to true.
//      *
//      * Default value: 25.
//      *
//      * @var integer
//      */
//     private $rownumWidth = 25;

//     /**
//      * Creates dynamic scrolling grids. When enabled, the pager elements are disabled and we can
//      * use the vertical scrollbar to load data. When set to true the grid will always hold all the
//      * items from the start through to the latest point ever visited.
//      * When scroll is set to an integer value (example 1), the grid will just hold the visible lines.
//      * This allow us to load the data in portions whitout caring about memory leaks.
//      * In addition to this we have an optional extension to the server protocol: npage (see prmNames array).
//      * If you set the npage option in prmNames, then the grid will sometimes request more than
//      * one page at a time; if not, it will just perform multiple GET requests.
//      * Note that this option is not compatible when a grid parameter height is set to auto or 100%.
//      *
//      * Default value: false.
//      *
//      * @var boolean
//      */
//     private $scroll = false;

//     /**
//      * Determines the width of the vertical scrollbar.
//      * Since different browsers interpret this width differently (and it is difficult to calculate it in all browsers) this can be changed.
//      *
//      * Default value: 18.
//      *
//      * @var integer
//      */
//     private $scrollOffset = 18;

//     /**
//      * This controls the timeout handler when scroll is set to 1.
//      *
//      * Default value: 200.
//      *
//      * @var integer
//      */
//     private $scrollTimeout = 200;

//     /**
//      * When enabled, selecting a row with setSelection scrolls the grid so that the selected row is visible.
//      * This is especially useful when we have a verticall scrolling grid and we use form editing with navigation buttons (next or previous row).
//      * On navigating to a hidden row, the grid scrolls so that the selected row becomes visible.
//      *
//      * Default value: false.
//      *
//      * @var boolean
//      */
//     private $scrollrows = false;

//     /**
//      *
//      *
//      * @var array
//      */
//     private $searching = ['defaultSearch' => 'cn'];

//     /**
//      * This option, if set, defines how the the width of the columns of the grid should be re-calculated,
//      * taking into consideration the width of the grid. If this value is true, and the width of the columns
//      * is also set, then every column is scaled in proportion to its width. For example, if we define
//      * two columns with widths 80 and 120 pixels, but want the grid to have a width of 300 pixels,
//      * then the columns will stretch to fit the entire grid, and the extra width assigned to them will
//      * depend on the width of the columns themselves and the extra width available. The re-calculation is
//      * done as follows: the first column gets the width (300(new width)/200(sum of all widths))*80(first column width) = 120 pixels,
//      * and the second column gets the width (300(new width)/200(sum of all widths))*120(second column width) = 180 pixels.
//      * Now the widths of the columns sum up to 300 pixels, which is the width of the grid.
//      * If the value is false and the value in width option is set, then no re-sizing happens whatsoever.
//      * So in this example, if shrinkToFit is set to false, column one will have a width of 80 pixels,
//      * column two will have a width of 120 pixels and the grid will retain the width of 300 pixels.
//      * If the value of shrinkToFit is an integer, the width is calculated according to it.
//      * FIXME - The effect of using an integer can be elaborated.
//      *
//      * Default value: true.
//      *
//      * @var boolean
//      */
//     private $shrinkToFit = true;

    /**
     * When set to true, this option allows reordering columns by dragging and dropping them with the mouse.
     * Since this option uses the jQuery UI sortable widget, be sure to load this widget and its related
     * files in the HTML head tag of the page. Also, be sure to select the jQuery UI Addons option under
     * the jQuery UI Addon Methods section while downloading jqGrid if you want to use this facility.
     * Note: The colModel object also has a property called sortable, which specifies if the grid
     * data can be sorted on a particular column or not.
     *
     * Default value: false.
     *
     * @var boolean
     */
    private $sortable = false;

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

//     /**
//      * If set to true this enables using a sub-grid. If the subGrid option is enabled, an additional
//      * column at left side is added to the basic grid. This column contains a 'plus' image which
//      * indicates that the user can click on it to expand the row. By default all rows are collapsed.
//      *
//      * Default value: false.
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:subgrid
//      *
//      * @var boolean
//      */
//     private $subGrid = false;

//     /**
//      * A set of additional options for the subgrid.
//      *
//      * Default value: [].
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:subgrid
//      *
//      * @var array
//      */
//     private $subGridOptions = [];

//     /**
//      * This property, which describes the model of the subgrid, has an effect only if the subGrid property is set to true.
//      * It is an array in which we describe the column model for the subgrid data.
//      *
//      * Default value: [].
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:subgrid
//      *
//      * @var array
//      */
//     private $subGridModel = [];

//     /**
//      * This option allows loading a subgrid as a service. If not set, the datatype parameter of the parent grid is used.
//      *
//      * Default value: null.
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:subgrid
//      *
//      * @var mixed
//      */
//     private $subGridType = null;

//     /**
//      * This option has effect only if the subGrid option is set to true.
//      * This option points to the url from which we get the data for the subgrid.
//      * jqGrid adds the id of the row to this url as parameter.
//      * If there is a need to pass additional parameters, use the params option in subGridModel.
//      *
//      * Default value: ''.
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:subgrid
//      *
//      * @var string
//      */
//     private $subGridUrl = '';

//     /**
//      * Defines the width of the sub-grid column if subgrid is enabled.
//      *
//      * Default value: 20.
//      *
//      * @var integer
//      */
//     private $subGridWidth = 20;

//     /**
//      * This option defines the toolbar of the grid.
//      * This is an array with two elements in which the first element's value enables the toolbar
//      * and the second defines the position relative to the body layer (table data).
//      * Possible values are top, bottom, and both.
//      * When we set it like toolbar: [true,“both”] two toolbars are created – one on the top
//      * of table data and the other at the bottom of the table data. When we have two toolbars,
//      * then we create two elements (div). The id of the top bar is constructed by concatenating
//      * the string “t_” and the id of the grid, like “t_” + id_of_the_grid and the id of the bottom
//      * toolbar is constructed by concatenating the string “tb_” and the id of the grid, like “tb_” + id_of_the grid.
//      * In the case where only one toolbar is created, we have the id as “t_” + id_of_the_grid,
//      * independent of where this toolbar is located (top or bottom).
//      *
//      * Default value: [false, ''].
//      *
//      * @var array
//      */
//     private $toolbar = [false, ''];

    /**
     * Allow three state sorting (asc, desc, none).
     * Default value: true.
     *
     * @var boolean
     */
    private $threeStateSort = true;

    /**
     * Show the pager navigation bar on top of the grid.
     * Default value: false.
     *
     * @var boolean
     */
    private $toppager = false;

//     /**
//      * Gives the initial datatype (see datatype option).
//      * Usually this should not be changed. During the reading process this option is equal to the datatype option.
//      *
//      * Default value: null.
//      *
//      * @var mixed
//      */
//     private $treedatatype = null;

//     /**
//      * Enables (disables) the tree grid format.
//      *
//      * Default value: false.
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:treegrid
//      *
//      * @var boolean
//      */
//     private $treeGrid = false;

//     /**
//      * Deteremines the method used for the treeGrid.
//      *
//      * Allowed values:
//      * <ul>
//      *  <li>'nested';</li>
//      *  <li>'adjacency'.</li>
//      * </ul>
//      *
//      * Default value: 'nested'.
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:treegrid
//      *
//      * @var string
//      */
//     private $treeGridModel = 'nested';

//     /**
//      * This array sets the icons used in the tree grid.
//      * The icons should be a valid names from UI theme roller images.
//      *
//      * The default values are: {plus:'ui-icon-triangle-1-e',minus:'ui-icon-triangle-1-s',leaf:'ui-icon-radio-off'}.
//      *
//      * @var array
//      */
//     private $treeIcons = [];

//     /**
//      * Extends the colModel defined in the basic grid. The fields described here are appended to end of the colModel array and are hidden.
//      * This means that the data returned from the server should have values for these fields.
//      *
//      * Default value: [].
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:treegrid
//      *
//      * @var array
//      */
//     private $treeReader = [];

//     /**
//      * Defines the level where the root element begins when treeGrid is enabled.
//      *
//      * Default value: 0.
//      *
//      * @var integer
//      */
//     private $tree_root_level = 0;

    /**
     * URL to retrive table data.
     *
     * @var string
     */
    private $url = '';

//     /**
//      * This array contains custom information from the request. Can be used at any time.
//      *
//      * Default value: [].
//      *
//      * @var array
//      */
//     private $userData = [];

//     /**
//      * When set to true we directly place the user data array userData in the footer.
//      * The rules are as follows: If the userData array contains a name which matches any name defined in colModel,
//      * then the value is placed in that column. If there are no such values nothing is placed.
//      * Note that if this option is used we use the current formatter options (if available) for that column.
//      *
//      * Default value: false.
//      *
//      * @var boolean
//      */
//     private $userDataOnFooter = false;

    /**
     * Show the status of the page in the pager navigation bar.
     * Default value: true.
     *
     * @var boolean
     */
    private $viewrecords = true;

//     /**
//      * The purpose of this parameter is to define a different look and behavior for the
//      * sorting icons (up/down arrows) that appear in the column headers.
//      * This parameter is an array with the following default options viewsortcols : [false,'vertical',true].
//      * The first parameter determines if sorting icons should be visible on all the columns
//      * that have the sortable property set to true. Setting this value to true could be useful
//      * if you want to indicate to the user that (s)he can sort on that particular column.
//      * The default of false sets the icon to be visible only on the column on which that data
//      * has been last sorted. Setting this parameter to true causes all icons in all sortable columns to be visible.
//      * The second parameter determines how icons should be placed - vertical means that the sorting
//      * arrows are one under the other. 'horizontal' means that the arrows should be next to one another.
//      * The third parameter determines the click functionality. If set to true the data is sorted if
//      * the user clicks anywhere in the column's header, not only the icons. If set to false the data
//      * is sorted only when the sorting icons in the headers are clicked.
//      * Important: If you are setting the third element to false, make sure that you set the first element to true;
//      * if you don't, the icons will not be visible and the user will not know where to click to be able to
//      * sort since clicking just anywhere in the header will not guarantee a sort.
//      *
//      * Default value: [].
//      *
//      * @var array
//      */
//     private $viewsortcols = [];

//     /**
//      * If this option is not set, the width of the grid is the sum of the widths of the columns defined in the colModel (in pixels).
//      * If this option is set, the initial width of each column is set according to the value of the shrinkToFit option.
//      *
//      * Default value: ''.
//      *
//      * @var string
//      */
//     private $width = '';

//     /**
//      * An array which describes the structure of the expected xml data.
//      *
//      * Default value: [].
//      *
//      * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:retrieving_data#xml_data
//      *
//      * @var array
//      */
//     private $xmlReader = [];

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

        if (!$this->altRows) {
            unset($_config['altRows'], $_config['altclass']);
        }

        if (empty($this->caption)) {
            unset($_config['caption'], $_config['hiddengrid'], $_config['hidegrid']);
        }

        if (!$this->cellEdit) {
            unset($_config['cellEdit'], $_config['cellLayout'], $_config['cellsubmit'], $_config['cellurl'], $_config['ajaxCellOptions']);
        }

        if (count($this->colNames) !== count($this->colModel)) {
            unset($_config['colNames']);
        }

        switch ($this->dataType) {
            case 'xml':
                unset($_config['deselectAfterSort'], $_config['datastr'], $_config['jsonReader']);
                break;
            case 'xmlstring':
                unset($_config['deselectAfterSort'], $_config['jsonReader']);
                break;
            case 'json':
                unset($_config['deselectAfterSort'], $_config['datastr'], $_config['xmlReader']);
                break;
            case 'jsonstring':
                unset($_config['deselectAfterSort'], $_config['xmlReader']);
                break;
            case 'local':
                unset($_config['datastr'], $_config['jsonReader'], $_config['xmlReader']);
                break;
            case 'javascript':
                unset($_config['deselectAfterSort'], $_config['datastr'], $_config['jsonReader'], $_config['xmlReader']);
                break;
            case 'function':
                unset($_config['deselectAfterSort'], $_config['datastr'], $_config['jsonReader'], $_config['xmlReader']);
                break;
            case 'clientSide':
                unset($_config['deselectAfterSort'], $_config['datastr'], $_config['jsonReader'], $_config['xmlReader']);
                break;
        }

        if (count($this->data) > 0) {
            $_config['data'] = $this->data;
        }

//         if (!$this->hidegrid) {
//             unset($_config['hiddengrid']);
//         }

        if (!$this->multiselect) {
            unset($_config['multiselect'], $_config['multikey'], $_config['multiboxonly'], $_config['multiselectWidth']);
        }

        if (empty($this->pager) || $this->pager === false) {
            unset($_config['pager'], $_config['pagerpos'], $_config['pgbuttons'], $_config['pginput'],
                    $_config['rowList'], $_config['rowNum'], $_config['recordpos'], $_config['viewrecords'], $_config['__eventHandler__navigatorButtons']);
        }

        if (!$this->rownumbers) {
            unset($_config['rownumbers'], $_config['rownumWidth']);
        }

//         if ($this->scroll === false) {
//             unset($_config['scroll'], $_config['scrollOffset'], $_config['scrollTimeout'], $_config['scrollrows']);
//         }

//         if (!$this->sortable) {
//             unset($_config['sortable']);
//         }

//         if (!$this->subGrid) {
//             unset($_config['subGrid'], $_config['subGridOptions'], $_config['subGridModel'], $_config['subGridType'],
//                     $_config['subGridUrl'], $_config['subGridWidth']);
//         }

//         if (!$this->toolbar[0]) {
//             unset($_config['toolbar']);
//         }

//         if (!$this->treeGrid) {
//             unset($_config['treeGrid'], $_config['ExpandColumn'], $_config['treedatatype'], $_config['treeIcons'], $_config['treeReader'], $_config['tree_root_level']);
//         }

        if (!$this->viewrecords) {
            unset($_config['viewrecords'], $_config['recordpos']);
        }

//         if (!$this->userDataOnFooter) {
//             unset($_config['userDataOnFooter'], $_config['userData']);
//         }

        return $_config;
    }

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
     *
     * Allowed values: 'left', 'center', 'right'.
     *
     * Default value: 'right'.
     *
     * @return string
     */
    public function getRecordInfoPos()
    {
        return $this->recordpos;
    }

    /**
     * Determines the position of the record information in the pager.
     *
     * Allowed values: 'left', 'center', 'right'.
     *
     * Default value: 'right'.
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
     * Defines that we want to use a pager bar to navigate through the records.
     * This must be a valid HTML element or True (in this case pager will be located after table wrapper).
     * Note that the navigation layer (the “pager” div) can be positioned anywhere you want, determined by your HTML.
     *
     * Default value: true.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:pager
     *
     * @return boolean|string
     */
    public function getPager()
    {
        return $this->pager;
    }

    /**
     * Defines that we want to use a pager bar to navigate through the records.
     * This must be a valid HTML element or True (in this case pager will be located after table wrapper).
     * Note that the navigation layer (the “pager” div) can be positioned anywhere you want, determined by your HTML.
     *
     * Default value: true.
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:pager
     *
     * @param boolean|string $pager
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setPager($pager)
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
     * When set to true, this option allows reordering columns by dragging and dropping them with the mouse.
     * Since this option uses the jQuery UI sortable widget, be sure to load this widget and its related
     * files in the HTML head tag of the page. Also, be sure to select the jQuery UI Addons option under
     * the jQuery UI Addon Methods section while downloading jqGrid if you want to use this facility.
     * Note: The colModel object also has a property called sortable, which specifies if the grid
     * data can be sorted on a particular column or not.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function isSortable()
    {
        return $this->sortable;
    }

    /**
     * When set to true, this option allows reordering columns by dragging and dropping them with the mouse.
     * Since this option uses the jQuery UI sortable widget, be sure to load this widget and its related
     * files in the HTML head tag of the page. Also, be sure to select the jQuery UI Addons option under
     * the jQuery UI Addon Methods section while downloading jqGrid if you want to use this facility.
     * Note: The colModel object also has a property called sortable, which specifies if the grid
     * data can be sorted on a particular column or not.
     *
     * Default value: false.
     *
     * @param boolean $sortable
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setSortable($sortable)
    {
        $this->sortable = $sortable;
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
     * This parameter makes sense only when the multiselect option is set to true.
     * Defines the key which should be pressed when we make multiselection.
     *
     * Allowed values:
     *  <ul>
     *   <li>shiftKey - the user should press Shift Key;</li>
     *   <li>altKey - the user should press Alt Key;</li>
     *   <li>ctrlKey - the user should press Ctrl Key.</li>
     *  <ul>
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getMultikey()
    {
        return $this->multikey;
    }

    /**
     * This parameter makes sense only when the multiselect option is set to true.
     * Defines the key which should be pressed when we make multiselection.
     *
     * Allowed values:
     *  <ul>
     *   <li>shiftKey - the user should press Shift Key;</li>
     *   <li>altKey - the user should press Alt Key;</li>
     *   <li>ctrlKey - the user should press Ctrl Key.</li>
     *  <ul>
     *
     * Default value: ''.
     *
     * @param string $multikey
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setMultikey($multikey)
    {
        $this->multikey = $multikey;
        return $this;
    }

    /**
     * This option works only when the multiselect option is set to true.
     * When multiselect is set to true, clicking anywhere on a row selects that row;
     * when multiboxonly is also set to true, the multiselection is done only when the checkbox is clicked (Yahoo style).
     * Clicking in any other row (suppose the checkbox is not clicked) deselects all rows and selects the current row.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getMultiboxOnly()
    {
        return $this->multiboxonly;
    }

    /**
     * This option works only when the multiselect option is set to true.
     * When multiselect is set to true, clicking anywhere on a row selects that row;
     * when multiboxonly is also set to true, the multiselection is done only when the checkbox is clicked (Yahoo style).
     * Clicking in any other row (suppose the checkbox is not clicked) deselects all rows and selects the current row.
     *
     * Default value: false.
     *
     * @param boolean $multiboxonly
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setMultiboxOnly($multiboxOnly)
    {
        $this->multiboxonly = $multiboxOnly;
        return $this;
    }

    /**
     * If this flag is set to true a multi selection of rows is enabled.
     * A new column at left side containing checkboxes is added. Can be used with any datatype option.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getMultiselect()
    {
        return $this->multiselect;
    }

    /**
     * If this flag is set to true a multi selection of rows is enabled.
     * A new column at left side containing checkboxes is added. Can be used with any datatype option.
     *
     * Default value: false.
     *
     * @param boolean $multiselect
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setMultiselect($multiselect)
    {
        $this->multiselect = $multiselect;
        return $this;
    }

    /**
     * Determines the width of the checkbox column created when the multiselect option is enabled.
     *
     * Default value: 20.
     *
     * @return number
     */
    public function getMultiselectWidth()
    {
        return $this->multiselectWidth;
    }

    /**
     * Determines the width of the checkbox column created when the multiselect option is enabled.
     *
     * Default value: 20.
     *
     * @param number $multiselectWidth
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setMultiselectWidth($multiselectWidth)
    {
        $this->multiselectWidth = $multiselectWidth;
        return $this;
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
     * If set to true enables the multisorting. The options work if the datatype is local.
     * In case when the data is obtained from the server the sidx parameter contain the order clause.
     * It is a comma separated string in format field1 asc, field2 desc …, fieldN. Note that the last field does not not have asc or desc.
     * It should be obtained from sord parameter when the option is true the behavior is a s follow.
     * The first click of the header field sort the field depending on the firstsortoption parameter in colModel or sortorder grid parameter.
     * The next click sort it in reverse order. The third click removes the sorting from this field.
     *
     * Default value: false.
     *
     * @return boolean
     */
    public function getAllowMultiSort()
    {
        return $this->multiSort;
    }

    /**
     * If set to true enables the multisorting. The options work if the datatype is local.
     * In case when the data is obtained from the server the sidx parameter contain the order clause.
     * It is a comma separated string in format field1 asc, field2 desc …, fieldN. Note that the last field does not not have asc or desc.
     * It should be obtained from sord parameter when the option is true the behavior is a s follow.
     * The first click of the header field sort the field depending on the firstsortoption parameter in colModel or sortorder grid parameter.
     * The next click sort it in reverse order. The third click removes the sorting from this field.
     *
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
     * Defines the url for inline and form editing.
     * May be set to clientArray to manually post data to server.
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:inline_editing_s_clientarray
     *
     * @return string
     */
    public function getEditUrl()
    {
        return $this->editurl;
    }

    /**
     * Defines the url for inline and form editing.
     * May be set to clientArray to manually post data to server.
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:inline_editing_s_clientarray
     *
     * @param string $editurl
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setEditUrl($editurl)
    {
        $this->editurl = $editurl;
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

    /**
     * Config of the buttons located at the navigator panel.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons
     */
    public function getNavigatorButtons()
    {
        if (is_null($this->__navigatorButtons)) {
            $this->__navigatorButtons = new NavigatorButtons();
        }

        return $this->__navigatorButtons;
    }

    /**
     * Config of the buttons located at the navigator panel.
     *
     * @param \Rusproj\FreeJqGridConfigurator\JqGrid\NavigatorButtons $navigatorButtons
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setNavigatorButtons($navigatorButtons)
    {
        $this->__navigatorButtons = $navigatorButtons;
        return $this;
    }

    /**
     * This event fires after every inserted row.
     *
     * JS-function parameters:
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
    private $__eventHandler__afterInsertRow = '';

    /**
     * This event fire before proccesing the data from the server.
     *
     * JS-function parameters:
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
    private $__eventHandler__beforeProcessing = '';

    /**
     * This event fire before requesting any data. Also does not fire if datatype is function. If the event return false the request is not made to the server.
     *
     * JS-function parameters: none.
     *
     * @return string
     */
    private $__eventHandler__beforeRequest = '';

    /**
     * This event fire when the user click on the row, but before select them.
     *
     * JS-function parameters:
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
    private $__eventHandler__beforeSelectRow = '';

    /**
     * This fires after all the data is loaded into the grid and all other processes are complete.
     * Also the event fires independent from the datatype parameter and after sorting paging and etc.
     *
     * JS-function parameters: none.
     *
     * @return string
     */
    private $__eventHandler__gridComplete = '';

    /**
     * A pre-callback to modify the XMLHttpRequest object (xhr) before it is sent. Use this to set custom headers etc.
     *
     * JS-function parameters:
     * <ul>
     *  <li>xhr;</li>
     *  <li>settings.</li>
     * </ul>
     *
     * Returning false will cancel the request.
     *
     * @return string
     */
    private $__eventHandler__loadBeforeSend = '';

    /**
     * This event is executed immediately after every server request.
     *
     * JS-function parameters:
     * <ul>
     *  <li>data Data from the response depending on datatype grid parameter.</li>
     * </ul>
     *
     * @return string
     */
    private $__eventHandler__loadComplete = '';

    /**
     * A function to be called if the request fails.
     *
     * JS-function parameters:
     * <ul>
     *  <li>xhr - XMLHttpRequest object;</li>
     *  <li>status - a string describing the type of error;</li>
     *  <li>error - an optional exception object.</li>
     * </ul>
     *
     * @return string
     */
    private $__eventHandler__loadError = '';

    /**
     * Fires when click on particular cell in the grid.
     *
     * JS-function parameters:
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
    private $__eventHandler__onCellSelect = '';

    /**
     * Raised immediately after row was double clicked.
     *
     * JS-function parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>iRow is the index of the row (do not mix this with the rowid);</li>
     *  <li>iCol is the index of the cell;</li>
     *  <li>e is the event object.</li>
     * </ul>
     *
     * @return string
     */
    private $__eventHandler__ondblClickRow = '';

    /**
     * Fire after clicking to hide or show grid (hidegrid:true).
     *
     * JS-function parameters:
     * <ul>
     *  <li>gridstate is the state of the grid - can have two values - visible or hidden.</li>
     * </ul>
     *
     * @return string
     */
    private $__eventHandler__onHeaderClick = '';

    /**
     * This event fires after click on [page button] and before populating the data.
     * Also works when the user enters a new page number in the page input box (and presses [Enter])
     * and when the number of requested records is changed via the select box.
     *
     * JS-function parameters:
     * <ul>
     *  <li>pgButton.</li>
     * </ul>
     *
     * If this event return 'stop' the processing is stopped and you can define your own custom paging.
     *
     * @return string
     */
    private $__eventHandler__onPaging = '';

    /**
     * Raised immediately after row was right clicked.
     *
     * JS-function parameters:
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
    private $__eventHandler__onRightClickRow = '';

    /**
     * This event fires when multiselect option is true and you click on the header checkbox.
     *
     * JS-function parameters:
     * <ul>
     *  <li>aRowids array of the selected rows (rowid's);</li>
     *  <li>status - boolean variable determining the status of the header check box - true if checked, false if not checked.</li>
     * </ul>
     *
     * Note that the aRowids alway contain the ids when header checkbox is checked or unchecked.
     *
     * @return string
     */
    private $__eventHandler__onSelectAll = '';

    /**
     * Raised immediately after row was clicked.
     *
     * JS-function parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>status is the status of the selection;</li>
     *  <li>e is the event object. Can be used when multiselect is set to true. true if the row is selected, false if the row is deselected.</li>
     * </ul>
     *
     * @return string
     */
    private $__eventHandler__onSelectRow = '';

    /**
     * Raised immediately after sortable column was clicked and before sorting the data.
     *
     * JS-function parameters:
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
    private $__eventHandler__onSortCol = '';

    /**
     * This event is called when the new table row is inserted.
     * It can be used to set additional style and class attributes of the row dynamically.
     *
     * JS-function parameters:
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
    private $__eventHandler__rowattr = '';

    /**
     * Event which is called when we start resize a column.
     *
     * JS-function parameters:
     * <ul>
     *  <li>event is the event object;</li>
     *  <li>index is the index of the column in colModel.</li>
     * </ul>
     *
     * @return string
     */
    private $__eventHandler__resizeStart = '';

    /**
     * Event which is called after the column is resized.
     *
     * JS-function parameters:
     * <ul>
     *  <li>newwidth is the is the new width of the column;</li>
     *  <li>index is the index of the column in colModel.</li>
     * </ul>
     *
     * @return string
     */
    private $__eventHandler__resizeStop = '';

    /**
     * If set this event can serialize the data passed to the ajax request. The function should return the serialized data.
     * This event can be used when a custom data should be passed to the server - e.g - JSON string, XML string and etc.
     *
     * JS-function parameters:
     * <ul>
     *  <li>postData.</li>
     * </ul>
     *
     * @return string
     */
    private $__eventHandler__serializeGridData = '';

    /**
     * This event fires after every inserted row.
     *
     * JS-function parameters:
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
    public function getAfterInsertRowEventHandler()
    {
        return $this->__eventHandler__afterInsertRow;
    }

    /**
     * This event fires after every inserted row.
     *
     * JS-function parameters:
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
    public function setAfterInsertRowEventHandler($afterInsertRow)
    {
        $this->__eventHandler__afterInsertRow = $afterInsertRow;
        return $this;
    }

    /**
     * This event fire before proccesing the data from the server.
     *
     * JS-function parameters:
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
    public function getBeforeProcessingEventHandler()
    {
        return $this->__eventHandler__beforeProcessing;
    }

    /**
     * This event fire before proccesing the data from the server.
     *
     * JS-function parameters:
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
    public function setBeforeProcessingEventHandler($beforeProcessing)
    {
        $this->__eventHandler__beforeProcessing = $beforeProcessing;
        return $this;
    }

    /**
     * This event fire before requesting any data. Also does not fire if datatype is function. If the event return false the request is not made to the server.
     *
     * JS-function parameters: none.
     *
     * @return string
     */
    public function getBeforeRequestEventHandler()
    {
        return $this->__eventHandler__beforeRequest;
    }

    /**
     * This event fire before requesting any data. Also does not fire if datatype is function. If the event return false the request is not made to the server.
     *
     * JS-function parameters: none.
     *
     * @param string $beforeRequest
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setBeforeRequestEventHandler($beforeRequest)
    {
        $this->__eventHandler__beforeRequest = $beforeRequest;
        return $this;
    }

    /**
     * This event fire when the user click on the row, but before select them.
     *
     * JS-function parameters:
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
    public function getBeforeSelectRowEventHandler()
    {
        return $this->__eventHandler__beforeSelectRow;
    }

    /**
     * This event fire when the user click on the row, but before select them.
     *
     * JS-function parameters:
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
    public function setBeforeSelectRowEventHandler($beforeSelectRow)
    {
        $this->__eventHandler__beforeSelectRow = $beforeSelectRow;
        return $this;
    }

    /**
     * This fires after all the data is loaded into the grid and all other processes are complete.
     * Also the event fires independent from the datatype parameter and after sorting paging and etc.
     *
     * JS-function parameters: none.
     *
     * @return string
     */
    public function getGridCompleteEventHandler()
    {
        return $this->__eventHandler__gridComplete;
    }

    /**
     * This fires after all the data is loaded into the grid and all other processes are complete.
     * Also the event fires independent from the datatype parameter and after sorting paging and etc.
     *
     * JS-function parameters: none.
     *
     * @param string $gridComplete
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setGridCompleteEventHandler($gridComplete)
    {
        $this->__eventHandler__gridComplete = $gridComplete;
        return $this;
    }

    /**
     * A pre-callback to modify the XMLHttpRequest object (xhr) before it is sent. Use this to set custom headers etc.
     *
     * JS-function parameters:
     * <ul>
     *  <li>xhr;</li>
     *  <li>settings.</li>
     * </ul>
     *
     * Returning false will cancel the request.
     *
     * @return string
     */
    public function getLoadBeforeSendEventHandler()
    {
        return $this->__eventHandler__loadBeforeSend;
    }

    /**
     * A pre-callback to modify the XMLHttpRequest object (xhr) before it is sent. Use this to set custom headers etc.
     *
     * JS-function parameters:
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
    public function setLoadBeforeSendEventHandler($loadBeforeSend)
    {
        $this->__eventHandler__loadBeforeSend = $loadBeforeSend;
        return $this;
    }

    /**
     * This event is executed immediately after every server request.
     *
     * JS-function parameters:
     * <ul>
     *  <li>data Data from the response depending on datatype grid parameter.</li>
     * </ul>
     *
     * @return string
     */
    public function getLoadCompleteEventHandler()
    {
        return $this->__eventHandler__loadComplete;
    }

    /**
     * This event is executed immediately after every server request.
     *
     * JS-function parameters:
     * <ul>
     *  <li>data Data from the response depending on datatype grid parameter.</li>
     * </ul>
     *
     * @param string $loadComplete
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setLoadCompleteEventHandler($loadComplete)
    {
        $this->__eventHandler__loadComplete = $loadComplete;
        return $this;
    }

    /**
     * A function to be called if the request fails.
     *
     * JS-function parameters:
     * <ul>
     *  <li>xhr - XMLHttpRequest object;</li>
     *  <li>status - a string describing the type of error;</li>
     *  <li>error - an optional exception object.</li>
     * </ul>
     *
     * @return string
     */
    public function getLoadErrorEventHandler()
    {
        return $this->__eventHandler__loadError;
    }

    /**
     * A function to be called if the request fails.
     *
     * JS-function parameters:
     * <ul>
     *  <li>xhr - XMLHttpRequest object;</li>
     *  <li>status - a string describing the type of error;</li>
     *  <li>error - an optional exception object.</li>
     * </ul>
     *
     * @param string $loadError
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setLoadErrorEventHandler($loadError)
    {
        $this->__eventHandler__loadError = $loadError;
        return $this;
    }

    /**
     * Fires when click on particular cell in the grid.
     *
     * JS-function parameters:
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
    public function getOnCellSelectEventHandler()
    {
        return $this->__eventHandler__onCellSelect;
    }

    /**
     * Fires when click on particular cell in the grid.
     *
     * JS-function parameters:
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
    public function setOnCellSelectEventHandler($onCellSelect)
    {
        $this->__eventHandler__onCellSelect = $onCellSelect;
        return $this;
    }

    /**
     * Raised immediately after row was double clicked.
     *
     * JS-function parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>iRow is the index of the row (do not mix this with the rowid);</li>
     *  <li>iCol is the index of the cell;</li>
     *  <li>e is the event object.</li>
     * </ul>
     *
     * @return string
     */
    public function getOnDblClickRowEventHandler()
    {
        return $this->__eventHandler__ondblClickRow;
    }

    /**
     * Raised immediately after row was double clicked.
     *
     * JS-function parameters:
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
    public function setOnDblClickRowEventHandler($ondblClickRow)
    {
        $this->__eventHandler__ondblClickRow = $ondblClickRow;
        return $this;
    }

    /**
     * Fire after clicking to hide or show grid (hidegrid:true).
     *
     * JS-function parameters:
     * <ul>
     *  <li>gridstate is the state of the grid - can have two values - visible or hidden.</li>
     * </ul>
     *
     * @return string
     */
    public function getOnHeaderClickEventHandler()
    {
        return $this->__eventHandler__onHeaderClick;
    }

    /**
     * Fire after clicking to hide or show grid (hidegrid:true).
     *
     * JS-function parameters:
     * <ul>
     *  <li>gridstate is the state of the grid - can have two values - visible or hidden.</li>
     * </ul>
     *
     * @param string $onHeaderClick
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setOnHeaderClickEventHandler($onHeaderClick)
    {
        $this->__eventHandler__onHeaderClick = $onHeaderClick;
        return $this;
    }

    /**
     * This event fires after click on [page button] and before populating the data.
     * Also works when the user enters a new page number in the page input box (and presses [Enter])
     * and when the number of requested records is changed via the select box.
     *
     * JS-function parameters:
     * <ul>
     *  <li>pgButton.</li>
     * </ul>
     *
     * If this event return 'stop' the processing is stopped and you can define your own custom paging.
     *
     * @return string
     */
    public function getOnPagingEventHandler()
    {
        return $this->__eventHandler__onPaging;
    }

    /**
     * This event fires after click on [page button] and before populating the data.
     * Also works when the user enters a new page number in the page input box (and presses [Enter])
     * and when the number of requested records is changed via the select box.
     *
     * JS-function parameters:
     * <ul>
     *  <li>pgButton.</li>
     * </ul>
     *
     * If this event return 'stop' the processing is stopped and you can define your own custom paging.
     *
     * @param string $onPaging
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setOnPagingEventHandler($onPaging)
    {
        $this->__eventHandler__onPaging = $onPaging;
        return $this;
    }

    /**
     * Raised immediately after row was right clicked.
     *
     * JS-function parameters:
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
    public function getOnRightClickRowEventHandler()
    {
        return $this->__eventHandler__onRightClickRow;
    }

    /**
     * Raised immediately after row was right clicked.
     *
     * JS-function parameters:
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
    public function setOnRightClickRowEventHandler($onRightClickRow)
    {
        $this->__eventHandler__onRightClickRow = $onRightClickRow;
        return $this;
    }

    /**
     * This event fires when multiselect option is true and you click on the header checkbox.
     *
     * JS-function parameters:
     * <ul>
     *  <li>aRowids array of the selected rows (rowid's);</li>
     *  <li>status - boolean variable determining the status of the header check box - true if checked, false if not checked.</li>
     * </ul>
     *
     * Note that the aRowids alway contain the ids when header checkbox is checked or unchecked.
     *
     * @return string
     */
    public function getOnSelectAllEventHandler()
    {
        return $this->__eventHandler__onSelectAll;
    }

    /**
     * This event fires when multiselect option is true and you click on the header checkbox.
     *
     * JS-function parameters:
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
    public function setOnSelectAllEventHandler($onSelectAll)
    {
        $this->__eventHandler__onSelectAll = $onSelectAll;
        return $this;
    }

    /**
     * Raised immediately after row was clicked.
     *
     * JS-function parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>status is the status of the selection;</li>
     *  <li>e is the event object. Can be used when multiselect is set to true. true if the row is selected, false if the row is deselected.</li>
     * </ul>
     *
     * @return string
     */
    public function getOnSelectRowEventHandler()
    {
        return $this->__eventHandler__onSelectRow;
    }

    /**
     * Raised immediately after row was clicked.
     *
     * JS-function parameters:
     * <ul>
     *  <li>rowid is the id of the row;</li>
     *  <li>status is the status of the selection;</li>
     *  <li>e is the event object. Can be used when multiselect is set to true. true if the row is selected, false if the row is deselected.</li>
     * </ul>
     *
     * @param string $onSelectRow
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setOnSelectRowEventHandler($onSelectRow)
    {
        $this->__eventHandler__onSelectRow = $onSelectRow;
        return $this;
    }

    /**
     * Raised immediately after sortable column was clicked and before sorting the data.
     *
     * JS-function parameters:
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
    public function getOnSortColEventHandler()
    {
        return $this->__eventHandler__onSortCol;
    }

    /**
     * Raised immediately after sortable column was clicked and before sorting the data.
     *
     * JS-function parameters:
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
    public function setOnSortColEventHandler($onSortCol)
    {
        $this->__eventHandler__onSortCol = $onSortCol;
        return $this;
    }

    /**
     * This event is called when the new table row is inserted.
     * It can be used to set additional style and class attributes of the row dynamically.
     *
     * JS-function parameters:
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
    public function getRowAttrEventHandler()
    {
        return $this->__eventHandler__rowattr;
    }

    /**
     * This event is called when the new table row is inserted.
     * It can be used to set additional style and class attributes of the row dynamically.
     *
     * JS-function parameters:
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
    public function setRowAttrEventHandler($rowattr)
    {
        $this->__eventHandler__rowattr = $rowattr;
        return $this;
    }

    /**
     * Event which is called when we start resize a column.
     *
     * JS-function parameters:
     * <ul>
     *  <li>event is the event object;</li>
     *  <li>index is the index of the column in colModel.</li>
     * </ul>
     *
     * @return string
     */
    public function getResizeStartEventHandler()
    {
        return $this->__eventHandler__resizeStart;
    }

    /**
     * Event which is called when we start resize a column.
     *
     * JS-function parameters:
     * <ul>
     *  <li>event is the event object;</li>
     *  <li>index is the index of the column in colModel.</li>
     * </ul>
     *
     * @param string $resizeStart
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setResizeStartEventHandler($resizeStart)
    {
        $this->__eventHandler__resizeStart = $resizeStart;
        return $this;
    }

    /**
     * Event which is called after the column is resized.
     *
     * JS-function parameters:
     * <ul>
     *  <li>newwidth is the is the new width of the column;</li>
     *  <li>index is the index of the column in colModel.</li>
     * </ul>
     *
     * @return string
     */
    public function getResizeStopEventHandler()
    {
        return $this->__eventHandler__resizeStop;
    }

    /**
     * Event which is called after the column is resized.
     *
     * JS-function parameters:
     * <ul>
     *  <li>newwidth is the is the new width of the column;</li>
     *  <li>index is the index of the column in colModel.</li>
     * </ul>
     *
     * @param string $resizeStart
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setResizeStopEventHandler($resizeStart)
    {
        $this->__eventHandler__resizeStop = $resizeStart;
        return $this;
    }

    /**
     * If set this event can serialize the data passed to the ajax request. The function should return the serialized data.
     * This event can be used when a custom data should be passed to the server - e.g - JSON string, XML string and etc.
     *
     * JS-function parameters:
     * <ul>
     *  <li>postData.</li>
     * </ul>
     *
     * @return string
     */
    public function getSerializeGridDataEventHandler()
    {
        return $this->__eventHandler__serializeGridData;
    }

    /**
     * If set this event can serialize the data passed to the ajax request. The function should return the serialized data.
     * This event can be used when a custom data should be passed to the server - e.g - JSON string, XML string and etc.
     *
     * JS-function parameters:
     * <ul>
     *  <li>postData.</li>
     * </ul>
     *
     * @param string $serializeGridData
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid
     */
    public function setSerializeGridDataEventHandler($serializeGridData)
    {
        $this->__eventHandler__serializeGridData = $serializeGridData;
        return $this;
    }

}
