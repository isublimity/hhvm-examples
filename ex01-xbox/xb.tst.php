<?php

function xbox_process_message($message) {
    sleep(5);
    echo 'Async: '.$message."\n";
}
function query($sql) {
    echo 'Sync: '.$sql."\n";
}
function async_query($sql) {
    xbox_post_message($sql);
}

async_query("SELECT 10");
query("SELECT 1");

while(true) {
    sleep(1);
}