<?php
include("../MyLibrery/connection.php");
include("../MyLibrery/head_istocks.php");

$codeU="";
$codeE="";
$nomU="";
$typeU="";
$drR=ExecuteReader($cnx,"select * from Unites");

if(isset($_GET)&& count($_GET)>0)
{
    if(isset($_GET['codeUnit']))
    {
        $codeU=$_GET['codeUnit'];
    }
    if(isset($_GET['codeEntrFk']))
    {
      $codeE=$_GET['codeEntrFk'];
    }
    if(isset($_GET["submit-search"])=="Rechercher")
    {
      $drR=ExecuteReader($cnx,"select * from Unites where codeUnit='$codeU' or nomUnit='$codeU' or typeUnit='$codeU'");
    }
  }
// $drG=ExecuteReader($cnx,"select * from Unites");
$drE=ExecuteReader($cnx,"select codeEntr from Entreprises;");
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
     //validateur de rechereche :
      $("#btnn-search").on("click",function(){
        $("#frm").validate({
          rules: {
            codeUnit:{required:true}
          },
          messages:{
            codeUnit: {required:'ce champs est obligatoire!'}
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
<link rel="stylesheet" href="../Css/StyleUnite.css">
<div class="main">
 <form action="GestionUnites.php" method="get" id="frm">
   <h1>Recherche Unite</h1>
    <div class="Search-space">
      <label class="code">Recherche par Code , Nom ou Type :</label>&ensp;<input class="" name="codeUnit" type="text" id="txt" placeholder="put your CodeUnite or NameUnite or TypeUnite"><br>
      <input type="submit" name="submit-search" id="btnn-search" value="Rechercher" class='btn-Search'>
      <div class="linkAdd">
        <a href="AddUnite.php">NouvelleUnite</a>
      </div>
    </div>
 </form>
</div>

    <table classe="MyGrd">
      <tr> 
        <th>Code Unite</th>
        <th>Nom Unite</th>
        <th>Type Unite</th>
        <th>Actions</th>
      </tr>
      <?php while($grd=$drR->fetch()){?>
      <tr><td><?php echo($grd['codeUnit']);?></td>
          <td><?php echo($grd['nomUnit']);?></td>
          <td><?php echo($grd['typeUnit']);?></td>
          <td>
              <a href="DeleteUnite.php?codeUnit=<?php echo($grd['codeUnit']);?>&codeEntrFk=<?php echo($grd['codeEntrFk']);?>" onclick="return confirm('Etes Vous Sur de Vouloire Supprimer? <?php echo($grd['codeUnit']);?>');" value="<?php echo($grd['codeUnit']);?>">Supprimer</a>
              <a href="EditUnite.php?codeUnit=<?php echo($grd['codeUnit']); ?>" classe="E" value="<?php echo($grd['codeUnit']);?>">Modifier</a>
          </td>
        </tr><?php }$drR->closeCursor();?>
    </table>
</body>
</html>