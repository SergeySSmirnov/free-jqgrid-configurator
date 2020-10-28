<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid\Buttons;

use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;

/**
 * Config of the "Edit selected record" button.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class EditButtonConfig implements ConfigurationDefinitionInterface
{

    /**
     * Initialize a new instance of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\EditButtonConfig} class.
     *
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\EditButtonConfig
     */
    public static function createInstance()
    {
        return new EditButtonConfig();
    }

    /**
     * Set a icon to be displayed if the edit action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: 'ui-icon ui-icon-pencil' (from language file).
     *
     * @var string
     */
    private $editicon = '';

    /**
     * The text than can be set in the edit button.
     *
     * Default value: '' (from language file).
     *
     * @var string
     */
    private $edittext = '';

    /**
     * The title that appear when we mouse over to the edit button.
     *
     * Default value: 'Edit selected row' (from language file).
     *
     * @var string
     */
    private $edittitle = '';

    /**
     * If defined replaces the build in edit function. Parameter passed to this function is the id of the edited row.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__eventHandler__editfunc = '';

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
        $_configFieldsExcept = ['editicon', 'edittext', 'edittitle', '__eventHandler__editfunc'];
        $_btnConfigFieldName = '__editButtonConfig';
        $_config = [$_btnConfigFieldName => []];

        foreach ($this as $_key => $_val) {
            if (is_string($_val)) {
                $_val = trim($_val);
                if (empty($_val)) {
                    continue;
                }
            } elseif (is_null($_val)) {
                continue;
            }

            if (in_array($_key, $_configFieldsExcept)) {
                $_config[$_key] = $_val;
            } else {
                $_config[$_btnConfigFieldName][$_key] = $_val;
            }
        }

        return $_config;
    }

    /**
     * Set a icon to be displayed if the edit action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getEditIcon()
    {
        return $this->editicon;
    }

    /**
     * Set a icon to be displayed if the edit action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: '' (from language file).
     *
     * @param string $editIcon
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\EditButtonConfig
     */
    public function setEditIcon($editIcon)
    {
        $this->editicon = $editIcon;
        return $this;
    }

    /**
     * The text than can be set in the edit button.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getEdiText()
    {
        return $this->edittext;
    }

    /**
     * The text than can be set in the edit button.
     *
     * Default value: '' (from language file).
     *
     * @param string $editText
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\EditButtonConfig
     */
    public function setEditText($editText)
    {
        $this->edittext = $editText;
        return $this;
    }

    /**
     * The title that appear when we mouse over to the edit button.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getEditTitle()
    {
        return $this->edittitle;
    }

    /**
     * The title that appear when we mouse over to the edit button.
     *
     * Default value: '' (from language file).
     *
     * @param string $editTitle
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\EditButtonConfig
     */
    public function setEditTitle($editTitle)
    {
        $this->edittitle = $editTitle;
        return $this;
    }

    /**
     * If defined replaces the build in edit function. Parameter passed to this function is the id of the edited row.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getEditFunc()
    {
        return $this->__eventHandler__editfunc;
    }

    /**
     * If defined replaces the build in edit function. Parameter passed to this function is the id of the edited row.
     *
     * Default value: ''.
     *
     * @param string $editFunc
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\EditButtonConfig
     */
    public function setEditFunc($editFunc)
    {
        $this->__eventHandler__editfunc = $editFunc;
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
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\EditButtonConfig
     */
    public function setCloseOnEscape($closeOnEscape)
    {
        $this->closeOnEscape = $closeOnEscape;
        return $this;
    }

}
