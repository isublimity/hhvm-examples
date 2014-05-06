<?php
function iinint()
{

    file_put_contents("/tmp/log.log",@date("Y-m-d H:i:s")."\t".('W-INIT')."\n",FILE_APPEND);
}