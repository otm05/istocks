<?php
include_once("../MyLibrery/connection.php");
if(isset($_GET['CodeEntr']))
{
    $CodeEntr=$_GET['CodeEntr'];
    if(!empty($CodeEntr)){
        ExecuteNonQuery($cnx,"delete from Entreprises where CodeEntr = '$CodeEntr';");
        header("Location:Cslt_Entreprises.php");
    }
}
?>