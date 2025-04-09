<?php

declare(strict_types=1);

use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\Config\RectorConfig;
use RectorLaravel\Set\LaravelSetList;

return RectorConfig::configure()
    ->withCache(
        cacheDirectory: '/tmp/rector',
        cacheClass: FileCacheStorage::class
    )
    ->withPaths([
        __DIR__.'/app',
        //        __DIR__.'/bootstrap',
        //        __DIR__.'/config',
        // __DIR__.'/lang',
        __DIR__.'/public',
        __DIR__.'/resources',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ])
    // uncomment to reach your current PHP version
    ->withPhpSets(php84: true)
    ->withSets([
        LaravelSetList::LARAVEL_CODE_QUALITY,
        LaravelSetList::LARAVEL_COLLECTION,
    ])
    ->withTypeCoverageLevel(7)
    ->withDeadCodeLevel(3)
    ->withCodeQualityLevel(3);
