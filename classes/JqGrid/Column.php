<?php
namespace RUSproj\Kohana\JqGrid\JqGrid;

/**
 * Класс, который представляет конфигурацию столбца таблицы jqGrid.
 * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:colmodel_options
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-19 RUSproj, Sergey S. Smirnov
 */
class JqGrid_Column
{

    /**
     * Выравнивание содержимого в ячейке по горизонтали. Допустимые значения: left, center, right. Значение по умолчанию: 'left'.
     * @var string
     */
    public $align = 'left';

    /**
     * CSS-класс, который долженн быть назначен каждой ячейке (<td>) столбца таблицы. Если нужно назначить несколько классов, то их следует разделить пробелом. Значение по умолчанию: ''.
     * @var string
     */
    public $classes = '';

    /**
     * Значение по умолчанию, которое будет установлено в поле при операции поиска. Значение по умолчанию: ''.
     * @var string
     */
    public $defval = '';

    /**
     * Определяет тип поля, которое будет сформировано для его редактирования. Если значение не определено, то редактирование запрещено. Допустимые значения:  text, textarea, select, checkbox, password, button, image или file. Значение по умолчанию: ''.
     * @var string
     */
    public $editType = '';

    /**
     * Массив допустимых параметров, определяющих поведение поля в зависимости от его типа (параметра editType). Для формирования значения можно воспользоваться помощниками JqGrid_Column::options*(). Значение по умолчанию: [].
     * @var array
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:common_rules#edittype
     */
    public $editOptions = [];

    /**
     * Тип форматирования значений ячеек в данном столбце. Допустимые значения: integer, number, currency, date, email, link, showlink, checkbox, select и actions. Значение по умолчанию: ''.
     * @var string
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:predefined_formatter
     */
    public $formatter = '';

    /**
     * Массив параметров форматирования. Для формирования значения можно воспользоваться помощниками JqGrid_Column::format*(). Значение по умолчанию: [].
     * @var array
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:predefined_formatter
     */
    public $formatOptions = [];

    /**
     * Признак того, что ширина столбца будет постоянной, независимо от вызова функций, которые меняют ширину таблицы. Чтобы данный параметр имел действие, необходимо установить в конфигурации таблицы параметр shrinkToFit. Значение по умолчанию: false.
     * @var bool
     */
    public $fixed = false;

    /**
     * Определяет дополнительные опции поля для редактирования в отдельной форме. Для формирования значения можно воспользоваться помощником JqGrid_Column::formOptions(). Значение по умолчанию: [].
     * @var array
     */
    public $formOptions = [];

    /**
     * Признак того, что текущий столбец необходимо заморозить при нажатии на кнопку заморозки (вызове метода setFrozenColumns). Внимание! Заморозка будет работать если только столбец или столбцы стоят первыми, а также заморозка не будет работать если активно одно из следующих действий или свойств: TreeGrid, SubGrid, cellEdit, inline edit, sortable, Data grouping, scroll или footer row (footerrow paremeter). Значение по умолчанию: false.
     * @var bool
     */
    public $frozen = false;

    /**
     * Признак необходимости скрыть данный столбец при загрузке. Значение по умолчанию: false.
     * @var bool
     */
    public $hidden = false;

    /**
     * Признак необходимости скрыть данный столбец из окна сортировки столбцов. Значение по умолчанию: false.
     * @var bool
     */
    public $hiddenDlg = false;

    /**
     * Отображаемое имя столбца. Значение по умолчанию: ''.
     * @var string
     */
    public $label = '';

    /**
     * Имя столбца. Значение по умолчанию: ''.
     * @var string
     */
    public $name = '';

    /**
     * Признак того, что можно менять размер данного столбца. Значение по умолчанию: true.
     * @var bool
     */
    public $resizable = true;

    /**
     * Признак того, что по данному столбцу можно проводить сорировку. Значение по умолчанию: true.
     * @var bool
     */
    public $sortable = true;

    /**
     * Признак того, что по данному столбцу может производится поиск. Значение по умолчанию: true.
     * @var bool
     */
    public $search = true;

