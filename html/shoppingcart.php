<?php
require_once("../includes/session.inc");
require_once("../includes/function.inc");
if (!isset($_SESSION["ID"])) {
    $_SESSION["message"] = "Only Members can access shopping Cart";
    redir("memberlogon.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
</head>

<body>
    <section id="cart">
        <h1>Your Shopping Cart </h1>
        <?php
        include_once("../includes/dbconnection.inc");
        include_once("../includes/function.inc");
        include_once("../includes/session.inc");
        echo username();
        echo message();
        //getting custoemr order id
        $customeOrderID = $_SESSION["CustomerOrderID"];
        // getting item count
        $query = "SELECT Count(*) FROM orderline LEFT JOIN product ON orderline.ProductID = product.ProductID where OrderID = {$customeOrderID};";
        $result = mysqli_query($connection, $query);
        $CustData = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($CustData["Count(*)"] != 0) {
            echo '<button onclick="window.history.back();" class="backbtn">Back</button>';
            $totalprice = 0;
            echo '<form action="delete.php" method="POST">
            <table>
        <tr>
            <td>Product Code</td>
            <td>Description</td>
            <td>Quantity Ordered</td>
            <td>Unit Price</td>
            <td>Total Line Price</td>
            <td class="delete"></td>
        </tr>';
            //getting all product using join
            $query = "SELECT * FROM orderline LEFT JOIN product ON orderline.ProductID = product.ProductID where OrderID = {$customeOrderID};";
            $result = mysqli_query($connection, $query);
            while ($Data = mysqli_fetch_assoc($result)) {
                echo '<tr>
            <td><input type="text" value="' . $Data["ProductID"]  . '" readonly></td>
            <td><textarea readonly>' . $Data["ProductDescription"] . '</textarea></td>
            <td><input type="text" value="' . $Data["OrderQuantity"] . '" readonly></td>
            <td><input type="text" value="' . $Data["ProductPrice"] . '" readonly></td>
            <td><input type="text" value="' . $Data["OrderQuantity"] * $Data["ProductPrice"] . '" readonly></td>
            <td class="delete"><a href="delete.php?id=' . $Data["ProductID"] . '" id="del">Delete</a></td>
            </tr>';
                // Setting total Price
                $totalprice = $totalprice + ($Data["OrderQuantity"] * $Data["ProductPrice"]);
            }
            mysqli_free_result($result);
            // Functional buttons
            echo '</table></form>
        <div class="danger">
        
                    <a href="javascript:window.history.back()" class="dan">Close Cart</a>
                    <a href="deletecart.php" class="dan">Delete Cart</a>
                    <h2>Total Order Amount: $' . $totalprice . '</h2>
                    <a href="confirm.php" id="confirm">Confirm Order</a>
            </div>';
        } else {
            echo "<h3>No items in the cart</h3>";
            echo '<a href="../index.php"><button class="buttonx">Back to home</button></a>';
        }
        if ($connection) {
            mysqli_close($connection);
        }

        ?>
        <br>
    </section>
</body>

</html>