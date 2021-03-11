<!-- on va appeler le header -->
<link rel="stylesheet" href="../css/style_Gestion.css">
<?php
require_once("../MyLibrery/connection.php");
$codeDep="";
$CodeEntrFK="";
$CodePLFK="";
$NomDep="";
$_description="";
$secteurPL="";
$adresse="";
$ville="";
$codePostal="";
$pays="";
$email="";
$fix="";
$fax="";
$siteWeb="";
$fullnameContact="";
$gsmcontact="";
$logoDep="";
$codeCDFK1="";
$codeDCDFK2="";

$dr_entr_combo=ExecuteReader($cnx,"select CodeEntr,NomEntr from Entreprises");
$dr_Pole_combo=ExecuteReader($cnx,"select codePL,NomPL from Poles");

if(isset($_POST) && count($_POST)>0)
{
    if(isset($_POST['codeDep']))
    {
        $codeDep=$_POST['codeDep'];
    }
    if(isset($_POST['CodeEntrFK']))
    {
        $CodeEntrFK=$_POST['CodeEntrFK'];
    }
    if(isset($_POST['CodePLFK']))
    {
        $CodePLFK=$_POST['CodePLFK'];
    }
    if(isset($_POST['NomDep']))
    {
        $NomDep=$_POST['NomDep'];
    }
    if(isset($_POST['_description']))
    {
        $_description=$_POST['_description'];
    }
    if(isset($_POST['secteurPL']))
    {
        $secteurPL=$_POST['secteurPL'];
    }
    if(isset($_POST['adresse']))
    {
        $adresse=$_POST['adresse'];
    }
    if(isset($_POST['ville']))
    {
        $ville=$_POST['ville'];
    }
    if(isset($_POST['codePostal']))
    {
        $codePostal=$_POST['codePostal'];
    }
    if(isset($_POST['pays']))
    {
        $pays=$_POST['pays'];
    }
    if(isset($_POST['email']))
    {
        $email=$_POST['email'];
    }
    if(isset($_POST['fix']))
    {
        $fix=$_POST['fix'];
    }
    if(isset($_POST['fax']))
    {
        $fax=$_POST['fax'];
    }
    if(isset($_POST['siteWeb']))
    {
        $siteWeb=$_POST['siteWeb'];
    }
    if(isset($_POST['fullnameContact']))
    {
        $fullnameContact=$_POST['fullnameContact'];
    }
    if(isset($_POST['gsmcontact']))
    {
        $gsmcontact=$_POST['gsmcontact'];
    }
    //logo
    
    if(isset($_POST['codeCDFK1']))
    {
        $codeCDFK1=$_POST['codeCDFK1'];
    }
    if(isset($_POST['codeDCDFK2']))
    {
        $codeDCDFK2=$_POST['codeDCDFK2'];
    }
    //pour ajouter
    if($_POST['add']=="Enregistrer")
    {  
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $f=$_FILES["btn1"];
            $pathImg=$f["tmp_name"];
            if(isset($f["tmp_name"]))
            {
                $NameFile="".$codeDep."_istoks.jpg";
                $pathFile="../imgSource/$NameFile";
                $logoDep=$pathFile;
                move_uploaded_file($f["tmp_name"],"../imgSource/$NameFile");
            }
        }
        ExecuteNonQuery($cnx,"insert into Departements values('$codeDep','$CodeEntrFK','$CodePLFK','$NomDep','$_description','$secteurPL','$adresse','$ville','$codePostal','$pays','$email','$fix','$fax','$siteWeb','$fullnameContact','$gsmcontact','$logoDep','$codeCDFK1','$codeDCDFK2');");
        header("Location:Cslt_dep.php");  
    }

    if($_POST['add']=="Annuler")
    {  
        header("Location:Cslt_dep.php");  
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

<script>
$(function() {
        //exception validateur modification
        $("#btnAdd").on("click",function(){
            $("#frm1").validate
            ({
                rules: 
                    {
                        codeDep: {required:true},
                        CodeEntrFK: {required:true},
                        CodePLFK : {required:true},
                        NomDep : {required:true},
                        ville : {required:true},
                        pays :{required:true},
                        adresse :{required:true},
                        btn1 : {required:true},
                        gsmcontact : {
                            required:true,
                            number: true
                        },

                        fullnameContact : {required:true},
                        email:{
                        required: true,
                        email: true
                        },

                        fix:{
                        required: true,
                        number: true
                        },

                        fax:{
                        number: true
                        }
                    },

                    messages: 
                    {
                        codeDep: {required:'veuillez insérer code Departement *'},
                        CodeEntrFK: {required:'veuillez indiquer une entreprise *'},
                        CodePLFK : {required:'veuillez indiquer Quel Ploe *'},
                        NomDep : {required:'veuillez insérer Nom Departement *'},
                        btn1 : {required:'veuillez insérer LOGO *'},

                        ville: {required:'veuillez insérer La ville *'},
                        pays: {required:'veuillez indiquer Pays *'},
                        adresse : {required:'veuillez indiquer Adresse *'},
                        fullnameContact: {required:'veuillez insérer code Departement *'},
                        gsmcontact : {required:'veuillez insérer Gsm Departement *',number:'tapez des chiffre svp !!! *'},

                        fix: {required:'veuillez insérer un numéro de téléphone *',number: 'tapez des chiffre svp !!! *'},
                        email: {required:'veuillez insérer l email *',email: 'tappez email correcte !!! *'},
                        fax: {number:'saisi des chiffre svp !!! *'}
                    }
            });
        });

});

</script>
<br><br>
<style>
.error{
    color: blue;
    font-size: 14px;
}
.nav-links a:hover{
    background-color: #D03939 ;
    color: rgb(32, 31, 31);
}
#sel{
height:34px ;
line-height :30px; 
border-radius: 6px;
font-size: 14px;
width: 95%;
clear: both;
}
#sel2{
height:34px ;
line-height :30px; 
border-radius: 6px;
font-size: 14px;
width: 95%;
clear: both;
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
#btnvider{
display: block;
margin: 20px 0px 0px 20px ;
text-align: center;
border-radius: 10px;
border: 2px solid;
padding: 14px 110px ;
outline: none;
cursor: pointer;
}

