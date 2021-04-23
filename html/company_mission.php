<?php include_once("../includes/header.inc");
include_once("../includes/session.inc"); ?>
</head>

<body>
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
      <!--this is Main Content Section -->
      <div class="content">
      <?php
      echo username(); ?>
        <h1 class="history">Mission Statement</h1>
        <p class="history2">Bazaar Ceramics is committed to producing unique, evocative contemporary Ceramic Art of the
          highest technical quality. Our Goals:</p>
        <ul>
          <li>To produce unique hand crafted pieces for the individual and corporate collector.</li>
          <li>To showcase the best of Australian Ceramic Art and Design. </li>
          <li>To provide an extensive range of well crafted and designed domestic ware. </li>
          <li>To showcase technical excellence in ceramic technology. </li>
        </ul>
        <div id="back_link"> <a href="../index.php">Back to Home</a></div>
      </div>
      <!--this is Main End Wrapper -->
    </div>
    <?php include_once("../includes/footer.inc"); ?>