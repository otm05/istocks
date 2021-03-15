<?php
include_once("../MyLibrery/connection.php");
$dr_entr_combo=ExecuteReader($cnx,"select CodeEntr,NomEntr from Entreprises");
$dr_Pol_combo=ExecuteReader($cnx,"select codePL,NomPL from Poles");

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
$fix="";
$fax="";
$siteWeb="";
$fullNameContact="";
$gsmContact="";
$logoPL="";
$codeDPLFK1="";
$codeDPLFK2="";



if(isset($_GET['codePL']))
{
        $codePL=$_GET['codePL'];
    if(!empty($codePL)){
        $dr_mod=ExecuteReader($cnx,"select * from Poles where codePL='$codePL'");
        $data=$dr_mod->fetchAll();
        $codePL=$data[0]['codePL'];
        $CodeEntrFK=$data[0]['CodeEntrFK'];
        $NomPL=$data[0]['NomPL'];
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
        $logoPL=$data[0]['logoPL'];
        $codeDPLFK1=$data[0]['codeDPLFK1'];
        $codeDPLFK2=$data[0]['codeDPLFK2'];

    }
}

if(isset($_GET) && count($_GET)>0)
{
        if(isset($_GET['codePL']))
        {
            $codePL=$_GET['codePL'];
        }
        if(isset($_GET['CodeEntrFK']))
        {
            $CodeEntrFK=$_GET['CodeEntrFK'];
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

    if(!empty($_GET['add']))
    {
        //pour ajouter
            if($_GET['add']=="Enregistrer")
            {
                $req1="update Poles set CodeEntrFK='$CodeEntrFK',NomPL='$NomPL',_description='$_description',secteurPL='$secteurPL',adresse='$adresse',ville='$ville',codePostal='$codePostal',pays='$pays',email='$email',fix='$fix',fax='$fax',siteWeb='$siteWeb',fullNameContact='$fullNameContact',gsmContact='$gsmContact',logoPL='$logoPL',codeDPLFK1='$codeDPLFK1',codeDPLFK2='$codeDPLFK2' where codePL='$codePL';";
                ExecuteNonQuery($cnx,$req1);
                header("Location:Cslt_Poles.php");  
            }
            if($_GET['add']=="Annuler")
            {  
                header("Location:Cslt_Poles.php");  
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
<br><br><br><br>

<script>
$(function() {
        //exception validateur modification
        $("#btnAdd").on("click",function(){
            $("#frm1").validate
            ({
                rules: {
                    codePL: {required:true},
                    CodeEntrFK: {required:true},
                    NomPL : {required:true},
                    _description : {required:true},
                    secteurPL : {required:true},
                    adresse : {required:true},
                    ville : {required:true},
                    codePostal : {required:true},
                    pays : {required:true},
                    email : {required:true},
                    fullNameContact : {required:true},
                    logoPL : {required:true},
                    codeDPLFK1  : {required:true},
                    codeDPLFK2 : {required:true},


                    fix:{
                    required: true,
                    number: true
                    },

                    fax:{
                    number: true
                    }
                    },

                    messages: {
                    codePL: {required:'veuillez insérer code Service *'},
                    CodeEntrFK: {required:'veuillez indiquer une entreprise *'},
                    NomPL : {required:'veuillez insérer code Service *'},
                   _description :{required:'veuillez insérer une description *'},
                    secteurPL : {required: 'veuillez insérer une secteur *'},
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
                    logoPL : {required :'veuillez insérer un logo *'},
                    codeDPLFK1 :{required : 'veuillez insérer code *'},
                    codeDPLFK2 :{required : 'veuillez insérer code *'},
                    
                    }
            });
            });

        //exception validateur Suppression
        $("#btnSup").on("click",function(){
            $("#frm1").validate
            ({
                rules: {
                    codePL: {required:true},
                    },

                    messages: {
                    codePL: {required:'veuillez insérer code Poles *'}
                    },
            });
            });

        //exception validateur modification
        $("#btnMod").on("click",function(){
            $("#frm1").validate
            ({
                rules: {
                    codePL: {required:true},
                    CodeEntrFK: {required:true},
                    NomPL : {required:true},
                    _description : {required:true},
                    secteurPL : {required:true},
                    adresse : {required:true},
                    ville : {required:true},
                    codePostal : {required:true},
                    pays : {required:true},
                    email : {required:true},
                    fullNameContact : {required:true},
                    logoPL : {required:true},
                    codeDPLFK1  : {required:true},
                    codeDPLFK2 : {required:true},

                    fix:{
                    required: true,
                    number: true
                    },

                    fax:{
                    number: true
                    },
                    },

                    messages: {
                        codePL: {required:'veuillez insérer code Service *'},
                        CodeEntrFK: {required:'veuillez indiquer une entreprise *'},
                        NomPL : {required:'veuillez insérer code Service *'},
                       _description :{required:'veuillez insérer une description *'},
                       secteurPL : {required: 'veuillez insérer une secteur *'},
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
                       logoPL : {required :'veuillez insérer un logo *'},
                       codeDPLFK1 :{required : 'veuillez insérer code *'},
                       codeDPLFK2 :{required : 'veuillez insérer code *'},
                    },
            });
        });
});

</script>
<br><br>


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
<form action="edit_poles.php" method="get" id="frm1">
    <fieldset>
        <legend class="entr">Poles</legend><br><br><br>
        <div class="Global">
        
        <!--div col1-->
        <div class="col1" >
        <label>Code pole :</label>
        <input type='text' name='codePL' placeholder="entrer code pole" value="<?php echo($codePL); ?>" readonly="true"><br><br>
        <label>Code Entreprise :</label>
        <input type='text' name ='CodeEntrFK' placeholder="entrer l'entreprise" value="<?php echo($CodeEntrFK); ?>"><br><br>
        <label>Nom pole : :</label>
        <input type='text' name='NomPL' placeholder="entrer nom pole" value="<?php echo($NomPL); ?>"><br><br>
        <label>Description :</label>
        <input type= 'text' name='_description' placeholder="entrer la description" value="<?php echo($_description); ?>"><br><br>
        <label>Sector Pole : </label>
        <input type= 'text' name='secteurPL' placeholder="entrer Sector pole" value="<?php echo($secteurPL); ?>"><br><br>
        <label>Adresse :</label>
        <input type= 'text' name='adresse' placeholder="entrer l'adresse" value="<?php echo($adresse); ?>"><br><br>
        <label>Ville :</label>
        <input type= 'text' name='ville' placeholder="entrer la ville" value="<?php echo($ville); ?>"><br><br>
        <label>Code Postal :</label>
        <input type= 'text' name='codePostal' placeholder="entrer code postal" value="<?php echo($codePostal); ?>"><br><br>
        <label>Pays :</label>
        <input type= 'text' name='pays' placeholder="entrer pays" value="<?php echo($pays); ?>"><br><br>
        </div>

        <!--div col2-->
        <div class="col2">
        
        <label>Email :</label>
        <input type= 'text' name='email' placeholder="entrer l'email" value="<?php echo($email); ?>"><br><br>
        <label>Fix :</label>
        <input type= 'text' name='fix' placeholder="entrer fix" value="<?php echo($fix); ?>"><br><br> 
        <label>Fax :</label>
        <input type= 'text' name='fax' placeholder="entrer fax" value="<?php echo($fax); ?>"><br><br>
        <label>site Web :</label>
        <input type= 'text' name='siteWeb' placeholder="entrer le site Web" value="<?php echo($siteWeb); ?>"><br><br>
        <label>full Name Contact :</label>
        <input type= 'text' name='fullNameContact' placeholder="entrer full Name Contact" value="<?php echo($fullNameContact); ?>"><br><br>
        <label>Gsm Contact :</label>
        <input type= 'text' name='gsmContact' placeholder="entrer un Gsm Contact" value="<?php echo($gsmContact); ?>"><br><br>
        <label>logo Pole :</label>
        <input type= 'text' name='logoPL' placeholder="entrer logo" value="<?php echo($logoPL); ?>"><br><br>
        <label>Code DPLFK1 :</label>
        <input type= 'text' name='codeDPLFK1' placeholder="entrer un codeDPLFK1" value="<?php echo($codeDPLFK1); ?>"><br><br>
        <label>code DPLFK2 :</label>
        <input type= 'text' name='codeDPLFK2' placeholder="entrer un codeDPLFK2" value="<?php echo($codeDPLFK2); ?>"><br><br>

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
                document.getElementById("codePL").options.value="<?php echo($codePL); ?>";
                document.getElementById("CodeEntrFK").options.value="<?php echo($CodeEntrFK); ?>";
        </script>
        </html>