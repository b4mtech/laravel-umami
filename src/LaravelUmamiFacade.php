<?php

namespace B4mtech\LaravelUmami;

use Illuminate\Support\Facades\Facade;

/**
 * @see \B4mtech\LaravelUmami\Skeleton\SkeletonClass
 */
class LaravelUmamiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-umami';
    }
}
