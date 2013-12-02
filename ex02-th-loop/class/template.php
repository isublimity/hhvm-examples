<?php
class template
{
    private static $_some='NULLS';
    public static function init()
    {
        self::$_some=date('Ymd H:i:s');
    }
    public static function prints()
    {
        echo "init time:".self::$_some;
    }
}