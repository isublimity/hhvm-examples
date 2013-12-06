<?php
function xbox_process_message($message)
{
    if (substr($message,0,1)=='Z')
    {
        //sleep
        usleep(2000);
    }
    file_put_contents("log.log",date("Y-m-d H:i:s")."\t".($message)."\n",FILE_APPEND);
    return true;
}