<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid;

use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;

/**
 * Класс, который представляет конфигурацию столбца таблицы jqGrid.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class ColumnDefinition implements ConfigurationDefinitionInterface
{

    /**
     * Returns a new instance of the {@see \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition} class.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public static function createInstance()
    {
        return new ColumnDefinition();
    }


    /**
     * Column name.
     *
     * @var string
     */
    private $name = '';

    /**
     * Column label.
     *
     * @var string
     */
    private $label = '';

    /**
     * Column width in pixels.
     * Default value: 150.
     *
     * @var int
     */
    private $width = 150;

    /**
     * Type of text alignment within a column.
     * Allowed values: 'left', 'center', 'right'.
     * Default value: 'left'.
     *
     * @var string
     */
    private $align = 'left';

    /**
     * The type of data used for sort.
     * Allowed values: '', 'integer', 'number', 'date'.
     * Default value: '' (text).
     *
     * @var string
     */
    private $sorttype = '';

    /**
     * Force to start sorting of the column by descending oder.
     * Allowed value: '', 'desc'.
     * Default value: ''.
     *
     * @var string
     */
    private $firstsortorder = '';

    /**
     * Shortcut, which allows to specify all the options (and some other used for searching and editing) at once.
     * Allowed values: '', 'number', 'booleanCheckbox' (booleanCheckbox - will displays Boolean input data true and false
     * as checkbox in case of usage iconSet as 'fontAwesome' {@see \Rusproj\FreeJqGridConfigurator\JqGrid::setIconSet}).
     * Default value: ''.
     *
     * @var string
     */
    private $template = '';

    /**
     * Format method wich applied to every column value.
     * Allowed values: '', 'date', 'select'.
     * Default value: ''.
     *
     * @var string
     */
    // Допустимые значения: integer, number, currency, email, link, showlink, checkbox, actions. Значение по умолчанию: ''.
    private $formatter = '';

    /**
     * Formatter options.
     * To specify this value can be used one of the formatOptions*-methods.
     * Default value: []
     *
     * @var array
     */
    private $formatoptions = [];

    /**
     * Column width can be resized.
     * Default value: true.
     *
     * @var bool
     */
    private $resizable = true;

    /**
     * Column values can be sorted.
     * Default value: true.
     *
     * @var bool
     */
    private $sortable = true;

    /**
     * Hide column on table load.
     * Default value: false.
     *
     * @var bool
     */
    private $hidden = false;

    /**
     * CSS-classes wich applied to every td-cell. Multiple classes must be separated by space.
     *
     * @var string
     */
    private $classes = '';

    /**
     * Column can be used in search.
     * Default value: true.
     *
     * @var bool
     */
    private $search = true;

    /**
     * Search options.
     * To specify this value can be used {@see \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::searchOptions} method.
     *
     * @var array
     */
    private $searchoptions = ['sopt' => ['eq', 'ne', 'lt', 'le', 'gt', 'ge', 'bw', 'bn', 'in', 'ni', 'ew', 'en', 'cn', 'nc', 'nu', 'nn']];

    /**
     * Data type at the search operation.
     * Allowed values: 'text', 'select'.
     * Default value: 'text'.
     *
     * @var string
     */
    private $stype = 'text';


    /**
     * Column name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Column name.
     *
     * @param string $name
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Column label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Column label.
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
     * Column width in pixels.
     * Default value: 150.
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Column width in pixels.
     * Default value: 150.
     *
     * @param integer $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Type of text alignment within a column.
     * Allowed values: 'left', 'center', 'right'.
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
     * Allowed values: 'left', 'center', 'right'.
     * Default value: 'left'.
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
     * The type of data used for sort.
     * Allowed values: '', 'integer', 'number', 'date'.
     * Default value: '' (text).
     *
     * @return string
     */
    public function getSortType()
    {
        return $this->sorttype;
    }

    /**
     * The type of data used for sort.
     * Allowed values: '', 'integer', 'number', 'date'.
     * Default value: '' (text).
     *
     * @param string $sortType
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setSortType($sortType)
    {
        $this->sorttype = $sortType;
        return $this;
    }

    /**
     * Force to start sorting of the column by descending oder.
     * Allowed value: '', 'desc'.
     * Default value: ''.
     *
     * @return string
     */
    public function getFirstSortOrder()
    {
        return $this->firstsortorder;
    }

    /**
     * Force to start sorting of the column by descending oder.
     * Allowed value: '', 'desc'.
     * Default value: ''.
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
     * Shortcut, which allows to specify all the options (and some other used for searching and editing) at once.
     * Allowed values: '', 'number', 'booleanCheckbox'.
     * Default value: ''.
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Shortcut, which allows to specify all the options (and some other used for searching and editing) at once.
     * Allowed values: '', 'number', 'booleanCheckbox'.
     * Default value: ''.
     *
     * @param string $template
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * Format method wich applied to every column value.
     * Allowed values: '', 'date', 'select'.
     * Default value: ''.
     *
     * @return string
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * Format method wich applied to every column value.
     * Allowed values: '', 'date', 'select'.
     * Default value: ''.
     *
     * @param string $formatter
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setFormatter($formatter)
    {
        $this->formatter = $formatter;
        return $this;
    }

    /**
     * Formatter options.
     * To specify this value can be used one of the formatOptions*-methods.
     * Default value: []
     *
     * @return array
     */
    public function getFormatOptions()
    {
        return $this->formatoptions;
    }

    /**
     * Formatter options.
     * To specify this value can be used one of the formatOptions*-methods.
     * Default value: []
     *
     * @param array $formatOptions
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setFormatOptions($formatOptions)
    {
        $this->formatoptions = $formatOptions;
        return $this;
    }

    /**
     * Column width can be resized.
     * Default value: true.
     *
     * @return boolean
     */
    public function getIsResizable()
    {
        return $this->resizable;
    }

    /**
     * Column width can be resized.
     * Default value: true.
     *
     * @param boolean $resizable
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setIsResizable($resizable)
    {
        $this->resizable = $resizable;
        return $this;
    }

    /**
     * Column values can be sorted.
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
     * Default value: true.
     *
     * @param boolean $sortable
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setIsSortable($sortable)
    {
        $this->sortable = $sortable;
        return $this;
    }

    /**
     * Hide column on table load.
     * Default value: false.
     *
     * @return boolean
     */
    public function getIsHidden()
    {
        return $this->hidden;
    }

    /**
     * Hide column on table load.
     * Default value: false.
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
     * CSS-classes wich applied to every td-cell. Multiple classes must be separated by space.
     *
     * @return string
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * CSS-classes wich applied to every td-cell. Multiple classes must be separated by space.
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
     * Column can be used in search.
     * Default value: true.
     *
     * @return boolean
     */
    public function isSearch()
    {
        return $this->search;
    }

    /**
     * Column can be used in search.
     * Default value: true.
     *
     * @param boolean $search
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setSearch($search)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * Search options.
     * To specify this value can be used {@see \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::searchOptions} method.
     *
     * @return array
     */
    public function getSearchoptions()
    {
        return $this->searchoptions;
    }

    /**
     * Search options.
     * To specify this value can be used {@see \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::searchOptions} method.
     *
     * @param array $searchoptions
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setSearchoptions($searchoptions)
    {
        $this->searchoptions = $searchoptions;
        return $this;
    }

    /**
     * Data type at the search operation.
     * Allowed values: 'text', 'select'.
     * Default value: 'text'.
     *
     * @return string
     */
    public function getSearchType()
    {
        return $this->stype;
    }

    /**
     * Data type at the search operation.
     * Allowed values: 'text', 'select'.
     * Default value: 'text'.
     *
     * @param string $stype
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition
     */
    public function setSearchType($stype)
    {
        $this->stype = $stype;
        return $this;
    }


