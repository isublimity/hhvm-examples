<?php
file_put_contents("/tmp/log.log",@date("Y-m-d H:i:s")."\t".("LOADD FILE!")."\n",FILE_APPEND);
function xbox_process_init()
{

    file_put_contents("/tmp/log.log",@date("Y-m-d H:i:s")."\t".('xbox_process_init')."\n",FILE_APPEND);
}

function xbox_process_message($message)
{
    if (substr($message,0,1)=='Z')
    {
        //sleep
        usleep(2000);
    }
    file_put_contents("/tmp/log.log",@date("Y-m-d H:i:s")."\t".($message)."\n",FILE_APPEND);
    return true;
}