<?php
require_once("../includes/session.inc");
require_once("../includes/function.inc");
require_once("../includes/dbconnection.inc");
$query = "SELECT *";
$query .= "FROM member";
$result = mysqli_query($connection, $query);
if (isset($_POST["submit"])) {
    while ($user = mysqli_fetch_assoc($result)) {
        $password = $_POST["passw"];
        $hash_format = "$2y$10$";
        $salt = "mlpoknbjiuhvcgytfxzdresawq";
        $format_and_salt = $hash_format . $salt;
        $hashed = crypt($password, $format_and_salt);
        if ($_POST["userid"] == $user["UserID"] && $hashed == $user["HashedPassword"]) {
            // if match found user is right
            $_SESSION["member"] = $user["UserID"];
            $_SESSION["ID"] = $user["CustomerID"];
            $queryx = "SELECT * from customer where CustomerID = {$_SESSION["ID"]}";
            $resultx = mysqli_query($connection, $queryx);
            $userx = mysqli_fetch_assoc($resultx);
            $_SESSION["Name"] = $userx["CustomerGivenName"];
            $_SESSION["message"] = "Welcome Back {$_SESSION["Name"]},You Successfully Logged In";
            mysqli_free_result($resultx);
            //getting customer order id
            $query = "SELECT OrderID from orders where CustomerID = {$_SESSION['ID']}";
            $result = mysqli_query($connection, $query);
            $data = mysqli_fetch_assoc($result);
            mysqli_free_result($data);
            // echo $data["OrderID"];
            if (isset($data["OrderID"])) {
                $_SESSION["CustomerOrderID"] =  $data["OrderID"];;
            } else {
                //Generating new customerID
                $query = "SELECT MAX(OrderID) from orders";
                $result = mysqli_query($connection, $query);
                $data = mysqli_fetch_assoc($result);
                $_SESSION["CustomerOrderID"] = $data["MAX(OrderID)"] + 1;
                $customeOrderID = $_SESSION["CustomerOrderID"];
                $custID = $_SESSION["ID"];
                $curDate = date("y-m-d");
                mysqli_free_result($data);
                // Inserting CustomerOrderID
                $query = "INSERT INTO orders (OrderID,CustomerID,OrderDate) VALUES ({$customeOrderID},{$custID},'{$curDate}');";
                if (!mysqli_query($connection, $query)) {
                    echo "Insertion orders failed";
                }
                mysqli_free_result($data);
            }
            if (isset($_SESSION["CustomerOrderID"])) {
                $customeOrderID = $_SESSION["CustomerOrderID"];
                $query = "SELECT Count(*) FROM orderline LEFT JOIN product ON orderline.ProductID = product.ProductID where OrderID = {$customeOrderID};";
                $result = mysqli_query($connection, $query);
                $CustData = mysqli_fetch_assoc($result);
                // getting item count
                if ($CustData["Count(*)"] != 0) {
                    $_SESSION["Items"] = $CustData["Count(*)"];
                } else {
                    $_SESSION["Items"] = null;
                }
                mysqli_free_result($result);
            }
            redir("../index.php");
        }
    }
    $_SESSION["message"] = "Username/Password is incorrect";
    redir("memberlogon.php");
} else {
    $_SESSION["message"] = "This is not the proper Request";
    redir("../index.php");
}
if ($connection) {
    mysqli_close($connection);
}