//     /**
//      * Значение по умолчанию, которое будет установлено в поле при операции поиска. Значение по умолчанию: ''.
//      *
//      * @var string
//      */
//     public $defval = '';

//     /**
//      * Определяет тип поля, которое будет сформировано для его редактирования.
//      * Если значение не определено, то редактирование запрещено.
//      * Допустимые значения:  text, textarea, select, checkbox, password, button, image или file. Значение по умолчанию: ''.
//      *
//      * @var string
//      */
//     public $editType = '';

//     /**
//      * Массив допустимых параметров, определяющих поведение поля в зависимости от его типа (параметра editType).
//      * Для формирования значения можно воспользоваться помощниками {@see \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::options}.
//      * Значение по умолчанию: [].
//      *
//      * @var array
//      */
//     public $editOptions = [];

//     /**
//      * Признак того, что ширина столбца будет постоянной, независимо от вызова функций, которые меняют ширину таблицы.
//      * Чтобы данный параметр имел действие, необходимо установить в конфигурации таблицы параметр shrinkToFit.
//      * Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $fixed = false;

//     /**
//      * Определяет дополнительные опции поля для редактирования в отдельной форме. Для формирования значения можно воспользоваться
//      * помощником {@see \Rusproj\FreeJqGridConfigurator\JqGrid\ColumnDefinition::formOptions}. Значение по умолчанию: [].
//      * @var array
//      */
//     public $formOptions = [];

