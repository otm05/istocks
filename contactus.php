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
.area{
line-height :30px; 
border-radius: 6px;
font-size: 14px;
resize: none;
}
.col1 .area{
width: 95%;
clear: both;
}

.nav-links a:hover{
    background-color: Sienna ;
    color: rgb(32, 31, 31);
}
input[type=submit]:hover{
background-color: Sienna;
}
label{
color: #8B4513;
}
body{
background-color: #F4A460;
}
.entr{
background-color: Sienna;
}

</style>
<!-- commencer le Nv code HTML -->
<br>
<form action="gestion_services.php" method="get" id="frm1">
    <fieldset>
        <legend class="entr">Contact</legend><br><br><br>
        <div class="Global">
        
        <!--div col2-->
        <div class="col1" >
        <label>Nom Complet : </label>
        <input type='text' name='Nom_Complet' placeholder="entrer votre nom complet svp !"><br><br>
        <label>Email:</label>
        <input type='text' name ='Email' placeholder="exemple@gmail.com"><br><br>
        <label>Phone :</label>
        <input type='text' name='Phone' placeholder="06 06 06 06 06"><br><br>
        <label>Message :</label>
        <textarea class="area" name="area1" id="areacontact" cols="50" rows="6" placeholder="saisie le message ici !"></textarea>
        <br><br>

        </div>

        </div><br>
        <div class="div_butt">
        <input type="submit" name="add" value="ENVOYER">
        </div>
        <br>
        </fieldset>
        </form>
        </body>
        </html>