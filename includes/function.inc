<?php
function redir($new_location)
{
    header("Location:" . $new_location);
    exit;
}
function mysqli_prepration($string)
{
    global $connection;
    $escaped_string = mysqli_real_escape_string($connection, $string);
    return $escaped_string;
}
?>
