<?php
include_once("../MyLibrery/connection.php");
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

if(isset($_GET['codeFour']))
{
    $codeF=$_GET['codeFour'];
    if(!empty($codeF))
    {//like BD !!
        $dr_update=ExecuteReader($cnx,"select * from Fournisseurs where codeFour='$codeF'");
        $data=$dr_update->fetchAll();
        $codeF=$data[0]['codeFour'];
        $codeE=$data[0]['codeEntrFk'];
        $nomF=$data[0]['nomFour'];
        $raisF=$data[0]['raisonSocialFour'];
        $descr=$data[0]['description'];
        $sectF=$data[0]['secteur'];
        $catF=$data[0]['categorie'];
        $adresF=$data[0]['adresse'];
        $villeF=$data[0]['ville'];
        $codeP=$data[0]['codePostale'];
        $paysF=$data[0]['pays'];
        $emailF=$data[0]['email'];
        $fixeF=$data[0]['fixe'];
        $faxF=$data[0]['fax'];
        $sitW=$data[0]['siteWeb'];
        $fullN=$data[0]['fullNameContact'];
        $gsmF=$data[0]['gsmContact'];
        $logoF=$data[0]['logoFour'];
    }
}

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

    if(!empty($_POST['submit_update']))
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
        if($_POST['submit_update']=="Enregistrer")
        {
            ExecuteNonQuery($cnx,"update Fournisseurs set codeEntrFk='$codeE',nomFour='$nomF',raisonSocialFour='$raisF',description='$descr',secteur='$sectF',categorie=$catF,adresse='$adresF',ville='$villeF',codePostale='$codeP',pays='$paysF',email='$emailF',fixe='$fixeF',fax='$faxF',siteWeb='$sitW',fullNameContact='$fullN',gsmContact='$gsmF',logoFour='$logoF' where codeFour='$codeF'");
            header("location:GestionFournisseurs.php");
        }
    }
    if(!empty($_POST['submit-Cancel']))
    {
        if($_POST['submit-Cancel'])
        {
            header("location:GestionFournisseurs.php");
        }
    }
}
?>
<br>
<br>
<br>
<br>
<br><br>

<link rel="stylesheet" href="../Css/styleAddFou.css">
<div class="main">
    <form action="EditFournisseur.php" method="post" id="frmAddF">
      <h1>Modifier Fournisseurs</h1>
      <div id="name">
         <div class="pk">
           <label class="code">Code Fournisseurs :&ensp;</label><input class="codeF" type="text" name="codeFour" id="txt" value="<?php echo($codeF); ?>" readonly="true">&ensp;
           <label class="code" id="ce">Code Entreprise :&ensp;</label><input type="text" name="codeEntrFk" id="" value="<?php echo($codeE); ?>" readonly="true">
         </div>
           <label class="code">Nom Fournisseurs :</label><input class="nomF" type="text" name="nomFour" id="txt" value="<?php echo($nomF); ?>"><br>
           <label class="code">Raisau Social :</label><input class="raisonS" type="text" name="raisFou" id="txt" value="<?php echo($raisF); ?>"><br>
           <label class="code">Description :</label><input class="descr" type="text" name="description" id="txt" value="<?php echo($descr); ?>"><br>
           <label class="code">Secteur :</label><input class="sect" type="text" name="secteurF" id="txt" value="<?php echo($sectF); ?>"><br>
           <label class="code">Categories :</label><input class="categ" type="number" name="categorieF" id="txt" min="1" max="5" value="<?php echo($catF); ?>"><br>
           <label class="code">Adresse :</label><input class="adress" type="text" name="adresseF" id="txt" value="<?php echo($adresF); ?>"><br>
           <label class="code">ville :</label><input class="ville" type="text" name="villeFou" id="txt" value="<?php echo($villeF); ?>"><br>
           <label class="code">Code Postale :</label><input class="codePos" type="text" name="codePFou" id="txt" value="<?php echo($codeP); ?>"><br>
           <label class="code">Pays :</label><input class="paysF" type="text" name="paysFou" id="txt" value="<?php echo($paysF); ?>"><br>
           <label class="code">Email :</label><input class="emailF" type="text" name="emailFou" id="txt" value="<?php echo($emailF); ?>"><br>
           <label class="code">Fixe :</label><input class="fixeF" type="text" name="fixeFou" id="txt" value="<?php echo($fixeF); ?>"><br>
           <label class="code">Faxe :</label><input class="fax" type="text" name="faxeFou" id="txt" value="<?php echo($faxF); ?>"><br>
           <label class="code">Site Web :</label><input class="siteW" type="text" name="siteWebF" id="txt" value="<?php echo($sitW); ?>"><br>
           <label class="code">FullNameContact :</label><input class="fulln" type="text" name="fullNFou" id="txt" value="<?php echo($fullN); ?>"><br>
           <label class="code">GSMContact :</label><input class="gsm" type="text" name="gsmFou" id="txt" value="<?php echo($gsmF); ?>"><br>
           <label class="code">LogoFour :</label><input type="file" name="logoFou" onchange="readLogo(this);"  value="<?php echo($logoF); ?>"> <img id="maPic" src="<?php echo($logoF); ?>">
           <!-- <input class="logo" type="text" name="logoFou" id="txt" value="<?php echo($logoF); ?>"><br> -->
           <input type="submit" name="submit_update" id="button" value="Enregistrer">
           <input type="submit" name="submit-Cancel" id="button" value="Annuler">
           <!-- <input type="reset" name="submit-Clear" id="button" value="Vider"> -->
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
