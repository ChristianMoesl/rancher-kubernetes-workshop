<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli(getenv("DB_HOST"), getenv("DB_USER"), getenv("DB_PASSWORD"), getenv("DB_NAME"));

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = 'SELECT value FROM statistics';

$visitor_count = 0;
if (!$result = $conn->query($query)) {
  $conn->query("CREATE TABLE statistics (property VARCHAR(48), value INT NOT NULL)");
  $conn->query("INSERT INTO statistics (property, value) VALUES ('visitor_count', 1)");
} else { 
  $row = $result->fetch_assoc();
  $visitor_count = $row['value'] + 1;

  $conn->query("UPDATE statistics SET property='visitor_count', value={$visitor_count}");
}

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
    echo "<p>Number of visits: {$visitor_count}</p>";
    echo "<p>Kitty Server IP: {$ip}</p>";
    echo "<img src=\"kitty.jpg\"></img>";
}
?>
