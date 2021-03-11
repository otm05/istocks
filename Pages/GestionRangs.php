<?php
include("../myLibrery/head_istocks.php");
include("../myLibrery/connecter.php");
$codeR="";
$codeM="";
$codeE="";
$desc= "";
if(isset($_GET) && count($_GET)>0){

    if(isset($_GET['codeRang']))
    {
        $codeR=$_GET['codeRang'];
    }
    if(isset($_GET['codeMagFk']))
    {
        $codeM=$_GET['codeMagFk'];
    }
    if(isset($_GET['codeEntrFk']))
    {
        $codeE=$_GET['codeEntrFk'];
    }
    if(isset($_GET['description']))
    {
        $desc=$_GET['description'];
    }
    if($_GET["btn"]=="Valider")
    {
        ExecuteNonQuery($cnx,"insert into Rangs values ('$codeR','$codeM','$codeE','$desc')");
    }
    if($_GET["btn"]=="Annuler")
    {
        header("Location:GestionRangConsultation.php");
    } 

}    $drE=ExecuteReader($cnx,"select codeEntr from Entreprises;");
     $drM=ExecuteReader($cnx,"select codeMag from Magasins;");
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
            codeRang : {required:true},
            codeMagFk : {required:true},
            codeEntrFk : {required:true},
            description : {required:true}
            },

            messages: {
                codeRang : {required:'champs Invalid!!'},
                codeMagFk : {required:'champs Invalid!!'},
                codeEntrFk : {required:'champs Invalid!!'},
                description : {required:'champs Invalid!!'}
            },
    });
});
});
</script>
<form action="GestionRangs.php" method="get" id="frm">
   <div class="all">
      <div class="title">
          <H3>Mise à jour</H3>
      </div>
       <div class ="textP">
            <label>codeRang :  </label>
            <input type="text" name="codeRang" class="txtL" placeholder="tapez votre code"><br> 
        </div>
        <div class="text">
            <div class="marg">
               <label>codeMagFk :  </label>
               <select name="codeMagFk" class="txt">
                 <option value="">-- code Magasins --</option>
                  <?php while($ouiam=$drM->fetch()){ ?>
                  <option value='<?php echo($ouiam['codeMag']); ?>'><?php echo($ouiam['codeMag']); ?></option>
                  <?php }$drM->closeCursor();?>
               </select><br>
           </div>   
          <div class="marg">
               <label>codeEntrFk :  </label>
               <select name="codeEntrFk" class="txt">
                  <option value="">-- code entreprise --</option>
                  <?php while($ouiam=$drE->fetch()){ ?>
                  <option value='<?php echo($ouiam['codeEntr']); ?>'><?php echo($ouiam['codeEntr']); ?></option>
                   <?php }$drE->closeCursor();?>
               </select><br>
           </div>
       </div>
        <div class="textP"> 
            <label>description : </label>
            <input type="text" name="description" class="txtL"placeholder="tapez votre description"><br>
       </div> 
       <div class="part-btn">
            <input type="submit" name="btn" value="Valider" id="button">
            <input type="reset" name="btn" value="Vider" id="button" >
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
.error{
    color: red;
    font-size: 14px;
    margin:5px ;
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
    margin:0 30px ;
}
.all .textP {
    margin: 30px ;
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
</style>
</body>
</html>