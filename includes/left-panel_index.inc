 <div class="left-panel">
   <div class="left-navigation">
     <ul class="nav2">
       <!-- Navigation menu -->
       <li class="current"><a href="index.php">Company</a>
         <ul>
           <li><a href="html/company_bg.php">History</a></li>
           <li><a href="html/members.php">Members</a></li>
           <li><a href="html/company_mission.php">Our Mission</a></li>
           <li><a href="html/under_construction.php">Products</a></li>
         </ul>
       </li>
       <li><a href="html/under_construction.php">Design</a></li>
       <li><a href="html/production_page.php">Production</a>
         <ul>
           <li><a href="html/under_construction.php">Website Look &amp; Feel</a></li>
         </ul>
       </li>
       <li><a href="html/under_construction.php">Range</a>
         <ul>
           <li><a href="html/under_construction.php">Prices</a></li>
           <li><a href="html/under_construction.php">Gallery</a></li>
           <li><a href="html/under_construction.php">Structure</a></li>
         </ul>
       </li>
       <li><a href="html/under_construction.php">Sales</a></li>
       <li><a href="html/under_construction.php">Feedback</a></li>
     </ul>
   </div>
     <div class="sessionbuttons">
    <?php
      if (isset($_SESSION["member"])) {
        echo '<a href="html/logout.php"><button class="buttonx">Log out</button></a>';
      } else {
        echo '<a href="html/register.php"><button class="buttonx">New Customer Register</button></a>';
        echo '<a href="html/newmemregister.php"><button class="buttonx">New Member Registration</button></a>';
        echo '<a href="html/memberlogon.php"><button class="buttonx">Member Login</button></a>';
        // echo '<a href="html/shoppingcart.php"><button class="buttonx">Items in Cart</button></a>';
      }

      ?>
   </div>
   <p id="twitter"><img src="images/twitter-48circle.png" alt="twitter"></p>
   <p id="pintrest"><img src="images/pinterest-48circle.png" alt="pintrest"></p>
   <p id="facebook"><img src="images/facebook-48circle.png" alt="facebook"></p>
 </div>