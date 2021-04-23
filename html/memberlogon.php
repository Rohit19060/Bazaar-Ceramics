<?php
require_once("../includes/session.inc");
require_once("../includes/auth.inc");
?> <form method="POST" action="login.php" onsubmit="return validation();">
    <h2 class="center">Bazaar Ceramics's Member Login</h2>
    <h2 class="center"><?php echo message(); ?></h2>
    <table>
        <tr>
            <td><label>User Id*</label></td>
            <td>
                <input type="text" name="userid" id="userid" required autofocus onkeyup="usercheck()" onkeydown="usercheck()" /></td>
        </tr>
        <tr>
            <td><label>Password*</label></td>
            <td>
                <input type="password" id="passw" name="passw" required minlength="6"> </td>
        </tr>
        <tr>
            <td colspan="3" class="center"> <input type="submit" value="Submit" name="submit"></td>
        </tr>
        <tr>
            <td colspan="2" class="center"> <button><a href="../index.php">Cancel the Form(Back to home)</a></button></td>
        </tr>
    </table>
</form>
</div>
<script>
    function validation() {
        var myphone = document.getElementById("userid").value;
        if (myphone.match("/") || myphone.includes(".") || myphone.match("%") || myphone.match(/\\$/) || myphone.includes("@") || myphone.includes("?") || myphone.match(" ")) {
            alert('Userid must not have "Space / . % \@ ?"');
            return false;
        } else {
            return true;
        }
    }
</script>
</body>

</html>