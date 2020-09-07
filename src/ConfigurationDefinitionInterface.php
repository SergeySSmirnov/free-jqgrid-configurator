<?php
namespace Rusproj\FreeJqGridConfigurator;

/**
 * Defines a way to get the configuration as an array.
 */
interface ConfigurationDefinitionInterface
{

    /**
     * Returns configuration as an array of key-value pairs.
     *
     * @return array
     */
    public function getConfig();

}

