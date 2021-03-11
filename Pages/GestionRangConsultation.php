<?php
include("../myLibrery/head_istocks.php");
include("../myLibrery/connecter.php");
$code1="";
$dr_affiche=ExecuteReader($cnx,"select * from Rangs");
if(isset($_GET) && count($_GET)>0){

    if(isset($_GET['codeRang']))
    {
        $code1=$_GET['codeRang'];
    }
    if($_GET["btn"]=="Rechercher")
    { 
        $dr_affiche=ExecuteReader($cnx,"select * from Rangs where codeRang='$code1' or codeMagFk='$code1'");
    }
}   
?>
<br><br><br><br><br>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../JQ/dist/jquery.validate.min.js"></script>
<script>
$(function() {
$("#button").on("click",function(){
    $("#frm").validate
    ({
        rules: {
            codeRang: {required:true},
            },

            messages: {
                codeRang: {required:'champs Invalid !!'}
            },
    });
});
});
</script>
<div class="back">
    <form action="GestionRangConsultation.php" method="get" id="frm">
         <div class="part1">
            <div class="title">
               <H3> Filtrer Familles </H3>
            </div>
            <div class="text">
              <input type="text" name="codeRang" id="txt" placeholder="tapez votre codeRang ou codeMagFk ">
             <input type="submit" name="btn" value="Rechercher" id="button" >
             <a href="GestionRangs.php" id="new">NewRangs</a>
             </div>  
             </div>   
             <table id="mytable" name="table">
                 <tr>
                   <th>codeRang</th>
                   <th>codeMagFk</th>
                   <th>description</th>
                   <th>Actions</th>
                 </tr>
                 <?php while($x=$dr_affiche->fetch()){?>
                <tr>
                    <td><?php echo($x['codeRang']); ?></td>
                    <td><?php echo($x['codeMagFk']); ?></td>
                    <td><?php echo($x['description']); ?></td>
                    <td>
                    <a href="supRang.php?codeRang=<?php echo($x['codeRang']); ?>&codeMagFk=<?php echo($x['codeMagFk']); ?>&codeEntrFk=<?php echo($x['codeEntrFk']); ?>" onclick="return confirm('veuillez vraiment suprimer <?php echo($x['codeRang']); ?>');" value="<?php echo($x['codeRang']); ?>" class="D">Delete</a> |
                     <a href="EditRang.php?codeRang=<?php echo($x['codeRang']); ?>&codeMagFk=<?php echo($x['codeMagFk']); ?>&codeEntrFk=<?php echo($x['codeEntrFk']); ?>"  onclick="return confirm('veuillez vraiment modifier <?php echo($x['codeRang']); ?>');" value="<?php echo($x['codeRang']); ?>" class="E" value="<?php echo($xtr['codeSrv']); ?>">Update</a>
                    </td>
                </tr>
               <?php }$dr_affiche->closeCursor(); ?>
             </table>
    </form>
</div>
    <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: 0;
}
.error{
    color: red;
    font-size: 14px;
    margin:10px;
}
.back{
  width: 100%;  
  height: 500px;
  display: flex;
  flex-direction: column;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  font-size: 25px;
}
.back .part1{
 display: flex;
  flex-direction: column;
  width: 98%;
  border:solid 1px rgb(96, 218, 147);
  border-radius: 5px;
  margin-bottom:20px;
}
.back .part1 .title h3{
    background-color: rgb(96, 218, 147) ;
    padding:5px;
}
#new{
    margin:15px;
}
.back .text {
    display: flex;
    flex-direction: row;
    margin: 20px  20px 10px 20px;
}
.back .text #txt{
    width: 300px;
    height: 40px;
    border-radius:7px ;
    margin:0 30px;
}
.back #button
{   
    height: 40px;
    width: 150px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 20px;
    background-color: rgb(96, 218, 147) ;
}
.back .text a{
    font-size: 20px;
}
#mytable {
width: 98%;
text-align:center;
font-size: 18px;
cursor:pointer;
}
#mytable td{
    padding:10px 0;
}

#mytable tr:hover {
background-color:rgb(238, 253, 245);
}
#mytable th {
height: 50px;
padding:10px 20px;
background-color: rgb(96, 218, 147);
border-radius: 5px;
}
#mytable tr td .D{
  list-style: none;
  border: 1px solid black;
  text-decoration: none;
  background-color: red;
  color: black;
  border-radius: 3px;
  font-size: 15px;
}
#mytable tr td .E{
  list-style: none;
  border: 1px solid black;
  text-decoration: none;
  background-color: green;
  color: black;
  border-radius: 3px;
  font-size: 15px;
}

</style>
</body>
</html>