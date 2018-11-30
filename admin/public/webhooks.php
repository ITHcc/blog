<?php

$data = file_get_contents("php://input");
file_put_contents("log",$data);
echo exec('cd .. && cd .. && git pull');
