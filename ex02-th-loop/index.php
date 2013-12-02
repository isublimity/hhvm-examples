<?php
session_start();

// load base class
include 'class/inc.php';
include 'class/template.php';

echo '<pre>'.date('Y-m-d H:i:s')."\t".microtime(true)."\n";
echo "\n";
if (!isset($_SESSION['sd'])) $_SESSION['sd']=0;
if (isset($_GET['i']))
{
    $_SESSION['sd']=$_SESSION['sd']+intval($_GET['i']);
}

apc_inc('loop_counter');
$count=apc_fetch('loop_counter');

log::msg("Request:".$count);
echo "global_loop_counter:".$count."\n";
echo "session_counter    :".$_SESSION['sd']."\n";

echo "Try XBOX:\n";
$msg="REQUEST_ID_".sha1(mt_getrandmax());

//$task=xbox_task_start($msg);
//$status = xbox_task_status($task);
//echo "TASK:";var_dump($task);
//echo "\nstatus:";var_dump($status);


$code = xbox_post_message($msg);
echo "POST:";var_dump($code);
echo "\nEND!";



