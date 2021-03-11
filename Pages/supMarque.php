<?php
include_once("../myLibrery/connecter.php");

if(isset($_GET['codeMrq']) && isset($_GET['codeEntrFk']))
{
    $codeMrq=$_GET['codeMrq'];
    $codeEntrFk=$_GET['codeEntrFk'];
    if(!empty($codeMrq)){
        ExecuteNonQuery($cnx,"delete from Marques where codeMrq = '$codeMrq'and codeEntrFk = '$codeEntrFk';");
        header("Location:GestionMarquesConsultation.php");
    }
}
?>