<?php
//
session_start();

// load base class
include 'inc.php';

echo '<pre>'.date('Y-m-d H:i:s')."\t".microtime(true)."\n\n";

// init user-session counter
if (!isset($_SESSION['count_by_user'])) $_SESSION['count_by_user']=0;
if (isset($_GET['i']))
{
    $_SESSION['count_by_user']=$_SESSION['count_by_user']+intval($_GET['i']);
}

apc_inc('loop_counter');
$count=apc_fetch('loop_counter');

log::msg("Request num :".$count);

echo "global_loop_counter:".$count."\n";
echo "session_counter    :".$_SESSION['count_by_user']."\n";

echo "\nEND\n";



