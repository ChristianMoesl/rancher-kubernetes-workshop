<html>
  <head>
    <title>Kitty</title>
  </head>
  <body>
    <?php
    $host= gethostname();
    $ip = gethostbyname($host);
    echo "<p>Kitty Server IP: {$ip}</p>";
    ?>
    <img src="kitty.jpg"></img>
  </body>
</html>


