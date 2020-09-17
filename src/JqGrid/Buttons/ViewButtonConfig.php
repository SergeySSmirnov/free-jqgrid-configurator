<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid\Buttons;

/**
 * Config of the "View selected row" button.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class ViewButtonConfig implements ConfigurationDefinitionInterface
{

    /**
     * Set a icon to be displayed if the search action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: '' (from language file).
     *
     * @var string
     */
    private $viewicon = '';

    /**
     * The text that can be set in the view button.
     *
     * Default value: '' (from language file).
     *
     * @var string
     */
    private $viewtext = '';

    /**
     * The title that appear when we mouse over to the view button.
     *
     * Default value: '' (from language file).
     *
     * @var string
     */
    private $viewtitle = '';

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
    public function getConfig($cfg) {
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

        unset($_config['viewicon'], $_config['viewtext'], $_config['viewtitle']);

        return [
            'viewicon' => $this->viewicon,
            'viewtext' => $this->viewtext,
            'viewtitle' => $this->viewtitle,
            '__viewButtonConfig' => []
        ];
    }

    /**
     * Set a icon to be displayed if the search action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getViewIcon()
    {
        return $this->viewicon;
    }

    /**
     * Set a icon to be displayed if the search action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: '' (from language file).
     *
     * @param string $viewIcon
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\ViewButtonConfig
     */
    public function setViewIcon($viewIcon)
    {
        $this->viewicon = $viewIcon;
        return $this;
    }

    /**
     * The text that can be set in the view button.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getViewText()
    {
        return $this->viewtext;
    }

    /**
     * The text that can be set in the view button.
     *
     * Default value: '' (from language file).
     *
     * @param string $viewtext
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\ViewButtonConfig
     */
    public function setViewText($viewtext)
    {
        $this->viewtext = $viewtext;
        return $this;
    }

    /**
     * The title that appear when we mouse over to the view button.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getViewTitle()
    {
        return $this->viewtitle;
    }

    /**
     * The title that appear when we mouse over to the view button.
     *
     * Default value: '' (from language file).
     *
     * @param string $viewTitle
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\ViewButtonConfig
     */
    public function setViewtTitle($viewTitle)
    {
        $this->viewtitle = $viewTitle;
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
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\ViewButtonConfig
     */
    public function setCloseOnEscape($closeOnEscape)
    {
        $this->closeOnEscape = $closeOnEscape;
        return $this;
    }

}
