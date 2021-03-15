<?php 
include("../MyLibrery/connection.php");
include("../MyLibrery/head_istocks.php");

$codeF="";
$nomF="";
$descr="";
$sectF="";
$villeF="";
$paysF="";
$emailF="";
$fixeF="";
$faxF="";
$sitW="";
$fullN="";
$gsmF="";
$logoF="";

$drR=ExecuteReader($cnx,"select * from Fournisseurs");

if(isset($_POST)&& count($_POST)>0)
{
    if(isset($_POST['codeFour']))
    {
        $codeF=$_POST['codeFour'];
    }
    if(isset($_POST["submit-Search"])=="Rechercher")
    {
      $drR=ExecuteReader($cnx,"select * from Fournisseurs where codeFour='$codeF' or nomFour='$codeF'");
    }
} 
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
            codeFour:{required:true}
          },
          messages:{
            codeFour: {required:'ce champs est obligatoire!'}
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
<link rel="stylesheet" href="../Css/styleFour.css">
<div class="main">
    <form action="GestionFournisseurs.php" method="post" id="frm1">
      <h1>Recherche Fournisseurs</h1>
         <div class="Search-Space">
           <label class="code">Recherche par codeF ou NomF :&ensp;</label><input class="codeF" type="text" name="codeFour" id="txt" placeholder="  Put your Code or Name"><br>
           <input type="submit" name="submit-Search" id="btnA" value="Rechercher">
           <div>
             <a href="AddFournisseur.php">NouvelleFournisseur</a>
           </div>
         </div>
    </form>
</div>

<table classe="MyGrd">
  <tr> 
    <th>Code Fournisseur</th>
    <th>Nom Fournisseur</th>
    <th>Description</th>
    <th>Secteur</th>
    <th>Ville</th>
    <th>Pays</th>
    <th>Email</th>
    <th>Fixe</th>
    <th>Fax</th>
    <th>Site Web</th>
    <th>Full Name Contact</th>
    <th>Gsm Contact</th>
    <th>Logo Fournisseurs</th>
    <th>Actions</th>
  </tr>
  <?php while($grd=$drR->fetch()){?>
   <tr><td><?php echo($grd['codeFour']);?></td>
       <td><?php echo($grd['nomFour']);?></td>
       <td><?php echo($grd['description']);?></td>
       <td><?php echo($grd['secteur']);?></td>
       <td><?php echo($grd['ville']);?></td>
       <td><?php echo($grd['pays']);?></td>
       <td><?php echo($grd['email']);?></td>
       <td><?php echo($grd['fixe']);?></td>
       <td><?php echo($grd['fax']);?></td>
       <td><?php echo($grd['siteWeb']);?></td>
       <td><?php echo($grd['fullNameContact']);?></td>
       <td><?php echo($grd['gsmContact']);?></td>
       <td><?php echo($grd['logoFour']);?></td>
       <td><a href="DeleteFournisseur.php?codeFour=<?php echo($grd['codeFour']);?>&codeEntrFk=<?php echo($grd['codeEntrFk']);?>" onclick="return confirm('Etes Vous Sur de vouloir Supprimer? <?php echo($grd['codeFour']);?>');" value="<?php echo($grd['codeFour']);?>" class="D">Supprimer</a>  
          <a href="EditFournisseur.php?codeFour=<?php echo($grd['codeFour']); ?>"class="E" value="<?php echo($grd['codeFour']);?>">Modifier</a>
        </td>
    </tr><?php }$drR->closeCursor();?>
</table>
</body>
</html>