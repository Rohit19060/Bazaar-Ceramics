<?php
require_once("../includes/session.inc");
require_once("../includes/auth.inc");
?><form method="POST" action="insert.php" onsubmit="return validateform();">

    <h2 class="center">Bazaar Ceramics</h2>
    <h2 class="center">New Customer</h2>
    <p id="space" class="center">Must not have space/letter</p>
    <?php echo message(); ?>
    <table>
        <tr>
            <td><label>First Name*</label></td>
            <td>
                <input type="text" name="firstname" id="firstname" required autofocus />
            </td>
        </tr>
        <tr>
            <td><label>Last Name*</label></td>
            <td>
                <input type="text" name="lastname" id="lastname" required />
            </td>
        </tr>
        <tr>
            <td><label>Phone Number*</label></td>
            <td>
                <input type="tel" name="mobile" id="mobile" required onkeydown="phonecheck()" onkeyup="phonecheck()" />
            </td>
        </tr>
        <tr>
            <td><label>Email*</label></td>
            <td>
                <input type="email" name="email" id="email" required>
            </td>
        </tr>
        <tr>
            <td><label>Address*</label></td>
            <td>
                <textarea name="address" id="address" rows="5" required></textarea>
            </td>
        </tr>
        <tr>
            <td class="center"><input type="reset" value="Reset"></td>
            <td class="center">
                <input type="submit" value="Submit" name="submit">
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center"> <button><a href="../index.php">Cancel the Form (Back to home)</a></button></td>
        </tr>
    </table>
</form>
<script>
    function validateform() {
        if (document.getElementById("space").style.display == "block") {
            alert("Mobile number must not have space/letter");
            return false;
        } else {
            return true;
        }
    }

    function phonecheck() {
        var myphone = document.getElementById("mobile");
        var space = "\\s";
        var letter = /[a-z,A-Z]/g;
        if (myphone.value.match(space) || myphone.value.match(letter)) {
            document.getElementById("space").style.display = "block";
        } else {
            document.getElementById("space").style.display = "none";
        }
    }
</script>
</body>

</html>