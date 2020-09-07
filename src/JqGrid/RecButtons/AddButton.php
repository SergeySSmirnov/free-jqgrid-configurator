<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid\RecButtons;

/**
 * Класс, который представляет конфигурацию кнопки "Добавить новую запись".
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class AddButton
{
    /**
     * Задает класс значка из стиля jQuery, который должен соответствовать кнопке. Значение по умолчанию: '' (не задано).
     *
     * @var string
     */
    public $addIcon = '';

    /**
     * Назначить кнопке другой обработчик нажатия. Значение по умолчанию: false.
     *
     * @var bool
     */
    public $addFunc = false;

    /**
     * Название функции, которая должна запускаться вместо действия по умолчанию.
     * Данная функция не имеет параметров. Значение по умолчанию: 'editForm_Show'.
     *
     * @var string
     */
    public $addFunctionName = 'editForm_Show';

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
        if (!empty($this->addIcon)) {
            $cfg['recButtons']['addicon'] = $this->addIcon;
        }
        if ($this->addFunc) {
            $cfg['recButtons']['addFunctionName'] = $this->addFunctionName;
        }
        $cfg['recButtonsAdd'] = [];
        $cfg['recButtonsAdd']['closeOnEscape'] = $this->closeOnEscape;

        // TODO: Необходимо описать дополнительные параметры добавления записи.

        return $cfg;
    }

}
