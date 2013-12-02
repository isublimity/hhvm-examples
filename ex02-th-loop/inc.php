<?php
date_default_timezone_set('Europe/Moscow');

class log
{
    public static function msg($data)
    {
        file_put_contents("log.txt","".date("Y-m-d H:i:s")."\t".json_encode($data)."\n",FILE_APPEND);
    }
}