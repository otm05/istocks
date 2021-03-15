<?php 
include_once("../MyLibrery/connection.php");
    if(isset($_GET['codeFour']) && isset($_GET['codeEntrFk']))
    {
        $codeF=$_GET['codeFour']; 
        $codeE=$_GET['codeEntrFk'];       
        if(!empty('codeFour'))
        {
            ExecuteNonQuery($cnx,"delete from Fournisseurs where codeFour='$codeF' and codeEntrFk='$codeE';");
            header("location:GestionFournisseurs.php");
       }
   }
?>