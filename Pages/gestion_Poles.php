<!-- on va appeler le header -->
<?php
include_once("../MyLibrery/connection.php");
$codePL="";
$codeEntrFK="";
$NomPL="";
$_description="";
$secteurPL="";
$adresse="";
$ville="";
$codePostal="";
$pays="";
$email="";
$fixe="";
$fax="";
$siteWeb="";
$fullNameContact="";
$gsmContact="";
$logoPL="";
$codeDPLFK1="";
$codeDPLFK2="";
if(isset($_GET) && count($_GET)>0)
{
    if(isset($_GET['codePL']))
    {
        $codePL=$_GET['codePL'];
    }
    if(isset($_GET['codeEntrFK']))
    {
        $codeEntrFK=$_GET['codeEntrFK'];
    }
    if(isset($_GET['NomPL']))
    {
        $NomPL=$_GET['NomPL'];
    }
    if(isset($_GET['_description']))
    {
        $_description=$_GET['_description'];
    }
    if(isset($_GET['secteurPL']))
    {
        $secteurPL=$_GET['secteurPL'];
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
    if(isset($_GET['fullNameContact']))
    {
        $fullNameContact=$_GET['fullNameContact'];
    }
    if(isset($_GET['gsmContact']))
    {
        $gsmContact=$_GET['gsmContact'];
    }
    if(isset($_GET['logoPL']))
    {
        $logoPL=$_GET['logoPL'];
    }
    if(isset($_GET['codeDPLFK1']))
    {
        $codeDPLFK1=$_GET['codeDPLFK1'];
    }
    if(isset($_GET['codeDPLFK2']))
    {
        $codeDPLFK2=$_GET['codeDPLFK2'];
    }
   
    //pour ajouter
    if($_GET['add']=="Enregistrer")
    {  
        $req1="insert into Poles values('$codePL','$codeEntrFK','$NomPL','$_description','$secteurPL','$adresse','$ville','$codePostal','$pays','$email','$fixe','$fax','$siteWeb','$fullNameContact','$gsmContact','$logoPL','$codeDPLFK1','$codeDPLFK2');";
        ExecuteNonQuery($cnx,$req1);
        header("Location:Cslt_Poles.php");  
    }

    if($_GET['add']=="Annuler")
    {  
        header("Location:Cslt_Poles.php");  
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
    background-color: #937CB1 ;
    color: rgb(32, 31, 31);
}
input[type=submit]:hover{
background-color:#937CB1;
}
label{
color: #75628E;
}
body{
background-color: #E3CEFF;
}
.entr{
background-color: #937CB1;
}

</style>
<!-- commencer le Nv code HTML -->
<br>
<form action="gestion_Poles.php" method="get" id="frm1">
    <fieldset>
        <legend class="entr">Poles</legend><br><br><br>
        <div class="Global">
        
        <!--div col1-->
        <div class="col1" >
        <label>Code pole :</label>
        <input type='text' name='codePL' placeholder="entrer code pole"><br><br>
        <label>Code Entreprise :</label>
        <input type='text' name ='codeEntrFK' placeholder="entrer l'entreprise"><br><br>
        <label>Nom pole : :</label>
        <input type='text' name='NomPL' placeholder="entrer nom pole"><br><br>
        <label>Description :</label>
        <input type= 'text' name='_description' placeholder="entrer la description"><br><br>
        <label>Sector Pole : </label>
        <input type= 'text' name='secteurPL' placeholder="entrer Sector pole"><br><br>
        <label>Adresse :</label>
        <input type= 'text' name='adresse' placeholder="entrer l'adresse"><br><br>
        <label>Ville :</label>
        <input type= 'text' name='ville' placeholder="entrer la ville"><br><br>
        <label>Code Postal :</label>
        <input type= 'text' name='codePostal' placeholder="entrer code postal"><br><br>
        <label>Pays :</label>
        <input type= 'text' name='pays' placeholder="entrer pays"><br><br>
        </div>

        <!--div col2-->
        <div class="col2">
        
        <label>Email :</label>
        <input type= 'text' name='email' placeholder="entrer l'email"><br><br>
        <label>Fix :</label>
        <input type= 'text' name='fix' placeholder="entrer fix"><br><br> 
        <label>Fax :</label>
        <input type= 'text' name='fax' placeholder="entrer fax"><br><br>
        <label>site Web :</label>
        <input type= 'text' name='siteWeb' placeholder="entrer le site Web"><br><br>
        <label>full Name Contact :</label>
        <input type= 'text' name='fullNameContact' placeholder="entrer full Name Contact"><br><br>
        <label>Gsm Contact :</label>
        <input type= 'text' name='gsmContact' placeholder="entrer un Gsm Contact"><br><br>
        <label>logo Pole :</label>
        <input type= 'text' name='logoPL' placeholder="entrer logo"><br><br>
        <label>Code DPLFK1 :</label>
        <input type= 'text' name='codeDPLFK1' placeholder="entrer un codeDPLFK1"><br><br>
        <label>code DPLFK2 :</label>
        <input type= 'text' name='codeDPLFK2' placeholder="entrer un codeDPLFK2"><br><br>

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