<?php
 
error_reporting(E_ALL);
 
$player = $_POST['playerName'];
$ip = $_SERVER['REMOTE_ADDR'];
 

// Details of the vote.
$str = "VOTE\n" .
       $siteName."\n" .
       $player."\n";
       $ip."\n";
       time()."\n";

$leftover = (256 - strlen($str)) / 2;
 
while ($leftover > 0) {
    $str .= "\x0";
    $leftover--;
}
 

$key = "";
$key = wordwrap($key, 65, "\n", true);
$key = <<<EOF
-----BEGIN PUBLIC KEY-----
$key
-----END PUBLIC KEY-----
EOF;

openssl_public_encrypt($str, $encrypted, $key);

$socket = fsockopen($host, $votifierPort, $errno, $errstr, 15);
 
if (!$socket) {
    die("Failed to connect to Votifier.");
}

fwrite($socket, $encrypted);
echo "Thanks for voting! You can vote again in 24 hours.";

?>
