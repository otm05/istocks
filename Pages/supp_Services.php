<?php
require_once("../MyLibrery/connection.php");

if(isset($_GET['codeSrv']))
{
    $codeSrv=$_GET['codeSrv'];
    if(!empty($codeSrv)){
        ExecuteNonQuery($cnx,"delete from Services where codeSrv = '$codeSrv';");
        header("Location:Cslt_Services.php");
    }
}
?>