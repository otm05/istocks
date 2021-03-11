<?php
include("../MyLibrery/connection.php");
include("../MyLibrery/head_istocks.php");

$numCs="";
$codeE="";
$codeR="";
$forme="";
$descr="";


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
    if($_GET["submit-Add"]=="Enregister")
    {
        ExecuteNonQuery($cnx,"insert into Casiers values('$numCs','$codeE','$codeR','$forme','$descr')");
        header("location:GestionCasiers.php");
    }
    if(isset($_GET["submit-Cancel"])=="Annuler")
    {
        header("location:GestionCasiers.php");
    }
}
$drE=ExecuteReader($cnx,"select codeEntr from Entreprises");
$drR=ExecuteReader($cnx,"select codeRang from Rangs;");

?>
<br>
<br>
<br><br>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../JQ/dist/jquery.validate.min.js"></script>


<script>
 $(function() {
     //validateur d'ajout :
      $("#btnA").on("click",function(){
          $("#frmAdd").validate({
              rules: {
                numCasier:{required:true},
                codeEntrFk:{required:true},
                codeRangFk:{required:true},
              },
              messages: {
                numCasier: {required:'Numero Casier est Obligatoire!'},
                codeEntrFk: {required:'Code Entreprise est Obligatoire!'},
                codeRangFk: {required:'Code Rang est Obligatoire!'},
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

<link rel="stylesheet" href="../Css/StyleAddCasier.css">
<div class="main">
   <form action="" method="get" id="frmAdd">
        <h1> Ajouter Casier </h1>
 <div id="name"> 
        <label class="code">Num Casier  : </label><input class="codeC" type="text" name="numCasier" ><br>
        <label class="code">Code Entreprise : </label>
        <select class="option1" name="codeEntrFk"  >
             <option value=''>--Code entreprises--</option>
             <?php while($imane=$drE->fetch()){ ?>
                <option value='<?php echo($imane['codeEntr']); ?>'><?php echo($imane['codeEntr']); ?></option>
             <?php }$drE->closeCursor();?>
        </select>
        <br>
        <label class="code">Code Rang : </label>
        <select class="option2" name="codeRangFk" >
          <option value=''>--code Rangs--</option>
          <?php while($imane=$drR->fetch()){ ?>
             <option value='<?php echo($imane['codeRang']); ?>'><?php echo($imane['codeRang']); ?></option>
             <?php }$drR->closeCursor();?>      
        </select><br>
        <label class="code">Forme :</label><input type="text" name="forme" class="txtN"><br>
        <label class="code">Description   : </label><input type="text" name="description" class="txtD"><br>
        <input type="submit" name="submit-Add" value="Enregister" class="button" id="btnA">
        <input type="submit" name="submit-Cancel" value="Annuler" class="button" id="btnS">
        <input type="reset" name="submit-Clear" value="Vider" class="button" id="btnS">
    </div> 
 </form>
</div>
</body>
</html>
