<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid\Buttons;

use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;

/**
 * Config of the "Create a new record" button.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class AddButtonConfig implements ConfigurationDefinitionInterface
{

    /**
     * Initialize a new instance of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\AddButtonConfig} class.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\AddButtonConfig
     */
    public static function createInstance()
    {
        return new AddButtonConfig();
    }

    /**
     * Set a icon to be displayed if the add action is enabled. Note that currently only icons from UI theme images can be added.
     *
     * Default value: 'ui-icon ui-icon-plus' (from language file).
     *
     * @var string
     */
    private $addicon = '';

    /**
     * The text than can be set in the add button.
     *
     * Default value: '' (from language file).
     *
     * @var string
     */
    private $addtext = '';

    /**
     * The title that appear when we mouse over to the add button.
     *
     * Default value: 'Add new row' (from language file).
     *
     * @var string
     */
    private $addtitle = 'Add new row';

    /**
     * If defined replaces the build in add function.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__eventHandler__addfunc = '';

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

        unset($_config['addicon'], $_config['addtext'], $_config['addtitle'], $_config['__eventHandler__addfunc']);

        return [
            'addicon' => $this->addicon,
            'addtext' => $this->addtext,
            'addtitle' => $this->addtitle,
            '__eventHandler__addfunc' => $this->__eventHandler__addfunc,
            '__addButtonConfig' => (object)$_config
        ];
    }

    /**
     * Set a icon to be displayed if the add action is enabled. Note that currently only icons from UI theme images can be added.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getAddIcon()
    {
        return $this->addicon;
    }

    /**
     * Set a icon to be displayed if the add action is enabled. Note that currently only icons from UI theme images can be added.
     *
     * Default value: '' (from language file).
     *
     * @param string $addIcon
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\AddButtonConfig
     */
    public function setAddIcon($addIcon)
    {
        $this->addicon = $addIcon;
        return $this;
    }

    /**
     * The text than can be set in the add button.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getAddText()
    {
        return $this->addtext;
    }

    /**
     * The text than can be set in the add button.
     *
     * Default value: '' (from language file).
     *
     * @param string $addText
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\AddButtonConfig
     */
    public function setAddText($addText)
    {
        $this->addtext = $addText;
        return $this;
    }

    /**
     * The title that appear when we mouse over to the add button.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getAddTitle()
    {
        return $this->addtitle;
    }

    /**
     * The title that appear when we mouse over to the add button.
     *
     * Default value: '' (from language file).
     *
     * @param string $addTitle
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\AddButtonConfig
     */
    public function setAddTitle($addTitle)
    {
        $this->addtitle = $addTitle;
        return $this;
    }

    /**
     * If defined replaces the build in add function.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getAddFunc()
    {
        return $this->__eventHandler__addfunc;
    }

    /**
     * If defined replaces the build in add function.
     *
     * Default value: ''.
     *
     * @param string $addFunc
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\AddButtonConfig
     */
    public function setAddFunc($addFunc)
    {
        $this->__eventHandler__addfunc = $addFunc;
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
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\AddButtonConfig
     */
    public function setCloseOnEscape($closeOnEscape)
    {
        $this->closeOnEscape = $closeOnEscape;
        return $this;
    }

}
