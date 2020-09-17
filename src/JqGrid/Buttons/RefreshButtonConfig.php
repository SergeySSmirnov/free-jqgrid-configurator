<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid\Buttons;

/**
 * Config of the "Refresh grid data" button.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class RefreshButtonConfig implements ConfigurationDefinitionInterface
{

    /**
     * Set a icon to be displayed if the refresh action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: '' (from language file).
     *
     * @var string
     */
    private $refreshicon = '';

    /**
     * The text than can be set in the refresh button.
     *
     * Default value: '' (from language file).
     *
     * @var string
     */
    private $refreshtext = '';

    /**
     * The title that appear when we mouse over to the refresh button.
     *
     * Default value: '' (from language file).
     *
     * @var string
     */
    private $refreshtitle = '';

    /**
     * Determines how the grid should be reloaded.
     *
     * Allowed values:
     * <ul>
     *  <li>firstpage - the grid reload the data from the first page;</li>
     *  <li>current - the reloading should save the current page and current selection.</li>
     * <ul>
     *
     * Default value: 'firstpage'.
     *
     * @var string
     */
    private $refreshstate = 'firstpage';

    /**
     * If defined this event fire after the refresh button is clicked.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__afterRefresh = '';

    /**
     * If defined this event fire before the refresh button is clicked.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__beforeRefresh = '';

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

        unset($_config['__afterRefresh'], $_config['__beforeRefresh'], $_config['refreshicon'], $_config['refreshstate'], $_config['refreshtext'], $_config['refreshtitle']);

        return [
            '__afterRefresh' => $this->__afterRefresh,
            '__beforeRefresh' => $this->__beforeRefresh,
            'refreshicon' => $this->refreshicon,
            'refreshstate' => $this->refreshstate,
            'refreshtext' => $this->refreshtext,
            'refreshtitle' => $this->refreshtitle,
            '__refreshButtonConfig' => []
        ];
    }

    /**
     * Set a icon to be displayed if the refresh action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getRefreshIcon()
    {
        return $this->refreshicon;
    }

    /**
     * Set a icon to be displayed if the refresh action is enabled. Note that currently only icons from UI theme images can be used.
     *
     * Default value: '' (from language file).
     *
     * @param string $refreshIcon
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\RefreshButtonConfig
     */
    public function setRefreshIcon($refreshIcon)
    {
        $this->refreshicon = $refreshIcon;
        return $this;
    }

    /**
     * The text than can be set in the refresh button.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getRefreshText()
    {
        return $this->refreshtext;
    }

    /**
     * The text than can be set in the refresh button.
     *
     * Default value: '' (from language file).
     *
     * @param string $refreshText
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\RefreshButtonConfig
     */
    public function setRefreshText($refreshText)
    {
        $this->refreshtext = $refreshText;
        return $this;
    }

    /**
     * The title that appear when we mouse over to the refresh button.
     *
     * Default value: '' (from language file).
     *
     * @return string
     */
    public function getRefreshTitle()
    {
        return $this->refreshtitle;
    }

    /**
     * The title that appear when we mouse over to the refresh button.
     *
     * Default value: '' (from language file).
     *
     * @param string $refreshTitle
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\RefreshButtonConfig
     */
    public function setRefreshTitle($refreshTitle)
    {
        $this->refreshtitle = $refreshTitle;
        return $this;
    }

    /**
     * Determines how the grid should be reloaded.
     *
     * Allowed values:
     * <ul>
     *  <li>firstpage - the grid reload the data from the first page;</li>
     *  <li>current - the reloading should save the current page and current selection.</li>
     * <ul>
     *
     * Default value: 'firstpage'.
     *
     * @return string
     */
    public function getRefreshState()
    {
        return $this->refreshstate;
    }

    /**
     * Determines how the grid should be reloaded.
     *
     * Allowed values:
     * <ul>
     *  <li>firstpage - the grid reload the data from the first page;</li>
     *  <li>current - the reloading should save the current page and current selection.</li>
     * <ul>
     *
     * Default value: 'firstpage'.
     *
     * @param string $refreshstate
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\RefreshButtonConfig
     */
    public function setRefreshState($refreshstate)
    {
        $this->refreshstate = $refreshstate;
        return $this;
    }

    /**
     * If defined this event fire after the refresh button is clicked.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getAfterRefresh()
    {
        return $this->__afterRefresh;
    }

    /**
     * If defined this event fire after the refresh button is clicked.
     *
     * Default value: ''.
     *
     * @param string $afterRefresh
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\RefreshButtonConfig
     */
    public function setAfterRefresh($afterRefresh)
    {
        $this->__afterRefresh = $afterRefresh;
        return $this;
    }

    /**
     * If defined this event fire before the refresh button is clicked.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getBeforeRefresh()
    {
        return $this->__beforeRefresh;
    }

    /**
     * If defined this event fire before the refresh button is clicked.
     *
     * Default value: ''.
     *
     * @param string $beforeRefresh
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\RefreshButtonConfig
     */
    public function setBeforeRefresh($beforeRefresh)
    {
        $this->__beforeRefresh = $beforeRefresh;
        return $this;
    }

}
