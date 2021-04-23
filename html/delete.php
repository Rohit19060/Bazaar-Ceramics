<?php
include_once("../includes/dbconnection.inc");
include_once("../includes/function.inc");
include_once("../includes/session.inc");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    //getting product id from get request
    $querydel = "DELETE FROM orderline ";
    //limit 1 is use for only affecting one row
    $querydel .= "WHERE ProductID = '{$id}' and OrderID = {$_SESSION['CustomerOrderID']} limit 1";
    if (mysqli_query($connection, $querydel)) {
        $_SESSION['message'] = "Product(" . $_GET["id"] . ") Removed Successfully";
        redir($_SERVER["HTTP_REFERER"]);
    } else {
        // Unsuccesful
        $_SESSION['message'] = "Product Removing Unsuccessful";
        redir($_SERVER["HTTP_REFERER"]);
    }
} else {
    $_SESSION['message'] = "Not a Proper Request";
    redir("../index.php");
}
if ($connection) {
    mysqli_close($connection);
}
?>