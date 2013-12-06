<?php

date_default_timezone_set('Europe/Moscow');
error_reporting( E_ALL );
ini_set('expose_php',0);
ini_set('display_errors',1);



function async_store_data($message) {
    $code = xbox_post_message($message);
    echo "Call-async:";var_dump($code);


}
if (!apc_exists('loop_counter')) apc_store('loop_counter',0);
apc_inc('loop_counter');
$count=apc_fetch('loop_counter');


if (@$_GET['set'])
{
    $UUID=$count.'_'.sha1(time().mt_getrandmax());
    if (@$_GET['set']=="1")
    {
        async_store_data("A_".$UUID);

    }
    if (@$_GET['set']=="2")
    {

        file_put_contents("log.log",date("Y-m-d H:i:s")."\t"."N_".$UUID."\n",FILE_APPEND);
    }
    if (@$_GET['set']=="3")
    {

        async_store_data(json_encode(array($UUID,time())));
    }
    if (@$_GET['set']=="4")
    {

        async_store_data("Z".$UUID);
    }
    if (@$_GET['set']=="5")
    {
        $UUID=$count.'_'.sha1(time().mt_getrandmax());
        async_store_data("Z".$UUID);
    }
}


echo "[ping]";

/*
On slow :1cpu 256 ram :)

> ab -n 2200 -c 120 http://10.37.129.3:9800/?set=0
 Requests per second:    2631.98 [#/sec] (mean)
Requests per second:    2593.75 [#/sec] (mean)


>  ab -n 2200 -c 120 http://10.37.129.3:9800/?set=1
Requests per second:    1621.94 [#/sec] (mean)
Requests per second:    1602.83 [#/sec] (mean)


> ab -n 2200 -c 120 http://10.37.129.3:9800/?set=2
Requests per second:    1065.32 [#/sec] (mean)
Requests per second:    1060.60 [#/sec] (mean)



..
ab -n 2200 -c 220 http://10.37.129.3:9800/?set=1
Requests per second:    1602.55 [#/sec] (mean)

ab -n 5200 -c 220 http://10.37.129.3:9800/?set=1
Requests per second:    1415.54 [#/sec] (mean)


./wrk -t5 -c200 -d30s http://10.37.129.3:9800/?set=0
Requests/sec:   3472.23

./wrk -t5 -c200 -d10s http://10.37.129.3:9800/?set=0
  18809 requests in 10.00s, 2.94MB read

Requests/sec:   3466.26

./wrk -t5 -c200 -d10s http://10.37.129.3:9800/?set=1
Requests/sec:   1879.99



/wrk -t5 -c200 -d10s http://10.37.129.3:9800/?set=2
  11918 requests in 10.00s, 1.60MB read
Requests/sec:   1191.50



./wrk -t45 -c47 -d3s http://10.37.129.3:9800/?set=3
  5599 requests in 3.02s, 0.88MB read
Requests/sec:   1853.42

Ok
try
      MaxRequest = 10
      MaxDuration = 2
./wrk -t45 -c47 -d3s http://10.37.129.3:9800/?set=3

  5666 requests in 3.03s, 0.89MB read
Requests/sec:   1872.50
in log 5666 rows :)



add usleep per write usleep(2000);
./wrk -t45 -c47 -d3s http://10.37.129.3:9800/?set=4
  7145 requests in 3.01s, 1.12MB read
Requests/sec:   2371.24

in file 7145 - ok)






*/