//     /**
//      * Признак того, что текущий столбец необходимо заморозить при нажатии на кнопку заморозки (вызове метода setFrozenColumns).
//      * Внимание! Заморозка будет работать если только столбец или столбцы стоят первыми,
//      * а также заморозка не будет работать если активно одно из следующих действий или свойств:
//      * TreeGrid, SubGrid, cellEdit, inline edit, sortable, Data grouping, scroll или footer row (footerrow paremeter).
//      * Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $frozen = false;

//     /**
//      * Признак необходимости скрыть данный столбец из окна сортировки столбцов. Значение по умолчанию: false.
//      *
//      * @var bool
//      */
//     public $hiddenDlg = false;

//     /**
//      * Признак того, что если значение равно false, то заголовок не отображается в столбце кога мы щелкаем по клетке мышью.
//      * Значение по умолчанию: true.
//      *
//      * @var bool
//      */
//     public $title = true;

//     /**
//      * Признак необходимости отображать данное поле в окне просмотра (если активен метод viewGridRow). Значение по умолчанию: true.
//      *
//      * @var bool
//      */
//     public $viewable = true;

//     /**
//      * Используется только когда stype = 'select'. Задает адрес, откуда загружаются значения выпадающего списка.
//      * В случае указания адреса, должна формироваться страница с содержимым вида:
//      * "<select><option value='1'>One</option><option value='2'>Two</option></select>".
//      * Значение по умолчанию: ''.
//      *
//      * @var string
//      */
//     public $surl = '';

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
                        $_config[$_key][$_subKey] = $_val;
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
                } else {
                    $_config[$_key] = $_val;
                }
            }
        }

