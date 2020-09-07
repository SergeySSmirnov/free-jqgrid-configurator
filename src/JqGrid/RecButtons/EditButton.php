<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons;

/**
 * Класс, который представляет конфигурацию кнопки "Редактировать выбранную запись".
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class EditButton
{
    /**
     * Задает класс значка из стиля jQuery, который должен соответствовать кнопке. Значение по умолчанию: '' (не задано).
     *
     * @var string
     */
    public $editIcon = '';

    /**
     * Назначить кнопке другой обработчик нажатия. Значение по умолчанию: false.
     *
     * @var bool
     */
    public $editFunc = false;

    /**
     * Название функции, которая должна запускаться вместо действия по умолчанию.
     * Данная функция должна иметь один параметр - идентификатор строки. Значение по умолчанию: 'editForm_Show'.
     *
     * @var string
     */
    public $editFunctionName = 'editForm_Show';

    /**
     * Признак необходимости закрывать все всплывающие окна при нажатии на клавишу "Esc". Значение по умолчанию: true.
     *
     * @var bool
     */
    public $closeOnEscape = true;

    /**
     * Формирует массив конфигурационных параметров.
     *
     * @param array $cfg Массив, который содержит исходные значения параметров, и, в который необходимо записать новые дополнительные параметры.
     * @return array Массив, содержащий итоговые значения параметров.
     */
    public function getConfig($cfg) {
        if (!empty($this->editIcon)) {
            $cfg['recButtons']['editicon'] = $this->editIcon;
        }
        if ($this->editFunc) {
            $cfg['recButtons']['editFunctionName'] = $this->editFunctionName;
        }
        $cfg['recButtonsEdit'] = [];
        $cfg['recButtonsEdit']['closeOnEscape'] = $this->closeOnEscape;

        // TODO: Необходимо описать дополнительные параметры редактирования записи.

        return $cfg;
    }

}
