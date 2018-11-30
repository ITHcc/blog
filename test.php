<?php
$key = "847404572a";
$data = "sha1=8291c166e5861d6740fc688b9ee5dafa34463960";
list($algo,$hash) = explode("=",$data);

var_dump($hash == hash_hmac($algo,$hash,$key));
