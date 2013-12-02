<?php
date_default_timezone_set('Europe/Moscow');
error_reporting( E_ALL );
ini_set('expose_php',0);
ini_set('display_errors',1);





class log
{

    public static function erase()
    {
//        unlink("LOG.txt");
    }
    public static function msg($data)
    {
        file_put_contents("LOG.txt","".date("Y-m-d H:i:s")."\t".json_encode($data)."\n",FILE_APPEND);
    }
}