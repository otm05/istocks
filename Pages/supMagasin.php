<?php
include_once("../myLibrery/connecter.php");

if(isset($_GET['codeMag'])&& isset($_GET['codeEntrFk']))
{
    $codeMag=$_GET['codeMag'];
    $codeEntrFk=$_GET['codeEntrFk'];
    if(!empty($codeMag)){
        ExecuteNonQuery($cnx,"delete from Magasins where codeMag = '$codeMag' and codeEntrFk = '$codeEntrFk';");
        header("Location:GestionMagasinsConsultation.php");
    }
}
?>