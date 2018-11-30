<?php
$key = "847404572a";
$data = "sha1=0ab0de9de49c087e4b2d4dd173678837de423c91";
list($algo,$hash) = explode("=",$data);

var_dump($hash == hash_hmac($algo,$hash,$key));

