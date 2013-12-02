<?php


function xbox_process_message($msg)
{
//    xbox_schedule_thread_reset();
//
//    file_put_contents("LOG.txt","".date("Y-m-d H:i:s")."\tpp:".json_encode($data)."\n",FILE_APPEND);
    return true;

}

// load base class
include 'class/inc.php';


// init ALL want
apc_store('loop_counter',0);


log::msg("zStartupDocument.php");

