#!usr/bin/php
<?php

use "../vendor/ipinfo/ipinfo/IPinfo";

$access_token = '123456789abc';
$client = new IPinfo($access_token);
//$ip_address = '216.239.36.21';
$ip_address = $_SERVER['HTTP_CLIENT_IP'];
$details = $client->getDetails($ip_address);

echo "$ip_address\n";

print_r($details);
