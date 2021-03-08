<?php
include_once("connection.php");
if(isset($_GET['codeDep']))
{
    $codeDep=$_GET['codeDep'];
    if(!empty($codeDep)){
        ExecuteNonQuery($cnx,"delete from Departements where codeDep = '$codeDep';");
        header("Location:Cslt_dep.php");
    }
}
?>