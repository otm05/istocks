<!-- on va appeler le header -->
<?php
include("head_istocks.php");
include_once("connection.php");
$codeSrv="";
$CodeEntrFK="";
$CodeDepFK="";
$NomSrv="";
$_description="";
$fix="";
$fax="";
$codeCDFK1="";
$codeDCDFK2="";

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
    if($_GET['add']=="Ajouter")
    {
        $ss=0;
        $drA = $cnx->query("select * from Services;");
        while($row1=$drA->fetch()){
            if($row1['codeSrv']==$codeSrv)
            {
                $ss=1;
            }
        }
        $drA->closeCursor();
        if($ss==1)
        {
            $rep="Existe Déjà";
        }
        else if($ss==0)
        {
            ExecuteNonQuery($cnx,"insert into Services values('$codeSrv','$CodeEntrFK','$CodeDepFK','$NomSrv','$_description','$fix','$fax','$codeCDFK1','$codeDCDFK2');");
            $rep="Bien Ajouter";
        }
        
    }
    //pour Supprimer
    if($_GET['add']=="Supprimer")
    {
        $ss=0;
        $drA = $cnx->query("select * from Services;");
        while($row1=$drA->fetch()){
            if($row1['codeSrv']==$codeSrv)
            {
                $ss=1;
            }
        }
        $drA->closeCursor();
        if($ss==1)
        {
            ExecuteNonQuery($cnx,"delete from Services where codeSrv = '$codeSrv';");
            $rep="Bien Supprimer";
        }
        else if($ss==0)
        {
            $rep="n'existe pas pour Supprimer";
        }
    }
    //pour Modifier
    if($_GET['add']=="Modifier")
    {
        $ss=0;
        $drA = $cnx->query("select * from Services;");
        while($row1=$drA->fetch()){
            if($row1['codeSrv']==$codeSrv)
            {
                $ss=1;
            }
        }
        $drA->closeCursor();
        if($ss==1)
        {
            ExecuteNonQuery($cnx,"update Services set CodeEntrFK='$CodeEntrFK' , CodeDepFK='$CodeDepFK' , NomSrv='$NomSrv' , _description='$_description' , fix='$fix' , fax='$fax' , codeCDFK1='$codeCDFK1' , codeCDFK2='$codeDCDFK2' where codeSrv='$codeSrv';");
            $rep="Bien modifier";
        }
        else if($ss==0)
        {
            $rep="n'existe pas pour modifier";
        }
        
    }
}
$dr_entr_combo=ExecuteReader($cnx,"select CodeEntr,NomEntr from Entreprises");
$dr_Dep_combo=ExecuteReader($cnx,"select codeDep,NomDep from Departements");

?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="JQ/dist/jquery.validate.min.js"></script>
<script>
    $(function() {

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
<br><br><br><br><br>
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
        <label>Code Departement :</label>
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
        <input id="btnAdd" type="submit" name="add" value="Ajouter" onclick="Rep()">
        <input id="btnSup" type="submit" name="add" value="Supprimer" >
        <input id="btnMod" type="submit" name="add" value="Modifier" >
        </div>
        <br>
        </fieldset>
        </form>
        </body>
        <script>
            function Rep(){
            let x = "<?php echo($rep); ?>";
            alert(x);
            }
        </script>
        </html>