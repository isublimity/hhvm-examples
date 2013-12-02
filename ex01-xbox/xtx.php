<?php
function my_xboxInit()
{
    echo ">Run my_xboxInit !\n";

}

function xbox_process_message($message) {
    echo ">Run xbox_process_message\n";echo json_encode($message)."\n";
    echo "Start....";
    sleep(intval($message));
    echo "End\n";
    return true;
}