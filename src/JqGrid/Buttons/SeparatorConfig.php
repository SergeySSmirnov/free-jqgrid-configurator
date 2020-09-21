<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid\Buttons;

use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;

/**
 * Separator config.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class SeparatorConfig implements ConfigurationDefinitionInterface
{

    /**
     * Initialize a new instance of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SeparatorConfig} class.
     *
     * @param string $class Represent the separator class defined in ui-jqgrid.
     * @param string $content The content that can be put in the separator element.
     * @return unknown
     */
    public static function createInstance($class = '', $content = '')
    {
        $_btnConfig = new SeparatorConfig();

        return $_btnConfig
            ->setClass($class)
            ->setContent($content);
    }

    /**
     * Represent the separator class defined in ui-jqgrid.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $sepclass = '';

    /**
     * The content that can be put in the separator element.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $sepcontent = '';

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

        return $_config;
    }

    /**
     * Represent the separator class defined in ui-jqgrid.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->sepclass;
    }

    /**
     * Represent the separator class defined in ui-jqgrid.
     *
     * Default value: ''.
     *
     * @param string $class
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SeparatorConfig
     */
    public function setClass($class)
    {
        $this->sepclass = $class;
        return $this;
    }

    /**
     * The content that can be put in the separator element.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->sepcontent;
    }

    /**
     * The content that can be put in the separator element.
     *
     * Default value: ''.
     *
     * @param string $content
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\SeparatorConfig
     */
    public function setContent($content)
    {
        $this->sepcontent = $content;
        return $this;
    }

}