//         $_config['editable'] = false;
//         if (!empty($this->editType)) {
//             $_config['editable'] = true;
//             $_config['edittype'] = $this->editType;
//             if (count($this->editOptions) > 0) {
//                 $_config['editoptions'] = $this->editOptions;
//             }
//         }
//         $_config['search'] = $this->search;
//         if ($this->search) {
//             $_config['stype'] = $this->stype;
//             if (strtolower($this->stype) === 'select') {
//                 $_config['surl'] = $this->surl;
//             }
//             if (count($this->searchOptions) > 0) {
//                 $_config['searchoptions'] = $this->searchOptions;
//             } else {
//                 $_config['searchoptions'] = ColumnDefinition::searchOptions();
//             }
//         }

        return $_config;
    }

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
     *
     * @param string $dataUrl URL to download select list. This URL must return rendered HTML select.
     * @param array $sopt Operators used to build search queries. Allowed values: eq, ne, lt, le, gt, ge, bw, bn, in, ni, ew, en, cn, nc, nu, nn.
     * @param string $defaultValue Search field default value.
     * @param array $value An array of allowed values represented by the select list.
     * @return array
     */
    public static function searchOptions($dataUrl = '', $sopt = ['eq', 'ne', 'lt', 'le', 'gt', 'ge', 'bw', 'bn', 'in', 'ni', 'ew', 'en', 'cn', 'nc', 'nu', 'nn'], $defaultValue = '', $value = []) {
        $_config = [];

        if (!empty($dataUrl)) {
            $_config['dataUrl'] = $dataUrl;
        }

        if (count($sopt) > 0) {
            $_config['sopt'] = $sopt;
        }

        if (!empty($defaultValue)) {
            $_config['defaultValue'] = $defaultValue;
        }

        if (count($value) > 0) {
            $_config['value'] = $value;
        }

        return $_config;
    }


    /**
     * Helper wich returns array of format options for columns with values of the Date type (formatter = 'date').
     *
     * @param string $srcFormat Source format. Default value: 'Y-m-d H:i:s'.
     * @param string $newFormat New format. Default value: 'd.m.Y H:i:s'.
     * @param string $parseRe Выражение для парсинга строки. Значение по умолчанию: ''.
     * @return array
     */
    public static function formatOptionsDate($srcFormat = 'Y-m-d H:i:s', $newFormat = 'd.m.Y H:i:s', $parseRe = '') {
        $_config = ['srcformat' => $srcFormat, 'newformat' => $newFormat];

        if (!empty($parseRe)) {
            $_config['parseRe'] = $parseRe;
        }

        return $_config;
    }

    /**
     * Helper wich returns array of format options for columns with values of the Select type (formatter = 'select').
     *
     * @param array|string $list An array of Key-Value (Input-Output) pairs. Also can be presented as a string in format: 'Key1:Value1;Key2:Value2;...'.
     * @param string $defaultValue Default value from {@see $list} parameter.
     * @return array
     */
    public static function formatOptionsSelect($list, $defaultValue = null) {
        $_config = [];

        if (!is_array($list)) {
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

        if (!empty($defaultValue)) {
            $_config['defaultValue'] = $defaultValue;
        }

        return $_config;
    }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'integer'.
//      *
//      * @param string $thousandsSeparator Разделитель тысяч. Значение по умолчанию: ' '.
//      * @param string $defaulValue Значение, используемое в том случае, если значение в ячейке отсутствует. Значение по умолчанию: ''.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
//      */
//     public static function formatInteger($thousandsSeparator = ' ', $defaulValue = '') {
//         return ['thousandsSeparator' => $thousandsSeparator, 'defaulValue' => $defaulValue];
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'number'.
//      *
//      * @param string $thousandsSeparator Разделитель тысяч. Значение по умолчанию: ' '.
//      * @param string $decimalSeparator Разделитель целой и дробной части. Значение по умолчанию: ','.
//      * @param int $decimalPlaces Число отображаемых разрядов после запятой. Значение по умолчанию: 2.
//      * @param string $defaulValue Значение, используемое в том случае, если значение в ячейке отсутствует. Значение по умолчанию: ''.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
//      */
//     public static function formatNumber($thousandsSeparator = ' ', $decimalSeparator = ',', $decimalPlaces = 2, $defaulValue = '') {
//         return ['thousandsSeparator' => $thousandsSeparator, 'decimalSeparator' => $decimalSeparator, 'decimalPlaces' => $decimalPlaces, 'defaulValue' => $defaulValue];
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'currency'.
//      *
//      * @param string $thousandsSeparator Разделитель тысяч. Значение по умолчанию: ' '.
//      * @param string $decimalSeparator Разделитель целой и дробной части. Значение по умолчанию: ','.
//      * @param int $decimalPlaces Число отображаемых разрядов после запятой. Значение по умолчанию: 2.
//      * @param string $defaulValue Значение, используемое в том случае, если значение в ячейке отсутствует. Значение по умолчанию: ''.
//      * @param string $prefix Префикс, добавляемый в начале значения. Значение по умолчанию: ''.
//      * @param string $suffix Суффикс, добавляемый в конце значения. Значение по умолчанию: ''.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
//      */
//     public static function formatCurrency($thousandsSeparator = ' ', $decimalSeparator = ',', $decimalPlaces = 2, $defaulValue = '', $prefix = '', $suffix = '') {
//         return ['thousandsSeparator' => $thousandsSeparator, 'decimalSeparator' => $decimalSeparator, 'decimalPlaces' => $decimalPlaces, 'defaulValue' => $defaulValue, 'prefix' => $prefix, 'suffix' => $suffix];
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'email'.
//      *
//      * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
//      */
//     public static function formatEmail() {
//         return [];
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'link'.
//      *
//      * @param string $target Ссылка назначения. Значение по умолчанию: ''.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
//      */
//     public static function formatLink($target = '') {
//         return !empty($target) ? ['target' => $target] : [];
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'showlink'.
//      *
//      * @param string $baseLinkUrl Базовый url ссылки. Значение по умолчанию: ''.
//      * @param string $showAction Значение, которое добавляется после baseLinkUrl. Значение по умолчанию: ''.
//      * @param string $addParam Параметр, который может быть добавлен после свойства idName Значение по умолчанию: ''.
//      * @param string $target Ссылка назначения. Значение по умолчанию: ''.
//      * @param string $idName Добавляемый идентификатор. Значение по умолчанию: ''.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
//      */
//     public static function formatShowlink($baseLinkUrl = '', $showAction = '', $addParam = '', $target = '', $idName = '') {
//         return ['baseLinkUrl' => $baseLinkUrl, 'showAction' => $showAction, 'addParam' => $addParam, 'target' => $target, 'idName' => $idName];
//     }

//     /**
//      * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'checkbox'.
//      *
//      * @param string $disabled Значение, используемое для снятия галочки, в противном случае она будет установлена.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
//      */
//     public static function formatCheckbox($disabled) {
//         return ['disabled' => $disabled];
//     }

//     /**
//      * НЕ РЕАЛИЗОВАНО!!! Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'actions'.
//      *
//      * @param string $ Значение по умолчанию: ''.
//      * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
//      */
//     public static function formatActions() {

//         // TODO: В дальнейшем, если будет использоваться данный помощник, необходима реализация.
//         return [keys => false, editbutton => true, delbutton => true, editformbutton => false, onEdit => null, onSuccess => null, afterSave => null, onError => null, afterRestore => null, extraparam => [oper => 'edit'], url => null, delOptions => [], editOptions => []];
//     }

//     /**
//      * Помощник формирует конфигурационный массив для столбца числовых идентификаторов. Данный столбец будет скрыт и не будет участвовать в поиске.
//      *
//      * @param string $name Имя столбца.
//      * @return ColumnDefinition Конфигурационный массив для указанного столбца.
//      */
//     public static function columnNumberId($name) {
//         $e = new ColumnDefinition();
//         $e->name = $name;
//         $e->label = '';
//         $e->search = false;
//         $e->is_primary_key = true;
//         $e->hidden = $e->hiddenDlg = true;
//         $e->sortable = false;
//         $e->viewable = false;
//         return $e;
//     }

//     /**
//      * Помощник формирует конфигурационный массив для столбца главных текстовых значений с возможностью полного поиска.
//      * Данный столбец имеет возможность заморозки (при нажатии на соответствующую кнопку).
//      *
//      * @param string $name Имя столбца.
//      * @param string $label Заголовок столбца.
//      * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
//      * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
//      * @return ColumnDefinition Конфигурационный массив для указанного столбца.
//      */
//     public static function columnMainTextVal($name, $label, $width = 250, $align = 'left') {
//         $e = new ColumnDefinition();
//         $e->name = $name;
//         $e->label = $label;
//         $e->editType = 'text';
//         $e->frozen = true;
//         $e->width = $width;
//         $e->align = $align;
//         return $e;
//     }

//     /**
//      * Помощник формирует конфигурационный массив для текстового столбца значений без возможности поиска.
//      *
//      * @param string $name Имя столбца.
//      * @param string $label Заголовок столбца.
//      * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
//      * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
//      * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
//      * @return ColumnDefinition Конфигурационный массив для указанного столбца.
//      */
//     public static function columnTextVal($name, $label, $width = 250, $align = 'left', $canEdit = true) {
//         $e = new ColumnDefinition();
//         $e->name = $name;
//         $e->label = $label;
//         $e->search = false;
//         if ($canEdit) {
//             $e->editType = 'text';
//         }
//         $e->width = $width;
//         $e->align = $align;
//         return $e;
//     }

//     /**
//      * Помощник формирует конфигурационный массив для текстового столбца значений с возможностью поиска.
//      *
//      * @param string $name Имя столбца.
//      * @param string $label Заголовок столбца.
//      * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
//      * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
//      * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
//      * @param bool $hidden Признак того, что данное поле будет скрыто в основной таблице, но будет доступно для отображения с помощью окна сортировки столбцов. Значение по умолчанию: false.
//      * @param bool $frozen Признак того, что столбец необходимо заморозить.
//      * @return ColumnDefinition Конфигурационный массив для указанного столбца.
//      */
//     public static function columnTextValWithSearch($name, $label, $width = 250, $align = 'left', $canEdit = true, $hidden = false, $frozen = false) {
//         $e = ColumnDefinition::columnTextVal($name, $label, $width, $align, $canEdit);
//         $e->search = true;
//         $e->hidden = $hidden;
//         $e->frozen = $frozen;
//         return $e;
//     }

//     /**
//      * Помощник формирует конфигурационный массив для столбца из списка значений без возможности поиска.
//      *
//      * @param string $name Имя столбца.
//      * @param string $label Заголовок столбца.
//      * @param array/string $val Массив значений (где ключ - идентификатор) или адрес URL, откуда загружаются соответствующие данные (для автоматического преобразования ID в значение из списка необходимо передавать массив значений, а не URL, т.к. данные не подгружаются автоматически).
//      * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
//      * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
//      * @return ColumnDefinition Конфигурационный массив для указанного столбца.
//      */
//     public static function columnSelectVal($name, $label, $val, $width = 250, $align = 'left') {
//         $e = new ColumnDefinition();
//         $e->name = $name;
//         $e->label = $label;
//         $e->width = $width;
//         $e->align = $align;
//         $e->search = false;
//         $e->formatter = 'select'; // Вызов formatSelect() не нужен, т.к. select не имеет опций форматирования
//         $e->editType = 'select';
//         $e->editOptions = ColumnDefinition::editOptionsSelect($val);
//         return $e;
//     }

//     /**
//      * Помощник формирует конфигурационный массив для столбца из списка значений с возможностью поиска.
//      *
//      * @param string $name Имя столбца.
//      * @param string $label Заголовок столбца.
//      * @param string $sval Адрес URL, откуда загружаются соответствующие данные. Если значение не задано, то будет использоваться текстовый поиск. Значение по умолчанию: NULL.
//      * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
//      * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
//      * @param array $val Массив значений (где ключ - идентификатор). Если данный параметр не задан, то данные будут взяты из $sval. Значение по умолчанию: NULL.
//      * @param bool $hidden Признак того, что данное поле будет скрыто в основной таблице, но будет доступно для отображения с помощью окна сортировки столбцов. Значение по умолчанию: false.
//      * @return ColumnDefinition Конфигурационный массив для указанного столбца.
//      */
//     public static function columnSelectValWithSearch($name, $label, $sval = NULL, $width = 250, $align = 'left', $val = NULL, $hidden = false) {
//         $e = ColumnDefinition::columnSelectVal($name, $label, $val, $width, $align);
//         $e->editOptions = ColumnDefinition::editOptionsSelect($val);
//         $e->search = true;
//         if (!empty($sval)) {
//             $e->stype = 'select';
//             $e->searchOptions = ColumnDefinition::searchOptions($sval, ['eq', 'ne']);
//         }
//         $e->hidden = $hidden;
//         return $e;
//     }

//     /**
//      * Помощник формирует конфигурационный массив для столбца из флагов без возможности поиска.
//      *
//      * @param string $name Имя столбца.
//      * @param string $label Заголовок столбца.
//      * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 50.
//      * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'center'.
//      * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
//      * @return ColumnDefinition Конфигурационный массив для указанного столбца.
//      */
//     public static function columnCheckboxVal($name, $label, $width = 50, $align = 'center', $canEdit = true) {
//         $e = new ColumnDefinition();
//         $e->name = $name;
//         $e->label = $label;
//         $e->width = $width;
//         $e->align = $align;
//         $e->formatter = 'checkbox';
//         $e->formatOptions = ColumnDefinition::formatCheckbox('0');
//         if ($canEdit) {
//             $e->editType = 'checkbox';
//             $e->editOptions = ColumnDefinition::editOptionsCheckbox('1', '0');
//         }
//         $e->search = false;
//         return $e;
//     }

//     /**
//      * Помощник формирует конфигурационный массив для столбца из флагов с возможностью поиска.
//      *
//      * @param string $name Имя столбца.
//      * @param string $label Заголовок столбца.
//      * @param string $sval Адрес URL, откуда загружается содержимое выпадающего списка для поиска.
//      * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 50.
//      * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'center'.
//      * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
//      * @return ColumnDefinition Конфигурационный массив для указанного столбца.
//      */
//     public static function columnCheckboxValWithSearch($name, $label, $sval, $width = 50, $align = 'center', $canEdit = true) {
//         $e = ColumnDefinition::columnCheckboxVal($name, $label, $width, $align, $canEdit);
//         $e->search = true;
//         $e->stype = 'select';
//         $e->searchOptions = ColumnDefinition::searchOptions($sval, ['eq', 'ne']);
//         return $e;
//     }

//     /**
//      * Помощник формирует конфигурационный массив для столбца из полей с автодополнением.
//      *
//      * @param string $name Имя столбца.
//      * @param string $label Заголовок столбца.
//      * @param string $field_name Имя поля в БД.
//      * @param string $model_name Модель в которой нужно искать значение поля.
//      * @return ColumnDefinition Конфигурационный массив для указанного столбца.
//      */
//     public static function columnAutocomplete($name, $label, $field_name, $model_name, $col_width) {
//         $e = new ColumnDefinition();
//         $e->name = $name;
//         $e->label = $label;
//         $e->editType = 'ac';
//         $e->width = $col_width;
//         $e->editOptions = ['field' => $field_name, 'model' => $model_name];
//         return $e;
//     }

//     /**
//      * Помощник формирует конфигурационный массив для текстового столбца значений дат без возможности поиска.
//      *
//      * @param string $name Имя столбца.
//      * @param string $label Заголовок столбца.
//      * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
//      * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
//      * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
//      * @param string $srcformat Формат исходного значения, которое должно быть отформатировано. Аналогично PHP преобразованиям. Значение по умолчанию: 'Y-m-d H:i:s'.
//      * @param string $newformat Новый формат, в который необходимо преобразовать. Аналогично PHP преобразованиям. Значение по умолчанию: 'd.m.Y H:i:s'.
//      * @return ColumnDefinition Конфигурационный массив для указанного столбца.
//      */
//     public static function columnDateVal($name, $label, $width = 250, $align = 'left', $canEdit = true, $srcformat = 'Y-m-d H:i:s', $newformat = 'd.m.Y H:i:s') {
//         $e = new ColumnDefinition();
//         $e->name = $name;
//         $e->label = $label;
//         $e->search = false;
//         if ($canEdit) {
//             $e->editType = 'text';
//         }
//         $e->formatter = 'date';
//         $e->formatOptions = ColumnDefinition::formatDate($srcformat, $newformat);
//         $e->width = $width;
//         $e->align = $align;
//         return $e;
//     }

//     /**
//      * Помощник формирует конфигурационный массив для текстового столбца значений дат с возможностью поиска.
//      *
//      * @param string $name Имя столбца.
//      * @param string $label Заголовок столбца.
//      * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
//      * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
//      * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
//      * @param string $srcformat Формат исходного значения, которое должно быть отформатировано. Аналогично PHP преобразованиям. Значение по умолчанию: 'Y-m-d H:i:s'.
//      * @param string $newformat Новый формат, в который необходимо преобразовать. Аналогично PHP преобразованиям. Значение по умолчанию: 'd.m.Y H:i:s'.
//      * @param bool $hidden Признак того, что данное поле будет скрыто в основной таблице, но будет доступно для отображения с помощью окна сортировки столбцов. Значение по умолчанию: false.
//      * @return ColumnDefinition Конфигурационный массив для указанного столбца.
//      */
//     public static function columnDateValWithSearch($name, $label, $width = 250, $align = 'left', $canEdit = true, $srcformat = 'Y-m-d H:i:s', $newformat = 'd.m.Y H:i:s', $hidden = false) {
//         $e = ColumnDefinition::columnDateVal($name, $label, $width, $align, $canEdit, $srcformat, $newformat);
//         $e->search = true;
//         $e->hidden = $hidden;
//         return $e;
//     }

//     /**
//      * Функция формирует выпадающий список, представленный в виде HTML на основе заданного массива значений.
//      *
//      * @param array $vals Массив значений, на основе которого будет формироваться выпадающий список.
//      * @param bool $addNull Признак необходимости добавить пустое значение (<option value="-1"> - </option>). Значение по умолчанию: true.
//      * @param string $name Имя элемента. Значение по умолчанию: ''
//      * @param string $id Идентификатор элемента. Значение по умолчанию: ''
//      * @param string $class Название класса элемента. Значение по умолчанию: ''
//      * @return string HTML код выпадающего списка.
//      */
//     public static function createSelect($vals, $addNull = true, $name = '', $id = '', $class = '') {
//         $_ts = '';
//         if ($addNull && !count(array_filter($vals, function ($val) {
//             return trim($val) == '-';
//         }))) // Если в массиве существует элемент '-', то его не добавляем
//             $_ts = '<option value="-1"> - </option>';
//         foreach ($vals as $i => $key)
//             $_ts .= '<option value="' . $i . '">' . $key . '</option>';
//         return '<select' . (!empty($name) ? ' name="' . $id . '"' : '') . (!empty($id) ? ' id="' . $id . '"' : '') . (!empty($class) ? ' class="' . $class . '"' : '') . '>' . $_ts . '</select>';
//     }

}
