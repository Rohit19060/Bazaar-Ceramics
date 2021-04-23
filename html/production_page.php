<?php include_once("../includes/header.inc");
include_once("../includes/session.inc"); ?>
<!--this is comment Main wrapper -->
<div class="wrapper" style="height:335px">
  <?php
  include_once("../includes/banner.inc");
  include_once("../includes/left-panel.inc");
  include_once("../includes/page-heading.inc");
  include_once("../includes/sub-heading.inc");
  ?>
  <div class="nav">
    <label for="toggle">&#9776;</label>
    <input type="checkbox" id="toggle" />
    <?php

    include_once("../includes/menu.inc"); ?>
    <!--this is main Content Section -->
    <div class="content">
      <?php
      echo username(); ?>
      <div>
        <!-- Paragraph before slide show -->
        <h5>
          Bazaar Ceramics are constantly experimenting with new designs and techniques. The process of developing a
          particular range of ceramics, starts with the design process. The ceramic designers and gallery director
          meet regularly to discuss new ideas for product ranges. It may be that the designers are following through
          on an inspiration from a field trip or perhaps the gallery director has some suggestions to make based on
          feedback from customers.</h5>
      </div>
      <!-- thumbnails that use to select pic by using showdivs method and argument as index and only one image have border that showing
        current pic or default pic-->
      <div class="thumbnails">
        <img class="thumb" src="../images/openingclaysmall.jpg" onclick="showDivs(slideIndex = 1);" alt="Thumb1">
        <img class="thumb" src="../images/finishingsmall.jpg" onclick="showDivs(slideIndex = 2);" alt="Thumb2">
        <img class="thumb" src="../images/openingclaysmall.jpg" onclick="showDivs(slideIndex = 3);" alt="Thumb3" style="box-shadow: 0 4px 8px 0 rgb(0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px white solid;">
        <img class="thumb" src="../images/sequence12small.jpg" onclick="showDivs(slideIndex = 4);" alt="Thumb4">
        <img class="thumb" src="../images/openingclaysmall.jpg" onclick="showDivs(slideIndex = 5);" alt="Thumb5">
      </div>
      <br>
      <!-- Enlargement image, after clicking thumbnail pictures there style updae as display to none or block based on selected thumbnail -->
      <div class="enlargement">
        <img class="pics" src="../images/openingclay.jpg" style="display:none;box-shadow: 0 4px 8px 0 rgb(0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px white solid;" alt="1st Pic">
        <img class="pics" src="../images/finishing.jpg" style="display:none;box-shadow: 0 4px 8px 0 rgb(0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px white solid;" alt="2nd Pic">
        <img class="pics" src="../images/openingclay.jpg" alt="3rd Pic" style="box-shadow: 0 4px 8px 0 rgb(0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px white solid;">
        <img class="pics" src="../images/sequence12.jpg" style="display:none;box-shadow: 0 4px 8px 0 rgb(0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px white solid;" alt="4th Pic">
        <img class="pics" src="../images/openingclay.jpg" style="display:none;box-shadow: 0 4px 8px 0 rgb(0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border:2px white solid;" alt="5th Pic">
      </div>
      <div>
        <!-- Paragraph after slide show -->
        <h5>
          Promising designs are developed into working drawings which the production potters use to create the ceramic
          forms. Depending on the type of decoration, the designers may apply the decoration at this stage, or after
          they have been bisqued (fired to 1000 degrees celsius). These prototype designs go through a lengthy
          development stage of testing and review until the designer is happy with the finished product. At this stage
          a limited number of pots are produced and displayed in the gallery. If they do well in the gallery, they
          become a standard line.</h5>
      </div>
    </div>
    <!--this is main Content End -->
  </div>
  <?php include_once("../includes/footer.inc"); ?>