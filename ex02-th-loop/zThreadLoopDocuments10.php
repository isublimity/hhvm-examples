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

$code = xbox_post_message(mt_getrandmax());


log::msg("Tik-10-sec:code:".$code);
sleep(10);
