<?php include_once("../includes/header.inc");
include_once("../includes/session.inc"); ?>
<!--this is comment Main wrapper -->
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
		<div class="content" style="display: flex;justify-content: center;align-items: center;text-align: center;">
			<div>
				<h2>Page is under Constuction</h2>
				<h2>Great Content will be here Soon</h2>
				<a href="../index.php">Back to home</a>
			</div>
		</div>
	</div>
	<!--this is comment End Wrapper -->
</div>
<?php include_once("../includes/footer.inc"); ?>