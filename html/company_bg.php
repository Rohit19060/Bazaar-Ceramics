<?php include_once("../includes/header.inc");
include_once("../includes/session.inc"); ?>
</head>
<body>
  <!--this is Main wrapper -->
  <div class="wrapper" style="height: 235px">
    <?php
    include("../includes/banner.inc");
    include("../includes/left-panel.inc");
    include("../includes/page-heading.inc");
    include("../includes/sub-heading.inc");
    ?>
    <div class="nav">
      <label for="toggle">&#9776;</label>
      <input type="checkbox" id="toggle" />
      <?php include_once("../includes/menu.inc"); ?>
      <!--this is Main Content Section -->
      <div class="content">
      <?php
      echo username(); ?>
        <h1 class="history">Company Background</h1>
        <p class="history2">Bazaar Ceramics Studio has been operating for 20 years.  We started as a small collective,
          operating in the picturesque township of Hahndorf, South Australia - known for its quality arts and crafts. 
          Over the years the studio has passed through a number of transformations.  In the first 7 years of its
          existence - as a co-operative, it was well known for producing quality domestic ware and fine individually
          designed art pieces.  </p>
        <p class="history2">Each member of the co-operative was responsible for designing, throwing, glazing and firing
          their own work.  A gallery director was employed to look after the gallery and all aspects of marketing.
        </p>
        <div id="back_link"> <a href="../index.php">Back to Home</a></div>
      </div>
      <!--this is main Content End -->
    </div>
    <?php include_once("../includes/footer.inc"); ?>