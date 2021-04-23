<?php
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "bazaarceramics_db");
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (mysqli_connect_errno()) {
   die("Database Connection Failed" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
}
?>