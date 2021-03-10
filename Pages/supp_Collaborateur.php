<?php
require_once("../MyLibrery/connection.php");
if(isset($_GET['matricule']))
{
    $matricule=$_GET['matricule'];
    if(!empty($matricule)){
        ExecuteNonQuery($cnx,"delete from Collaborateurs where matricule = '$matricule';");
        header("Location:Cslt_Collabo.php");
    }
}
?>