#btnvider:hover{
background-color:rgb(91, 173, 187);
}

.divLogo{
margin-left: 40px;
}
.logoentr{
    width: 100px;
    height: 100px;
    border: 3px solid coral;
    border-radius: 10%;
}
</style>
<!-- commencer le Nv code HTML -->
<br>
<form action="gestion_departement.php" method="POST" id="frm1" enctype="multipart/form-data">
    <fieldset>
        <legend class="entr">Departements</legend><br><br><br>
        <div class="Global">
        
        <!--div col1-->
        <div class="col1" >
        <label>Code Departements : </label>
        <input type='text' name='codeDep' placeholder="entrer code departement"><br><br>
        <label>Code Entreprise : </label>
        <select name="CodeEntrFK" id="sel" >
            <option value="">--Select Entreprise--</option>
            <?php while($combo1=$dr_entr_combo->fetch()){?>
            <option value="<?php echo($combo1['CodeEntr']); ?>"><?php echo($combo1['NomEntr']); ?></option>
            <?php }$dr_entr_combo->closeCursor(); ?>
        </select>
        <br><br>
        <label>Code Pole : </label>
        <select name="CodePLFK" id="sel2" >
            <option value="">--Select Departements--</option>
            <?php while($combo2=$dr_Pole_combo->fetch()){?>
            <option value="<?php echo($combo2['codePL']); ?>"><?php echo($combo2['NomPL']); ?></option>
        <?php }$dr_Pole_combo->closeCursor(); ?>
        </select>
        <br><br>
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
        <input type= 'text' name='fix' placeholder="entrer le fix "><br><br>
        <label>Fax :</label>
        <input type= 'text' name='fax' placeholder="entrer fax "><br><br>
        <label>Site Web :</label>
        <input type= 'text' name='siteWeb' placeholder="entrer siteWeb "><br><br> 
        <label>Full Name Contact :</label>
        <input type= 'text' name='fullnameContact' placeholder="entrer full name"><br><br>
        <label>GSM Contact :</label>
        <input type= 'text' name='gsmcontact' placeholder="entrer un GSM "><br><br>
        
        <label>Logo d'entreprises :</label>
        <div class="divLogo">
        <input type="file" name="btn1" onchange="readLogo(this);">
        <img class="logoentr" id="maPic"><br>
        </div>
        
        <br><br>
        <label>Code codeCDFK1 :</label>
        <input type= 'text' name='codeCDFK1' placeholder="entrer un collabo "><br><br>
        <label>Code codeDCDFK2 :</label>
        <input type= 'text' name='codeDCDFK2' placeholder="entrer un collabo2 "><br><br>
        </div>

        </div><br>
        <div class="div_butt">
        <input id="btnAdd" type="submit" name="add" value="Enregistrer">
        <input id="btnvider" type="reset" name="add" value="Vider">
        <input id="btnAnnuler" type="submit" name="add" value="Annuler">
        </div>
        <br>
        </fieldset>
        </form>
        </body>
        <script>
        function readLogo(x)
                {
                    let dr = new FileReader();
                    dr.onload=function(e){
                       let img = document.querySelector("#maPic");
                       img.src=e.target.result; 
                    }
                    dr.readAsDataURL(x.files[0]);
                }
        </script>
        </html>