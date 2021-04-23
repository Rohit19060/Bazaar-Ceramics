<div class="left-panel">
   <div class="left-navigation">
     <ul class="nav2">
       <!-- Navigation menu -->
       <li class="current"><a href="../index.php">Company</a>
         <ul>
           <li><a href="company_bg.php">History</a></li>
           <li><a href="members.php">Members</a></li>
           <li><a href="company_mission.php">Our Mission</a></li>
           <li><a href="under_construction.php">Products</a></li>
         </ul>
       </li>
       <li><a href="under_construction.php">Design</a></li>
       <li><a href="production_page.php">Production</a>
         <ul>
           <li><a href="under_construction.php">Website Look &amp; Feel</a></li>
         </ul>
       </li>
       <li><a href="under_construction.php">Range</a>
         <ul>
           <li><a href="under_construction.php">Prices</a></li>
           <li><a href="under_construction.php">Gallery</a></li>
           <li><a href="under_construction.php">Structure</a></li>
         </ul>
       </li>
       <li><a href="under_construction.php">Sales</a></li>
       <li><a href="under_construction.php">Feedback</a></li>
     </ul>
   </div>
  <div class="sessionbuttons">
     <?php
      if (isset($_SESSION["member"])) {

        if (isset($_SESSION["CustomerOrderID"]) && $_SERVER["REQUEST_URI"] == "/bazaar_ceramics/html/members.php") {
          include("../includes/dbconnection.inc");
          $customeOrderID = $_SESSION["CustomerOrderID"];
           $query = "SELECT Count(*) as c,Sum(OrderQuantity * ProductPrice) as su FROM orderline LEFT JOIN product ON orderline.ProductID = product.ProductID WHERE OrderID = {$customeOrderID}";
        $result = mysqli_query($connection, $query);
        $CustData = mysqli_fetch_assoc($result);
        if ($CustData["c"] != 0) {
          $amount = $CustData["su"];
          $_SESSION["Items"] = $CustData["c"];
        } else {
          $_SESSION["Items"] = null;
        }
          mysqli_close($connection); 
         echo "<p style='color:white;float:left;'>";
         if (isset($_SESSION["Items"])) {
        echo "Amount: " . $amount . "<br>";
        echo "Items: " . $_SESSION["Items"];
      } else {
        echo "Amount: 0 <br>";
        echo "Items: 0";
      }
      echo "</p>";
        echo '<a href="shoppingcart.php" style="float:left; margin-left:10px;padding-top:15px;"><button class="buttonx">Items in Cart</button></a>';
         echo '<div style="clear:both;"></div>';

      }
       
       
        echo '<a href="logout.php"><button class="buttonx">Log out</button></a>';
      } else {
        echo '<a href="register.php"><button class="buttonx">New Customer Register</button></a>';
        echo '<a href="newmemregister.php"><button class="buttonx">New Member Registration</button></a>';
        echo '<a href="memberlogon.php"><button class="buttonx">Member Login</button></a>';
        // echo '<a href="shoppingcart.php"><button class="buttonx">Items in Cart</button></a>';
      }
     
      ?>
   </div>
   <p id="twitter"><img src="../images/twitter-48circle.png" alt="twitter"></p>
   <p id="pintrest"><img src="../images/pinterest-48circle.png" alt="pintrest"></p>
   <p id="facebook"><img src="../images/facebook-48circle.png" alt="facebook"></p>
 </div>