<?php include_once("includes/session.inc"); ?>
<?php include_once("includes/header_index.inc"); ?>
</head>
<body>
  <?php echo message(); ?>
  <!--this is Main wrapper -->
  <div class="wrapper">
    <?php
    include_once("includes/banner_index.inc");
    include_once("includes/left-panel_index.inc");
    include_once("includes/page-heading.inc");
    include_once("includes/sub-heading.inc");
    
    ?>
    <div class="nav">
      <label for="toggle">&#9776;</label>
      <input type="checkbox" id="toggle" />
      <?php include_once("includes/menu_index.inc") ?>
      <!--this is main Content Section -->
      <div class="content">
        <?php echo username(); ?>
        <br><br>
        <div class="center">
          <!-- Main Image -->
          <img src="images/homepage.jpg" alt="HomeImage" width="50%">
        </div>
        <div style="padding: 20px;">
          <p>
            Bazaar Ceramics Studio has been operating for 20 Years. We started as a small collective, operating in the
            picturesque township of Hahndorf, South Australia - known for its quality arts and craft. Our current range
            of products consists of one-off ceramic forms(eg vase, bottle forms, and dishes) using several traditional
            glazes that are highly prized amongst ceramic collectors. These Include</p>
          <ul>
            <li>Copper Red</li>
            <li>Reduced Lustre</li>
            <li>Jun</li>
          </ul>
          <p>
            Each member of the Co-operative was responsible for designing, throwing, glazing, and firing their work. A
            gallery director was employed to look after the gallery and all aspects of marketing.</p>
        </div>
        <!--this is main Content End -->
      </div>
    </div>
    <div class="footer">
      <ul>
        <li>Copyright &copy; | </li>
        <li><a href="html/under_construction.php"> About Us</a> |</li>
        <li><a href="html/under_construction.php">Legal Stuff</a> </li>
      </ul>
    </div>
  </div>
</body>

</html>