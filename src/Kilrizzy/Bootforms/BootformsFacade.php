<?php namespace Kilrizzy\Bootforms;

use Illuminate\Support\Facades\Facade;

class BootformsFacade extends Facade {

/**
* Get the registered name of the component.
*
* @return string
*/
protected static function getFacadeAccessor() { return 'bootforms'; }

}