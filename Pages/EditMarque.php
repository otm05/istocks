<?php
include("../myLibrery/head_istocks.php");
include("../myLibrery/connecter.php");
$codeMrq="";
$codeEntrFk="";
$nomM="";
$categorieM= "";
$_descriptionM= "";
$paysOrigineM= "";
$logoFour= "";

if(isset($_GET['codeMrq'])&& isset($_GET['codeEntrFk']))
{
    $codeMrq=$_GET['codeMrq'];
    $codeEntrFk=$_GET['codeEntrFk'];
    if(!empty($codeMrq)){
        $dr_mod=ExecuteReader($cnx,"select * from Marques where codeMrq='$codeMrq' and codeEntrFk = '$codeEntrFk'");
        $data=$dr_mod->fetchAll();
        $codeMrq=$data[0]['codeMrq'];
        $codeEntrFk=$data[0]['codeEntrFk'];
        $nomM=$data[0]['nomMrq'];
        $categorieM=$data[0]['categorieMrq'];
        $_descriptionM=$data[0]['_description'];
        $paysOrigineM=$data[0]['paysOrigine'];
        $logoFour=$data[0]['logoFour'];
    }
}

if(isset($_POST) && count($_POST)>0){

    if(isset($_POST['codeMrq']))
    {
        $codeM=$_POST['codeMrq'];
    }
    if(isset($_POST['codeEntrFk']))
    {
        $codeEntrFk=$_POST['codeEntrFk'];
    }
    if(isset($_POST['nomMrq']))
    {
        $nomM=$_POST['nomMrq'];
    }
    if(isset($_POST['categorieMrq']))
    {
        if($_POST["categorieMrq"]=="L")
        {
            $categorieM="L";
        }
        if($_POST["categorieMrq"]=="LC")
        {
            $categorieM="LC";
        }
        if($_POST["categorieMrq"]=="N")
        {
            $categorieM="N";
        }
        if($_POST["categorieMrq"]=="C")
        {
            $categorieM="C";
        }
    }
    if(isset($_POST['_description']))
    {
        $_descriptionM=$_POST['_description'];
    }
    if(isset($_POST['paysOrigine']))
    {
        $paysOrigineM=$_POST['paysOrigine'];
    }
    if(isset($_POST['logoFour']))
    {
        $logoFour=$_POST['logoFour'];
    }
    if(!empty($_POST["btn"])){
        if($_POST["btn"]=="Valider")
      {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $f=$_FILES["logoFour"];
            $pathImg=$f["tmp_name"];
            if(isset($f["tmp_name"]))
            {
                $NameFile="".$codeM.$codeEntrFk."_istoks.jpg";
                $pathFile="../imgSource/$NameFile";
                $logoFour=$pathFile;
                move_uploaded_file($f["tmp_name"],"../imgSource/$NameFile");
            }
        }
        ExecuteNonQuery($cnx,"update Marques set nomMrq='$nomM',categorieMrq='$categorieM',_description='$_descriptionM',paysOrigine='$paysOrigineM',logoFour='$logoFour' where codeMrq='$codeM' and codeEntrFk = '$codeEntrFk'");
    }
    }
    if(!empty($_POST["btn"]))
    {
        if($_POST["btn"]=="Annuler")
        {
            header("Location:GestionMarquesConsultation.php");
        } 
    }
}    
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
            nomMrq : {required:true},
            paysOrigine : {required:true},
            _description : {required:true},
            logoFour : {required:true}
            },

            messages: {
                nomMrq : {required:'champs Invalid!!'},
                paysOrigine : {required:'champs Invalid!!'},
                _description : {required:'champs Invalid!!'},
               logoFour : {required:'champs Invalid!!'}   
            },
    });
});
});
</script>

    <form action="EditMarque.php" method="POST" id="frm" enctype="multipart/form-data">
    <div class="all">
           <div class="title">
             <H3>Mise à jour</H3>
           </div>
           <div class="text">
               <div class ="marg">
                    <label>codeMrq :  </label>
                    <input type="text" name="codeMrq" class="txt" value="<?php echo($codeMrq); ?>"  readonly="true" >
               </div>
               <div class="marg">
                    <label>codeEntrFk :  </label>
                    <input type="text" name="codeEntrFk" class="txt" value="<?php echo($codeEntrFk); ?>" readonly="true">
               </div>
          </div>
           <div class="textP">   
                <label>nomMrq : </label >
                <input type="text" name="nomMrq"class="txtL" value="<?php echo($nomM); ?>"><br>
          </div>
          <div class="textP">   
                <label>categorieMrq : </label>&ensp;
                <input type="radio" name="categorieMrq" value="L" class="rad" checked>L 
                <input type="radio" name="categorieMrq" value="LC" class="rad">LC 
                <input type="radio" name="categorieMrq" value="N" class="rad">N 
                <input type="radio" name="categorieMrq" value="C" class="rad">C
          </div>
           <div class="textP"> 
               <label>description : </label>&ensp;
               <input type="text" name="_description" class="txtL"value="<?php echo($_descriptionM); ?>"><br>
            </div> 
            <div class="textP"> 
             <label>paysOrigine : </label>&ensp;
              <input type="text" name="paysOrigine" class="txtL"value="<?php echo($paysOrigineM); ?>"><br>
            </div> 
            
            <div class="textP"> 
            <div class="divLogo">
                <label>logoFour : </label>&ensp;
                <input type="file"  name="logoFour" onchange="readLogo(this);">
                <img class="logoF" id="monimg" src="<?php echo($logoFour); ?>" title="<?php echo($logoFour); ?>"><br>
              </div>
            </div>
            <div class="part-btn">
                <input type="submit" name="btn" value="Valider" id="button">
                <input type="submit" name="btn" value="Annuler" id="button">
            </div>
     </div>   
    </form>
<script>
document.getElementById("<?php echo($categorieM); ?>").checked=true;
        function readLogo(x)
                {
                    let dr = new FileReader();
                    dr.onload=function(e){
                       let img = document.querySelector("#monimg");
                       img.src=e.target.result; 
                    }
                    dr.readAsDataURL(x.files[0]);
                } 
</script>
<style>
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
.rad{
    margin-left:20px;
}
.divLogo{
margin-left: 30px;
}
.logoF{
    width: 50px;
    height: 50px;
    border: 2px solid  rgb(96, 218, 147);
    border-radius: 5%;
}
</style>
</body>
</html>