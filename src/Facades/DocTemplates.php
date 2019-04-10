<?php

namespace Moravio\DocTemplates\Facades;

use Illuminate\Support\Facades\Facade;

class DocTemplates extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'doctemplates';
    }
}
