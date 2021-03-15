<?php 
include_once("../MyLibrery/connection.php");
    if(isset($_GET['codeUnit']) && isset($_GET['codeEntrFk']))
    {
        $codeU=$_GET['codeUnit'];  
        $codeE=$_GET['codeEntrFk'];      
        if(!empty('codeUnit'))
        {
            ExecuteNonQuery($cnx,"delete from Unites where codeUnit='$codeU' and codeEntrFk='$codeE';");
            header("location:GestionUnites.php");
       }
   }
?>