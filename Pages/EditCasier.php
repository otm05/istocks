<?php
include_once("../MyLibrery/connection.php");
include("../MyLibrery/head_istocks.php");

$numCs="";
$codeE="";
$codeR="";
$forme="";
$descr="";

if(isset($_GET['numCasier']))
{
    $numCs=$_GET['numCasier'];
    if(!empty($numCs))
    {
        $dr_update=ExecuteReader($cnx,"select * from Casiers where numCasier='$numCs'");
        $data=$dr_update->fetchAll();
        $numCs=$data[0]['numCasier'];
        $codeE=$data[0]['codeEntrFk'];
        $codeR=$data[0]['codeRangFk'];
        $forme=$data[0]['forme'];
        $descr=$data[0]['description'];
    }
}

if(isset($_GET) && count($_GET)>0)
{
    if(isset($_GET['numCasier']))
    {
        $numCs=$_GET['numCasier'];
    }
    if(isset($_GET['codeEntrFk']))
    {
        $codeE=$_GET['codeEntrFk'];
    }
    if(isset($_GET['codeRangFk']))
    {
        $codeR=$_GET['codeRangFk'];
    }
    if(isset($_GET['forme']))
    {
        $forme=$_GET['forme'];
    }
    if(isset($_GET['description']))
    {
        $descr=$_GET['description'];
    }
    if(!empty($_GET['submit_Update']))
    {
        if($_GET['submit_Update']=="Enregistrer")
        {
            ExecuteNonQuery($cnx,"update Casiers set codeEntrFk='$codeE',codeRangFk='$codeR',forme='$forme',description='$descr' where numCasier='$numCs'");
            header("location:GestionCasiers.php");
        }
    }   
    if(!empty($_GET['submit-Cancel']))
    {        
        if($_GET['submit-Cancel'])
        {
           header("location:GestionCasiers.php");
        }   
    }    
}
?>
<br>
<br>
<br>
<br>
<br><br>
<link rel="stylesheet" href="../Css/StyleAddCasier.css">
<div class="main">
   <form action="GestionCasiers.php" method="get" id="frmAdd">
        <h1> Update Casier </h1>
 <div id="name"> 
        <label class="code">Num Casier  : </label><input class="codeC" type="text" name="numCasier" id="txtC" value="<?php echo($numCs); ?>" readonly="true"><br>
        <label class="code">Code Entreprise : </label><input class="codeC" type="text" name="codeEntrFk" id="txtE" value="<?php echo($codeE); ?>" readonly="true">
        <br>
        <label class="code">Code Rang : </label><input type="text" class="codeC" name="codeRangFk" id="txtR" value="<?php echo($codeR); ?>" readonly="true">
        <br>
        <label class="code">Forme :</label><input type="text" name="forme" class="txtN" value="<?php echo($forme); ?>" ><br>
        <label class="code">Description   : </label><input type="text" name="description" class="txtD" value="<?php echo($descr); ?>" ><br>
        <input type="submit" name="submit_Update" value="Enregistrer" class="button" id="btnA">
        <input type="submit" name="submit-Cancel" value="Annuler" class="button" id="btnS">
        <!-- <input type="reset" name="submit-Clear" value="Vider" class="button" id="btnS"> -->
    </div> 
 </form>
</div>
</body>
</html>

