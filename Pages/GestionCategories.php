<?php 
include("../MyLibrery/connection.php");
include("../MyLibrery/head_istocks.php");

$codeC="";
$codeFa="";
$nomC="";

$drR=ExecuteReader($cnx,"select * from Categories");

if(isset($_GET)&& count($_GET)>0){

    if(isset($_GET['codeCat']))
    {
        $codeC=$_GET['codeCat'];
    }
    if(isset($_GET["btn_Search"])=="Rechercher")
    {
        $drR=ExecuteReader($cnx,"select * from Categories where codeCat='$codeC' or codeFmlFk='$codeC' or nomCat='$codeC'");
    }
}
$dr1=ExecuteReader($cnx,"select codeFml from Familles;");
$dr2=ExecuteReader($cnx,"select count(*) from Categories;");
?>

<br>
<br>
<br>
<br><br>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../JQ/dist/jquery.validate.min.js"></script>

<script>
 $(function() {
     //validateur de rechereche :
      $("#btnA").on("click",function(){
        $("#frm1").validate({
          rules: {
            codeCat:{required:true}
          },
          messages:{
            codeCat: {required:'ce champs est obligatoire!'}
          },
        })
      });
    });
</script>
<style>
   .error{
    font-family:  "Brush Script MT", cursive;
      color: red;
      font-size: 15px;
    }
</style>

<br>
<link rel="stylesheet" href="../Css/StyleCat.css">
<div class="main">
   <form action="GestionCategories.php" method="get" id="frm1">
        <h1> Recherche Categories </h1>
 <div class="Search-Space"> 
        <label class="code">Recherche par CodeC , CodeFml or NomC  : </label>&ensp;<input class="codeC" type="text" name="codeCat" id="txt" placeholder="Put your CodeCat or CodeEntr or NameCat"><br>
        <input type="submit" name="btn_Search" value="Rechercher" id="btnA" class="button-Search">
        <div>
        <a href="AddCategorie.php">NouvelleCategorie</a>
      </div>
    </div> 
 </form>
</div>
<table classe="MyGrd">
  <tr> 
    <th>Code Categories</th>
    <th>Code Famille</th>
    <th>Nom Categorie</th>
    <th>Action1</th>
    <!-- <th>Action2</th> -->
  </tr>
  <?php while($grd=$drR->fetch()){?>
       <td><?php echo($grd['codeCat']);?></td>
       <td><?php echo($grd['codeFmlFk']);?></td>
       <td><?php echo($grd['nomCat']);?></td>
       <td><a href="DeleteCategorie.php?codeCat=<?php echo($grd['codeCat']);?>&codeEntrFk=<?php echo($grd['codeEntrFk']);?>" onclick="return confirm('Etes Vous Sur de vouloir Supprimer? <?php echo($grd['codeCat']);?>');" value="<?php echo($grd['codeCat']);?>" class="D">Supprimer</a>   
           <a href="EditCategorie.php?codeCat=<?php echo($grd['codeCat']); ?>" class="E" value="<?php echo($grd['codeCat']); ?>">Modifier</a>
        </td>
    </tr><?php }$drR->closeCursor();?>
</table>
</body>
</html>
