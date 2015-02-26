<?php
namespace ERPsat\Helpers;

use Config;

class ConfigHelper {


    const FILECONFIG = "erpsat";

    public static function version()
    {
        $laravel = app();
        $version = Config::get(self::FILECONFIG . '.version');

        return $version." [".$laravel::VERSION.".".gethostname()."(".App::environment().")]";
    }

    private static function menuRol($menu, $rol=0)
    {
        $m2ret = [];
        $aux1 = [];
        $aux2 = [];

        foreach ($menu as $m1) {

            if( in_array($rol, $m1['rol']) or in_array(0, $m1['rol']) )
            {
                $aux1 = [];
                $aux2 = [];

                foreach ($m1['opciones'] as $m2) {

                    if( in_array($rol, $m2['rol']) or in_array(0, $m2['rol']) )
                    {
                        array_push($aux2, $m2);
                    }
                }

                $aux1["nom"] = $m1["nom"];
                $aux1["url"] = $m1["url"];
                $aux1["rol"] = $m1["rol"];
                $aux1["icon"] = $m1["icon"];
                $aux1["opciones"] = $aux2;

                array_push($m2ret,$aux1);
            }
        }

        return $m2ret;
    }

    public static function menuWeb()
    {
        return self::menuRol(Config::get(self::FILECONFIG.'.menu.web'));
    }

    public static function menuSuperior()
    {
        // $rol = Session::get('user_rol');
        $rol = 1;

        return self::menuRol(Config::get(self::ILECONFIG.'.menu.superior'), $rol);
    }

    public static function menuLateral()
    {
        $rol = 1;

        return self::menuRol(Config::get(self::FILECONFIG.'.menu.lateral'), $rol);
    }

}