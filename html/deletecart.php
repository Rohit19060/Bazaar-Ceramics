<?php
include_once("../includes/dbconnection.inc");
include_once("../includes/function.inc");
include_once("../includes/session.inc");
//clearing the cart
$querydel = "DELETE FROM orderline ";
$querydel .= "WHERE OrderID = {$_SESSION['CustomerOrderID']}";
if (mysqli_query($connection, $querydel)) {
    // deleting data from orders table
    $querydel = "DELETE FROM orders ";
    $querydel .= "WHERE CustomerID = {$_SESSION['ID']}";
    // Redirection
    if (mysqli_query($connection, $querydel)) {
        $_SESSION['message'] = "Cart Cleared";
        redir($_SERVER["HTTP_REFERER"]);
    }
} else {
    // if any problem in the query
    $_SESSION['message'] = "Cart Deletetion UnSuccessful";
    redir($_SERVER["HTTP_REFERER"]);
}
if ($connection) {
    mysqli_close($connection);
}
?>