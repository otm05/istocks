<?php
include_once("../MyLibrery/connection.php");
if(isset($_GET['codePL']))
{
    $codePL=$_GET['codePL'];
    if(!empty($codePL)){
        ExecuteNonQuery($cnx,"delete from Poles where codePL = '$codePL';");
        header("Location:Cslt_Poles.php");
    }
}
?>