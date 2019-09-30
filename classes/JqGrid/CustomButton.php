<?php
namespace RUSproj\Kohana\JqGrid\JqGrid;

/**
 * Класс, который представляет конфигурацию пользовательской кнопки, добавляемой на панель инструментов jqGrid.
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-NOW RUSproj, Sergey S. Smirnov
 */
class JqGrid_CustomButton
{

    /**
     * Признак того, что эемент будет представлен кнопкой. Если значение равно false, то элемент будет представлен разделителем. Значение по умолчанию: true.
     * @var bool
     */
    public $isButton = true;

    /**
     * Позиция кнопки или разделителя на панели инструментов. Возможные значения: 'first' или 'last'. Значение по умолчанию: 'last'.
     * @var string
     */
    public $position = 'last';

    /**
     * Заголовок кнопки. Значение по умолчанию: ''.
     * @var string
     */
    public $btnCaption = '';

    /**
     * Название изображения кнопки, которое определено в наборе UI. Значение по умолчанию: '' (не определено).
     * @var string
     */
    public $btnIcon = '';

    /**
     * Имя функции, которая будет выполняться при нажатии на кнопку. Значение по умолчанию: '' (не определено).
     * @var string
     */
    public $btnOnClickFcnName = '';

    /**
     * Текст всплывающей подсказки над кнопкой. Значение по умолчанию: ''.
     * @var string
     */
    public $btnTitle = '';

    // public $btnCursor = '';

    /**
     * Имя идентификатора кнопки (используется для последующих манипуляций). Значение по умолчанию: '' (не определено).
     * @var string
     */
    public $btnId = '';

    /**
     * Имя класса разделителя. Данное свойство используется если свойство isButton = false. Значение по умолчанию: '' (не определено).
     * @var string
     */
    public $sepClass = '';

    /**
     * Контент, который будет добавлен в блок разделителя. Данное свойство используется если свойство isButton = false. Значение по умолчанию: '' (не определено).
     * @var string
     */
    public $sepContent = '';

    /**
     * Формирует конфигурацию пользовательской кнопки для панели инструментов на основе переданных параметров.
     * @param string $onClickFcn Имя функции, которая должна срабатывать при нажатии на кнопку.
     * @param string $caption Заголовок кнопки.
     * @param string $buttonIcon Название изображения кнопки, которое определено в наборе UI.
     * @param string $title Текст всплывающей подсказки.
     * @param string $position Позиция кнопки на панели инструментов. Возможные значения: 'first' или 'last'. Значение по умолчанию: 'last'.
     * @param string $id Имя идентификатора кнопки.
     * @return JqGrid_CustomButton
     */
    public static function addButton($onClickFcn, $caption = '', $buttonIcon = '', $title = '', $position = '', $id = '') {
        $btn = new JqGrid_CustomButton();
        $btn->btnOnClickFcnName = $onClickFcn;
        $btn->btnCaption = $caption;
        $btn->btnIcon = $buttonIcon;
        $btn->btnTitle = $title;
        $btn->btnId = $id;
        $btn->position = $position;
        return $btn;
    }

    /**
     * Формирует конфигурацию разделителя для панели инструментов на основе переданных параметров.
     * @param string $class Имя класса разделителя.
     * @param string $content Контент, который будет добавлен в блок разделителя.
     * @param string $position Позиция разделителя на панели инструментов. Возможные значения: 'first' или 'last'. Значение по умолчанию: 'last'.
     * @return JqGrid_CustomButton
     */
    public static function addSeparator($class = '', $content = '', $position = '') {
        $btn = new JqGrid_CustomButton();
        $btn->isButton = false;
        $btn->sepClass = $class;
        $btn->sepContent = $content;
        $btn->position = $position;
        return $btn;
    }

    /**
     * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid.
     * @return array Массив, содержащий конфигурацию для инициализации таблицы JqGrid.
     */
    public function getConfig() {
        $cfg = [];
        $cfg['btn'] = $this->isButton;
        if ($this->isButton === true) {
            $cfg['caption'] = $this->btnCaption;
            if (!empty($this->btnIcon)) {
                $cfg['buttonicon'] = $this->btnIcon;
            }
            if (!empty($this->btnOnClickFcnName)) {
                $cfg['onClickButtonFcnName'] = $this->btnOnClickFcnName;
            }
            if (!empty($this->btnTitle)) {
                $cfg['title'] = $this->btnTitle;
            }
            if (!empty($this->btnId)) {
                $cfg['id'] = $this->btnId;
            }
            // $cfg['cursor'] = $this->btnCursor;
        } else {
            if (!empty($this->sepClass)) {
                $cfg['sepclass'] = $this->sepClass;
            }
            if (!empty($this->sepContent)) {
                $cfg['sepcontent'] = $this->sepContent;
            }
        }
        if (!empty($this->position)) {
            $cfg['position'] = $this->position;
        }
        return $cfg;
    }

}
