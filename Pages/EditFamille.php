<?php
include("../myLibrery/head_istocks.php");
include("../myLibrery/connecter.php");
$codeFml="";
$codeEntrFk="";
$nom="";
$desc= "";
if(isset($_GET['codeFml']) && isset($_GET['codeEntrFk']))
{
    $codeFml=$_GET['codeFml'];
    $codeEntrFk=$_GET['codeEntrFk'];
    if(!empty($codeFml)){
        $dr_mod=ExecuteReader($cnx,"select * from Familles where codeFml='$codeFml' and codeEntrFk = '$codeEntrFk'");
        $data=$dr_mod->fetchAll();
        $code1=$data[0]['codeFml'];
        $codeEntrFk=$data[0]['codeEntrFk'];
        $nom=$data[0]['nomFml'];
        $desc=$data[0]['description'];
    }
}
if(isset($_GET) && count($_GET)>0){

    if(isset($_GET['codeFml']))
    {
        $codeFml=$_GET['codeFml'];
    }
    if(isset($_GET['codeEntrFk']))
    {
        $codeEntrFk=$_GET['codeEntrFk'];
    }
    if(isset($_GET['nomFml']))
    {
        $nom=$_GET['nomFml'];
    }
    if(isset($_GET['description']))
    {
        $desc=$_GET['description'];
    }
    if(!empty($_GET["btn"])){
        if($_GET["btn"]=="Valider")
        {
            ExecuteNonQuery($cnx,"update Familles set nomFml='$nom',description='$desc' where codeFml='$codeFml' and codeEntrFk = '$codeEntrFk'");
        }
    }
    if(!empty($_GET["btn"])){
        if($_GET["btn"]=="Annuler")
        {
            header("Location:GestionFamilleConsultation.php");
        } 
    }
}  
?>
<br><br><br><br>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../JQ/dist/jquery.validate.min.js"></script>
<script>
     $(function() {
   $("#button").on("click",function(){
    $("#frm").validate
    ({
        rules: {
            nomFml : {required:true},
            description : {required:true}
            },

            messages: {
                nomFml : {required:'champs Invalid!!'},
                description : {required:'champs Invalid!!'}
            },
    });
});
});
</script>
    <form action="EditFamille.php" method="get" id="frm">
       <div class="all">
           <div class="title">
             <H3>Mise à jour</H3>
           </div>
           <div class="text">
                <div class ="marg">
                  <label>codeFml :  </label>
                  <input type="text" name="codeFml" class="txt" value="<?php echo($codeFml); ?>"  readonly="true"><br> 
                </div>
                <div class="marg">
                    <label>codeEntrFk :  </label> 
                    <input type="text" name="codeEntrFk" class="txt" value="<?php echo($codeEntrFk); ?>" readonly="true">
               </div>      
           </div>
           <div class="textP">   
             <label>nomFml : &ensp;&ensp;</label >
             <input type="text" name="nomFml" class="txtL" value="<?php echo($nom); ?>" ><br>
          </div>
          <div class="textP"> 
              <label>description : </label>&ensp;
              <input type="text" name="description" class="txtL" value="<?php echo($desc); ?>" ><br>
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
.all .textP{
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
    height: 40px;
    width: 150px;
    cursor: pointer;
    border-radius: 4px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 25px;
    background-color: rgb(96, 218, 147) ;
    margin:0 30px 30px 30px;
    padding:5px;
}
.part-btn{
    display: flex;
    flex-direction: row;
}
</style>
</body>
</html>