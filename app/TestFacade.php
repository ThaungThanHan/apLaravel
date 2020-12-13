<?php

namespace App;

use Illuminate\Support\Facades\Facade;

class TestFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'test';                  // already binded.. in ServiceProvider. Implicit binding
        // return Test::Class;                     // explicit binding..not binded. Manually tat tat apyin ka class shr pee bind.
    }
}