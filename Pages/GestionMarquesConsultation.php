<?php
include("../myLibrery/head_istocks.php");
include("../myLibrery/connecter.php");
$code1="";
$dr_affiche=ExecuteReader($cnx,"select * from Marques");
if(isset($_GET) && count($_GET)>0){

    if(isset($_GET['codeMrq']))
    {
        $code1=$_GET['codeMrq'];
    }

    if($_GET["btn"]=="Rechercher")
    {
        $dr_affiche=ExecuteReader($cnx,"select * from Marques where codeMrq='$code1' or nomMrq='$code1'");
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
            codeMrq: {required:true},
            },

            messages: {
                codeMrq: {required:'champs Invalid !!'}
            },
    });
});
});
</script>
<div class="back">
    <form action="GestionMarquesConsultation.php" method="get" id="frm">
    <div class="part1">
           <div class="title">
               <H3> Filtrer Marques </H3>
            </div>
            <div class="text">
              <input type="text" name="codeMrq" id="txt" placeholder="tapez votre code ou nom">
             <input type="submit" name="btn" value="Rechercher" id="button" >
             <a href="GestionMarque.php" id="new">NewMarque</a>
             </div>  
        </div>      
             <table id="mytable" name="table">
                 <tr>
                   <th>codeMrq</th>
                   <th>nomMrq</th>
                   <th>categorie</th>
                   <th>paysOrigine</th>
                   <th>logoFour</th>
                   <th>Actions</th>
                 </tr>
                 <?php while($x=$dr_affiche->fetch()){?>
                <tr>
                    <td><?php echo($x['codeMrq']); ?></td>
                    <td><?php echo($x['nomMrq']); ?></td>
                    <td><?php echo($x['categorieMrq']); ?></td>
                    <td><?php echo($x['paysOrigine']); ?></td>
                    <td><img class="imgLogo" src="<?php echo($x['logoFour']); ?>" title="<?php echo($x['logoFour']); ?>"></td>
                    <td>
                    <a href="supMarque.php?codeMrq=<?php echo($x['codeMrq']); ?>&codeEntrFk=<?php echo($x['codeEntrFk']); ?>" onclick="return confirm('veuillez vraiment suprimer <?php echo($x['codeMrq']); ?>');" value="<?php echo($x['codeMrq']); ?>" class="D">Delete</a> |
                     <a href="EditMarque.php?codeMrq=<?php echo($x['codeMrq']); ?>&codeEntrFk=<?php echo($x['codeEntrFk']); ?>" onclick="return confirm('veuillez vraiment modifier <?php echo($x['codeMrq']); ?>');"  class="E" value="<?php echo($x['codeMrq']); ?>">Update</a>
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
    margin:15px
} 
.error{
    color: red;
    font-size: 14px;
    margin:10px
}
.back h2{
    text-align: center;
}
.back .text {
    display: flex;
    flex-direction: row;
    margin: 20px  20px 10px 20px;
}
.back .text #txt{
    width: 300px;
    height: 40px;
    border-radius:5px ;
    margin:0 30px;
}
.back #button
{ 
    height: 40px;
    width: 150px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 20px;
    background-color:rgb(96, 218, 147) ;
}
.back .text a{
    font-size: 20px;
}
#mytable {
width: 98%;
text-align:center;
font-size: 18px;
}
#mytable tr:nth-child(even){
  
}

#mytable tr:hover {
background-color:rgb(238, 253, 245);
}
#mytable th {
height: 50px;
padding:10px 20px;
background-color:rgb(96, 218, 147);
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
#mytable td{
    padding:10px 0;
}
.imgLogo{
    width: 30px;
    height: 30px;
    border:2px solid rgb(96, 218, 147);
    border-radius: 3px;
    box-shadow: .50em .50em 1em;
}
</style>
</body>
</html>