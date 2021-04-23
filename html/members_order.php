<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bazaar Ceramics</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/layout2.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="../scripts/form_validation.js"></script>
  <script type="text/javascript" src="../scripts/onload.js">
  </script>
  <?php include_once("../includes/session.inc"); ?>
</head>

<body>
  <!--this is Main wrapper -->
  <div class="wrapper">
    <?php
    alert();
    echo username();
    echo message();
    ?>
    <!--this is Page Banner-->
    <div class="page-heading">
      <!-- for gettting input description form using javascript through url data -->
      <div>Bazaar Ceramics Members Order</div>
      <div id="itemdes"></div>
    </div>
    <!-- for itemimage -->
    <section id="slicedimage"></section>
    <div class="form">
      <h2>Order Item</h2>
      <form action="addtocart.php" id="thisForm" name="thisForm" method="post">
        <table style="border:1px;margin-left: auto; margin-right: auto;">
          <tr>
            <td width="99">Item Name:</td>
            <td colspan="2">
              <!-- for gettting input description form using javascript through url data -->
              <div id="inputdes"></div>
            </td>
          </tr>
          <tr>
            <td>Quantity:</td>
            <td colspan="2">
              <input type="tel" name="thisQty" id="thisQty" onkeypress="calculateTotal();" onkeyup="calculateTotal();" autofocus />
            </td>
          </tr>
          <tr>
            <td>Price:</td>
            <td colspan="2">
              <!-- for gettting inputprice form using javascript through url data -->
              <div id="inputprice"></div>
            </td>
          </tr>
          <tr>
            <td>Total Price:</td>
            <td colspan="2">
              <input type="text" value="00" name="thisTotal" id="thisTotal" readonly />
            </td>
          </tr>
          <tr>
            <td></td>
            <td colspan="2">
              <div id="hiddenid"></div>
            </td>
          </tr>
          <tr>
            <td>
            </td>
            <td>
              <input type="submit" name="submitButton" id="submitButton" value="Add to Cart" />
              <input type="reset" name="resetButton" id="resetButton" value="Clear" onclick="clearvalue()" />
            </td>
          </tr>
        </table>
      </form>
    </div>
    <div class="footer">
      <script type="text/javascript" src="../scripts/window.js"></script>
      <a href="#" target="_blank" onclick="closeme();">Close This Window</a>
    </div>
  </div>
</body>

</html>