<!-- on va appeler le header -->
<?php

require_once("../MyLibrery/connection.php");
$codeSrv="";
$CodeEntrFK="";
$CodeDepFK="";
$NomSrv="";
$_description="";
$fix="";
$fax="";
$codeCDFK1="";
$codeDCDFK2="";

$dr_entr_combo=ExecuteReader($cnx,"select CodeEntr,NomEntr from Entreprises");
$dr_Dep_combo=ExecuteReader($cnx,"select codeDep,NomDep from Departements");

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
    if(isset($_GET['codeDCDFK2']))
    {
        $codeDCDFK2=$_GET['codeDCDFK2'];
    }
 
    //pour ajouter
    if($_GET['add']=="Enregistrer")
    {  
        ExecuteNonQuery($cnx,"insert into Services values('$codeSrv','$CodeEntrFK','$CodeDepFK','$NomSrv','$_description','$fix','$fax','$codeCDFK1','$codeDCDFK2');");
        header("Location:Cslt_Services.php");  
    }

    if($_GET['add']=="Annuler")
    {  
        header("Location:Cslt_Services.php");  
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
<br><br>
<link rel = "icon" href="img/logo_title1.png" type ="image/x-icon">
<style>
.nav-links a:hover{
background-color: rgb(91, 173, 187);
color: rgb(32, 31, 31);
}
.error{
color: red;
font-size: 14px;
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

/*Style of my table*/
#mytable {
margin-left: 5px;
margin-right: 5px;
font-family: Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
text-align: left;
}

#mytable td, #customers th {
border: 1px solid #ddd;
padding: 9px;
}

#mytable tr:nth-child(even){
background-color: #f2f2f2;
}

#mytable tr:hover {
background-color: #ddd;
}

#mytable th {
height: 60px;
padding-top: 12px;
padding-bottom: 12px;
background-color: rgb(91, 173, 187);
color: white;
}
/*Fin style mytable*/
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
</style>
<!-- commencer le Nv code HTML -->
<br>
<form action="gestion_services.php" method="get" id="frm1">
    <fieldset>
        <legend class="entr">Services</legend><br><br><br>
        <div class="Global">
        <!--div col1-->
        <div class="col1" >
        <label>Code Service : </label>
        <input type='text' name='codeSrv' placeholder="entrer code Service" ><br><br>
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
        <input type= 'text' name='NomSrv' placeholder="entrer Nom Service" ><br><br>
        <label>Description :</label>
        <input type= 'text' name='_description' placeholder="entrer Description" ><br><br>
        </div>

        <!--div col2-->
        <div class="col2">
        <label>Fix :</label>
        <input type= 'text' name='fix' placeholder="entrer Fix" ><br><br>
        <label>Fax :</label>
        <input type= 'text' name='fax' placeholder="entrer fax" ><br><br>
        <label>Code collabo :</label>
        <input type= 'text' name='codeCDFK1' placeholder="entrer un collabo" ><br><br>
        <label>Code collabo2 :</label>
        <input type= 'text' name='codeDCDFK2' placeholder="entrer un collabo2" ><br><br>
        </div>

        </div><br>
        <div class="div_butt">
        <input id="btnAdd" type="submit" name="add" value="Enregistrer" >
        <input id="btnvider" type="reset" name="add" value="Vider">
        <input id="btnAnnuler" type="submit" name="add" value="Annuler" >
        </div>
        <br>
        </fieldset>
        </form>
        <br>
        </body>
        </html>