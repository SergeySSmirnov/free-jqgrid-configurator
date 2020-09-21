# Free JqGrid Configurator v. 2.0.0
Is a simple configurator utility that allows creating a FreeJqGrid config in a simple way.  
All capabilities are commented on.  

Note: not all available capabilities of the Free JqGrid are presented here.
  
  
  
## Example to define config at the PHP code

``` php

// If needed you can create a Navigator config to define config of the standard or custom buttons

$_navButtons = NavigatorButtons::createInstance();
$_navButtons
    ->setEnableAddButton(false)->setAddConfig($_navButtons->getAddConfig()->setAddIcon('fa fa-plus'))
    ->setEnableEditButton(false)->setEditConfig($_navButtons->getEditConfig()->setEditIcon('fa fa-pencil'))
    ->setEnableDelButton(true)->setDelConfig($_navButtons->getDelConfig()->setDelIcon('fa fa-trash'))
    ->setRefreshConfig($_navButtons->getRefreshConfig()->setRefreshIcon('fa fa-refresh'))
    ->setEnableViewButton(false)->setViewConfig($_navButtons->getViewConfig()->setViewIcon('fa fa-eye'))
    ->setSearchConfig($_navButtons
        ->getSearchConfig()
        ->setSearchIcon('fa fa-search')
        ->setMultipleSearch(true)
        ->setModal(true)
        ->setWidth(700)
        ->setLeft(500)
        ->setSearchOnEnter(true)
        ->setTemplatesNames(array_keys($this->filterTemplates))
        ->setTemplatesFilters(array_values($this->filterTemplates))
    )
    ->addCustomButton(SeparatorConfig::createInstance())
    ->addCustomButton(CustomButtonConfig::createInstance('showColumnChooser', 'Show column chooser', 'fa fa-columns'));


// And of course you must define a main FreeGqGrid config

$_jqGridConfig = JqGrid::createInstance()
    ->setGuiStyle('bootstrap')
    ->setSortName('id')
    ->setSortOrder('desc')
    ->setSortable(true)
    ->setShowHeaderTitles(true)
    ->setRowNum(20)
    ->setUrl('http://rusproj.space/data')
    ->setAfterInsertRowEventHandler('colorizeStatus')
    ->setOnDblClickRowEventHandler('gotoField')
    ->setLoadErrorEventHandler('notifyUserAboutAjaxError')
    ->setNavigatorButtons($_navButtons) // NavButtons config
    ->setPager('#jqGridPager')
    ->setColModels([
            ColumnDefinition::columnText('id', '#', 120, 'right')
                ->setFormatter('showlink')
                ->setFormatOptions(ColumnDefinition::formatOptionsShowLink('backend.php', '', '&a=view'))
                ->setClasses('info-link'),
            ColumnDefinition::columnDate('addedDate', 'Date/Time', 120, 'right', 'Y-m-d H:i:s', 'd.m.Y')
                ->setIsSearchable(false),
            ColumnDefinition::columnText('client', 'Client', 250, 'left'),
            ColumnDefinition::columnText('clientCity', 'City', 200, 'left'),
            ColumnDefinition::columnCheckbox('largeOrder', 'Is large order', 50, 'center', [0 => 'Small', 1 => 'Large']),
            ColumnDefinition::columnSelect('status', 'Status', OrderStatusEnum::getShortNamesList(), 150)
                ->setClasses('item-status'),
            ColumnDefinition::columnCheckbox('invoice', 'Invoice')
                ->setIsSearchable(false)
                ->setIsSortable(false)
    ]);


// And now to get config you can call only one method

$_config = $_jqGridConfig->getConfig();


// What next? You can do with this config anything. For example, serialize into JSON and send it or print it into the output

echo json_encode($_config);

// Or you an do this

echo ...
echo /* Attach needed JS and CSS somewhere */ '';
echo ...
echo '<table id="jqGridTable" class="orders"></table><div id="jqGridPager"></div>';
echo '<script>$(document).ready(function () { initJqGrid(' . json_encode($_config) . '); }); </script>';
echo ...

```
  
## And init JS code can be like this or better :)  
  
``` js

function initJqGrid(cfg) {
    let initJqGridEventHandlers = function(cfg) { // Converter strings into functions
        Object.keys(cfg).forEach(function(key) {
            if (key.startsWith('__eventHandler__')) {
                if (window.hasOwnProperty(cfg[key])) {
                    cfg[key.substr(16)] = window[cfg[key]];
                }
                delete cfg[key];
            } else if (typeof cfg[key] === 'object') {
                initJqGridEventHandlers(cfg[key]);
            }
        });
    };
    
    initJqGridEventHandlers(cfg);

    let navbarDefined = typeof cfg['__navigatorButtons'] !== 'undefined';
    let navbarConfig = { };

    if (navbarDefined) {
        navbarConfig = cfg['__navigatorButtons'];
        delete cfg['__navigatorButtons'];
    }

    let $jqGrid = $('#jqGridTable');
    $jqGrid.jqGrid(cfg);

    if (navbarDefined) {
        let getBtnConfig = function(paramName) {
            let btnCfg = typeof navbarConfig[paramName] === 'undefined' ? { } : navbarConfig[paramName];
            delete navbarConfig[paramName];
            return btnCfg;
        };

        let customButtons = getBtnConfig('__customButtons');
        
        $jqGrid.navGrid(cfg.pager, navbarConfig, getBtnConfig('__editButtonConfig'), getBtnConfig('__addButtonConfig'), getBtnConfig('__delButtonConfig'), getBtnConfig('__searchButtonConfig'), getBtnConfig('__viewButtonConfig')); // Initialize navGrid
        
        if (customButtons.length) { // Initialize custom buttons
            customButtons.forEach(function(btnParams) {
                if (typeof btnParams['sepclass']  !== 'undefined') {
                    $jqGrid.navSeparatorAdd(cfg.pager, btnParams);
                } else {
                    $jqGrid.navButtonAdd(cfg.pager, btnParams);
                }
            });
        }
    }
};

```

Now that's all.
