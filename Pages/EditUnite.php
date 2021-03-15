<?php 
include("../MyLibrery/connection.php");
include("../MyLibrery/head_istocks.php");

$codeU="";
$codeE="";
$nomU="";
$typeU="";

if(isset($_GET['codeUnit']))
{
   $codeU=$_GET['codeUnit'];
   if(!empty($codeU))
   {
     $dr_Update=ExecuteReader($cnx,"select * from Unites where codeUnit='$codeU'");
     $data=$dr_Update->fetchAll();
     $codeU=$data[0]['codeUnit'];
     $codeE=$data[0]['codeEntrFk'];
     $nomU=$data[0]['nomUnit'];
     $typeU=$data[0]['typeUnit'];
   }
}
if(isset($_GET) && count($_GET)>0)
{
    if(isset($_GET['codeUnit']))
    {
        $codeU=$_GET['codeUnit'];
    }
    if(isset($_GET['codeEntrFk']))
    {
        $codeE=$_GET['codeEntrFk'];
    }
    if(isset($_GET['nomUnit']))
    {
        $nomU=$_GET['nomUnit'];
    }
    if(isset($_GET['typeUnit']))
    {
        $typeU=$_GET['typeUnit'];
    }
    if(!empty($_GET['btn-Update']))
    { 
        if($_GET['btn-Update']=="Enregister")
        {
          ExecuteNonQuery($cnx,"update Unites set nomUnit='$nomU',codeEntrFk='$codeE',typeUnit='$typeU' where codeUnit='$codeU'");
          header("location:GestionUnites.php");
       
        } 
   }
  if(!empty($_GET['btn-Cancel'])){
    if($_GET['btn-Cancel']=="Annuler")
    {
        header("location:GestionUnites.php");
    }
  }
}
?>
<br>
<br>
<br>
<br>
<br><br>
<link rel="stylesheet" href="../Css/StyleAddUnite.css">
<div class="main">
 <form action="EditUnite.php" method="get">
   <h1>Modifier Unite</h1>
    <div id="">
      <label class="code">Code Unite :</label> <input class="codeU" name="codeUnit" type="text" id="txt" value="<?php echo($codeU); ?>" readonly="true"><br>
      <label class="code">Code Entreprise :</label> <input class="option1" name="codeEntrFk" type="text" value="<?php echo($codeE); ?>" readonly="true" id="txt"><br>
      <label class="code">Nom Unite :</label> <input class="txtN" name="nomUnit" type="text" id="nomU" value="<?php echo($nomU); ?>"><br>
      <label class="code">Type Unite :</label> <input class="txtT" name="typeUnit" type="text" id="typeU" value="<?php echo($typeU); ?>"><br>
      <input type="submit" name="btn-Update" class="button" value="Enregister">
      <input type="submit" name="btn-Cancel" class="button" value="Annuler">
    </div>
 </form>
</div>
