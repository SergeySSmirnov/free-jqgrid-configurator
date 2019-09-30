<?php
namespace RUSproj\Kohana\JqGrid\JqGrid\RecButtons;

/**
 * Класс, который представляет конфигурацию кнопки "Обновить содержимое таблицы".
 * @package JqGrid
 * @author Сергей С. Смирнов
 * @copyright (c) 2010-19 RUSproj, Sergey S. Smirnov
 */
class JqGrid_RecButtons_Refresh
{
    /**
     * Задает класс значка из стиля jQuery, который должен соответствовать кнопке. Значение по умолчанию: '' (не задано).
     * @var string
     */
    public $refreshIcon = '';

    /**
     * Название фанкции, которая должна запускаться после нажатия на кнопку "Обновить". Данная функция не имеет параметров. Значение по умолчанию: '' (не задано).
     * @var string
     */
    public $afterRefreshFunction = '';

    /**
     * Название фанкции, которая должна запускаться до нажатия на кнопку "Обновить". Данная функция не имеет параметров. Значение по умолчанию: '' (не задано).
     * @var string
     */
    public $beforeRefreshFunction = '';

    /**
     * Определяет как таблица должна обновляться. Возможные значения: firstpage (таблица перезагружает данные с первой страницы) или current (перезагрузка должна сохранить текущую сраницу и текущее выделение). Значение по умолчанию: '' (не задано).
     * @var string
     */
    public $refreshState = '';

    /**
     * Формирует массив конфигурационных параметров, которые может воспринимать скрипт инициализации base.table.js таблиц jqGrid.
     * @param array $cfg Массив, который содержит исходные значения параметров, и, в который необходимо записать новые дополнительные параметры.
     * @return array Массив, содержащий итоговые значения параметров.
     */
    public function getConfig($cfg) {
        if (!empty($this->refreshIcon)) {
            $cfg['recButtons']['refreshicon'] = $this->refreshIcon;
        }
        if (!empty($this->afterRefreshFunction)) {
            $cfg['recButtons']['afterRefreshFunction'] = $this->afterRefreshFunction;
        }
        if (!empty($this->beforeRefreshFunction)) {
            $cfg['recButtons']['beforeRefreshFunction'] = $this->beforeRefreshFunction;
        }
        if (!empty($this->refreshState)) {
            $cfg['recButtons']['refreshstate'] = $this->refreshState;
        }
        return $cfg;
    }

}
