<?php

file_put_contents("/tmp/log.log",@date("Y-m-d H:i:s")."\t".('warmup')."\n",FILE_APPEND);