<?php
if (!isset($_SERVER['PHP_AUTH_USER']) 
  || (isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_PW'] !== getenv('PASSWORD'))) {
    header('WWW-Authenticate: Basic realm="Secret Kitty Pictures"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Please login';
    exit;
} else {
    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    $host= gethostname();
    $ip = gethostbyname($host);
    echo "<p>Kitty Server IP: {$ip}</p>";
    echo "<img src=\"kitty.jpg\"></img>";
}
?>