    /**
     * Массив, содержащий параметры поиска. Для формирования значения можно воспользоваться помощником JqGrid_Column::searchOptions(). Значение по умолчанию: [].
     * @var array
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config
     */
    public $searchOptions = [];

    /**
     * Признак того, что если значение равно false, то заголовок не отображается в столбце кога мы щелкаем по клетке мышью. Значение по умолчанию: true.
     * @var bool
     */
    public $title = true;

    /**
     * Ширина столбца в пикселах. Значение по умолчанию: 150.
     * @var int
     */
    public $width = 150;

    /**
     * Признак необходимости отображать данное поле в окне просмотра (если активен метод viewGridRow). Значение по умолчанию: true.
     * @var bool
     */
    public $viewable = true;

    /**
     * Тип элемента, когда осуществляется поиск. Доступные значения: text и select. Значение по умолчанию: 'text'.
     * @var string
     */
    public $stype = 'text';

    /**
     * Используется только когда stype = 'select'. Задает адрес, откуда загружаются значения выпадающего списка. В случае указания адреса, должна формироваться страница с содержимым вида: "<select><option value='1'>One</option><option value='2'>Two</option></select>". Значение по умолчанию: ''.
     * @var string
     */
    public $surl = '';

    /**
     * Признак того что поле является первичным ключом необходимо для корректной работы собственных форм.
     * @var boolean
     */
    public $is_primary_key = false;

