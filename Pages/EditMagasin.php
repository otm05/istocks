<?php
include("../myLibrery/head_istocks.php");
include("../myLibrery/connecter.php");
$codeMag="";
$codeEntrFk="";
$nomM="";
$adresseM= "";
$villeM= "";
$paysM= "";
$descriptionM= "";

if(isset($_GET['codeMag'])&& isset($_GET['codeEntrFk']))
{
    $codeMag=$_GET['codeMag'];
    $codeEntrFk=$_GET['codeEntrFk'];
    if(!empty($codeMag)){
        $dr_mod=ExecuteReader($cnx,"select * from Magasins where codeMag='$codeMag' and codeEntrFk = '$codeEntrFk'");
        $data=$dr_mod->fetchAll();
        $codeMag=$data[0]['codeMag'];
        $codeEntrFk=$data[0]['codeEntrFk'];
        $nomM=$data[0]['nomMag'];
        $adresseM=$data[0]['adresse'];
        $villeM=$data[0]['ville'];
        $paysM=$data[0]['pays'];
        $descriptionM=$data[0]['description'];
    }
}

if(isset($_GET) && count($_GET)>0){

    if(isset($_GET['codeMag']))
    {
        $codeMag=$_GET['codeMag'];
    }
    if(isset($_GET['codeEntrFk']))
    {
        $codeEntrFk=$_GET['codeEntrFk'];
    }
    if(isset($_GET['nomMag']))
    {
        $nomM=$_GET['nomMag'];
    }
    if(isset($_GET['adresse']))
    {
        $adresseM=$_GET['adresse'];
    }
    if(isset($_GET['ville']))
    {
        $villeM=$_GET['ville'];
    }
    if(isset($_GET['pays']))
    {
        $paysM=$_GET['pays'];
    }
    if(isset($_GET['description']))
    {
        $descriptionM=$_GET['description'];
    }
    if(!empty($_GET["btn"])){
        if($_GET["btn"]=="Valider")
      {
        ExecuteNonQuery($cnx,"update Magasins set nomMag='$nomM',adresse='$adresseM',ville='$villeM',pays='$paysM',description='$descriptionM' where codeMag='$codeMag' and codeEntrFk = '$codeEntrFk'");
       }
    }
    if(!empty($_GET["btn"])){
    if($_GET["btn"]=="Annuler")
    {
        header("Location:GestionMagasinsConsultation.php");
    } 
    }
}    $dr=ExecuteReader($cnx,"select codeEntr from Entreprises;");
?>
<br><br><br><br>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../JQ/dist/jquery.validate.min.js"></script>
<script>
  $(function() {
   $("#button").on("click",function(){
    $("#frm").validate
    ({
        rules: {
            nomMag : {required:true},
            adresse : {required:true},
            ville : {required:true},
            pays : {required:true},
            description : {required:true}
            },

            messages: {
                nomMag : {required:'champs Invalid!!'},
                adresse : {required:'champs Invalid!!'},
                ville : {required:'champs Invalid!!'},
                pays : {required:'champs Invalid!!'},
                description : {required:'champs Invalid!!'}   
            },
    });
});
});
</script>
<form action="EditMagasin.php" method="get" id="frm">
<div class="all">
       <div class="title">
            <H3>Mise à jour</H3>
        </div>  
       <div class="text">
           <div class ="marg">
               <label>codeMag :  </label>
               <input type="text" name="codeMag" class="txt" value="<?php echo($codeMag); ?>"  readonly="true"><br> 
           </div>
           <div class="marg">
               <label>codeEntrFk :  </label>
               <input type="text" name="codeEntrFk" class="txt" value="<?php echo($codeEntrFk); ?>"  readonly="true"><br> 
           </div>
       </div>
       <div class="textP">   
            <label>nomMag : </label >
            <input type="text" name="nomMag"class="txtL"value="<?php echo($nomM); ?>"><br>
      </div>
       <div class="textP">   
          <label>adresse : </label>
          <input type="text" name="adresse"class="txtL"value="<?php echo($adresseM); ?>">
       </div>
       <div class="textP">   
          <label>ville : </label>
          <input type="text" name="ville" class="txtp"value="<?php echo($villeM); ?>">
          &ensp;&ensp;&ensp;&ensp;&ensp;
          <label>pays : </label>
          <input type="text" name="pays" class="txtp"value="<?php echo($paysM); ?>">
      </div>
       <div class="textP"> 
            <label>description : </label>
            <input type="text" name="description"class="txtL"value="<?php echo($descriptionM); ?>"><br>
       </div> 
       <div class="part-btn">
                <input type="submit" name="btn" value="Valider" id="button">
                <input type="submit" name="btn" value="Annuler" id="button">
        </div>
    </div>   
</form>   
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: 0;
}
.error{
    color: red;
    font-size: 14px;
    margin:5px ;
}
.all{
  width: 90%;  
  display: flex;
  flex-direction: column;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  font-size: 25px;
  border:solid 1px rgb(96, 218, 147);
  border-radius: 5px;
  margin: 0 70px; 
}
.all .title{
    width:100%;
    height:40px;
    background-color: rgb(96, 218, 147);
    text-align: center;
}
.all .title h3
{
    font-size: 25px;
}
.all .text {
    display: flex;
    flex-direction: row;
}
.all .text .marg{
    margin: 30px ;
}
.all .textP {
    margin: 0 30px 30px 30px ;
}
.all .txt 
{  border:solid 1px rgb(96, 218, 147);
   border-radius: 5px;
    width: 200px;
    height: 30px;
}
.all .txtL
{
    width: 600px;
    height: 30px;
    border:solid 1px rgb(96, 218, 147);
    border-radius: 5px;
}
.all #button
{
    width: 150px;
    cursor: pointer;
    border-radius: 4px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 25px;
    background-color: rgb(96, 218, 147) ;
    margin:0 30px 30px 30px;
    padding:5px;
}
.txtp{
    width: 200px;
    height: 30px;
    border:solid 1px rgb(96, 218, 147);
    border-radius: 5px;
}
</style>
</body>
</html>