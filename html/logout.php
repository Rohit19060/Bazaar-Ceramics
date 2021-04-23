<?php require_once("../includes/session.inc"); ?>
<?php require_once("../includes/function.inc"); 
if (isset($_SESSION["member"])) {
	// setting everything to null
	foreach ($_SESSION as $key => $value) {
		$_SESSION[$key] = null;
	}
	$_SESSION["message"] = "Logout Successful";
	redir("../index.php");
} else {
	$_SESSION["message"] = "This is not a proper request";
	redir("../index.php");
}
?>