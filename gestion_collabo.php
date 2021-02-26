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
    background-color: #46A75C ;
    color: rgb(32, 31, 31);
}
input[type=submit]:hover{
background-color:#46A75C;
}
label{
color: #46A75C;
}
body{
background-color: #C8FFD4;
}
.entr{
background-color: #46A75C;
}

</style>
<!-- commencer le Nv code HTML -->
<br>
<form action="gestion_collabo.php" method="get" id="frm1">
    <fieldset>
        <legend class="entr">Collaborateurs</legend><br><br><br>
        <div class="Global">
        
        <!--div col1-->
        <div class="col1" >
        <label>Matricule : </label>
        <input type='text' name='matricule' placeholder="entrer Matriculation"><br><br>
        <label>Code d'entreprises:</label>
        <input type='text' name ='CodeEntrFK' placeholder="entrer l'entreprise"><br><br>
        <label>Nom Collaborateur :</label>
        <input type='text' name='nom' placeholder="entrer nom"><br><br>
        <label>Prenom Collaborateur :</label>
        <input type= 'text' name='prenom' placeholder="entrer Prenom"><br><br>
        <label>النسب  : </label>
        <input type= 'text' name='nomArabe' placeholder="النسب"><br><br>
        <label>الاسم :</label>
        <input type= 'text' name='prenomArabe' placeholder="الاسم"><br><br>
        <label>Code National :</label>
        <input type= 'text' name='cin' placeholder="entrer cin "><br><br>
        <label>Civilité :</label>
        <input type= 'text' name='civilite' placeholder="entrer etat civil "><br><br>
        <label>Nationalite :</label>
        <input type= 'text' name='nationalite' placeholder="entrer nationalite "><br><br>
        <label>Email :</label>
        <input type= 'text' name='email' placeholder="entrer un Email "><br><br>
        <label>Gsm :</label>
        <input type= 'text' name='gsm' placeholder="entrer numero de telephone "><br><br>
        <label>Adresse :</label>
        <input type= 'text' name='adresse' placeholder="entrer l'Adresse "><br><br>
        <label>Ville :</label>
        <input type= 'text' name='ville' placeholder="entrer la Ville "><br><br>
        </div>

        <!--div col2-->
        <div class="col2">
        <label>code Postal :</label>
        <input type= 'text' name='codePostal' placeholder="entrer le code Postal"><br><br>
        <label>Pays :</label>
        <input type= 'text' name='pays' placeholder="entrer Pays "><br><br>
        <label>Photo :</label>
        <input type= 'text' name='photo' placeholder="entrer photo"><br><br> 
        <label>Fonction :</label>
        <input type= 'text' name='Fonction' placeholder="Fonctionement"><br><br>
        <label>Grade :</label>
        <input type= 'text' name='grade' placeholder="entrer un grade"><br><br>
        <label>Echelle :</label>
        <input type= 'text' name='echelle' placeholder="entrer l'echelle "><br><br>
        <label>Echellon :</label>
        <input type= 'text' name='echellon' placeholder="entrer l'echellon"><br><br>
        <label>Description :</label>
        <input type= 'text' name='_description' placeholder="entrer La Description "><br><br>
        <label>Code Service :</label>
        <input type= 'text' name='codeSrvFK1' placeholder="entrer Le Code Service"><br><br>
        <label>Code Entreprise :</label>
        <input type= 'text' name='codeEntrFK2' placeholder="entrer Code d'Entreprise"><br><br>
        <label>Type De Contrat :</label>
        <input type= 'text' name='typeContrat' placeholder="entrer le Type Contrat"><br><br>
        <label>Numero de Contrat :</label>
        <input type= 'text' name='numContrat' placeholder="entrer Numero De Contrat"><br><br>
        <label>Etat Collaborateur :</label>
        <input type= 'text' name='etatColabo' placeholder="entrer l'Etat Collaborateur"><br><br>
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