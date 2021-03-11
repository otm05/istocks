<?php 
include_once("../MyLibrery/connection.php");
    if(isset($_GET['codeCat']) && isset($_GET['codeEntrFk']))
    {
        $codeC=$_GET['codeCat'];     
        $codeE=$_GET['codeEntrFk'];   
        if(!empty('codeCat'))
        {
            ExecuteNonQuery($cnx,"delete from Categories where codeCat='$codeC' and codeEntrFk='$codeE';");
            header("location:GestionCategories.php");
       }
   }
?>