<?php
require_once("../MyLibrery/connection.php");

if(isset($_GET['codeDep']))
{
    $codeDep=$_GET['codeDep'];
    $dr_Sup=ExecuteReader($cnx,"select * from Departements where codeDep='$codeDep'");

    $data=$dr_Sup->fetchAll();
    $logoDep=$data[0]['logoDep'];
    $pathSupprimer=$logoDep;
    
    if(!empty($codeDep)){
            
        unlink($pathSupprimer);
        ExecuteNonQuery($cnx,"delete from Departements where codeDep = '$codeDep';");
        header("Location:Cslt_dep.php");
    }
}
?>