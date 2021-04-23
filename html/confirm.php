<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bazaar Ceramics</title>
    <link rel="stylesheet" href="../css/cart.css">
</head>

<body>
    <section id="confirm">
        <?php
        include_once("../includes/dbconnection.inc");
        include_once("../includes/function.inc");
        include_once("../includes/session.inc");
        //getting items count

        $customeOrderID = $_SESSION["CustomerOrderID"];
        $query = "SELECT Count(*) FROM orderline LEFT JOIN product ON orderline.ProductID = product.ProductID where OrderID = {$customeOrderID};";
        $result = mysqli_query($connection, $query);
        $CustData = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($CustData["Count(*)"] == 0) {
            // If Cart is empty then Go Back
            echo '<script> window.history.back();</script>';
        } else {
            echo '<h1 class="red">Order Complete</h1>';
            echo username();
            //getting customer details
            $query = "SELECT * FROM `customer` WHERE CustomerID = {$_SESSION['ID']}";
            $result = mysqli_query($connection, $query);
            $Data = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            if ($Data) {
                echo '<div class="grey div">
            <h2>Customer Details</h2>
            <h4>Customer Name: ' . $Data["CustomerGivenName"] . ' ' . $Data["CustomerLastName"] . ' </h4>
            <h4>Customer Address: ' . $Data["CustomerAddress"] . '</h4>
            <h4>Customer Suburb: ' . $Data["CustomerSuburb"] . '</h4>
            <h4>Customer State: ' . $Data["CustomerState"] . '</h4>
            <h4>Customer Postcode: ' . $Data["CustomerPostCode"] . '</h4>
            </div>';
            }

            $query_id = "SELECT MAX(OrderID) from orders";
            $result_id = mysqli_query($connection, $query_id);
            if ($result_id) {
                //later you can do this from database
                $re_id = mysqli_fetch_assoc($result_id);
                $orderID = $re_id["MAX(OrderID)"] + 1;
            }

            mysqli_free_result($result_id);
            $custID = $_SESSION["ID"];
            $curDate = date("y-m-d");
            // get all the product form orderline table and store in the order table {out of scopr of assignemnt}
            //inserting order Customer id in orders
            $query_insert =  "INSERT INTO `orders`(`OrderID`, `CustomerID`, `OrderDate`) VALUES ({$orderID},{$custID},'{$curDate}');";
            if (mysqli_query($connection, $query_insert)) {
                //later you can do this from database
                echo '<div class="grey div">
                <h2>Order Details</h2>
                <h3>Order Number: ' .  $orderID . ' </h3>
                <h3>Order Date: ' . $curDate . '</h3>
            </div>';
            }

            // generating shopping Cart final table
            $totalprice = 0;
            echo '<div class="clear"></div>';
            echo '<table class="grey">
        <tr>
            <td><lable>Produce Id</lable></td>
            <td><lable>Description</lable></td>
            <td><lable>Quantity Order</lable></td>
            <td><lable>Unit Price</lable></td>
            <td><lable>Total Line Price</lable></td>
        </tr>';
            $query = "SELECT * FROM orderline LEFT JOIN product ON orderline.ProductID = product.ProductID where OrderID = {$customeOrderID};";
            $result = mysqli_query($connection, $query);
            while ($Data = mysqli_fetch_assoc($result)) {
                $totalprice = $totalprice + ($Data["OrderQuantity"] * $Data["ProductPrice"]);
                echo '<tr>
            <td>' . $Data["ProductID"] . '</td>
            <td>' . $Data["ProductDescription"] . '</td>
            <td>' . $Data["OrderQuantity"] . '</td>
            <td>' . $Data["ProductPrice"] . '</td>
            <td>' . $Data["OrderQuantity"] * $Data["ProductPrice"] . '</td>
            </tr>';
            }
            mysqli_free_result($result);
            echo '<tr>
            <td colspan=5>Total Order Amount $' . $totalprice . '</td>
        </tr>';
            echo '</table>';

            // Deleting Customers orderline table
            $querydel = "DELETE FROM orderline ";
            $querydel .= "WHERE OrderID = {$_SESSION['CustomerOrderID']}";
            if (!mysqli_query($connection, $querydel)) {
                echo "Deletion of Orderline Failed";
            }
            // Deleting Customer Orders table
            $querydel = "DELETE FROM orders ";
            $querydel .= "WHERE CustomerID = {$_SESSION['ID']}";
            if (!mysqli_query($connection, $querydel)) {
                echo "Deletion of Orders Failed";
            }
            echo '<div class="yellow"><button onclick="alert(`Payment Successful`); window.history.back();">Payment Confirm</button></div>';
        }
        if ($connection) {
            mysqli_close($connection);
        }
        ?>
    </section>
</body>

</html>