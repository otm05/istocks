<!-- on va appeler le header -->
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
$fullNameContact="";
$gsmContact="";
$logoDep="";
$codeCDFK1="";
$codeDCDFK2="";

$dr_entr_combo=ExecuteReader($cnx,"select CodeEntr,NomEntr from Entreprises");
$dr_Pole_combo=ExecuteReader($cnx,"select codePL,NomPL from Poles");


if(isset($_GET['codeDep']))
    {
        $codeDep=$_GET['codeDep'];
        if(!empty($codeDep)){
            $dr_mod=ExecuteReader($cnx,"select * from Departements where codeDep='$codeDep'");
            $data=$dr_mod->fetchAll();
            $codeDep=$data[0]['codeDep'];
            $CodeEntrFK=$data[0]['CodeEntrFK'];
            $CodePLFK=$data[0]['CodePLFK'];
            $NomDep=$data[0]['NomDep'];
            $_description=$data[0]['_description'];
            $secteurPL=$data[0]['secteurPL'];
            $adresse=$data[0]['adresse'];
            $ville=$data[0]['ville'];
            $codePostal=$data[0]['codePostal'];
            $pays=$data[0]['pays'];
            $email=$data[0]['email'];
            $fix=$data[0]['fix'];
            $fax=$data[0]['fax'];
            $siteWeb=$data[0]['siteWeb'];
            $fullNameContact=$data[0]['fullNameContact'];
            $gsmContact=$data[0]['gsmContact'];
            $logoDep=$data[0]['logoDep'];
            $codeCDFK1=$data[0]['codeCDFK1'];
            $codeDCDFK2=$data[0]['codeDCDFK2'];
        }
    }

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
    if(isset($_POST['fullNameContact']))
    {
        $fullNameContact=$_POST['fullNameContact'];
    }
    if(isset($_POST['gsmContact']))
    {
        $gsmContact=$_POST['gsmContact'];
    }
    
    
    if(isset($_POST['codeCDFK1']))
    {
        $codeCDFK1=$_POST['codeCDFK1'];
    }
    if(isset($_POST['codeDCDFK2']))
    {
        $codeDCDFK2=$_POST['codeDCDFK2'];
    }
    
    if(!empty($_POST['add'])){
        if($_POST['add']=="Enregistrer")
        {  
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $f=$_FILES["logoDep"];
                $pathImg=$f["tmp_name"];
                if(isset($f["tmp_name"]))
                {
                    $NameFile="".$codeDep."_istoks.jpg";
                    $pathFile="../imgSource/$NameFile";
                    $logoDep=$pathFile;
                    move_uploaded_file($f["tmp_name"],"../imgSource/$NameFile");
                }
            }
            $req1="update Departements set CodeEntrFK='$CodeEntrFK',CodePLFK='$CodePLFK',NomDep='$NomDep',_description='$_description',secteurPL='$secteurPL',adresse='$adresse',ville='$ville',codePostal='$codePostal',pays='$pays',email='$email',fix='$fix',fax='$fax',siteWeb='$siteWeb',fullNameContact='$fullNameContact',gsmContact='$gsmContact',logoDep='$logoDep',codeCDFK1='$codeDCDFK2' where codeDep='$codeDep';";
            ExecuteNonQuery($cnx,$req1);
            header("Location:Cslt_dep.php");  
        }

        if($_POST['add']=="Annuler")
        {  
            header("Location:Cslt_dep.php");  
        }
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
                        gsmContact : {
                            required:true,
                            number: true
                        },
                        logoDep : {required:true},
                        fullNameContact : {required:true},
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
                        logoDep : {required:'veuillez insérer LOGO *'},
                        ville: {required:'veuillez insérer La ville *'},
                        pays: {required:'veuillez indiquer Pays *'},
                        adresse : {required:'veuillez indiquer Adresse *'},
                        fullNameContact: {required:'veuillez insérer code Departement *'},
                        gsmContact : {required:'veuillez insérer Gsm Departement *',number:'tapez des chiffre svp !!! *'},

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
<form action="edit_dep.php" method="POST" id="frm1" enctype="multipart/form-data">
    <fieldset>
        <legend class="entr">Departements</legend><br><br><br>
        <div class="Global">
        
        <!--div col1-->
        <div class="col1" >
        <label>Code Departements : </label>
        <input type='text' name='codeDep' placeholder="entrer code departement" readonly="true" value="<?php echo($codeDep); ?>"><br><br>
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
        <input type='text' name ='NomDep' placeholder="entrer le Nom" value="<?php echo($NomDep); ?>"><br><br>
        <label>Description :</label>
        <input type='text' name='_description' placeholder="entrer une description" value="<?php echo($_description); ?>"><br><br>
        <label>Secteur Departement :</label>
        <input type= 'text' name='secteurPL' placeholder="entrer un secteur " value="<?php echo($secteurPL); ?>"><br><br>
        <label>Adresse  : </label>
        <input type= 'text' name='adresse' placeholder="entrer adresse " value="<?php echo($adresse); ?>"><br><br>
        <label>Ville :</label>
        <input type= 'text' name='ville' placeholder="entrer ville" value="<?php echo($ville); ?>"><br><br>
        <label>Code postal :</label>
        <input type= 'text' name='codePostal' placeholder="entrer un codePostal" value="<?php echo($codePostal); ?>"><br><br>
        <label>Pays :</label>
        <input type= 'text' name='pays' placeholder="entrer Pays" value="<?php echo($pays); ?>"><br><br>
        </div>

        <!--div col2-->
        <div class="col2">
        <label>Email :</label>
        <input type= 'text' name='email' placeholder="entrer un Email " value="<?php echo($email); ?>"><br><br>
        <label>Fixe :</label>
        <input type= 'text' name='fix' placeholder="entrer le fix " value="<?php echo($fix); ?>"><br><br>
        <label>Fax :</label>
        <input type= 'text' name='fax' placeholder="entrer fax " value="<?php echo($fax); ?>"><br><br>
        <label>Site Web :</label>
        <input type= 'text' name='siteWeb' placeholder="entrer siteWeb " value="<?php echo($siteWeb); ?>"><br><br> 
        <label>Full Name Contact :</label>
        <input type= 'text' name='fullNameContact' placeholder="entrer full name" value="<?php echo($fullNameContact); ?>"><br><br>
        <label>GSM Contact :</label>
        <input type= 'text' name='gsmContact' placeholder="entrer un GSM " value="<?php echo($gsmContact); ?>"><br><br>
        <label>Logo d'entreprises :</label>

        <div class="divLogo">
        <input type="file" name="logoDep" onchange="readLogo(this);">
        <img class="logoentr" id="maPic" src="<?php echo($logoDep); ?>" title="<?php echo($logoDep); ?>"><br>
        </div>

        <br><br>
        <label>Code codeCDFK1 :</label>
        <input type= 'text' name='codeCDFK1' placeholder="entrer un collabo " value="<?php echo($codeCDFK1); ?>"><br><br>
        <label>Code codeDCDFK2 :</label>
        <input type= 'text' name='codeDCDFK2' placeholder="entrer un collabo2 " value="<?php echo($codeDCDFK2); ?>"><br><br>
        </div>

        </div><br>
        <div class="div_butt">
        <input id="btnAdd" type="submit" name="add" value="Enregistrer">
        <input id="btnAnnuler" type="submit" name="add" value="Annuler">
        </div>
        <br>
        </fieldset>
        </form>
        </body>
        <script>
                document.getElementById("sel").value="<?php echo($CodeEntrFK); ?>";
                document.getElementById("sel2").value="<?php echo($CodePLFK); ?>";

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