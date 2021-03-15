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

if(isset($_GET)&& count($_GET)>0)
{
    if(isset($_GET['codeUnite']))
    {
        $codeU=$_GET['codeUnite'];
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
    if(!empty('submit-Add'))
    { 
        if($_GET['submit-Add']=="Enregister")
        {
          ExecuteNonQuery($cnx,"insert into Unites values('$codeU','$codeE','$nomU','$typeU')");
          header("location:GestionUnites.php");
       
        } 
   }
    if(isset($_GET["submit-Cancel"])=="Annuler")
    {
        header("location:GestionUnites.php");
    }
}
$drE=ExecuteReader($cnx,"select codeEntr from Entreprises;");

?>

<br>
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
                codeUnite:{required:true},
                codeEntrFk:{required:true},
                nomUnit:{required:true},
                typeUnit:{required:true}
              },
              messages: {
                codeUnite: {required:'Code Unite est Obligatoire!'},
                codeEntrFk: {required:'Code Entreprise est Obligatoire!'},
                nomUnit: {required:'Nom Unite est Obligatoire!'},
                typeUnit: {required:'Type Unite est Obligatoire!'}
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
<link rel="stylesheet" href="../Css/StyleAddUnite.css">
<div class="main">
 <form action="" method="get" id="frmAdd">
   <h1>Ajouter Unite</h1>
    <div id="">
      <label class="code">Code Unite :</label> <input class="txtC" name="codeUnite" type="text" ><br>
      <label class="code">Code Entreprises :</label> 
      <select class="option1" name="codeEntrFk">
       <option value="">--Code Entreprises--</option>
            <?php while($imane=$drE->fetch()){ ?>
                <option value='<?php echo($imane['codeEntr']); ?>'><?php echo($imane['codeEntr']); ?></option>
             <?php }$drE->closeCursor();?>
      </select><br> 
      <label class="code">Nom Unite :</label> <input class="txtN" name="nomUnit" type="text" ><br>
      <label class="code">Type Unite :</label> <input class="txtT" name="typeUnit" type="text" ><br>
      <input type="submit" name="submit-Add" id="btnA" value="Enregister", class="button">
      <input type="submit" name="submit-Cancel" id="btnC" value="Annuler" class="button">
      <input type="reset" name="submit-Clear" id="btn" value="Vider" class="button">
    </div>
 </form>
</div>
