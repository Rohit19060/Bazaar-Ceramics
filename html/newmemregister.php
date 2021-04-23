<?php
require_once("../includes/session.inc");
require_once("../includes/function.inc");

require_once("../includes/auth.inc");
?><form method="POST" action="insert.php" onsubmit="return validation();">
    <h2 class="center">Bazaar Ceramics</h2>
    <h2 class="center">New Member Registration</h2>
    <h2 class="center"><?php echo message(); ?></h2>
    <h3 id="space" class="center">Must not have "Space / . % \ @ ?"</h3>
    <table>
        <tr>
            <td><label>Customer Email* </label></td>
            <td>
                <input type="email" name="email" id="email" required autofocus />
            </td>
        </tr>
        <tr>
            <td><label>User Id*</label></td>
            <td>
                <input type="text" name="userid" id="userid" required onkeyup="usercheck()" onkeydown="usercheck()" /></td>
        </tr>
        <tr>
            <td><label>Password*</label></td>
            <td>
                <input type="password" id="passw" name="passw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Should be no less than six (6) characters and should only consist of lower or uppercase letters, numbers, full stop (period) or forward slash." required minlength="6"> </td>
        </tr>
        <tr>
            <td colspan="3" class="center">
                <input type="submit" value="Submit" name="submitmem">
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center"> <button><a href="../index.php">Cancel the Form (Back to home)</a></button></td>
        </tr>
    </table>
</form>
<script>
    // OnSubmit Validation for userid
    function validation() {
        if (document.getElementById("space").style.display == "block") {
            alert('Userid must not have "Space / . % \@ ?"');
            return false;
        } else {
            return true;
        }
    }
    // Onkeypress check for userid
    function usercheck() {
        var myphone = document.getElementById("userid").value;
        if (myphone.match("/") || myphone.includes(".") || myphone.match("%") || myphone.match(/\\$/) || myphone.includes("@") || myphone.includes("?") || myphone.match(" ")) {
            document.getElementById("space").style.display = "block";
        } else {
            document.getElementById("space").style.display = "none";
        }
    }
</script>
</body>

</html>