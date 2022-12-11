<?php

namespace App\Beefree;

use Illuminate\Support\Facades\Facade;

class TrelloClientFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TrelloClient';
    }
}
