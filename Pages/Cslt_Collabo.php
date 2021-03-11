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
.nav-links a:hover{
background-color: rgb(91, 173, 187);
color: rgb(32, 31, 31);
}
.error{
    color: red;
    font-size: 14px;
}
#sel{
height:34px ;
line-height :30px; 
border-radius: 6px;
font-size: 14px;
width: 95%;
clear: both;
}
#sel2{
height:34px ;
line-height :30px; 
border-radius: 6px;
font-size: 14px;
width: 95%;
clear: both;
}

/*Style of my table*/
#mytable {
font-family: Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
text-align: left;
}

#mytable td, #customers th {
border: 1px solid #ddd;
padding: 9px;
}

#mytable tr:nth-child(even){
background-color: #f2f2f2;
}

#mytable tr:hover {
background-color: #ddd;
}

#mytable th {
height: 60px;
padding-top: 12px;
padding-bottom: 12px;
background-color: rgb(91, 173, 187);
color: white;
}


/* page interne*/
.main{
    padding: 5px;
    margin: 5px;
}
/* Input */
input[placeholder]{
    color: #ddd;
}
input[type=submit]{
text-align: center;
border-radius: 10px;
border: 2px solid;
outline: none;
cursor: pointer;
padding: 10px 0px;
margin: 0;
width: 25%;
}

input[type=submit]:hover{
background-color: #3BB979;
}

input[type=text] {
text-align: center;
width: 25%;
padding: 10px 0px;
margin: 0;
box-sizing: border-box;
border: none;
background-color: rgb(204, 230, 235);
color: rgb(0, 35, 68);
}



/* Div1 */
.filter a:link,.filter a:visited {
height: 60px;
background-color: white;
color: black;
border: 1px solid rgb(91, 173, 187);
border-bottom-left-radius: 10px;
text-align: center;
align-items: center;
text-decoration: none;
display: inline-block;
width: 25%;
padding-top: 20px;
margin: 0;
}

.filter a:hover,.filter a:active {
background-color: rgb(91, 173, 187);
color: white;
}
.main_filter{
    color: white;
border-radius: 8px;
border: 2px solid rgb(91, 173, 187);
}
.title_filter{
padding: 8px;
border: 2px solid rgb(91, 173, 187);
background: rgb(91, 173, 187);
border-radius: 4px;
}
.filter{
padding: 8px;
display: flex;
flex-direction: row;
justify-content: space-evenly;
}
/*div 2*/
.main_liste{
border-radius: 8px;
border: 2px solid #3BB979;
}

.title_liste{
padding: 8px;
color: white;
border: 2px solid #3BB979;
background: #3BB979;
border-radius: 4px;
}
.liste{
padding: 8px;
display: flex;
flex-direction: column;
justify-content: space-evenly;
}

.td_button_delete , .td_button_update{
    text-decoration: none;
    color: black;
display: inline;
text-align: center;
border-radius: 4px;
border: 1px solid rgb(91, 173, 187);
outline: none;
cursor: pointer;
padding: 2px 1px;
margin: 0;
width: 90px;
}

.action{
    text-align: center;
}
.td_button_delete:hover{
background-color: rgb(230, 127, 127);
}
.td_button_update:hover{
background-color: rgb(231, 203, 126);
}
.th_action {
    text-align: center;
}
/*Fin style mytable*/
/* phpto td*/
.imgLogo{
    width: 80px;
    height: 80px;
    border:3px solid rgb(91, 173, 187);
    border-radius: 30%;
    box-shadow: .50em .50em 1em;
}
</style>
<br><br><br><br>
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