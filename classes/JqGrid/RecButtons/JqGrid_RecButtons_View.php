<?php
namespace RUSproj\Kohana\JqGrid\JqGrid\RecButtons;

/**
 * Класс, который представляет конфигурацию кнопки "Просмотреть выбранную запись".
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-19 RUSproj, Sergey S. Smirnov
 */
class JqGrid_RecButtons_View
{

    /**
     * Задает класс значка из стиля jQuery, который должен соответствовать кнопке. Значение по умолчанию: '' (не задано).
     * @var string
     */
    public $viewIcon = '';

    /**
     * Признак необходимости закрывать все всплывающие окна при нажатии на клавишу "Esc". Значение по умолчанию: true.
     * @var bool
     */
    public $closeOnEscape = true;

    /**
     * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid.
     * @param array $cfg Массив, который содержит исходные значения параметров, и, в который необходимо записать новые дополнительные параметры.
     * @return array Массив, содержащий итоговые значения параметров.
     */
    public function getConfig($cfg) {
        if (!empty($this->viewIcon)) {
            $cfg['recButtons']['viewicon'] = $this->viewIcon;
        }
        $cfg['recButtonsView'] = [];
        $cfg['recButtonsView']['closeOnEscape'] = $this->closeOnEscape;

        // TODO: Необходимо описать дополнительные параметры просмотра записи.

        return $cfg;
    }

}
