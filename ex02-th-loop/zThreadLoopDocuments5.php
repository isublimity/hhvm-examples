<?php

log::msg("TikTik by 5 second : now req_count:".apc_fetch('loop_counter'));
sleep(5);
