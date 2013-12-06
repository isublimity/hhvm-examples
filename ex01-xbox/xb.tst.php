<?php
/*
info-note:
If empty - config xbox like no port - have error : HipHop Fatal error: (1) call the function without enough arguments OR (2) Unable to find function "xbox_process_message" OR (3) function was not in invoke table OR (4) function was renamed to something else.';

 Work config :)



Xbox {
    ServerInfo {
      ThreadCount = 1
      Port = 0
      MaxRequest = 500
      MaxDuration = 120
      RequestInitDocument = xtx.php
      RequestInitFunction = my_xboxInit
    }
    ProcessMessageFunc = xbox_process_message
    DefaultLocalTimeoutMilliSeconds = 500
    DefaultRemoteTimeoutSeconds = 5
}


https://github.com/facebook/hhvm/wiki/runtime-options

error in : /var/hhvm/error.log

*/


date_default_timezone_set('Europe/Moscow');
error_reporting( E_ALL );
ini_set('expose_php',0);
ini_set('display_errors',1);


function query($message) {
    echo "Run sync...: $message\n";
    sleep(intval($message));
    echo "Sync End\n";
}
function async($message) {
    $code = xbox_post_message($message);
    echo "Call-async:";var_dump($code);


}

async("15_sleep");

async("9_sleep");

query("2_sleep");

// sleep 55 seconds
for ($f=0;$f<55;$f++) sleep(1);



