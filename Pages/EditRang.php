<?php
include("../myLibrery/head_istocks.php");
include("../myLibrery/connecter.php");
$codeRang="";
$codeMagFk="";
$codeEntrFk="";
$desc= "";
if(isset($_GET['codeRang']) && isset($_GET['codeMagFk']) && isset($_GET['codeEntrFk']))
{
    $codeRang=$_GET['codeRang'];
    $codeMagFk=$_GET['codeMagFk'];
    $codeEntrFk=$_GET['codeEntrFk'];
    if(!empty($codeRang)){
        $dr_mod=ExecuteReader($cnx,"select * from Rangs where codeRang='$codeRang' and codeMagFk = '$codeMagFk' and codeEntrFk = '$codeEntrFk';");
        $data=$dr_mod->fetchAll();
        $codeRang=$data[0]['codeRang'];
        $codeMagFk=$data[0]['codeMagFk'];
        $codeEntrFk=$data[0]['codeEntrFk'];
        $desc=$data[0]['description'];
    }
}


if(isset($_GET) && count($_GET)>0){

    if(isset($_GET['codeRang']))
    {
        $codeRang=$_GET['codeRang'];
    }
    if(isset($_GET['codeMagFk']))
    {
        $codeMagFk=$_GET['codeMagFk'];
    }
    if(isset($_GET['codeEntrFk']))
    {
        $codeEntrFk=$_GET['codeEntrFk'];
    }
    if(isset($_GET['description']))
    {
        $desc=$_GET['description'];
    }
    if(!empty($_GET["btn"])){
        if($_GET["btn"]=="Valider")
        {
            ExecuteNonQuery($cnx,"update Rangs set description='$desc' where codeRang='$codeRang' and codeMagFk = '$codeMagFk' and codeEntrFk = '$codeEntrFk'");
        }
   }
   if(!empty($_GET["btn"]))
   {
    if($_GET["btn"]=="Annuler")
    {
        header("Location:GestionRangConsultation.php");
    } 
   }
}   
?>
<br>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../JQ/dist/jquery.validate.min.js"></script>
<script>
  $(function() {
   $("#button").on("click",function(){
    $("#frm").validate
    ({
        rules: {
            description : {required:true}
            },

            messages: {
                description : {required:'champs Invalid!!'}
            },
    });
});
});
</script>
    <form action="EditRang.php" method="get" id="frm">
           <div class="all">
            <div class="title">
                <H3>Mise à jour</H3>
            </div>
            <div class ="textP">
               <label>codeRang :  </label>
               <input type="text" name="codeRang" class="txtL" value="<?php echo($codeRang); ?>" readonly="true"><br> 
             </div>
            <div class="text">
               <div class="marg">
               <label>codeMagFk :  </label>
                <input type="text" name="codeMagFk" class="txt" value="<?php echo($codeMagFk); ?>"readonly="true" >
                <br>
               </div>
               <div class="marg">
               <label>codeEntrFk :  </label>
               <input type="text" name="codeEntrFk" class="txt" value="<?php echo($codeEntrFk); ?>"readonly="true">
             <br>
               </div>
            </div>
          <div class="textP"> 
            <label>description : </label>&ensp;
            <input type="text" name="description"class="txtL" value="<?php echo($desc); ?>"><br>
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
  width: 80%;  
  display: flex;
  flex-direction: column;
  font-family: "Great Vibes", cursive;
  font-size: 25px;
  border:solid 1px rgb(96, 218, 147);
  border-radius: 5px;
  margin: 0 120px; 
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
    height: 35px;
    width: 150px;
    cursor: pointer;
    border-radius: 4px;
    font-family: "Great Vibes", cursive;
    font-size: 25px;
    background-color: rgb(96, 218, 147) ;
    margin:0 30px 30px 30px;
}
</style>
</body>
</html>