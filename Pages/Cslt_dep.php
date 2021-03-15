<!-- on va appeler le header -->
<link rel="stylesheet" href="../css/style_Gestion.css">
<?php
include("../MyLibrery/head_istocks.php");
require_once("../MyLibrery/connection.php");
$txt_src="";
$dr_affiche=ExecuteReader($cnx,"select * from Departements");
if(isset($_GET) && count($_GET)>0)
{
    if(isset($_GET['txt_src']))
    {
        $txt_src=$_GET['txt_src'];
    }
    //pour Chercher
    if($_GET['chercher']=="chercher")
    {
        $dr_affiche = ExecuteReader($cnx,"select * from Departements where codeDep = '$txt_src' or NomDep = '$txt_src'");
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
                        txt_src: {required:'veuillez insérer code Departement ou le Nom *'}
                    },
            });
        });

});

</script>
<link rel = "icon" href="../img/logo_title1.png" type ="image/x-icon">
<style>
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
    <form action="Cslt_dep.php" method="get" id="frm1">
        <div class="main_1">
            <div class="main_filter">
                <div class="title_filter">Filter Departements</div>
                <div class="filter">
                    <input name="txt_src" type="text" placeholder="Tappez code ou Nom">
                    <input id="btnCher" name="chercher" type="submit" value="chercher">
                    <a href="gestion_departement.php">New Departement</a>
                </div>
            </div>
            <br>
            <div class="main_liste">
                <div class="title_liste">Listes Des Departements</div>
                <div class="liste">
                <?php
        if(isset($dr_affiche)){
            if($dr_affiche->rowCount()>0){   
        ?>
        <table id="mytable">
        <tr>
            <th>Departement</th>
            <th>Entreprise</th>
            <th>Pole</th>
            <th>Departement</th>
        <!--<th>Description</th>-->
            <th>Secteur</th>
        <!--<th>Adresse</th>-->
            <th>Ville</th>
        <!--<th>Code Post</th>-->
            <th>Pays</th>
            <th>Email</th>
            <th>Fix</th>
        <!--<th>Fax</th>
            <th>Site Web</th>-->
            <th>ContactName</th>
            <th>Gsm</th>
            <th>LogoDep</th>
            <th>codeCDFK1</th>
        <!--<th>codeDCDFK2</th>-->   
            
            <th class="th_action">Action</th>
        </tr>
        <?php while($xtr=$dr_affiche->fetch()){?>
            <tr>
                <td><?php echo($xtr['codeDep']); ?></td>
                <td><?php echo($xtr['CodeEntrFK']); ?></td>
                <td><?php echo($xtr['CodePLFK']); ?></td>
                <td><?php echo($xtr['NomDep']); ?></td>
            <!--<td><?php echo($xtr['_description']); ?></td>-->
                <td><?php echo($xtr['secteurPL']); ?></td>
            <!--<td><?php echo($xtr['adresse']); ?></td>-->
                <td><?php echo($xtr['ville']); ?></td>
            <!--<td><?php echo($xtr['codePostal']); ?></td>-->
                <td><?php echo($xtr['pays']); ?></td>
                <td><?php echo($xtr['email']); ?></td>
                <td><?php echo($xtr['fix']); ?></td>
            <!--<td><?php echo($xtr['fax']); ?></td>
                <td><?php echo($xtr['siteWeb']); ?></td>-->
                <td><?php echo($xtr['fullNameContact']); ?></td>
                <td><?php echo($xtr['gsmContact']); ?></td>
                <td><img class="imgLogo" src="<?php echo($xtr['logoDep']); ?>" title="<?php echo($xtr['logoDep']); ?>"></td>
                <td><?php echo($xtr['codeCDFK1']); ?></td>
            <!--<td><?php echo($xtr['codeDCDFK2']); ?></td>-->
                
                <td class="action"><a href="supp_dep.php?codeDep=<?php echo($xtr['codeDep']); ?>" onclick="return confirm('veuillez vraiment suprimer <?php echo($xtr['NomDep']); ?>');" value="<?php echo($xtr['codeDep']); ?>" class="td_button_delete">Delete</a> | <a href="edit_dep.php?codeDep=<?php echo($xtr['codeDep']); ?>" class="td_button_update" value="<?php echo($xtr['codeDep']); ?>">Update</a></td>
            </tr>
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