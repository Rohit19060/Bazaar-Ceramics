<?php
session_start();
function message()
{
    if (isset($_SESSION["message"])) {
        $output = "<h3 style='text-align:center;height:15px;padding-top:10px'>";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</h3>";
        $_SESSION["message"] = null;
        return $output;
    }
}



function username()
{
    if (isset($_SESSION["Name"])) {
        $output = "<h3 style='text-align:center;height:15px;padding-top:10px'> Welcome ";
        $output .= htmlentities($_SESSION["Name"]);
        $output .= "</h3>";
        return $output;
    }
}

function alert(){
    if (isset($_SESSION["error"])) {
        $arrlength = count($_SESSION["error"]);
        $y = "";
    for($x = 0; $x < $arrlength; $x++) {
            $y .= $_SESSION["error"][$x];
            $y .= "\\n";
    }
        echo "<script type='text/javascript'>alert('".$y."');</script>";
        $_SESSION["error"] = null;
    }
    else if(isset($_SESSION["noerror"])){
         $arrlength = count($_SESSION["noerror"]);
        $y = "";
    for($x = 0; $x < $arrlength; $x++) {
            $y .= $_SESSION["noerror"][$x];
            $y .= "\\n";
    }
        echo "<script type='text/javascript'>
        var x = confirm('".$y."');
        if(x == true){
           location.href=`addtocart.php?data=5`;
         
        }        </script>";
        $_SESSION["noerror"] = null;
        
    }
}
?>