<!-- on va appeler le header -->
<link rel="stylesheet" href="../css/style_Gestion.css">
<?php
include("../MyLibrery/head_istocks.php");
require_once("../MyLibrery/connection.php");
$txt_src="";
$dr_affiche=ExecuteReader($cnx,"select * from services");

if(isset($_GET) && count($_GET)>0)
{
    if(isset($_GET['txt_src']))
    {
        $txt_src=$_GET['txt_src'];
    }
 
    //pour Chercher
    if($_GET['chercher']=="chercher")
    {
        $dr_affiche = ExecuteReader($cnx,"select * from services where codeSrv = '$txt_src' or NomSrv = '$txt_src'");
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
<link rel = "icon" href="img/logo_title1.png" type ="image/x-icon">
<br><br>
<div class="main">
    <form action="Cslt_Services.php" method="get" id="frm1">
        <div class="main_1">
            <div class="main_filter">
                <div class="title_filter">Filter Services</div>
                <div class="filter">
                    <input name="txt_src" type="text" placeholder="Tappez code ou Nom">
                    <input id="btnCher" name="chercher" type="submit" value="chercher">
                    <a href="gestion_services.php">New Service</a>
                </div>
            </div>
            <br>
            <div class="main_liste">
                <div class="title_liste">Listes Des Services</div>
                <div class="liste">
                <?php
        if(isset($dr_affiche)){
            if($dr_affiche->rowCount()>0){   
        ?>
        <table id="mytable">
        <tr><th>Code Service</th><th>Entreprise</th><th>Departement</th><th>Nom Service</th><th>Description</th><th>Fix</th><th>Fax</th><th>Code collabo</th><th>Code collabo2</th><th class="th_action">Action</th></tr>
        <?php while($xtr=$dr_affiche->fetch()){?>
            <tr><td><?php echo($xtr['codeSrv']); ?></td>
            <td><?php echo($xtr['CodeEntrFK']); ?></td
            ><td><?php echo($xtr['CodeDepFK']); ?></td>
            <td><?php echo($xtr['NomSrv']); ?></td>
            <td><?php echo($xtr['_description']); ?></td>
            <td><?php echo($xtr['fix']); ?></td>
            <td><?php echo($xtr['fax']); ?></td>
            <td><?php echo($xtr['codeCDFK1']); ?></td>
            <td><?php echo($xtr['codeCDFK2']); ?></td>
            <td class="action"><a href="supp_Services.php?codeSrv=<?php echo($xtr['codeSrv']); ?>" onclick="return confirm('veuillez vraiment suprimer <?php echo($xtr['NomSrv']); ?>');" value="<?php echo($xtr['codeSrv']); ?>" class="td_button_delete">Delete</a> | <a href="edit_services.php?codeSrv=<?php echo($xtr['codeSrv']); ?>" class="td_button_update" value="<?php echo($xtr['codeSrv']); ?>">Update</a></td></tr>
        <?php }$dr_affiche->closeCursor(); ?>
        </table>
        <?php }} ?>  
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</body>
</html>