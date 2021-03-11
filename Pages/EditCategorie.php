<?php 
include("../MyLibrery/connection.php");
include("../MyLibrery/head_istocks.php");

$codeC="";
$codeE="";
$codeFa="";
$nomC="";
$descriptionC= "";
if(isset($_GET['codeCat']))
{
   $codeC=$_GET['codeCat'];
   if(!empty($codeC))
   {
     $dr_Update=ExecuteReader($cnx,"select * from Categories where codeCat='$codeC'");
     $data=$dr_Update->fetchAll();
     $codeC=$data[0]['codeCat'];
     $codeE=$data[0]['codeEntrFk'];
     $codeFa=$data[0]['codeFmlFk'];
     $nomC=$data[0]['nomCat'];
     $descriptionC=$data[0]['description'];
   }
}
if(isset($_GET) && count($_GET)>0)
{
    if(isset($_GET['codeCat']))
    {
        $codeC=$_GET['codeCat'];
    }
    if(isset($_GET['codeEntrFk']))
    {
        $codeE=$_GET['codeEntrFk'];
    }
    if(isset($_GET['codeFmlFk']))
    {
        $codeFa=$_GET['codeFmlFk'];
    }
    if(isset($_GET['nomCat']))
    {
        $nomC=$_GET['nomCat'];
    }
    if(isset($_GET['description']))
    {
        $descriptionC=$_GET['description'];
    }
    if(!empty($_GET['btn-Update']))
    { 
        if($_GET['btn-Update']=="Enregistrer")
        {
           ExecuteNonQuery($cnx,"update Categories set codeEntrFk='$codeE',codeFmlFk='$codeFa',nomCat='$nomC',description='$descriptionC' where codeCat='$codeC'"); 
        // ExecuteNonQuery($cnx,"update Categories set codeEntrFk='$codeE',codeFmlFk='$codeFa',nomCat='$nomC',description='$descriptionC' where codeCat='$codeC'");
        header("location:GestionCategories.php");
        } 
    }    
    if(isset($_GET["btn-Cancel"])=="Annuler")
    {
        header("location:GestionCategories.php");
    }
}
?>
<br>
<br>
<br>
<br><br>

<link rel="stylesheet" href="../Css/styleAddCat.css">
<div class="main">
   <form action="GestionCategories.php" method="get" id="frm1">
        <h1> Gestion Categories </h1>
 <div id="name"> 
        <label class="code">Code Categorie  : </label><input class="codeC" type="text" name="codeCat" value="<?php echo($codeC); ?>" id="txt1" readonly="true"><br>
        <label class="code">Code Entreprise :</label><input type="text" class="option1" name="codeEntrFk"  value="<?php echo($codeE); ?>" id="txt" readonly="true"><br>
        <label class="code">Code Famille :</label><input type="text" name="codeFmlFk" class="option2"  value="<?php echo($codeFa); ?>" id="txt3"><br>
        <label class="code">Nom Categorie :</label><input type="text" name="nomCat" class="txtn" value="<?php echo($nomC); ?>"><br>
        <label class="code">Description   : </label><input type="text" name="description" class="txtD" value="<?php echo($descriptionC); ?>"><br>
        <input type="submit" name="btn-Update" value="Enregistrer" class="button" id="btnA">
        <input type="submit" name="btn-Cancel" value="Annuler" class="button" id="btnS">
        <!-- <input type="reset" name="btn-Clear" value="Vider" class="button" id="btnS"> -->
        </div> 
 </form>
</div>
</body>
</html>