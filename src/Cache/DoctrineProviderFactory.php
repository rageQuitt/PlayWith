<?php

namespace App\Cache;

use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Psr\Cache\CacheItemPoolInterface;

class DoctrineProviderFactory
{
    public static function createDoctrineProvider(CacheItemPoolInterface $cacheItemPool): DoctrineProvider
    {
        return DoctrineProvider::wrap($cacheItemPool);
    }
}
