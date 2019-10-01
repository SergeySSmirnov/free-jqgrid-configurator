<?php
namespace RUSproj\Kohana\JqGrid\JqGrid\RecButtons;

/**
 * Класс, который представляет конфигурацию кнопки "Удалить выбранную запись".
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-19 RUSproj, Sergey S. Smirnov
 */
class JqGrid_RecButtons_Del
{
    /**
     * Задает класс значка из стиля jQuery, который должен соответствовать кнопке. Значение по умолчанию: '' (не задано).
     * @var string
     */
    public $delIcon = '';

    /**
     * Назначить кнопке другой обработчик нажатия. Значение по умолчанию: true.
     * @var bool
     */
    public $delFunc = true;

    /**
     * Название функции, которая должна запускаться вместо действия по умолчанию. Данная функция должна иметь один параметр - идентификатор строки. Значение по умолчанию: 'editForm_Delete'.
     * @var string
     */
    public $delFunctionName = 'editForm_Delete';

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
        if (!empty($this->delIcon)) {
            $cfg['recButtons']['delicon'] = $this->delIcon;
        }
        if ($this->delFunc) {
            $cfg['recButtons']['delFunctionName'] = $this->delFunctionName;
        }
        // Формируем массив дополнительной конфигурации
        $cfg['recButtonsDel'] = [];
        $cfg['recButtonsDel']['closeOnEscape'] = $this->closeOnEscape;

        // TODO: Необходимо описать дополнительные параметры удаления записи.

        return $cfg;
    }

}
