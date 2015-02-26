<?php
namespace ERPsat\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;


use ERPsat\Helpers\ConfigHelper;
use View;


abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;


    public function __construct()
    {
        $menuWeb = ConfigHelper::menuWeb();
        View::share('menuWeb',$menuWeb);

        $menuLateral = ConfigHelper::menuLateral();
        View::share('menuLateral',$menuLateral);
    }
}
