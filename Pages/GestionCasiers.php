<?php
include("../MyLibrery/connection.php");
include("../MyLibrery/head_istocks.php");

$numCs="";
$codeE="";
$codeR="";
$forme="";
$descr="";

$drR=ExecuteReader($cnx,"select * from Casiers");

if(isset($_GET) && count($_GET)>0)
{
    if(isset($_GET['numCasier']))
    {
        $numCs=$_GET['numCasier'];
    }
    if(isset($_GET['codeRangFk']))
    {
        $codeR=$_GET['codeRangFk'];
    }
    if(isset($_GET["btn_Search"])=="Rechercher")
    {
        $drR=ExecuteReader($cnx,"select * from Casiers where numCasier='$numCs' or codeRangFk='$numCs'");
    }
}
?>
<br>
<br>
<br>
<br><br>
<br>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../JQ/dist/jquery.validate.min.js"></script>
<script>
$(function() {
        //Validateur de la Recherche :
        $("#btnA").on("click",function(){
            $("#frm1").validate ({
                rules: {
                    numCasier: {required:true},
                },
                messages: {
                    numCasier: {required:'Ce champs est Obligatoire !'},
                },
            })
        });
});
</script>
<style>
    .error{
        font-family:  "Brush Script MT", cursive;
        margin-left: 20px;
       color: red;
        font-size: 15px;
    }

</style>

<link rel="stylesheet" href="../Css/StyleCat.css">
<div class="main">
   <form action="GestionCasiers.php" method="get" id="frm1">
        <h1> Recherche Casiers </h1>
 <div class="Search-Space"> 
        <label class="code">Recherche par NumCasier ou CodeRang  : </label>&ensp;<input class="codeC" type="text" name="numCasier" id="txt" placeholder="Put your NumCasier or CodeRang " ><br>
        <input type="submit" name="btn_Search" value="Rechercher" id="btnA" class="button-Search">
        <div>
        <a href="AddCasier.php">NouvelleCasiers</a>
      </div>
    </div> 
 </form>
</div>
<table classe="MyGrd">
  <tr> 
    <th>Numero Casier</th>
    <th>Code Entreprise</th>
    <th>Code Rang</th>
    <th>Forme</th>
    <th>Description</th>
    <th>Actions</th>
  </tr>
  <?php while($grd=$drR->fetch()){?>
       <td><?php echo($grd['numCasier']);?></td>
       <td><?php echo($grd['codeEntrFk']);?></td>
       <td><?php echo($grd['codeRangFk']);?></td>
       <td><?php echo($grd['forme']);?></td>
       <td><?php echo($grd['description']);?></td>
       <td><a href="DeleteCasier.php?numCasier=<?php echo($grd['numCasier']);?>&codeEntrFk=<?php echo($grd['codeEntrFk']);?>" onclick="return confirm('Etes Vous Sur de vouloir Supprimer? <?php echo($grd['numCasier']);?>');" value="<?php echo($grd['numCasier']);?>" class="D">Supprimer</a>   
           <a href="EditCasier.php?numCasier=<?php echo($grd['numCasier']); ?>"class="E" value="<?php echo($grd['numCasier']);?>">Modifier</a>
        </td>
    </tr><?php }$drR->closeCursor();?>
</table>
</body>
</html>
