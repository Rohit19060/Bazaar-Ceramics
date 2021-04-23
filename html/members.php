<?php
include_once("../includes/session.inc");
include_once("../includes/function.inc");

if (!isset($_SESSION["member"])) {
  $_SESSION["message"] = "You need to login first";
  redir("memberlogon.php");
}
include_once("../includes/header.inc"); ?>
<!--this is Main wrapper -->
<div class="wrapper" style="height: 235px">
  <?php
  include_once("../includes/banner.inc");
  include_once("../includes/left-panel.inc");
  include_once("../includes/page-heading.inc");
  include_once("../includes/sub-heading.inc");

  ?>
  <div class="nav">
    <label for="toggle">&#9776;</label>
    <input type="checkbox" id="toggle" />
    <?php include_once("../includes/menu.inc"); ?>
    <!--this is main Content Section -->
    <div class="content">
    <?php
      echo username(); ?>
      <!-- Fuctions and appropriate write statement for assebmling sliced images -->
      <script>
        document.write("<div class=\"nested\"><div>");
        thumbenlarge("bcpot020", 2, 450, "Copper Red Dish");
        document.write("</div><div>");
        thumbenlarge("bcpot030", 3, 870, "Copper Red Vase");
        document.write("</div><div>");
        thumbenlarge("bcpot060", 6, 950, "Cyan Dish");
        document.write("</div><div>");
        thumbenlarge("bcpot080", 8, 106, "Light Blue Cup Set");
        document.write("</div><div>");
        thumbenlarge("bcpot120", 9, 999, "Earthen Vase");
        document.write("</div></div>");
      </script>

      <!--this is main Content End -->
    </div>
  </div>
  <?php include_once("../includes/footer.inc"); ?>