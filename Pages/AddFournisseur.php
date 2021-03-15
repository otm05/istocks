<?php 
include("../MyLibrery/connection.php");
include("../MyLibrery/head_istocks.php");

$codeF="";
$codeE="";
$nomF="";
$raisF="";
$descr="";
$sectF="";
$catF="";
$adresF="";
$villeF="";
$codeP="";
$paysF="";
$emailF="";
$fixeF="";
$faxF="";
$sitW="";
$fullN="";
$gsmF="";
$logoF="";

if(isset($_POST)&& count($_POST)>0)
{
    if(isset($_POST['codeFour']))
    {
        $codeF=$_POST['codeFour'];
    }
    if(isset($_POST['codeEntrFk']))
    {
        $codeE=$_POST['codeEntrFk'];
    }
    if(isset($_POST['nomFour']))
    {
        $nomF=$_POST['nomFour'];
    }
    if(isset($_POST['codeFour']))
    {
        $nomF=$_POST['codeFour'];
    }
    if(isset($_POST['raisFou']))
    {
        $raisF=$_POST['raisFou'];
    }
    if(isset($_POST['description']))
    {
        $descr=$_POST['description'];
    }
    if(isset($_POST['secteurF']))
    {
        $sectF=$_POST['secteurF'];
    }
    if(isset($_POST['categorieF']))
    {
        $catF=$_POST['categorieF'];
    }
    if(isset($_POST['adresseF']))
    {
        $adresF=$_POST['adresseF'];
    }
    if(isset($_POST['villeFou']))
    {
        $villeF=$_POST['villeFou'];
    }
    if(isset($_POST['codePFou']))
    {
        $codeP=$_POST['codePFou'];
    }
    if(isset($_POST['paysFou']))
    {
        $paysF=$_POST['paysFou'];
    }
    if(isset($_POST['emailFou']))
    {
        $emailF=$_POST['emailFou'];
    }
    if(isset($_POST['fixeFou']))
    {
        $fixeF=$_POST['fixeFou'];
    }
    if(isset($_POST['faxeFou']))
    {
        $faxF=$_POST['faxeFou'];
    }
    if(isset($_POST['siteWebF']))
    {
        $sitW=$_POST['siteWebF'];
    }
    if(isset($_POST['fullNFou']))
    {
        $fullN=$_POST['fullNFou'];
    }
    if(isset($_POST['gsmFou']))
    {
        $gsmF=$_POST['gsmFou'];
    }
    if(isset($_POST['logoFou']))
    {
        $logoF=$_POST['logoFou'];
    }

    if($_POST["submit-Add"]=="Ajouter")
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $f=$_FILES["logoFou"];
            $PathImg=$f["tmp_name"];
            if(isset($f["tmp_name"]))
            {
                $NameFile="".$codeF."_istoks.jpg";
                $pathFile="../imgSource/$NameFile";
                $logoDep=$pathFile;
                move_uploaded_file($f["tmp_name"],"../imgSource/$NameFile");
            }
        }
        ExecuteNonQuery($cnx,"insert into Fournisseurs values ('$codeF','$codeE','$nomF','$raisF','$descr','$sectF',$catF,'$adresF','$villeF','$codeP','$paysF','$emailF','$fixeF','$faxF','$sitW','$fullN','$gsmF','$logoF')");
        header("location:GestionFournisseurs.php");
    }
    if($_POST["submit-Cancel"]=="Annuler")
    {
        header("location:GestionFournisseurs.php");
    }
}
$dr=ExecuteReader($cnx,"select codeEntr from Entreprises;");
?>
<br>
<br>
<br>
<br><br>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../JQ/dist/jquery.validate.min.js"></script>
<script>
$(function() {
    //Validateur d'Ajout : 
    $("#button").on("click",function(){
        $("#frmAddF").validate({
            rules: {
                codeFour:{required:true},
                codeEntrFk:{required:true},
                nomFour:{required:true},
                emailFou:{email:true},
                fixeFou:{number:true},
                faxeFou:{number:true},
                logoFou:{required:true}
            },
            messages: {
                codeFour: {required:'Code Fournisseur est Obligatoire!'},
                codeEntrFk: {required:'Code Entreprise est Obligatoire!'},
                nomFour: {required:'Nom Fournisseur est Obligatoire!'},
                emailFou: {email:'ecrire ce forme d un Email EX:aze..@gmail.com'},
                fixeFou: {number:'C est juste les chiffres!'},
                faxeFou: {number:'C est juste les chiffres!'},
                logoFou: {required:'Logo Fournnisseur est Obligatoire!'}
            },
        })
    });
});

</script>

<style>
  .error{
      color: red;
      font-size: 15px;
    }
</style>

<br>

<link rel="stylesheet" href="../Css/styleAddFou.css">
<div class="main">
    <form action="" method="post" id="frmAddF">
      <h1>Ajouter Fournisseurs</h1>
      <div id="name">
         <div class="pk">
           <label class="code">Code Fournisseurs :&ensp;</label><input class="codeF" type="text" name="codeFour" >&ensp;
           <label class="code" id="ce">Code Entreprise :&ensp;</label>
           <select class="option1" name="codeEntrFk">
              <option value="">--code entreprise--</option>
                <?php while($imane=$dr->fetch()){ ?>
                 <option value='<?php echo($imane['codeEntr']); ?>'><?php echo($imane['codeEntr']); ?></option>
                   <?php }$dr->closeCursor();?>
           </select>
         </div>
           <label class="code">Nom Fournisseurs :</label><input class="nomF" type="text" name="nomFour" ><br>
           <label class="code">Raisau Social :</label><input class="raisonS" type="text" name="raisFou" ><br>
           <label class="code">Description :</label><input class="descr" type="text" name="description" ><br>
           <label class="code">Secteur :</label><input class="sect" type="text" name="secteurF" ><br>
           <label class="code">Categories :</label><input class="categ" type="number" name="categorieF"  min="1" max="5"><br>
           <label class="code">Adresse :</label><input class="adress" type="text" name="adresseF"><br>
           <label class="code">ville :</label><input class="ville" type="text" name="villeFou" ><br>
           <label class="code">Code Postale :</label><input class="codePos" type="text" name="codePFou" ><br>
           <label class="code">Pays :</label><input class="paysF" type="text" name="paysFou" ><br>
           <label class="code">Email :</label><input class="emailF" type="text" name="emailFou"><br>
           <label class="code">Fixe :</label><input class="fixeF" type="text" name="fixeFou" ><br>
           <label class="code">Faxe :</label><input class="fax" type="text" name="faxeFou" ><br>
           <label class="code">Site Web :</label><input class="siteW" type="text" name="siteWebF" ><br>
           <label class="code">FullNameContact :</label><input class="fulln" type="text" name="fullNFou"><br>
           <label class="code">GSMContact :</label><input class="gsm" type="text" name="gsmFou" ><br>
           <label class="code">LogoFour :</label><input type="file" name="logoFou" onchange="readLogo(this);"> 
           <img id="maPic"><br>
                                                                                       
           <input type="submit" name="submit-Add" id="button" value="Ajouter">
           <input type="submit" name="submit-Cancel" id="button" value="Annuler">
           <input type="reset" name="submit-Cancel" id="button" value="Vider">
      </div>
    </form>
</div>
</body>
<script>
 function readLogo(x)
 {
     let dr=new FileReader();
     dr.onload=function(e){
         let img= document.querySelector("#maPic");
         img.src=e.target.result;
     }
     dr.readAsDataURL(x.files[0]);
 }
</script>
</html>

