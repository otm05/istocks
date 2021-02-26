<!-- on va appeler le header -->
<?php
include("head_istocks.php");
include_once("connection.php");
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
<br><br><br><br><br>
<style>
.nav-links a:hover{
    background-color: #D03939 ;
    color: rgb(32, 31, 31);
}
input[type=submit]:hover{
background-color:#D03939;
}
label{
color: #9E2D2D;
}
body{
background-color: #FCADAD;
}
.entr{
background-color: #D03939;
}

</style>
<!-- commencer le Nv code HTML -->
<br>
<form action="gestion_departement.php" method="get" id="frm1">
    <fieldset>
        <legend class="entr">Departements</legend><br><br><br>
        <div class="Global">
        
        <!--div col1-->
        <div class="col1" >
        <label>Code Departements : </label>
        <input type='text' name='codeDep' placeholder="entrer code departement"><br><br>
        <label>Code Entreprise : </label>
        <input type='text' name='CodeEntrFK' placeholder="entrer code d'Entreprise"><br><br>
        <label>Code Pole : </label>
        <input type='text' name='CodePLFK' placeholder="entrer code Pole"><br><br>
        <label>Nom Departement:</label>
        <input type='text' name ='NomDep' placeholder="entrer le Nom"><br><br>
        <label>Description :</label>
        <input type='text' name='_description' placeholder="entrer une description"><br><br>
        <label>Secteur Departement :</label>
        <input type= 'text' name='secteurPL' placeholder="entrer un secteur "><br><br>
        <label>Adresse  : </label>
        <input type= 'text' name='adresse' placeholder="entrer adresse "><br><br>
        <label>Ville :</label>
        <input type= 'text' name='ville' placeholder="entrer ville"><br><br>
        <label>Code postal :</label>
        <input type= 'text' name='codePostal' placeholder="entrer un codePostal "><br><br>
        <label>Pays :</label>
        <input type= 'text' name='pays' placeholder="entrer Pays "><br><br>
        </div>

        <!--div col2-->
        <div class="col2">
        <label>Email :</label>
        <input type= 'text' name='email' placeholder="entrer un Email "><br><br>
        <label>Fixe :</label>
        <input type= 'text' name='fixe' placeholder="entrer le fix "><br><br>
        <label>Fax :</label>
        <input type= 'text' name='fax' placeholder="entrer fax "><br><br>
        <label>Site Web :</label>
        <input type= 'text' name='siteWeb' placeholder="entrer siteWeb "><br><br> 
        <label>Full Name Contact :</label>
        <input type= 'text' name='fullnameContact' placeholder="entrer full name"><br><br>
        <label>GSM Contact :</label>
        <input type= 'text' name='gsmcontact' placeholder="entrer un GSM "><br><br>
        <label>Logo d'entreprises :</label>
        <input type= 'text' name='logoDep' placeholder="entrer un logo "><br><br>
        <label>Code collabo :</label>
        <input type= 'text' name='codeCDFK1' placeholder="entrer un collabo "><br><br>
        <label>Code collabo2 :</label>
        <input type= 'text' name='codeDCDFK2' placeholder="entrer un collabo2 "><br><br>
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