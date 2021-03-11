<?php
include_once("../myLibrery/connecter.php");

if(isset($_GET['codeRang']) && isset($_GET['codeMagFk']) && isset($_GET['codeEntrFk']))
{
    $codeRang=$_GET['codeRang'];
    $codeMagFk=$_GET['codeMagFk'];
    $codeEntrFk=$_GET['codeEntrFk'];
    if(!empty($codeRang)){
        ExecuteNonQuery($cnx,"delete from Rangs where codeRang = '$codeRang' and codeMagFk = '$codeMagFk' and codeEntrFk = '$codeEntrFk';");
        header("Location:GestionRangConsultation.php");
    }
}
?>