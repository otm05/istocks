<!-- on va appeler le header -->
<link rel="stylesheet" href="../css/style_Gestion.css">
<?php
require_once("../MyLibrery/connection.php");
$dr_entr_combo=ExecuteReader($cnx,"select CodeEntr,NomEntr from Entreprises");
$dr_Dep_combo=ExecuteReader($cnx,"select codeDep,NomDep from Departements");

$codeSrv="";
$CodeEntrFK="";
$CodeDepFK="";
$NomSrv="";
$_description="";
$fix="";
$fax="";
$codeCDFK1="";
$codeCDFK2="";



    if(isset($_GET['codeSrv']))
    {
        $codeSrv=$_GET['codeSrv'];
        if(!empty($codeSrv)){
            $dr_mod=ExecuteReader($cnx,"select * from Services where codeSrv='$codeSrv'");
            $data=$dr_mod->fetchAll();
            $codeSrv=$data[0]['codeSrv'];
            $CodeEntrFK=$data[0]['CodeEntrFK'];
            $CodeDepFK=$data[0]['CodeDepFK'];
            $NomSrv=$data[0]['NomSrv'];
            $_description=$data[0]['_description'];
            $fix=$data[0]['fix'];
            $fax=$data[0]['fax'];
            $codeCDFK1=$data[0]['codeCDFK1'];
            $codeCDFK2=$data[0]['codeCDFK2'];
        }
    }
    
    if(isset($_GET) && count($_GET)>0)
    {
        if(isset($_GET['codeSrv']))
        {
            $codeSrv=$_GET['codeSrv'];
        }
        if(isset($_GET['CodeEntrFK']))
        {
            $CodeEntrFK=$_GET['CodeEntrFK'];
        }
        if(isset($_GET['CodeDepFK']))
        {
            $CodeDepFK=$_GET['CodeDepFK'];
        }
        if(isset($_GET['NomSrv']))
        {
            $NomSrv=$_GET['NomSrv'];
        }
        if(isset($_GET['_description']))
        {
            $_description=$_GET['_description'];
        }
        if(isset($_GET['fix']))
        {
            $fix=$_GET['fix'];
        }
        if(isset($_GET['fax']))
        {
            $fax=$_GET['fax'];
        }
        if(isset($_GET['codeCDFK1']))
        {
            $codeCDFK1=$_GET['codeCDFK1'];
        }
        if(isset($_GET['codeCDFK2']))
        {
            $codeCDFK2=$_GET['codeCDFK2'];
        }
        
        if(!empty($_GET['add'])){
        //pour ajouter
            if($_GET['add']=="Enregistrer")
            {
                $req1="update Services set CodeEntrFK='$CodeEntrFK',CodeDepFK='$CodeDepFK',NomSrv='$NomSrv',_description='$_description',fix='$fix',fax='$fax',codeCDFK1='$codeCDFK1',codeCDFK2='$codeCDFK2' where codeSrv='$codeSrv';";
                ExecuteNonQuery($cnx,$req1);
                header("Location:Cslt_Services.php");  
            }
        }
        if(!empty($_GET['add'])){
            if($_GET['add']=="Annuler")
            {  
                header("Location:Cslt_Services.php");  
            }
        } 
}
    

