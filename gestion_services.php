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
    background-color: rgb(91, 173, 187);
    color: rgb(32, 31, 31);
}
</style>
<!-- commencer le Nv code HTML -->
<br>
<form action="gestion_services.php" method="get" id="frm1">
    <fieldset>
        <legend class="entr">Services</legend><br><br><br>
        <div class="Global">
        
        <!--div col1-->
        <div class="col1" >
        <label>Code Service : </label>
        <input type='text' name='codeSrv' placeholder="entrer code Service"><br><br>
        <label>Code Entreprise :</label>
        <input type= 'text' name='CodeEntrFK' placeholder="entrer code Entreprise "><br><br>
        <label>Code Departement :</label>
        <input type= 'text' name='CodeDepFK' placeholder="entrer code Departement "><br><br>
        <label>Nom Service :</label>
        <input type= 'text' name='NomSrv' placeholder="entrer Nom Service "><br><br>
        <label>Description :</label>
        <input type= 'text' name='_description' placeholder="entrer Description "><br><br>
        </div>

        <!--div col2-->
        <div class="col2">
        <label>Fix :</label>
        <input type= 'text' name='fix' placeholder="entrer Fix "><br><br>
        <label>Fax :</label>
        <input type= 'text' name='fax' placeholder="entrer fax "><br><br>
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