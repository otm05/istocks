<?php
include_once("../MyLibrery/connection.php");
$dr_entr_combo=ExecuteReader($cnx,"select CodeEntr,NomEntr from Entreprises");

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



if(isset($_GET['CodeEntr']))
{
        $CodeEntr=$_GET['CodeEntr'];
    if(!empty($CodeEntr)){
        $dr_mod=ExecuteReader($cnx,"select * from Entreprises where CodeEntr='$CodeEntr'");
        $data=$dr_mod->fetchAll();
        $CodeEntr=$data[0]['CodeEntr'];
        $NomEntr=$data[0]['NomEntr'];
        $_description=$data[0]['_description'];
        $secteurEntr=$data[0]['secteurEntr'];
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
        $logoEntr=$data[0]['logoEntr'];
        $codeDGFK1=$data[0]['codeDGFK1'];
        $codeDGFK2=$data[0]['codeDGFK2'];
        $EtatEntr=$data[0]['EtatEntr'];

    }
}
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
        $logoEntr=$_GET['logoEntr'];
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


    if(!empty($_GET['add']))
    {
    //pour ajouter
        if($_GET['add']=="Enregistrer")
        {  
            $req="update Entreprises set NomEntr='$NomEntr',_description='$_description',secteurEntr='$secteurEntr',adresse='$adresse',ville='$ville',codePostal='$codePostal',pays='$pays',email='$email',fix='$fix',fax='$fax',siteWeb='$siteWeb',fullNameContact='$fullNameContact',gsmContact='$gsmContact',logoEntr='$logoEntr',codeDGFK1='$codeDGFK1',codeDGFK2='$codeDGFK2',EtatEntr='$EtatEntr' where CodeEntr='$CodeEntr';";
            ExecuteNonQuery($cnx,$req);
            //header("Location:Cslt_Entreprises.php");  
        }

        if($_GET['add']=="Annuler")
        {  
            header("Location:Cslt_Entreprises.php");  
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


<br><br><br><br><br>
<script>
$(function() {
        //exception validateur modification
        $("#btnAdd").on("click",function(){
            $("#frm1").validate
            ({
                rules: {
                    CodeEntr: {required:true},
                    NomEntr: {required:true},
                    _description : {required:true},
                    secteurEntr : {required:true},
                    adresse : {required:true},
                    ville : {required:true},
                    codePostal : {required:true},
                    pays : {required:true},
                    email : {required:true},
                    fullNameContact : {required:true},
                    logoEntr : {required:true},
                    codeDGFK1  : {required:true},
                    codeDGFK2 : {required:true},

                    fix:{
                    required: true,
                    number: true
                    },

                    fax:{
                    number: true
                    }
                    },

                    messages: {
                    CodeEntr: {required:'veuillez indiquer une entreprise *'},
                    NomEntr : {required:'veuillez insérer le Nom *'},
                   _description :{required:'veuillez insérer une description *'},
                    secteurEntre : {required: 'veuillez insérer une secteur *'},
                    adresse : {required: 'veuillez insérer une adresse *'},
                    ville :{required: 'veuillez insérer une ville *'},
                    codePostal :{required :'veuillez insérer une code postal *'},
                    pays :{required : 'veuillez insérer une pays *'},
                    email :{required : 'veuillez insérer une email *'},
                    fix: {required:'veuillez insérer un numéro de téléphone *',number: 'saisi des chiffre svp !!! *'},
                    fax: {number:'saisi des chiffre svp !!! *'},
                    siteWeb :{required : 'veuillez insérer un site web *'},
                    fullNameContact : {required : 'veuillez insérer un full name *'},
                    gsmContact : {number :'veuillez insérer un gsm *'},
                    logoEntr : {required :'veuillez insérer un logo *'},
                    codeDGFK1 :{required : 'veuillez insérer code *'},
                    codeDGFK2 :{required : 'veuillez insérer code *'},
                    
                    }
            });
            });

        //exception validateur Suppression
        $("#btnSup").on("click",function(){
            $("#frm1").validate
            ({
                rules: {
                    CodeEntr: {required:true},
                    },

                    messages: {
                        CodeEntr: {required:'veuillez insérer code Entreprises *'}
                    },
            });
            });

        //exception validateur modification
        $("#btnMod").on("click",function(){
            $("#frm1").validate
            ({
                rules: {
                    CodeEntr: {required:true},
                    NomEntr: {required:true},
                    _description : {required:true},
                    secteurEntr : {required:true},
                    adresse : {required:true},
                    ville : {required:true},
                    codePostal : {required:true},
                    pays : {required:true},
                    email : {required:true},
                    fullNameContact : {required:true},
                    logoEntr : {required:true},
                    codeDGFK1  : {required:true},
                    codeDGFK2 : {required:true},

                    fix:{
                    required: true,
                    number: true
                    },

                    fax:{
                    number: true
                    }
                    },

                    messages: {
                    CodeEntr: {required:'veuillez indiquer une entreprise *'},
                    NomEntr : {required:'veuillez insérer le Nom *'},
                   _description :{required:'veuillez insérer une description *'},
                    secteurEntre : {required: 'veuillez insérer une secteur *'},
                    adresse : {required: 'veuillez insérer une adresse *'},
                    ville :{required: 'veuillez insérer une ville *'},
                    codePostal :{required :'veuillez insérer une code postal *'},
                    pays :{required : 'veuillez insérer une pays *'},
                    email :{required : 'veuillez insérer une email *'},
                    fix: {required:'veuillez insérer un numéro de téléphone *',number: 'saisi des chiffre svp !!! *'},
                    fax: {number:'saisi des chiffre svp !!! *'},
                    siteWeb :{required : 'veuillez insérer un site web *'},
                    fullNameContact : {required : 'veuillez insérer un full name *'},
                    gsmContact : {number :'veuillez insérer un gsm *', number: 'saisi des chiffre svp !!! *'},
                    logoEntr : {required :'veuillez insérer un logo *'},
                    codeDGFK1 :{required : 'veuillez insérer code *'},
                    codeDGFK2 :{required : 'veuillez insérer code *'},
                    
                    },
            });
        });
});

</script>
<br><br>




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
<form action="edit_entreprises.php" method="get" id="frm1">
    <fieldset>
        <legend class="entr">Entreprises</legend><br><br><br>
        <div class="Global">
        
        <!--div col1-->
        <div class="col1" >
        <label>Code Entreprises : </label>
        <input type='text' name='CodeEntr' placeholder="entrer code of user" value="<?php echo($CodeEntr); ?>" readonly="true"><br><br>
        <label>Nom d'entreprises:</label>
        <input type='text' name ='NomEntr' placeholder="entrer le Nom" value="<?php echo($NomEntr); ?>"><br><br>
        <label>Description :</label>
        <input type='text' name='_description' placeholder="entrer une description" value="<?php echo($_description); ?>"><br><br>
        <label>Secteur Entreprises :</label>
        <input type= 'text' name='secteurEntr' placeholder="entrer un secteur " value="<?php echo($secteurEntr); ?>"><br><br>
        <label>adresse  : </label>
        <input type= 'text' name='adresse' placeholder="entrer adresse " value="<?php echo($adresse); ?>"><br><br>
        <label>Ville :</label>
        <input type= 'text' name='ville' placeholder="entrer ville"  value="<?php echo($ville); ?>"><br><br>
        <label>Code postal :</label>
        <input type= 'text' name='codePostal' placeholder="entrer un codePostal " value="<?php echo($codePostal); ?>"><br><br>
        <label>Pays :</label>
        <input type= 'text' name='pays' placeholder="entrer Pays " value="<?php echo($pays); ?>"><br><br>
        <label>Email :</label>
        <input type= 'text' name='email' placeholder="entrer un Email " value="<?php echo($email); ?>"><br><br>
        </div>

        <!--div col2-->
        <div class="col2">
        <label>Fix :</label>
        <input type= 'text' name='fix' placeholder="entrer le fix " value="<?php echo($fix); ?>"><br><br>
        <label>Fax :</label>
        <input type= 'text' name='fax' placeholder="entrer fax " value="<?php echo($fax); ?>"><br><br>
        <label>Site Web :</label>
        <input type= 'text' name='siteWeb' placeholder="entrer site Web " value="<?php echo($siteWeb); ?>"><br><br> 
        <label>Full Name Contact :</label>
        <input type= 'text' name='fullNameContact' placeholder="entrer full name Contact" value="<?php echo($fullNameContact); ?>"> <br><br>
        <label>GSM Contact :</label>
        <input type= 'text' name='gsmContact' placeholder="entrer un GSM "  value="<?php echo($gsmContact); ?>"><br><br>
        <label>Logo d'entreprises :</label>
        <input type= 'text' name='logoEntr' placeholder="entrer un logo " value="<?php echo($logoEntr); ?>"><br><br>
        <label>Code DGFK1 :</label>
        <input type= 'text' name='codeDGFK1' placeholder="entrer un codeDGFK1 " value="<?php echo($codeDGFK1); ?>"> <br><br>
        <label>Code DGFK2 :</label>
        <input type= 'text' name='codeDGFK2' placeholder="entrer un codeDGFK2 " value="<?php echo($codeDGFK2); ?>"><br><br>
        <label>Etat d'entreprises :</label><br><br>
        <input type= 'radio' name='EtatEntr' id='A' value="A" >Activée valeur par Default	&nbsp;&nbsp;
        <input type= 'radio' name='EtatEntr' id='D' value="D">Désactivée 	&nbsp;&nbsp;
        <input type= 'radio' name='EtatEntr' id='AC' value="AC">Arreté de contrat	&nbsp;	
        <input type= 'radio' name='EtatEntr' id='R' value="R">Retard de paiement<br><br>
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
            document.getElementById("<?php echo($EtatEntr); ?>").checked=true;
     
        </script>
        </html>