?>
<title>Edit Services</title>
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
                rules: {
                    codeSrv: {required:true},
                    CodeEntrFK: {required:true},
                    CodeDepFK : {required:true},
                    NomSrv : {required:true},

                    fix:{
                    required: true,
                    number: true
                    },

                    fax:{
                    number: true
                    }
                    },

                    messages: {
                    codeSrv: {required:'veuillez insérer code Service *'},
                    CodeEntrFK: {required:'veuillez indiquer une entreprise *'},
                    CodeDepFK : {required:'veuillez indiquer Quel Departement *'},
                    NomSrv : {required:'veuillez insérer code Service *'},
                    fix: {required:'veuillez insérer un numéro de téléphone *',number: 'saisi des chiffre svp !!! *'},
                    fax: {number:'saisi des chiffre svp !!! *'}
                    }
            });
            });

        //exception validateur Suppression
        $("#btnSup").on("click",function(){
            $("#frm1").validate
            ({
                rules: {
                    codeSrv: {required:true},
                    },

                    messages: {
                    codeSrv: {required:'veuillez insérer code Service *'}
                    },
            });
            });

        //exception validateur modification
        $("#btnMod").on("click",function(){
            $("#frm1").validate
            ({
                rules: {
                    codeSrv: {required:true},
                    CodeEntrFK: {required:true},
                    CodeDepFK : {required:true},
                    NomSrv : {required:true},

                    fix:{
                    required: true,
                    number: true
                    },

                    fax:{
                    number: true
                    },
                    },

                    messages: {
                    codeSrv: {required:'veuillez insérer code Service *'},
                    CodeEntrFK: {required:'veuillez indiquer une entreprise *'},
                    CodeDepFK : {required:'veuillez indiquer Quel Departement *'},
                    NomSrv : {required:'veuillez insérer code Service *'},
                    fix: {required:'veuillez insérer un numéro de téléphone *',number: 'saisi des chiffre svp !!! *'},
                    fax: {number:'saisi des chiffre svp !!! *'}
                    },
            });
        });
});

</script>
<link rel="stylesheet" href="../css/style_G.css">
<br><br>
<!-- commencer le Nv code HTML -->
<br>
<form action="edit_services.php" method="get" id="frm1">
    <fieldset>
        <legend class="entr">Services</legend><br><br><br>
        <div class="Global">
        <!--div col1-->
        <div class="col1" >
        <label>Code Service : </label>
        <input type='text' name='codeSrv' placeholder="entrer Code Service" value="<?php echo($codeSrv); ?>" readonly="true"><br><br>
        <label>Entreprise :</label>
        <select name="CodeEntrFK" id="sel" >
            <option value="">--Select Entreprise--</option>
            <?php while($combo1=$dr_entr_combo->fetch()){?>
            <option value="<?php echo($combo1['CodeEntr']); ?>"><?php echo($combo1['NomEntr']); ?></option>
            <?php }$dr_entr_combo->closeCursor(); ?>
        </select>
        <br><br>
        <label>Departement :</label>
        <select name="CodeDepFK" id="sel2" >
            <option value="">--Select Departements--</option>
            <?php while($combo2=$dr_Dep_combo->fetch()){?>
            <option value="<?php echo($combo2['codeDep']); ?>"><?php echo($combo2['NomDep']); ?></option>
        <?php }$dr_Dep_combo->closeCursor(); ?>
        </select>
        <br><br>
        <label>Nom Service :</label><br>
        <input type= 'text' name='NomSrv' placeholder="entrer Nom Service" value="<?php echo($NomSrv); ?>" ><br><br>
        <label>Description :</label>
        <input type= 'text' name='_description' placeholder="entrer Description" value="<?php echo($_description); ?>"><br><br>
        </div>

        <!--div col2-->
        <div class="col2">
        <label>Fix :</label>
        <input type= 'text' name='fix' placeholder="entrer Fix" value="<?php echo($fix); ?>"><br><br>
        <label>Fax :</label>
        <input type= 'text' name='fax' placeholder="entrer fax" value="<?php echo($fax); ?>"><br><br>
        <label>Code collabo :</label>
        <input type= 'text' name='codeCDFK1' placeholder="entrer un collabo" value="<?php echo($codeCDFK1); ?>"><br><br>
        <label>Code collabo2 :</label>
        <input type= 'text' name='codeCDFK2' placeholder="entrer un collabo2" value="<?php echo($codeCDFK2); ?>"><br><br>
        </div>

        </div><br>
        <div class="div_butt">
        <input id="btnAdd" type="submit" name="add" value="Enregistrer" >
        <input id="btnAnnuler" type="submit" name="add" value="Annuler" >
        </div>
        <br>
        </fieldset>
        </form>
        <br>
        </body>
        <script>
                document.getElementById("sel").value="<?php echo($CodeEntrFK); ?>";
                document.getElementById("sel2").value="<?php echo($CodeDepFK); ?>";
        </script>
        </html>