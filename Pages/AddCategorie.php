<?php 
include("../MyLibrery/connection.php");
include("../MyLibrery/head_istocks.php");
$codeC="";
$codeE="";
$codeFa="";
$nomC="";
$descriptionC= "";

if(isset($_GET)&& count($_GET)>0){

    if(isset($_GET['codeCat']))
    {
        $codeC=$_GET['codeCat'];
    }
    if(isset($_GET['codeEntrFk']))
    {
        $codeE=$_GET['codeEntrFk'];
    }
    if(isset($_GET['codeFmlFK']))
    {
        $codeFa=$_GET['codeFmlFK'];
    }
    if(isset($_GET['nomCat']))
    {
        $nomC=$_GET['nomCat'];
    }
    if(isset($_GET['descriptionCat']))
    {
        $descriptionC=$_GET['descriptionCat'];
    }
    if($_GET["submit-Add"]=="Enregister")
    {
        ExecuteNonQuery($cnx,"insert into Categories values ('$codeC','$codeE','$codeFa','$nomC','$descriptionC')");
        header("location:GestionCategories.php");
    }
    if(isset($_GET["submit-Cancel"])=="Annuler")
    {
        header("location:GestionCategories.php");
    }
}
$drE=ExecuteReader($cnx,"select codeEntr from Entreprises");
$drF=ExecuteReader($cnx,"select codeFml from Familles;");

?>
<br>
<br><br>
<br>
<br>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../JQ/dist/jquery.validate.min.js"></script>

<script>
 $(function() {
     //validateur d'ajout :
      $("#btnA").on("click",function(){
          $("#frmAdd").validate({
              rules: {
                codeCat:{required:true},
                codeEntrFk:{required:true},
                codeFmlFK:{required:true},
                nomCat:{required:true}
              },
              messages: {
                codeCat: {required:'Code Categorie est Obligatoire!'},
                codeEntrFk: {required:'Code Entreprise est Obligatoire!'},
                codeFmlFK: {required:'Code Famille est Obligatoire!'},
                nomCat: {required:'Nom Categories est Obligatoire!'}
              },
          })
      });
 });
</script>

<style>
  .error{
      font-family:  "Brush Script MT", cursive;
      color: red;
      font-size: 15px;
  }
</style>

<br>
<link rel="stylesheet" href="../Css/styleAddCat.css">
<div class="main">
   <form action="" method="get" id="frmAdd">
        <h1> Ajouter Categorie </h1>
 <div id="name"> 
        <label class="code">Code Categorie  : </label><input class="codeC" type="text" name="codeCat" ><br>
        <label class="code">Code Entreprise : </label>
        <select class="option1" name="codeEntrFk" >
             <option value=''>--Code entreprises--</option>
             <?php while($imane=$drE->fetch()){ ?>
                <option value='<?php echo($imane['codeEntr']); ?>'><?php echo($imane['codeEntr']); ?></option>
             <?php }$drE->closeCursor();?>
        </select>
        <br>
        <label class="code">Code Familles : </label>
        <select class="option2" name="codeFmlFK">
          <option value=''>--code Familles</option>
          <?php while($imane=$drF->fetch()){ ?>
             <option value='<?php echo($imane['codeFml']); ?>'><?php echo($imane['codeFml']); ?></option>
             <?php }$drF->closeCursor();?>      
        </select><br>
        <label class="code">Nom Categorie :</label><input type="text" name="nomCat" class="txtn"><br>
        <label class="code">Description   : </label><input type="text" name="descriptionCat" class="txtD"><br>
        <input type="submit" name="submit-Add" value="Enregister" class="button" id="btnA">
        <input type="submit" name="submit-Cancel" value="Annuler" class="button" id="btnS">
        <input type="reset" name="submit-Clear" value="Vider" class="button" id="btnS">
    </div> 
 </form>
</div>
</body>
</html>
