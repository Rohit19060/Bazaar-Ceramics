<?php
include_once("../includes/session.inc");
include_once("../includes/function.inc");
function addtocart()
{

    // Error/No Error array
    $error = array();
    $noerror = array();
    // User Logged in Check
    if (!isset($_SESSION["ID"])) {
        array_push($error, "User Must Be Logged In To Order!");
        $_SESSION["error"] = $error;
        redir($_SERVER["HTTP_REFERER"]);
    }
    include_once("../includes/dbconnection.inc");
    if (isset($_POST["submitButton"])) {
        $id = $_POST["thisid"];
        $name = $_POST["thisName"];
        $price = $_POST["thisPrice"];
        $total = $_POST["thisTotal"];
        $quantity = $_POST["thisQty"];
        // Checking for decimal
        if (strpos($quantity, ".") !== false) {
            array_push($error, "Error! Quantity must not contain a Decimal");
        }
        // Checking for less than or equal to zero value
        if ($quantity <= 0) {
            array_push($error, "Error! Quantity Must be Greater than Zero");
        }
        // Checking the value is numeric
        if (!is_numeric($quantity)) {
            array_push($error, "Error! Quantity Must Be Numeric");
        }
        //Checking product availablity
        $queryx = "SELECT * from product where ProductID = '{$id}';";
        $resultx = mysqli_query($connection, $queryx);
        $userx = mysqli_fetch_assoc($resultx);
        if (!isset($userx["ProductTitle"])) {
            array_push($error, "Product is Not available");
        }
        mysqli_free_result($resultx);
        // if there is any error then save is and go back
        if (sizeof($error) != 0) {
            $_SESSION["error"] = $error;
            redir($_SERVER["HTTP_REFERER"]);
        } else if (isset($_SESSION["noerror"])) {
            $_SESSION["noerror"] = null;
        } else {
            //no Error popup
            array_push($noerror, "You have ordered the following items");
            array_push($noerror, "");
            array_push($noerror, "");
            array_push($noerror, "Item: {$name}");
            array_push($noerror, "Qty: {$quantity}");
            array_push($noerror, "Price: {$price}");
            array_push($noerror, "Total: {$total}");
            array_push($noerror, "Is this correct?");
            // saving data to sessions
            $_SESSION["noerror"] = $noerror;
            $_SESSION["idx"]  =  $id;
            $_SESSION["namex"] = $name;
            $_SESSION["pricex"] = $price;
            $_SESSION["totalx"] = $total;
            $_SESSION["quantityx"] = $quantity;
            redir($_SERVER["HTTP_REFERER"]);
        }
    }
    if (isset($_GET["data"]) && $_GET["data"] == 5) {
        // getting data from session
        $id = $_SESSION["idx"];
        $_SESSION["idx"] = null;
        $name = $_SESSION["namex"];
        $_SESSION["namex"] = null;
        $price =  $_SESSION["pricex"];
        $_SESSION["pricex"] = null;
        $total = $_SESSION["totalx"];
        $_SESSION["totalx"] = null;
        $quantity = $_SESSION["quantityx"];
        $_SESSION["quantityx"] = null;
        $query = "SELECT OrderID from orders where CustomerID = {$_SESSION['ID']}";
        $result = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($result);
        //Gettin customer order ID
        mysqli_free_result($result);
        if (isset($data["OrderID"])) {
            $customeOrderID =  $data["OrderID"];
            $_SESSION["CustomerOrderID"] = $customeOrderID;
            $queryy = "SELECT * from orderline where OrderID = {$customeOrderID};";
            $resulty = mysqli_query($connection, $queryy);
            while ($usery = mysqli_fetch_assoc($resulty)) {
                if ($usery["ProductID"] == $id) {
                    $temp = $usery["OrderQuantity"] + $quantity;
                    $query_update = "UPDATE orderline SET OrderQuantity =  $temp WHERE ProductID = '{$id}' and OrderID = {$customeOrderID};";
                    mysqli_query($connection, $query_update);
                    if ($connection) {
                        mysqli_close($connection);
                    }
                    array_push($noerror, "Thank you for the Order");
                    $_SESSION["error"] = $noerror;
                    $_SESSION['message'] = "Product Quantity Updated Successfully";
                    redir($_SERVER["HTTP_REFERER"]);
                }
            }
            mysqli_free_result($resulty);
            $query_insert = "INSERT INTO orderline (OrderID,ProductID,OrderQuantity) VALUES ({$customeOrderID},'{$id}',{$quantity});";
            if (!mysqli_query($connection, $query_insert)) {
                echo "Insertion Orderline Failed";
            }
            if ($connection) {
                mysqli_close($connection);
            }
            array_push($noerror, "Thank you for the Order");
            $_SESSION["error"] = $noerror;
            $_SESSION['message'] = "Product Quantity Inserted Successfully";
            redir($_SERVER["HTTP_REFERER"]);
        } else {
            //Generating new customerID
            if (isset($_SESSION["ID"])) {
                $query = "SELECT MAX(OrderID) from orders";
                $result = mysqli_query($connection, $query);
                $data = mysqli_fetch_assoc($result);
                $_SESSION["CustomerOrderID"] = $data["MAX(OrderID)"] + 1;
                mysqli_free_result($result);
                $customeOrderID = $_SESSION["CustomerOrderID"];
                $custID = $_SESSION["ID"];
                $curDate = date("y-m-d");
                //Inserting CustomerOrderID
                $query = "INSERT INTO orders (OrderID,CustomerID,OrderDate) VALUES ({$customeOrderID},{$custID},'{$curDate}');";
                if (!mysqli_query($connection, $query)) {
                    echo "Insertion Orders Failed";
                }
                // Inserting New Product in orderline
                $query_insert = "INSERT INTO orderline (OrderID,ProductID,OrderQuantity) VALUES ({$customeOrderID},'{$id}',{$quantity});";
                if (!mysqli_query($connection, $query_insert)) {
                    echo "Insertion Orderline Failed";
                }
                array_push($noerror, "Thank you for the Order");
                $_SESSION["error"] = $noerror;
                $_SESSION['message'] = "Product Quantity Inserted Successfully";
                if (isset($_SESSION["CustomerOrderID"])) {
                    $customeOrderID = $_SESSION["CustomerOrderID"];
                    $query = "SELECT Count(*) FROM orderline LEFT JOIN product ON orderline.ProductID = product.ProductID where OrderID = {$customeOrderID};";
                    $result = mysqli_query($connection, $query);
                    $CustData = mysqli_fetch_assoc($result);
                    if ($CustData["Count(*)"] != 0) {
                        $_SESSION["Items"] = $CustData["Count(*)"];
                    } else {
                        $_SESSION["Items"] = null;
                    }
                    mysqli_free_result($result);
                }
                if ($connection) {
                    mysqli_close($connection);
                }
                redir($_SERVER["HTTP_REFERER"]);
            } else {
                array_push($error, "User Must Be Logged In To Order!");
                $_SESSION["error"] = $error;
                redir($_SERVER["HTTP_REFERER"]);
            }
        }
    } else {
        $_SESSION["message"] = "Not a proper request";
        redir($_SERVER["HTTP_REFERER"]);
    }
}
addtocart();
