<?php 
include("../MyLibrery/connection.php");
if(isset($_GET['numCasier']) && isset($_GET['codeEntrFk']))
    {
        $codeCas=$_GET['numCasier'];     
        $codeE=$_GET['codeEntrFk'];   
        if(!empty('numCasier'))
        {
            ExecuteNonQuery($cnx,"delete from Casiers where numCasier='$codeCas' and codeEntrFk='$codeE';");
            header("location:GestionCasiers.php");
       }
   }
?>