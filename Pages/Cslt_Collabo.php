<!-- on va appeler le header -->
<link rel="stylesheet" href="../css/style_Gestion.css">
<?php
include("../MyLibrery/head_istocks.php");
require_once("../MyLibrery/connection.php");
$txt_src="";
$dr_affiche=ExecuteReader($cnx,"select * from Collaborateurs");
if(isset($_GET) && count($_GET)>0)
{
    if(isset($_GET['txt_src']))
    {
        $txt_src=$_GET['txt_src'];
    }
 
    //pour Chercher
    if($_GET['chercher']=="chercher")
    {
        $dr_affiche = ExecuteReader($cnx,"select * from Collaborateurs where matricule = '$txt_src' or nom = '$txt_src'");
    }

}

?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../JQ/dist/jquery.validate.min.js"></script>

<script>
       
$(function() {

        //exception validateur recherche
        $("#btnCher").on("click",function(){
            $("#frm1").validate
            ({
                rules: {
                    txt_src: {required:true},
                    },

                    messages: {
                        txt_src: {required:'veuillez insérer code Service ou le Nom *'}
                    },
            });
        });

});
</script>

<link rel = "icon" href="../img/logo_title1.png" type ="image/x-icon">
<style>
/* phpto td*/
.imgLogo{
    width: 80px;
    height: 80px;
    border:3px solid rgb(91, 173, 187);
    border-radius: 30%;
    box-shadow: .50em .50em 1em;
}
</style>
<br><br>
<div class="main">
    <form action="Cslt_Collabo.php" method="get" id="frm1">
        <div class="main_1">
            <div class="main_filter">
                <div class="title_filter">Filter Collaborateurs</div>
                <div class="filter">
                    <input name="txt_src" type="text" placeholder="Tappez code ou Nom">
                    <input id="btnCher" name="chercher" type="submit" value="chercher">
                    <a href="gestion_collabo.php">New Collaborateur</a>
                </div>
            </div>
            <br>
            <div class="main_liste">
                <div class="title_liste">Listes Des Collaborateurs</div>
                <div class="liste">
                <?php
        if(isset($dr_affiche)){
            if($dr_affiche->rowCount()>0){   
        ?>
        <table id="mytable">
        <tr><th>Matricule</th><th>Entreprise</th><th>Nom</th><th>النسب</th><th>Photo</th><th>Cin</th><th>Nationalite</th><th>Contrat</th><th>etat Colabo</th><th class="th_action">Action</th></tr>
        <?php while($xtr=$dr_affiche->fetch()){?>
            <tr><td><?php echo($xtr['matricule']); ?></td>
            <td><?php echo($xtr['CodeEntrFK']); ?></td
            ><td><?php echo($xtr['nom']); ?></td>
            <td><?php echo($xtr['nomArabe']); ?></td>
            <td><img class="imgLogo" src="<?php echo($xtr['photo']); ?>" title="<?php echo($xtr['photo']); ?>"></td>
            <td><?php echo($xtr['cin']); ?></td>
            <td><?php echo($xtr['nationalite']); ?></td>
            <td><?php echo($xtr['numContrat']); ?></td>
            <td><?php echo($xtr['etatColabo']); ?></td>
            <td class="action"><a href="supp_Collaborateur.php?matricule=<?php echo($xtr['matricule']); ?>" onclick="return confirm('veuillez vraiment suprimer <?php echo($xtr['nom']); ?>');" value="<?php echo($xtr['matricule']); ?>" class="td_button_delete">Delete</a> | <a href="edit_collabo.php?matricule=<?php echo($xtr['matricule']); ?>" class="td_button_update" value="<?php echo($xtr['matricule']); ?>">Update</a></td></tr>
        <?php }$dr_affiche->closeCursor(); ?>
        </table>
        <?php }} ?>  
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>