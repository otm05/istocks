<!-- on va appeler le header -->
<?php
require_once("../MyLibrery/connection.php");
$CodeEntr="";
$nomentr="";
$_description="";
$SecteurEntre="";
$adresse="";
$ville="";
$codePostal="";
$pays="";
$email="";
$fixe="";
$fax="";
$siteWeb="";
$fullnameContact="";
$gsmcontact="";
$logoEntre="";
$codeDGFK1="";
$codeDGFK2="";
$EtatEntre="";
if(isset($_GET))
{
    if(isset($_GET['CodeEntr']))
    {
        $CodeEntr=$_GET['CodeEntr'];
    }
    if(isset($_GET['nomentr']))
    {
        $nomentr=$_GET['nomentr'];
    }
    if(isset($_GET['_description']))
    {
        $_description=$_GET['_description'];
    }
    if(isset($_GET['SecteurEntre']))
    {
        $SecteurEntre=$_GET['SecteurEntre'];
    }
    if(isset($_GET['adresse']))
    {
        $adresse=$_GET['adresse'];
    }
    if(isset($_GET['ville']))
    {
        $ville=$_GET['ville'];
    }
    if(isset($_GET['codePostal']))
    {
        $codePostal=$_GET['codePostal'];
    }
    if(isset($_GET['pays']))
    {
        $pays=$_GET['pays'];
    }
    if(isset($_GET['email']))
    {
        $email=$_GET['email'];
    }
    if(isset($_GET['fixe']))
    {
        $fixe=$_GET['fixe'];
    }
    if(isset($_GET['fax']))
    {
        $fax=$_GET['fax'];
    }
    if(isset($_GET['siteWeb']))
    {
        $siteWeb=$_GET['siteWeb'];
    }
    if(isset($_GET['fullnameContact']))
    {
        $fullnameContact=$_GET['fullnameContact'];
    }
    if(isset($_GET['gsmcontact']))
    {
        $gsmcontact=$_GET['gsmcontact'];
    }
    if(isset($_GET['logoEntre']))
    {
        $logoEntre=$_GET['logoEntre'];
    }
    if(isset($_GET['codeDGFK1']))
    {
        $codeDGFK1=$_GET['codeDGFK1'];
    }
    if(isset($_GET['codeDGFK2']))
    {
        $codeDGFK2=$_GET['codeDGFK2'];
    }
    if(isset($_GET['CodeEntr']))
    {
        $CodeEntr=$_GET['CodeEntr'];
    }
}
?>
<meta charset="UTF-8">
<link rel = "icon" href="../img/logo_title1.png" type ="image/x-icon">
<link rel="stylesheet" href="../css/style_Gestion.css">
<link rel="stylesheet" href="../css/style1.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../JQ/dist/jquery.validate.min.js"></script>

<br><br><br><br><br>
<style>
.nav-links a:hover{
    background-color: #FFA137 ;
    color: rgb(32, 31, 31);
}
input[type=submit]:hover{
background-color:#FFA137;
}
label{
color: #CB812C;
}
body{
background-color: #FFD19E;
}
.entr{
background-color: #FFA137;
}

</style>
<!-- commencer le Nv code HTML -->
<br>
<form action="gestion_entreprise.php" method="get" id="frm1">
    <fieldset>
        <legend class="entr">Entreprises</legend><br><br><br>
        <div class="Global">
        
        <!--div col1-->
        <div class="col1" >
        <label>Code Entreprises : </label>
        <input type='text' name='CodeEntr' placeholder="entrer code of user"><br><br>
        <label>Nom d'entreprises:</label>
        <input type='text' name ='NomEntr' placeholder="entrer le Nom"><br><br>
        <label>Description :</label>
        <input type='text' name='_description' placeholder="entrer une description"><br><br>
        <label>Secteur Entreprises :</label>
        <input type= 'text' name='SecteurEntre' placeholder="entrer un secteur "><br><br>
        <label>Adresse  : </label>
        <input type= 'text' name='adresse' placeholder="entrer adresse "><br><br>
        <label>Ville :</label>
        <input type= 'text' name='ville' placeholder="entrer ville"><br><br>
        <label>Code postal :</label>
        <input type= 'text' name='codePostal' placeholder="entrer un codePostal "><br><br>
        <label>Pays :</label>
        <input type= 'text' name='pays' placeholder="entrer Pays "><br><br>
        <label>Email :</label>
        <input type= 'text' name='email' placeholder="entrer un Email "><br><br>
        </div>

        <!--div col2-->
        <div class="col2">
        <label>Fixe :</label>
        <input type= 'text' name='fixe' placeholder="entrer le fix "><br><br>
        <label>Fax :</label>
        <input type= 'text' name='fax' placeholder="entrer fax "><br><br>
        <label>Site Web :</label>
        <input type= 'text' name='siteWeb' placeholder="entrer site Web "><br><br> 
        <label>Full Name Contact :</label>
        <input type= 'text' name='fullnameContact' placeholder="entrer full name Contact"><br><br>
        <label>GSM Contact :</label>
        <input type= 'text' name='gsmcontact' placeholder="entrer un GSM "><br><br>
        <label>Logo d'entreprises :</label>
        <input type= 'text' name='logoEntre' placeholder="entrer un logo "><br><br>
        <label>Code DGFK1 :</label>
        <input type= 'text' name='codeDGFK1' placeholder="entrer un codeDGFK1 "><br><br>
        <label>Code DHFK2 :</label>
        <input type= 'text' name='codeDGFK2' placeholder="entrer un codeDGFK2 "><br><br>
        <label>Etat d'entreprises :</label>
        <input type= 'text' name='EtatEntre' placeholder="entrer un Etat"><br><br>
        </div>

        </div><br>
        <div class="div_butt">
        <input type="submit" name="add" value="Ajouter">
        <input type="submit" name="add" value="Supprimer">
        <input type="submit" name="add" value="Modifier">
        </div>
        <br>
        </fieldset>
        </form>
        </body>
        </html>