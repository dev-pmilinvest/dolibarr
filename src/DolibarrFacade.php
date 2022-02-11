<?php

namespace Pmilinvest\Dolibarr;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Pmilinvest\Dolibarr\Skeleton\SkeletonClass
 */
class DolibarrFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dolibarr';
    }
}
