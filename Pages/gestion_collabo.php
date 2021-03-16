<!-- on va appeler le header -->
<link rel="stylesheet" href="../css/style_Gestion.css">
<?php
require_once("../MyLibrery/connection.php");
$dr_entr_combo=ExecuteReader($cnx,"select CodeEntr,NomEntr from Entreprises");

$matricule="";
$CodeEntrFK="";
$nom="";
$prenom="";
$nomArabe="";
$prenomArabe="";
$cin="";
$civilite="";
$nationalite="";
$email="";
$gsm="";
$adresse="";
$ville="";
$codePostal="";
$pays="";
$photo="";
$fonction="";
$grade="";
$echelle="";
$echellon="";
$_description="";
$codeSrvFK1="";
$codeEntrFK2="";
$typeContrat="";
$numContrat="";
$etatColabo="";


if(isset($_POST) && count($_POST)>0)
{
    if(isset($_POST['matricule']))
    {
        $matricule=$_POST['matricule'];
    }
    if(isset($_POST['CodeEntrFK']))
    {
        $CodeEntrFK=$_POST['CodeEntrFK'];
    }
    if(isset($_POST['nom']))
    {
        $nom=$_POST['nom'];
    }
    if(isset($_POST['prenom']))
    {
        $prenom=$_POST['prenom'];
    }
    if(isset($_POST['nomArabe']))
    {
        $nomArabe=$_POST['nomArabe'];
    }
    if(isset($_POST['prenomArabe']))
    {
        $prenomArabe=$_POST['prenomArabe'];
    }
    if(isset($_POST['cin']))
    {
        if($_POST['cin']=='C')
        {
            $cin="C";
        }
        if($_POST['cin']=='M')
        {
            $cin="M";
        }
        if($_POST['cin']=='D')
        {
            $cin="D";
        }
        if($_POST['cin']=='V')
        {
            $cin="V";
        }
    }
    if(isset($_POST['civilite']))
    {
        $civilite=$_POST['civilite'];
    }
    if(isset($_POST['nationalite']))
    {
        $nationalite=$_POST['nationalite'];
    }
    if(isset($_POST['email']))
    {
        $email=$_POST['email'];
    }
    if(isset($_POST['gsm']))
    {
        $gsm=$_POST['gsm'];
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
    if(isset($_POST['photo']))
    {
        $photo=$_POST['photo'];
    }
    if(isset($_POST['fonction']))
    {
        $fonction=$_POST['fonction'];
    }
    if(isset($_POST['grade']))
    {
        $grade=$_POST['grade'];
    }
    if(isset($_POST['echelle']))
    {
        $echelle=$_POST['echelle'];
    }
    if(isset($_POST['echellon']))
    {
        $echellon=$_POST['echellon'];
    }
    if(isset($_POST['_description']))
    {
        $_description=$_POST['_description'];
    }
    if(isset($_POST['codeSrvFK1']))
    {
        $codeSrvFK1=$_POST['codeSrvFK1'];
    }
    if(isset($_POST['codeEntrFK2']))
    {
        $codeEntrFK2=$_POST['codeEntrFK2'];
    }
    if(isset($_POST['typeContrat']))
    {
        //'R','F','V','C','A','CDI','CDD','E','S'
        if($_POST['typeContrat']=='R')
        {
            $typeContrat="R";
        }
        if($_POST['typeContrat']=='F')
        {
            $typeContrat="F";
        }
        if($_POST['typeContrat']=='V')
        {
            $typeContrat="V";
        }
        if($_POST['typeContrat']=='C')
        {
            $typeContrat="C";
        }
        if($_POST['typeContrat']=='A')
        {
            $typeContrat="A";
        }
        if($_POST['typeContrat']=='CDI')
        {
            $typeContrat="CDI";
        }
        if($_POST['typeContrat']=='CDD')
        {
            $typeContrat="CDD";
        }
        if($_POST['typeContrat']=='E')
        {
            $typeContrat="E";
        }
        if($_POST['typeContrat']=='S')
        {
            $typeContrat="S";
        }
    }
    if(isset($_POST['numContrat']))
    {
        $numContrat=$_POST['numContrat'];
    }

    if(isset($_POST['etatColabo']))
    {
        if($_POST['etatColabo']=='A')
        {
            $etatColabo="A";
        }
        if($_POST['etatColabo']=='D')
        {
            $etatColabo="D";
        }
        if($_POST['etatColabo']=='R')
        {
            $etatColabo="R";
        }

    }
    
    //pour Enregistrer
    if($_POST['add']=="Enregistrer")
    {  
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $f=$_FILES["btn1"];
            $pathImg=$f["tmp_name"];
            if(isset($f["tmp_name"]))
            {
                $NameFile="".$matricule."_istoks.jpg";
                $pathFile="../imgSource/$NameFile";
                $photo=$pathFile;
                move_uploaded_file($f["tmp_name"],"../imgSource/$NameFile");
            }
        }
        ExecuteNonQuery($cnx,"insert into Collaborateurs values('$matricule','$CodeEntrFK','$nom','$prenom','$nomArabe','$prenomArabe','$cin','$civilite','$nationalite','$email','$gsm','$adresse','$ville','$codePostal','$pays','$photo','$fonction','$grade',$echelle,$echellon,'$_description','$codeSrvFK1','$codeEntrFK2','$typeContrat','$numContrat','$etatColabo');");
        header("Location:Cslt_Collabo.php");  
    }

    if($_POST['add']=="Annuler")
    {  
        header("Location:Cslt_Collabo.php");  
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
$(function(){
        //exception validateur Enregidtrer
        $("#btnAdd").on("click",function(){
            $("#frm1").validate
            ({
                rules: 
                    {
                        matricule: {required:true},
                        CodeEntrFK: {required:true},
                        nom : {required:true},
                        prenom : {required:true},
                        nomArabe : {required:true},
                        prenomArabe :{required:true},
                        cin :{required:true},
                        nationalite: {required:true},
                        email:{
                        required:true,
                        email:true
                        },
                        gsm:{
                        required:true,
                        number:true
                        },
                        adresse : {required:true},
                        ville : {required:true},
                        codePostal :{required:true,number:true},
                        pays :{required:true},
                        btn1: {required:true},
                        fonction: {required:true},
                        grade : {required:true},
                        echelle : {required:true,number:true},
                        echellon : {required:true,number:true},
                        codeSrvFK1 :{required:true},
                        codeEntrFK2 :{required:true},
                        typeContrat : {required:true},
                        numContrat :{required:true},
                        etatColabo :{required:true}
                    },

                    messages: 
                    {
                        matricule: {required:'veuillez insérer Matricule Collaborateur *'},
                        CodeEntrFK: {required:'veuillez indiquer une entreprise *'},
                        nom : {required:'veuillez indiquer Le nom *'},
                        prenom : {required:'veuillez insérer Nom Departement *'},
                        nomArabe : {required:'المرجو ادخال النسب'},
                        prenomArabe :{required:'المرجو ادخال الاسم'},
                        cin :{required:'veuillez insérer cin *'},
                        nationalite: {required:'veuillez insérer nationalite *'},
                        email: {required:'veuillez insérer l email *',email: 'tappez email correcte !!! *'},
                        gsm : {required:'veuillez insérer gsm *',number:'tappez des chiffre svp *'},
                        adresse : {required:'veuillez insérer adresse *'},
                        ville : {required:'veuillez insérer ville *'},
                        codePostal :{required:'veuillez insérer codePostal *',number:'tappez des chiffre svp *'},
                        pays :{required:'veuillez insérer pays *'},
                        btn1: {required:'veuillez insérer photo *'},
                        fonction: {required:'veuillez insérer fonction *'},
                        grade : {required:'veuillez insérer grade *'},
                        echelle : {required:'veuillez insérer echelle *',number:'tappez des chiffre svp *'},
                        echellon : {required:'veuillez insérer echellon *',number:'tappez des chiffre svp *'},
                        codeSrvFK1 :{required:'veuillez insérer Service *'},
                        codeEntrFK2 :{required:'veuillez insérer Entreprise *'},
                        typeContrat : {required:'selectioner un type de Contrat *'},
                        numContrat :{required:'veuillez insérer numContrat *'},
                        etatColabo :{required:'veuillez Selectioner etat Collaborateur *'}
                    }
            });
        });

});
</script>
<link rel="stylesheet" href="../css/style_G.css">
<br><br><br>
<style>
.div_radio2{
margin-left: 60px;
font-size: 18px;
color: rgb(69, 136, 148);
user-select: none;
font-size: 19px;
font-weight: 800;
}
.div_radio1{
margin-left: 60px;
font-size: 18px;
color: rgb(69, 136, 148);
user-select: none;
font-size: 19px;
font-weight: 800;
}
.rad{
size: 19px;
margin: 5px;
}
.rad1{
size: 19px;
margin: 5px;
}

.divLogo{
margin-left: 40px;
}
.logoentr{
    width: 100px;
    height: 100px;
    border: 3px solid silver;
    border-radius: 10%;
}
</style>
<!-- commencer le Nv code HTML -->
<br>
<form action="gestion_collabo.php" method="POST" id="frm1" enctype="multipart/form-data">
    <fieldset>
        <legend class="entr">Collaborateurs</legend><br><br><br>
        <div class="Global">
        
        <!--div col1-->
        <div class="col1" >
        <label class="lblinput">Matricule : </label>
        <input type='text' name='matricule' placeholder="entrer Matriculation"><br><br>
        <label class="lblinput">entreprises:</label>
        <select name="CodeEntrFK" id="sel" >
            <option value="">--Select Entreprise--</option>
            <?php while($combo1=$dr_entr_combo->fetch()){?>
            <option value="<?php echo($combo1['CodeEntr']); ?>"><?php echo($combo1['NomEntr']); ?></option>
            <?php }$dr_entr_combo->closeCursor(); ?>
        </select>
        <br><br>
        <label class="lblinput">Nom Collaborateur :</label>
        <input type='text' name='nom' placeholder="entrer nom"><br><br>
        <label class="lblinput">Prenom Collaborateur :</label>
        <input type= 'text' name='prenom' placeholder="entrer Prenom"><br><br>
        <label class="lblinput">النسب  : </label>
        <input type= 'text' name='nomArabe' placeholder="النسب"><br><br>
        <label class="lblinput">الاسم :</label>
        <input type= 'text' name='prenomArabe' placeholder="الاسم"><br><br>
        <label class="lblinput">Code National :</label><br><br>
        <div class="div_radio1">
        <input class="rad1" type= 'radio' name='cin' value="C" id="C" checked> C 
        <input class="rad1" type= 'radio' name='cin' value="M" id="M"> M 
        <input class="rad1" type= 'radio' name='cin' value="D" id="D"> D 
        <input class="rad1" type= 'radio' name='cin' value="V" id="V"> V 
        </div>
        <br>
        <label class="lblinput">Civilité :</label>
        <input type= 'text' name='civilite' placeholder="entrer etat civil "><br><br>
        <label class="lblinput">Nationalite :</label>
        <input type= 'text' name='nationalite' placeholder="entrer nationalite "><br><br>
        <label class="lblinput">Email :</label>
        <input type= 'text' name='email' placeholder="entrer un Email "><br><br>
        <label class="lblinput">Gsm :</label>
        <input type= 'text' name='gsm' placeholder="entrer numero de telephone "><br><br>
        <label class="lblinput">Adresse :</label>
        <input type= 'text' name='adresse' placeholder="entrer l'Adresse "><br><br>
        <label class="lblinput">Ville :</label>
        <input type= 'text' name='ville' placeholder="entrer la Ville "><br><br>
        </div>

        <!--div col2-->
        <div class="col2">
        <label class="lblinput">code Postal :</label>
        <input type= 'text' name='codePostal' placeholder="entrer le code Postal"><br><br>
        <label class="lblinput">Pays :</label>
        <input type= 'text' name='pays' placeholder="entrer Pays "><br><br>
        <label class="lblinput">Photo :</label>

        <div class="divLogo">
        <input type="file" name="btn1" onchange="readLogo(this);">
        <img class="logoentr" id="maPic"><br>
        </div>
        
        <br><br> 
        <label class="lblinput">Fonction :</label>
        <input type= 'text' name='fonction' placeholder="Fonctionement"><br><br>
        <label class="lblinput">Grade :</label>
        <input type= 'text' name='grade' placeholder="entrer un grade"><br><br>
        <label class="lblinput">Echelle :</label>
        <input type= 'text' name='echelle' placeholder="entrer l'echelle "><br><br>
        <label class="lblinput">Echellon :</label>
        <input type= 'text' name='echellon' placeholder="entrer l'echellon"><br><br>
        <label class="lblinput">Description :</label>
        <input type= 'text' name='_description' placeholder="entrer La Description "><br><br>
        <label class="lblinput">Service :</label>
        <input type= 'text' name='codeSrvFK1' placeholder="entrer Le Code Service"><br><br>
        <label class="lblinput">Entreprise :</label>
        <input type= 'text' name='codeEntrFK2' placeholder="entrer Code d'Entreprise"><br><br>
        <label class="lblinput">Type De Contrat :</label>
        <br><br>
        <div class="div_radio2">
            <input class="rad" type= 'radio' name='typeContrat' value="R" id="R" checked> R &ensp;
            <input class="rad" type= 'radio' name='typeContrat' value="F" id="F"> F &ensp;
            <input class="rad" type= 'radio' name='typeContrat' value="V" id="V"> V &ensp;
            <input class="rad" type= 'radio' name='typeContrat' value="C" id="C"> C &ensp;
            <input class="rad" type= 'radio' name='typeContrat' value="A" id="A"> A <br>
            <input class="rad" type= 'radio' name='typeContrat' value="CDI" id="CDI"> CDI &ensp;
            <input class="rad" type= 'radio' name='typeContrat' value="CDD" id="CDD"> VCDD &ensp; 
            <input class="rad" type= 'radio' name='typeContrat' value="E" id="E"> E &ensp;
            <input class="rad" type= 'radio' name='typeContrat' value="S" id="S"> S &ensp;
        </div>
        <br>
        <label class="lblinput">Numero de Contrat :</label>
        <input type= 'text' name='numContrat' placeholder="entrer Numero De Contrat"><br><br>
        <label class="lblinput">Etat Collaborateur :</label>
        <div class="div_radio1">
        <input class="rad1" type= 'radio' name='etatColabo' value="A" id="A" checked> A 
        <input class="rad1" type= 'radio' name='etatColabo' value="D" id="D"> D 
        <input class="rad1" type= 'radio' name='etatColabo' value="R" id="R"> R 
        </div>
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