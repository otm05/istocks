<?php
include("../myLibrery/head_istocks.php");
include("../myLibrery/connecter.php");
$codeM="";
$codeE="";
$nomM="";
$adresseM= "";
$villeM= "";
$paysM= "";
$descriptionM= "";
if(isset($_GET) && count($_GET)>0){

    if(isset($_GET['codeMag']))
    {
        $codeM=$_GET['codeMag'];
    }
    if(isset($_GET['codeEntrFk']))
    {
        $codeE=$_GET['codeEntrFk'];
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
    if($_GET["btn"]=="Valider")
    {
        ExecuteNonQuery($cnx,"insert into Magasins values ('$codeM','$codeE','$nomM','$adresseM','$villeM','$paysM','$descriptionM')");
    }
    if($_GET["btn"]=="Annuler")
    {
        header("Location:GestionMagasinsConsultation.php");
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
            codeMag : {required:true},
            codeEntrFk : {required:true},
            nomMag : {required:true},
            adresse : {required:true},
            ville : {required:true},
            pays : {required:true},
            description : {required:true}
            },

            messages: {
                codeMag : {required:'champs Invalid!!'},
                codeEntrFk : {required:'champs Invalid!!'},
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
 <form action="GestionMagasin.php" method="get" id="frm">
  <div class="all">
       <div class="title">
            <H3>Mise à jour</H3>
        </div>  
       <div class="text">
           <div class ="marg">
               <label>codeMag :  </label>
               <input type="text" name="codeMag" class="txt" placeholder="tapez votre code"><br> 
           </div>
           <div class="marg">
               <label>codeEntrFk :  </label>
               <select name="codeEntrFk" class="txt">
                  <option value="">-- code entreprise --</option>
                   <?php while($ouiam=$dr->fetch()){ ?>
                   <option value='<?php echo($ouiam['codeEntr']); ?>'><?php echo($ouiam['codeEntr']); ?></option>
                   <?php }$dr->closeCursor();?>
               </select><br>
           </div>
       </div>
       <div class="textP">   
            <label>nomMag : </label >
            <input type="text" name="nomMag"class="txtL"placeholder="tapez votre nom"><br>
      </div>
       <div class="textP">   
          <label>adresse : </label>
          <input type="text" name="adresse"class="txtL"placeholder="tapez votre adresse">
       </div>
       <div class="textP">   
          <label>ville : </label>
          <input type="text" name="ville" class="txtp"placeholder="tapez votre ville">
          &ensp;&ensp;&ensp;&ensp;&ensp;
          <label>pays : </label>
          <input type="text" name="pays" class="txtp"placeholder="tapez votre pays">
      </div>
       <div class="textP"> 
            <label>description : </label>
            <input type="text" name="description"class="txtL"placeholder="tapez votre description"><br>
       </div> 
       <div class="part-btn">
                <input type="submit" name="btn" value="Valider" id="button">
                <input type="reset" name="btn" value="Vider" id="button">
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