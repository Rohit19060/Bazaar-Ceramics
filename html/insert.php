<?php
require_once("../includes/session.inc");
require_once("../includes/function.inc");
require_once("../includes/dbconnection.inc");
if (isset($_POST["submit"])) {

    //adding new Customer
    $firstname = mysqli_prepration($_POST["firstname"]);
    $lastname = mysqli_prepration($_POST["lastname"]);
    $address = mysqli_prepration($_POST["address"]);
    $mobile = mysqli_prepration($_POST["mobile"]);
    $email = mysqli_prepration($_POST["email"]);
    // Checking for customer already existence
    $query_get_email = "Select CustomerEmail from customer where `CustomerEmail` = '{$email}';";
    $emailresult = mysqli_query($connection, $query_get_email);
    $res1 = mysqli_fetch_assoc($emailresult);
    mysqli_free_result($emailresult);
    $query_get_mobile = "Select CustomerPhoneNumber from customer where `CustomerPhoneNumber` = {$mobile};";
    $mobileresult = mysqli_query($connection, $query_get_mobile);
    $res2 = mysqli_fetch_assoc($mobileresult);
    mysqli_free_result($mobileresult);
    if (isset($res1["CustomerEmail"]) && isset($res2["CustomerPhoneNumber"])) {
        $_SESSION["message"] = "Email & Mobile Number Already Exists!";
        redir($_SERVER["HTTP_REFERER"]);
    } else if (isset($res1["CustomerEmail"])) {
        $_SESSION["message"] = "Email Already Exists!";
        redir($_SERVER["HTTP_REFERER"]);
    } else if (isset($res2["CustomerPhoneNumber"])) {
        $_SESSION["message"] = "Mobile Number Already Exists!";
        redir($_SERVER["HTTP_REFERER"]);
    }

    // Inserting Customer Data into customer table
    $query_insert = "INSERT INTO customer (";
    $query_insert .= "CustomerGivenName, CustomerLastName,CustomerEmail,CustomerAddress,CustomerPhoneNumber";
    $query_insert .= ") values ('{$firstname}','{$lastname}','{$email}','{$address}','{$mobile}')";
    if (mysqli_query($connection, $query_insert)) {
        $_SESSION["ID"] = mysqli_insert_id($connection);
        $_SESSION["message"] = "Customer Added Successfully";
        redir("../index.php");
    } else {
        $_SESSION["message"] = "Registration Failed";
        redir("register.php");
    }
} elseif (isset($_POST["submitmem"])) {
    $userid = mysqli_prepration($_POST["userid"]);
    // Checking userid existence in members table
    $query_get_userId = "Select UserID from member where `UserId` = '{$userid}';";
    $useridresult = mysqli_query($connection, $query_get_userId);
    $res = mysqli_fetch_assoc($useridresult);
    if (isset($res["UserID"])) {
        $userIDa = $res["UserID"];
        $_SESSION["message"] = "UserId Already Exists! Please Login";
        redir("memberlogon.php");
    }
    // mysqli_free_result($res);
    // getting customer ID 
    $email = $_POST["email"];
    $query_get_customerId = "Select CustomerID from customer where `CustomerEmail` = '{$email}' LIMIT 1;";
    $custresult = mysqli_query($connection, $query_get_customerId);
    $userx = mysqli_fetch_assoc($custresult);
    // Geting customer id if not found then it mean member to be is not a customer
    if (isset($userx["CustomerID"])) {
        $custID =  $userx["CustomerID"];
    } else {
        $_SESSION["message"] = "You need to be register as Customer first to be a member";
        redir("register.php");
    }
    mysqli_free_result($custresult);
    // If all the validation is ok then hash the password and insertinto member table
    $password = $_POST["passw"];
    $hash_format = "$2y$10$";
    $salt = "mlpoknbjiuhvcgytfxzdresawq";
    $format_and_salt = $hash_format . $salt;
    $hashed = crypt($password, $format_and_salt);
    $query_insert = "INSERT INTO member(";
    $query_insert .= "CustomerID,UserID,HashedPassword) values (";
    $query_insert .= "{$custID},'{$userid}','{$hashed}');";
    if (mysqli_query($connection, $query_insert)) {
        echo "temp";
        $_SESSION["member"] = $userid;
        $queryx = "SELECT * from customer where CustomerID = {$custID}";
        $resultx = mysqli_query($connection, $queryx);
        $userx = mysqli_fetch_assoc($resultx);
        $_SESSION["Name"] = $userx["CustomerGivenName"];
        $_SESSION["message"] = "Welcome {$_SESSION["Name"]},You Registered & Logged In";
        redir("../index.php");
    } else {
        $_SESSION["message"] = "Member is already Registered! Please Login";
        redir("memberlogon.php");
    }
} else {
    $_SESSION["message"] = "This is not the proper Request";
    redir("../index.php");
}
if (mysqli_connect_errno()) {
    die("Database Connection Failed" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
} else {
    mysqli_close($connection);
}
?>