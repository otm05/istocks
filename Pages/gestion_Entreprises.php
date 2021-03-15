<!-- on va appeler le header -->
<?php

include_once("../MyLibrery/connection.php");
$CodeEntr="";
$NomEntr="";
$_description="";
$secteurEntr="";
$adresse="";
$ville="";
$codePostal="";
$pays="";
$email="";
$fix="";
$fax="";
$siteWeb="";
$fullNameContact="";
$gsmContact="";
$logoEntr="";
$codeDGFK1="";
$codeDGFK2="";
$EtatEntr="";

if(isset($_GET) && count($_GET)>0)
{
    if(isset($_GET['CodeEntr']))
    {
        $CodeEntr=$_GET['CodeEntr'];
    }
    if(isset($_GET['NomEntr']))
    {
        $NomEntr=$_GET['NomEntr'];
    }
    if(isset($_GET['_description']))
    {
        $_description=$_GET['_description'];
    }
    if(isset($_GET['secteurEntr']))
    {
        $secteurEntr=$_GET['secteurEntr'];
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
    if(isset($_GET['fix']))
    {
        $fix=$_GET['fix'];
    }
    if(isset($_GET['fax']))
    {
        $fax=$_GET['fax'];
    }
    if(isset($_GET['siteWeb']))
    {
        $siteWeb=$_GET['siteWeb'];
    }
    if(isset($_GET['fullNameContact']))
    {
        $fullNameContact=$_GET['fullNameContact'];
    }
    if(isset($_GET['gsmContact']))
    {
        $gsmContact=$_GET['gsmContact'];
    }
    if(isset($_GET['logoEntr']))
    {
        $logoEntre=$_GET['logoEntr'];
    }
    if(isset($_GET['codeDGFK1']))
    {
        $codeDGFK1=$_GET['codeDGFK1'];
    }
    if(isset($_GET['codeDGFK2']))
    {
        $codeDGFK2=$_GET['codeDGFK2'];
    }
    if(isset($_GET['EtatEntr']))
    {
        $EtatEntr=$_GET['EtatEntr'];
    }

    //pour ajouter
    if($_GET['add']=="Enregistrer")
    {  
        $req="insert into Entreprises values('$CodeEntr','$NomEntr','$_description','$secteurEntr','$adresse','$ville','$codePostal','$pays','$email','$fix','$fax','$siteWeb','$fullNameContact','$gsmContact','$logoEntr','$codeDGFK1','$codeDGFK2','$EtatEntr');";
        ExecuteNonQuery($cnx,$req);
        header("Location:Cslt_Entreprises.php");  
    }

    if($_GET['add']=="Annuler")
    {  
        header("Location:Cslt_Entreprises.php");  
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
<form action="gestion_Entreprises.php" method="get" id="frm1">
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
        <input type= 'text' name='secteurEntr' placeholder="entrer un secteur "><br><br>
        <label>adresse  : </label>
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
        <input type= 'text' name='fix' placeholder="entrer le fix "><br><br>
        <label>Fax :</label>
        <input type= 'text' name='fax' placeholder="entrer fax "><br><br>
        <label>Site Web :</label>
        <input type= 'text' name='siteWeb' placeholder="entrer site Web "><br><br> 
        <label>Full Name Contact :</label>
        <input type= 'text' name='fullNameContact' placeholder="entrer full name Contact"><br><br>
        <label>GSM Contact :</label>
        <input type= 'text' name='gsmContact' placeholder="entrer un GSM "><br><br>
        <label>Logo d'entreprises :</label>
        <input type= 'text' name='logoEntr' placeholder="entrer un logo "><br><br>
        <label>Code DGFK1 :</label>
        <input type= 'text' name='codeDGFK1' placeholder="entrer un codeDGFK1 "><br><br>
        <label>Code DGFK2 :</label>
        <input type= 'text' name='codeDGFK2' placeholder="entrer un codeDGFK2 "><br><br>
        <label>Etat d'entreprises :</label><br><br>
        <input type= 'radio' name='EtatEntr' id='A'>Activée valeur par Default	&nbsp;&nbsp;
        <input type= 'radio' name='EtatEntr' id='D'>Désactivée 	&nbsp;&nbsp;
        <input type= 'radio' name='EtatEntr' id='AC'>Arreté de contrat	&nbsp;	
        <input type= 'radio' name='EtatEntr' id='R'>Retard de paiement<br><br>
        </div>

        </div><br>
        <div class="div_butt">
        <input id="btnAdd" type="submit" name="add" value="Enregistrer">
        <input id="btnVider" type="submit" name="add" value="Vider"onclick="resetForm()">
        <input id="btnAnnuler" type="submit" name="add" value="Annuler">
        </div>
        <br>
        </fieldset>
        </form>
        </body>
        <script>
            function resetForm() {
                document.getElementById("frm1").reset();
                }
        </script>
        </html>