<?php
include_once("../myLibrery/connecter.php");

if(isset($_GET['codeFml']) && isset($_GET['codeEntrFk']))
{
    $codeFml=$_GET['codeFml'];
    $codeEntrFk=$_GET['codeEntrFk'];
    if(!empty($codeFml)){
        ExecuteNonQuery($cnx,"delete from Familles where codeFml = '$codeFml' and codeEntrFk = '$codeEntrFk';");
        header("Location:GestionFamilleConsultation.php");
    }
}
?>