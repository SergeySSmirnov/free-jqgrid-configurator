<?php
namespace RUSproj\Kohana\JqGrid\JqGrid;

/**
 * Класс, который представляет конфигурацию панели постраничной навигации по таблице jqGrid.
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-NOW RUSproj, Sergey S. Smirnov
 */
class JqGrid_Pager
{

    /**
     * Задает действительный идентификатор html-элемента, который будет содержать панель навигации по записям таблицы. Значение по умолчанию: '#pager'.
     * @var string
     */
    public $pager = '#pager';

    /**
     * Позиция кнопок навигации на панели. Допустимые значения: left, center, right. Значение по умолчанию: center.
     * @var string
     */
    public $pagerPos = 'center';

    /**
     * Признак необходимости отображать кнопки навигации. Значение по умолчанию: true.
     * @var bool
     */
    public $pgButtons = true;

    /**
     * Признак необходимости отображать поле ввода нужной страницы с записями. Значение по умолчанию: true.
     * @var bool
     */
    public $pgInput = true;

    /**
     * Позиция числа отображаемых записей на панели. Допустимые значения: left, center, right. Значение по умолчанию: right.
     * @var string
     */
    public $recordPos = 'right';

    /**
     * Задает массив чисел, представляющих выпадающий список числа отображаемых записей. Если массив не задан, список не отображается.
     * @var array
     */
    public $rowList = [0, 5, 10, 15, 25, 50, 100, 250, 500];

    /**
     * Задает число записей таблицы, отображаемых по умолчанию за один раз. Кроме численного значения возможно задать значение 0, которое позволяет отобразить все записи таблицы. Значение по умолчанию: 15.
     * @var int
     */
    public $rowNum = 15;

    /**
     * Задает признак необходимости отображения информации о числе отображаемых записей из общего числа записей. Значение по умолчанию: true.
     * @var bool
     */
    public $viewRecords = true;

    /**
     * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid.
     * @return array Массив, содержащий конфигурацию для инициализации таблицы JqGrid.
     */
    public function getConfig() {
        $cfg = [];
        if (!empty($this->pager)) {
            $cfg['pager'] = $this->pager;
            $cfg['pagerpos'] = $this->pagerPos;
            $cfg['pgbuttons'] = $this->pgButtons;
            $cfg['pginput'] = $this->pgInput;
        }
        if ($this->viewRecords) {
            $cfg['viewrecords'] = true;
            $cfg['recordpos'] = $this->recordPos;
        }
        $cfg['rowList'] = $this->rowList;
        $cfg['rowNum'] = $this->rowNum;
        return $cfg;
    }

}
