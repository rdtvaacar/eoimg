<?php

namespace Acr\EoImg\Facades;

use Illuminate\Support\Facades\Facade;

class AcrEoImg extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AcrEoImg';
    }

}