    /**
     * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid.
     * @return array Массив, содержащий конфигурацию для инициализации таблицы JqGrid.
     */
    public function getConfig() {
        $cfg = [];
        if (!empty($this->align)) {
            $cfg['align'] = $this->align;
        }
        if (!empty($this->classes)) {
            $cfg['classes'] = $this->classes;
        }
        if (!empty($this->defval)) {
            $cfg['defval'] = $this->defval;
        }
        $cfg['editable'] = false;
        if (!empty($this->editType)) {
            $cfg['editable'] = true;
            $cfg['edittype'] = $this->editType;
            if (count($this->editOptions) > 0) {
                $cfg['editoptions'] = $this->editOptions;
            }
        }
        if (!empty($this->formatter)) {
            $cfg['formatter'] = $this->formatter;
            if (count($this->formatOptions) > 0) {
                $cfg['formatoptions'] = $this->formatOptions;
            }
        }
        $cfg['search'] = $this->search;
        if ($this->search) {
            $cfg['stype'] = $this->stype;
            if (strtolower($this->stype) === 'select') {
                $cfg['surl'] = $this->surl;
            }
            if (count($this->searchOptions) > 0) {
                $cfg['searchoptions'] = $this->searchOptions;
            } else {
                $cfg['searchoptions'] = JqGrid_Column::searchOptions();
            }
        }
        if ($this->fixed) {
            $cfg['fixed'] = true;
        }
        if (count($this->formOptions) > 0) {
            $cfg['formoptions'] = $this->formOptions;
        }
        if ($this->frozen) {
            $cfg['frozen'] = true;
        }
        if ($this->hiddenDlg) {
            $cfg['hidedlg'] = true;
        }
        if ($this->hidden) {
            $cfg['hidden'] = true;
        }
        if (!empty($this->label)) {
            $cfg['label'] = $this->label;
        }
        if (!empty($this->name)) {
            $cfg['name'] = $this->name;
        }
        if (!$this->resizable) {
            $cfg['resizable'] = false;
        }
        if (!$this->sortable) {
            $cfg['sortable'] = false;
        }
        if (!$this->title) {
            $cfg['title'] = false;
        }
        if ($this->width > 0) {
            $cfg['width'] = $this->width;
        }
        if (!$this->viewable) {
            $cfg['viewable'] = false;
        }
        $cfg['is_primary_key'] = $this->is_primary_key;
        return $cfg;
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'text' или editType = 'password'.
     * @param number $size Размер отображаемой части поля в символах (если используется моноширинный шрифт, то размер будет фиксирован, в противном случае будет плавающим). Значение по умолчанию: 20.
     * @param number $maxLength Максимальное число символов, которое можно ввести. Если задано значение 0 - ввод не ограничен. Значение по умолчанию: 0.
     * @param string $placeholder Текст подсказки, отображаемой в пустом поле.  Значение по умолчанию: ''.
     * @param string $pattern Регулярное выражение, устанавливающее шаблон ввода.  Значение по умолчанию: ''.
     * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
     */
    public static function editOptionsText($size = 20, $maxLength = 0, $placeholder = '', $pattern = '') {
        $cfg = [];
        $cfg['size'] = $size;
        if ($maxLength > 0) {
            $cfg['maxlength'] = $maxLength;
        }
        if (!empty($placeholder)) {
            $cfg['placeholder'] = $placeholder;
        }
        if (!empty($pattern)) {
            $cfg['pattern'] = $pattern;
        }
        return $cfg;
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'textarea'.
     * @param number $rows Высота отображаемой части поля в строках. Значение по умолчанию: 2.
     * @param number $cols Ширина отображаемой части поля в символах (если используется моноширинный шрифт, то размер будет фиксирован, в противном случае будет плавающим). Значение по умолчанию: 20.
     * @param number $maxLength Максимальное число символов, которое можно ввести. Если задано значение 0 - ввод не ограничен. Значение по умолчанию: 0.
     * @param string $placeholder Текст подсказки, отображаемой в пустом поле.  Значение по умолчанию: ''.
     * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
     */
    public static function editOptionsTextarea($rows = 2, $cols = 20, $maxLength = 0, $placeholder = '') {
        $cfg = [];
        $cfg['rows'] = $rows;
        $cfg['cols'] = $cols;
        if ($maxLength > 0) {
            $cfg['maxlength'] = $maxLength;
        }
        if (!empty($placeholder)) {
            $cfg['placeholder'] = $placeholder;
        }
        return $cfg;
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'checkbox'.
     * @param string $true Значение, возвращаемое, если пользователь установил флажок.  Значение по умолчанию: 'yes'.
     * @param string $false Значение, возвращаемое, если пользователь снял флажок.  Значение по умолчанию: 'no'.
     * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
     */
    public static function editOptionsCheckbox($true = 'yes', $false = 'no') {
        return ['value' => $true . ':' . $false];
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'select'.
     * @param array/string $values Массив допустимых значений списка или адрес по которому можно получить данный список. В случае указания адреса, должна формироваться страница с содержимым вида: "<select><option value='1'>One</option><option value='2'>Two</option></select>"
     * @param bool $multiselect Признак необходимости сформировать список с поддержкой множественного выбора. Значение по умолчанию: false.
     * @param number $size Высота отображаемой части поля в строках. Значение по умолчанию: 5.
     * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
     */
    public static function editOptionsSelect($values, $multiselect = false, $size = 5) {
        $cfg = [];
        $cfg['value'] = $values;
        if ($multiselect) {
            $cfg['multiple'] = $multiselect;
            $cfg['size'] = $size;
        }
        return $cfg;
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'select', где данные будут запрашиваться по указанному URL.
     * @param array/string $values Массив допустимых значений списка или адрес по которому можно получить данный список. В случае указания адреса, должна формироваться страница с содержимым вида: "<select><option value='1'>One</option><option value='2'>Two</option></select>"
     * @param bool $multiselect Признак необходимости сформировать список с поддержкой множественного выбора. Значение по умолчанию: false.
     * @param number $size Высота отображаемой части поля в строках. Значение по умолчанию: 5.
     * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
     */
    public static function editOptionsSelectUrl($values, $multiselect = false, $size = 5) {
        $cfg = [];
        $cfg['dataUrl'] = $values;
        if ($multiselect) {
            $cfg['multiple'] = $multiselect;
            $cfg['size'] = $size;
        }
        return $cfg;
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'button'.
     * @param string $value Значение, возвращаемое при нажатии кнопки.
     * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
     */
    public static function editOptionsButton($value) {
        return ['value' => $value];
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'image'.
     * @param string $src Путь к файлу картинки.
     * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
     */
    public static function editOptionsImage($src) {
        return ['src' => $src];
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров editOptions для типа редактирования editType = 'file'.
     * @param string $alt Значение, выводимое вместо '...'.
     * @return array Массив дополнительных параметров, который может применяться для задания значения editOptions.
     */
    public static function editOptionsFile($alt) {
        return ['alt' => $alt];
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров formOptions.
     * @param number $rowpos Если больше 0, то определяет позицию элемента в соответствующей строке таблицы формы.
     * @param number $colpos Если больше 0, то определяет позицию элемента в соответствующем столбце таблицы формы.
     * @param string $label Если задано, то меняет содержимое надписи в поле описания (в label).
     * @param string $elmprefix Если задано, то формирует дополнительный префикс, выводимый перед полем редактирования.
     * @param string $elmsuffix Если задано, то формирует дополнительный постфикс, выводимый после поля редактирования.
     * @return array Массив дополнительных параметров, который может применяться для задания значения formOptions.
     */
    public static function formOptions($rowpos = 0, $colpos = 0, $label = '', $elmprefix = '', $elmsuffix = '') {
        $cfg = [];
        if ($rowpos > 0) {
            $cfg['rowpos'] = $rowpos;
        }
        if ($colpos > 0) {
            $cfg['colpos'] = $colpos;
        }
        if (!empty($label)) {
            $cfg['label'] = $label;
        }
        if (!empty($elmprefix)) {
            $cfg['elmprefix'] = $elmprefix;
        }
        if (!empty($elmsuffix)) {
            $cfg['elmsuffix'] = $elmsuffix;
        }
        return $cfg;
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров searchOptions.
     * @param string $dataUrl Адрес, откуда загружаются значения выпадающего списка. В случае указания адреса, должна формироваться страница с содержимым вида: "<select><option value='1'>One</option><option value='2'>Two</option></select>". Значение по умолчанию: ''.
     * @param array $sopt Операторы, используемые для построения поисковых запросов. Допустимые значения массива: eq, ne, lt, le, gt, ge, bw, bn, in, ni, ew, en, cn, nc, nu, nn. Значение по умолчанию: ['eq','ne','lt','le','gt','ge','bw','bn','in','ni','ew','en','cn','nc','nu','nn'].
     * @param string $defaultValue Если не пустое, то определяет зачение, которое будет содержаться в строке поиска в самом начале. Значение по умолчанию: ''.
     * @param array $value Массив допустимых значений, представленных выпадающим списком. Значение по умолчанию: [].
     * @return array Массив дополнительных параметров, который может применяться для задания значения searchOptions.
     */
    public static function searchOptions($dataUrl = '', $sopt = ['eq', 'ne', 'lt', 'le', 'gt', 'ge', 'bw', 'bn', 'in', 'ni', 'ew', 'en', 'cn', 'nc', 'nu', 'nn'], $defaultValue = '', $value = []) {
        $cfg = [];
        if (!empty($dataUrl)) {
            $cfg['dataUrl'] = $dataUrl;
        }
        if (count($sopt) > 0) {
            $cfg['sopt'] = $sopt;
        }
        if (!empty($defaultValue)) {
            $cfg['defaultValue'] = $defaultValue;
        }
        if (count($value) > 0) {
            $cfg['value'] = $value;
        }
        return $cfg;
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'integer'.
     * @param string $thousandsSeparator Разделитель тысяч. Значение по умолчанию: ' '.
     * @param string $defaulValue Значение, используемое в том случае, если значение в ячейке отсутствует. Значение по умолчанию: ''.
     * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
     */
    public static function formatInteger($thousandsSeparator = ' ', $defaulValue = '') {
        return ['thousandsSeparator' => $thousandsSeparator, 'defaulValue' => $defaulValue];
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'number'.
     * @param string $thousandsSeparator Разделитель тысяч. Значение по умолчанию: ' '.
     * @param string $decimalSeparator Разделитель целой и дробной части. Значение по умолчанию: ','.
     * @param int $decimalPlaces Число отображаемых разрядов после запятой. Значение по умолчанию: 2.
     * @param string $defaulValue Значение, используемое в том случае, если значение в ячейке отсутствует. Значение по умолчанию: ''.
     * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
     */
    public static function formatNumber($thousandsSeparator = ' ', $decimalSeparator = ',', $decimalPlaces = 2, $defaulValue = '') {
        return ['thousandsSeparator' => $thousandsSeparator, 'decimalSeparator' => $decimalSeparator, 'decimalPlaces' => $decimalPlaces, 'defaulValue' => $defaulValue];
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'currency'.
     * @param string $thousandsSeparator Разделитель тысяч. Значение по умолчанию: ' '.
     * @param string $decimalSeparator Разделитель целой и дробной части. Значение по умолчанию: ','.
     * @param int $decimalPlaces Число отображаемых разрядов после запятой. Значение по умолчанию: 2.
     * @param string $defaulValue Значение, используемое в том случае, если значение в ячейке отсутствует. Значение по умолчанию: ''.
     * @param string $prefix Префикс, добавляемый в начале значения. Значение по умолчанию: ''.
     * @param string $suffix Суффикс, добавляемый в конце значения. Значение по умолчанию: ''.
     * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
     */
    public static function formatCurrency($thousandsSeparator = ' ', $decimalSeparator = ',', $decimalPlaces = 2, $defaulValue = '', $prefix = '', $suffix = '') {
        return ['thousandsSeparator' => $thousandsSeparator, 'decimalSeparator' => $decimalSeparator, 'decimalPlaces' => $decimalPlaces, 'defaulValue' => $defaulValue, 'prefix' => $prefix, 'suffix' => $suffix];
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'date'.
     * @param string $srcformat Формат исходного значения, которое должно быть отформатировано. Аналогично PHP преобразованиям. Значение по умолчанию: 'Y-m-d H:i:s'.
     * @param string $newformat Новый формат, в который необходимо преобразовать. Аналогично PHP преобразованиям. Значение по умолчанию: 'd.m.Y H:i:s'.
     * @param string $parseRe Выражение для парсинга строки. Значение по умолчанию: ''.
     * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
     */
    public static function formatDate($srcformat = 'Y-m-d H:i:s', $newformat = 'd.m.Y H:i:s', $parseRe = '') {
        $arr = ['srcformat' => $srcformat, 'newformat' => $newformat];
        if (!empty($parseRe)) {
            $arr['parseRe'] = $parseRe;
        }
        return $arr;
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'email'.
     * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
     */
    public static function formatEmail() {
        return [];
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'link'.
     * @param string $target Ссылка назначения. Значение по умолчанию: ''.
     * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
     */
    public static function formatLink($target = '') {
        return !empty($target) ? ['target' => $target] : [];
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'showlink'.
     * @param string $baseLinkUrl Базовый url ссылки. Значение по умолчанию: ''.
     * @param string $showAction Значение, которое добавляется после baseLinkUrl. Значение по умолчанию: ''.
     * @param string $addParam Параметр, который может быть добавлен после свойства idName Значение по умолчанию: ''.
     * @param string $target Ссылка назначения. Значение по умолчанию: ''.
     * @param string $idName Добавляемый идентификатор. Значение по умолчанию: ''.
     * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
     */
    public static function formatShowlink($baseLinkUrl = '', $showAction = '', $addParam = '', $target = '', $idName = '') {
        return ['baseLinkUrl' => $baseLinkUrl, 'showAction' => $showAction, 'addParam' => $addParam, 'target' => $target, 'idName' => $idName];
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'checkbox'.
     * @param string $disabled Значение, используемое для снятия галочки, в противном случае она будет установлена.
     * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
     */
    public static function formatCheckbox($disabled) {
        return ['disabled' => $disabled];
    }

    /**
     * Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'select'. Для отображения текста использовать те же значения, которые определены в edittype = 'select'.
     * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
     */
    public static function formatSelect() {
        return [];
    }

    /**
     * НЕ РЕАЛИЗОВАНО!!! Помощник, представляющий возможность сформировать значение дополнительных параметров formatOptions для типа редактирования formatter = 'actions'.
     * @param string $ Значение по умолчанию: ''.
     * @return array Массив дополнительных параметров, который может применяться для задания значения formatOptions.
     */
    public static function formatActions() {

        // TODO: В дальнейшем, если будет использоваться данный помощник, необходима реализация.
        return [keys => false, editbutton => true, delbutton => true, editformbutton => false, onEdit => null, onSuccess => null, afterSave => null, onError => null, afterRestore => null, extraparam => [oper => 'edit'], url => null, delOptions => [], editOptions => []];
    }

    /**
     * Помощник формирует конфигурационный массив для столбца числовых идентификаторов. Данный столбец будет скрыт и не будет участвовать в поиске.
     * @param string $name Имя столбца.
     * @return JqGrid_Column Конфигурационный массив для указанного столбца.
     */
    public static function columnNumberId($name) {
        $e = new JqGrid_Column();
        $e->name = $name;
        $e->label = '';
        $e->search = false;
        $e->is_primary_key = true;
        $e->hidden = $e->hiddenDlg = true;
        $e->sortable = false;
        $e->viewable = false;
        return $e;
    }

    /**
     * Помощник формирует конфигурационный массив для столбца главных текстовых значений с возможностью полного поиска. Данный столбец имеет возможность заморозки (при нажатии на соответствующую кнопку).
     * @param string $name Имя столбца.
     * @param string $label Заголовок столбца.
     * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
     * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
     * @return JqGrid_Column Конфигурационный массив для указанного столбца.
     */
    public static function columnMainTextVal($name, $label, $width = 250, $align = 'left') {
        $e = new JqGrid_Column();
        $e->name = $name;
        $e->label = $label;
        $e->editType = 'text';
        $e->frozen = true;
        $e->width = $width;
        $e->align = $align;
        return $e;
    }

    /**
     * Помощник формирует конфигурационный массив для текстового столбца значений без возможности поиска.
     * @param string $name Имя столбца.
     * @param string $label Заголовок столбца.
     * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
     * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
     * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
     * @return JqGrid_Column Конфигурационный массив для указанного столбца.
     */
    public static function columnTextVal($name, $label, $width = 250, $align = 'left', $canEdit = true) {
        $e = new JqGrid_Column();
        $e->name = $name;
        $e->label = $label;
        $e->search = false;
        if ($canEdit) {
            $e->editType = 'text';
        }
        $e->width = $width;
        $e->align = $align;
        return $e;
    }

    /**
     * Помощник формирует конфигурационный массив для текстового столбца значений с возможностью поиска.
     * @param string $name Имя столбца.
     * @param string $label Заголовок столбца.
     * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
     * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
     * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
     * @param bool $hidden Признак того, что данное поле будет скрыто в основной таблице, но будет доступно для отображения с помощью окна сортировки столбцов. Значение по умолчанию: false.
     * @param bool $frozen Признак того, что столбец необходимо заморозить.
     * @return JqGrid_Column Конфигурационный массив для указанного столбца.
     */
    public static function columnTextValWithSearch($name, $label, $width = 250, $align = 'left', $canEdit = true, $hidden = false, $frozen = false) {
        $e = JqGrid_Column::columnTextVal($name, $label, $width, $align, $canEdit);
        $e->search = true;
        $e->hidden = $hidden;
        $e->frozen = $frozen;
        return $e;
    }

    /**
     * Помощник формирует конфигурационный массив для столбца из списка значений без возможности поиска.
     * @param string $name Имя столбца.
     * @param string $label Заголовок столбца.
     * @param array/string $val Массив значений (где ключ - идентификатор) или адрес URL, откуда загружаются соответствующие данные (для автоматического преобразования ID в значение из списка необходимо передавать массив значений, а не URL, т.к. данные не подгружаются автоматически).
     * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
     * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
     * @return JqGrid_Column Конфигурационный массив для указанного столбца.
     */
    public static function columnSelectVal($name, $label, $val, $width = 250, $align = 'left') {
        $e = new JqGrid_Column();
        $e->name = $name;
        $e->label = $label;
        $e->width = $width;
        $e->align = $align;
        $e->search = false;
        $e->formatter = 'select'; // Вызов formatSelect() не нужен, т.к. select не имеет опций форматирования
        $e->editType = 'select';
        $e->editOptions = JqGrid_Column::editOptionsSelect($val);
        return $e;
    }

    /**
     * Помощник формирует конфигурационный массив для столбца из списка значений с возможностью поиска.
     * @param string $name Имя столбца.
     * @param string $label Заголовок столбца.
     * @param string $sval Адрес URL, откуда загружаются соответствующие данные. Если значение не задано, то будет использоваться текстовый поиск. Значение по умолчанию: NULL.
     * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
     * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
     * @param array $val Массив значений (где ключ - идентификатор). Если данный параметр не задан, то данные будут взяты из $sval. Значение по умолчанию: NULL.
     * @param bool $hidden Признак того, что данное поле будет скрыто в основной таблице, но будет доступно для отображения с помощью окна сортировки столбцов. Значение по умолчанию: false.
     * @return JqGrid_Column Конфигурационный массив для указанного столбца.
     */
    public static function columnSelectValWithSearch($name, $label, $sval = NULL, $width = 250, $align = 'left', $val = NULL, $hidden = false) {
        $e = JqGrid_Column::columnSelectVal($name, $label, $val, $width, $align);
        $e->editOptions = JqGrid_Column::editOptionsSelect($val);
        $e->search = true;
        if (!empty($sval)) {
            $e->stype = 'select';
            $e->searchOptions = JqGrid_Column::searchOptions($sval, ['eq', 'ne']);
        }
        $e->hidden = $hidden;
        return $e;
    }

    /**
     * Помощник формирует конфигурационный массив для столбца из флагов без возможности поиска.
     * @param string $name Имя столбца.
     * @param string $label Заголовок столбца.
     * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 50.
     * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'center'.
     * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
     * @return JqGrid_Column Конфигурационный массив для указанного столбца.
     */
    public static function columnCheckboxVal($name, $label, $width = 50, $align = 'center', $canEdit = true) {
        $e = new JqGrid_Column();
        $e->name = $name;
        $e->label = $label;
        $e->width = $width;
        $e->align = $align;
        $e->formatter = 'checkbox';
        $e->formatOptions = JqGrid_Column::formatCheckbox('0');
        if ($canEdit) {
            $e->editType = 'checkbox';
            $e->editOptions = JqGrid_Column::editOptionsCheckbox('1', '0');
        }
        $e->search = false;
        return $e;
    }

    /**
     * Помощник формирует конфигурационный массив для столбца из флагов с возможностью поиска.
     * @param string $name Имя столбца.
     * @param string $label Заголовок столбца.
     * @param string $sval Адрес URL, откуда загружается содержимое выпадающего списка для поиска.
     * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 50.
     * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'center'.
     * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
     * @return JqGrid_Column Конфигурационный массив для указанного столбца.
     */
    public static function columnCheckboxValWithSearch($name, $label, $sval, $width = 50, $align = 'center', $canEdit = true) {
        $e = JqGrid_Column::columnCheckboxVal($name, $label, $width, $align, $canEdit);
        $e->search = true;
        $e->stype = 'select';
        $e->searchOptions = JqGrid_Column::searchOptions($sval, ['eq', 'ne']);
        return $e;
    }

    /**
     * Помощник формирует конфигурационный массив для столбца из полей с автодополнением.
     * @param string $name Имя столбца.
     * @param string $label Заголовок столбца.
     * @param string $field_name Имя поля в БД.
     * @param string $model_name Модель в которой нужно искать значение поля.
     * @return JqGrid_Column Конфигурационный массив для указанного столбца.
     */
    public static function columnAutocomplete($name, $label, $field_name, $model_name, $col_width) {
        $e = new JqGrid_Column();
        $e->name = $name;
        $e->label = $label;
        $e->editType = 'ac';
        $e->width = $col_width;
        $e->editOptions = ['field' => $field_name, 'model' => $model_name];
        return $e;
    }

    /**
     * Помощник формирует конфигурационный массив для текстового столбца значений дат без возможности поиска.
     * @param string $name Имя столбца.
     * @param string $label Заголовок столбца.
     * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
     * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
     * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
     * @param string $srcformat Формат исходного значения, которое должно быть отформатировано. Аналогично PHP преобразованиям. Значение по умолчанию: 'Y-m-d H:i:s'.
     * @param string $newformat Новый формат, в который необходимо преобразовать. Аналогично PHP преобразованиям. Значение по умолчанию: 'd.m.Y H:i:s'.
     * @return JqGrid_Column Конфигурационный массив для указанного столбца.
     */
    public static function columnDateVal($name, $label, $width = 250, $align = 'left', $canEdit = true, $srcformat = 'Y-m-d H:i:s', $newformat = 'd.m.Y H:i:s') {
        $e = new JqGrid_Column();
        $e->name = $name;
        $e->label = $label;
        $e->search = false;
        if ($canEdit) {
            $e->editType = 'text';
        }
        $e->formatter = 'date';
        $e->formatOptions = JqGrid_Column::formatDate($srcformat, $newformat);
        $e->width = $width;
        $e->align = $align;
        return $e;
    }

    /**
     * Помощник формирует конфигурационный массив для текстового столбца значений дат с возможностью поиска.
     * @param string $name Имя столбца.
     * @param string $label Заголовок столбца.
     * @param int $width Ширина столбца в пикселах. Значение по умолчанию: 250.
     * @param string $align Выравнивание текста в ячейке. Возможные значения: left, center, right. Значение по умолчанию: 'left'.
     * @param bool $canEdit Признак того, что данное поле можно редактировать. Значение по умолчанию: true.
     * @param string $srcformat Формат исходного значения, которое должно быть отформатировано. Аналогично PHP преобразованиям. Значение по умолчанию: 'Y-m-d H:i:s'.
     * @param string $newformat Новый формат, в который необходимо преобразовать. Аналогично PHP преобразованиям. Значение по умолчанию: 'd.m.Y H:i:s'.
     * @param bool $hidden Признак того, что данное поле будет скрыто в основной таблице, но будет доступно для отображения с помощью окна сортировки столбцов. Значение по умолчанию: false.
     * @return JqGrid_Column Конфигурационный массив для указанного столбца.
     */
    public static function columnDateValWithSearch($name, $label, $width = 250, $align = 'left', $canEdit = true, $srcformat = 'Y-m-d H:i:s', $newformat = 'd.m.Y H:i:s', $hidden = false) {
        $e = JqGrid_Column::columnDateVal($name, $label, $width, $align, $canEdit, $srcformat, $newformat);
        $e->search = true;
        $e->hidden = $hidden;
        return $e;
    }

    /**
     * Функция формирует выпадающий список, представленный в виде HTML на основе заданного массива значений.
     * @param array $vals Массив значений, на основе которого будет формироваться выпадающий список.
     * @param bool $addNull Признак необходимости добавить пустое значение (<option value="-1"> - </option>). Значение по умолчанию: true.
     * @param string $name Имя элемента. Значение по умолчанию: ''
     * @param string $id Идентификатор элемента. Значение по умолчанию: ''
     * @param string $class Название класса элемента. Значение по умолчанию: ''
     * @return string HTML код выпадающего списка.
     */
    public static function createSelect($vals, $addNull = true, $name = '', $id = '', $class = '') {
        $_ts = '';
        if ($addNull && !count(array_filter($vals, function ($val) {
            return trim($val) == '-';
        }))) // Если в массиве существует элемент '-', то его не добавляем
            $_ts = '<option value="-1"> - </option>';
        foreach ($vals as $i => $key)
            $_ts .= '<option value="' . $i . '">' . $key . '</option>';
        return '<select' . (!empty($name) ? ' name="' . $id . '"' : '') . (!empty($id) ? ' id="' . $id . '"' : '') . (!empty($class) ? ' class="' . $class . '"' : '') . '>' . $_ts . '</select>';
    }

}
