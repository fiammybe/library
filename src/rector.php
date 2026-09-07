<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/admin',
        __DIR__ . '/blocks',
        __DIR__ . '/class',
        __DIR__ . '/extras',
        __DIR__ . '/include',
    ])
    //->withPreparedSets(deadCode: true,codingStyle: true,)
    ->withPhpSets(php83: true)
    //->withRules(['RenameIcmsModuleRector'])
    ;
