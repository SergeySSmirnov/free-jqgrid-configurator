<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid\Buttons;

use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;

/**
 * Config of the "Delete selected record" button.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class DeleteButtonConfig implements ConfigurationDefinitionInterface
{

    /**
     * Initialize a new instance of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\DeleteButtonConfig} class.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\DeleteButtonConfig
     */
    public static function createInstance()
    {
        return new DeleteButtonConfig();
    }

    /**
     * Set a icon to be displayed if the delete action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: 'ui-icon ui-icon-trash' (from language file).
     *
     * @var string
     */
    private $delicon = 'ui-icon ui-icon-trash';

    /**
     * The text than can be set in the delete button.
     *
     * Default value: '' (from language file).
     *
     * @var string
     */
    private $deltext = '';

    /**
     * The title that appear when we mouse over to the delete button.
     *
     * Default value: 'Delete selected row' (from language file).
     *
     * @var string
     */
    private $deltitle = 'Delete selected row';

    /**
     * If defined replaces the build in del function. Parameter passed to this function is the id of the edited row.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__eventHandler__delfunc = '';

    /**
     * Determine if the alert dialog can be closed if the user pres ESC key.
     *
     * Default value: true.
     *
     * @var bool
     */
    private $closeOnEscape = true;

    /**
     * {@inheritDoc}
     * @see \Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface::getConfig()
     */
    public function getConfig() {
        $_config = [];

        foreach ($this as $_key => $_val) {
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

        unset($_config['delicon'], $_config['deltext'], $_config['deltitle'], $_config['__eventHandler__delfunc']);

        return [
            'delicon' => $this->delicon,
            'deltext' => $this->deltext,
            'deltitle' => $this->deltitle,
            '__eventHandler__delfunc' => $this->__eventHandler__delfunc,
            '__delButtonConfig' => (object)$_config
        ];
    }

    /**
     * Set a icon to be displayed if the delete action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getDelIcon()
    {
        return $this->delicon;
    }

    /**
     * Set a icon to be displayed if the delete action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: '' (from language file).
     *
     * @param string $delIcon
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\DeleteButtonConfig
     */
    public function setDelIcon($delIcon)
    {
        $this->delicon = $delIcon;
        return $this;
    }

    /**
     * The text than can be set in the delete button.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getDelText()
    {
        return $this->deltext;
    }

    /**
     * The text than can be set in the delete button.
     *
     * Default value: '' (from language file).
     *
     * @param string $delText
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\DeleteButtonConfig
     */
    public function setDelText($delText)
    {
        $this->deltext = $delText;
        return $this;
    }

    /**
     * The title that appear when we mouse over to the delete button.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getDelTitle()
    {
        return $this->deltitle;
    }

    /**
     * The title that appear when we mouse over to the delete button.
     *
     * Default value: '' (from language file).
     *
     * @param string $delTitle
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\DeleteButtonConfig
     */
    public function setDelTitle($delTitle)
    {
        $this->deltitle = $delTitle;
        return $this;
    }

    /**
     * If defined replaces the build in del function. Parameter passed to this function is the id of the edited row.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getDelFunc()
    {
        return $this->__eventHandler__delfunc;
    }

    /**
     * If defined replaces the build in del function. Parameter passed to this function is the id of the edited row.
     *
     * Default value: ''.
     *
     * @param string $delFunc
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\DeleteButtonConfig
     */
    public function setDelFunc($delFunc)
    {
        $this->__eventHandler__delfunc = $delFunc;
        return $this;
    }

    /**
     * Determine if the alert dialog can be closed if the user pres ESC key.
     *
     * Default value: true.
     *
     * @return boolean
     */
    public function getCloseOnEscape()
    {
        return $this->closeOnEscape;
    }

    /**
     * Determine if the alert dialog can be closed if the user pres ESC key.
     *
     * Default value: true.
     *
     * @param boolean $closeOnEscape
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\DeleteButtonConfig
     */
    public function setCloseOnEscape($closeOnEscape)
    {
        $this->closeOnEscape = $closeOnEscape;
        return $this;
    }

}
