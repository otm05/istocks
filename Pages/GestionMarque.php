<?php
include("../myLibrery/head_istocks.php");
include("../myLibrery/connecter.php");
$codeM="";
$codeE="";
$nomM="";
$categorieM= "";
$_descriptionM= "";
$paysOrigineM= "";
$logoFourM= "";
if(isset($_POST) && count($_POST)>0){

    if(isset($_POST['codeMrq']))
    {
        $codeM=$_POST['codeMrq'];
    }
    if(isset($_POST['codeEntrFk']))
    {
        $codeE=$_POST['codeEntrFk'];
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
        $logoFourM=$_POST['logoFour'];
    }
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
                $logoFourM=$pathFile;
                move_uploaded_file($f["tmp_name"],"../imgSource/$NameFile");
            }
        }
        ExecuteNonQuery($cnx,"insert into Marques values ('$codeM','$codeE','$nomM','$categorieM','$_descriptionM','$paysOrigineM','$logoFourM')");
    }
    if($_POST["btn"]=="Annuler")
    {
        header("Location:GestionMarquesConsultation.php");
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
            codeMrq : {required:true},
            codeEntrFk : {required:true},
            nomMrq : {required:true},
            categorieMrq : {required:true},
            paysOrigine : {required:true},
            _description : {required:true},
            logoFour : {required:true}
            },

            messages: {
                codeMrq : {required:'champs Invalid!!'},
                codeEntrFk : {required:'champs Invalid!!'},
                nomMrq : {required:'champs Invalid!!'},
                categorieMrq : {required:'champs Invalid!!'},
                paysOrigine : {required:'champs Invalid!!'},
                _description : {required:'champs Invalid!!'},
               logoFour : {required:'champs Invalid!!'}   
            },
    });
});
});
</script>
    <form action="GestionMarque.php" method="post" id="frm" enctype="multipart/form-data" enctype="multipart/form-data">
       <div class="all">
           <div class="title">
             <H3>Mise à jour</H3>
           </div>
           <div class="text">
               <div class ="marg">
                    <label>codeMrq :  </label>
                    <input type="text" name="codeMrq" class="txt" placeholder="tapez votre code">
               </div>
               <div class="marg">
                    <label>codeEntrFk :  </label>
                    <select name="codeEntrFk" class="txt">
                        <option value="">-- code entreprise --</option>
                        <?php while($ouiam=$dr->fetch()){ ?>
                        <option value='<?php echo($ouiam['codeEntr']); ?>'><?php echo($ouiam['codeEntr']); ?></option>
                        <?php }$dr->closeCursor();?>
                    </select>
               </div>
          </div>
           <div class="textP">   
                <label>nomMrq : </label >
                <input type="text" name="nomMrq"class="txtL"placeholder="tapez votre nom"><br>
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
               <input type="text" name="_description" class="txtL"placeholder="tapez votre description"><br>
            </div> 
            <div class="textP"> 
             <label>paysOrigine : </label>&ensp;
              <input type="text" name="paysOrigine" class="txtL"placeholder="tapez votre pays"><br>
            </div> 
            
            <div class="textP"> 
            <div class="divLogo">
              <label>logoFour : </label>&ensp;
              <input type="file" name="logoFour" onchange="readLogo(this);">
              <img class="logoF" id="monimg"><br>
              </div>        
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
    margin:5px;
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
<script>
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
</body>
</html>