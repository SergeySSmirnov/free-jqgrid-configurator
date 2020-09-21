<?php
namespace Rusproj\FreeJqGridConfigurator\JqGrid\Buttons;

use Rusproj\FreeJqGridConfigurator\ConfigurationDefinitionInterface;

/**
 * Custom button config.
 *
 * @author Sergei S. Smirnov
 * @copyright (c) 2010-20 RUSproj, Sergei S. Smirnov
 */
class CustomButtonConfig implements ConfigurationDefinitionInterface
{

    /**
     * Initialize a new instance of the {@link \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButton} class.
     *
     * @param string $onClickButton The action to be performed when a button is clicked.
     * @param string $title A tooltip for the button.
     * @param string $icon The ui icon name from UI theme icon set. If this option is set to “none” only the text appear.
     * @param string $caption Caption of the button.
     * @param string $position The position where the button will be added (i.e., before or after the standard buttons). Allowed values: 'first', 'last'.
     * @param string $id If set defines the id of the button (actually the id of TD element) for future manipulation.
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig
     */
    public static function createInstance($onClickButton, $title = '', $icon = '', $caption = '', $position = '', $id = '')
    {
        $_btnConfig = new CustomButtonConfig();

        return $_btnConfig
            ->setOnClickButton($onClickButton)
            ->setTitle($title)
            ->setIcon($icon)
            ->setCaption($caption)
            ->setPosition($position)
            ->setId($id);
    }

    /**
     * Caption of the button.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $caption = '';

    /**
     * The ui icon name from UI theme icon set. If this option is set to “none” only the text appear.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $buttonicon = '';

    /**
     * The action to be performed when a button is clicked.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $__eventHandler__onClickButton = '';

    /**
     * The position where the button will be added (i.e., before or after the standard buttons).
     *
     * Allowed values: 'first', 'last'.
     *
     * Default value: 'last'.
     *
     * @var string
     */
    private $position = 'last';

    /**
     * A tooltip for the button.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $title = '';

    /**
     * Determines the cursor when we mouseover the element.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $cursor = '';

    /**
     * If set defines the id of the button (actually the id of TD element) for future manipulation.
     *
     * Default value: ''.
     *
     * @var string
     */
    private $id = '';

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
     * Caption of the button.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Caption of the button.
     *
     * Default value: ''.
     *
     * @param string $caption
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * The ui icon name from UI theme icon set. If this option is set to “none” only the text appear.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->buttonicon;
    }

    /**
     * The ui icon name from UI theme icon set. If this option is set to “none” only the text appear.
     *
     * Default value: ''.
     *
     * @param string $icon
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig
     */
    public function setIcon($icon)
    {
        $this->buttonicon = $icon;
        return $this;
    }

    /**
     * The action to be performed when a button is clicked.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getOnClickButton()
    {
        return $this->__eventHandler__onClickButton;
    }

    /**
     * The action to be performed when a button is clicked.
     *
     * Default value: ''.
     *
     * @param string $onClickButton
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig
     */
    public function setOnClickButton($onClickButton)
    {
        $this->__eventHandler__onClickButton = $onClickButton;
        return $this;
    }

    /**
     * The position where the button will be added (i.e., before or after the standard buttons).
     *
     * Allowed values: 'first', 'last'.
     *
     * Default value: 'last'.
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * The position where the button will be added (i.e., before or after the standard buttons).
     *
     * Allowed values: 'first', 'last'.
     *
     * Default value: 'last'.
     *
     * @param string $position
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * A tooltip for the button.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * A tooltip for the button.
     *
     * Default value: ''.
     *
     * @param string $title
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Determines the cursor when we mouseover the element.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Determines the cursor when we mouseover the element.
     *
     * Default value: ''.
     *
     * @param string $cursor
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig
     */
    public function setCursor($cursor)
    {
        $this->cursor = $cursor;
        return $this;
    }

    /**
     * If set defines the id of the button (actually the id of TD element) for future manipulation.
     *
     * Default value: ''.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * If set defines the id of the button (actually the id of TD element) for future manipulation.
     *
     * Default value: ''.
     *
     * @param string $id
     * @return \Rusproj\FreeJqGridConfigurator\JqGrid\Buttons\CustomButtonConfig
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

}
