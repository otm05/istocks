<!-- on va appeler le header -->
<?php
include("head_istocks.php");
include_once("connection.php");
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
    <script src="JQ/dist/jquery.validate.min.js"></script>

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
<link rel = "icon" href="img/logo_title1.png" type ="image/x-icon">
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
height: 50px;
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
</style>
<br><br><br><br>
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
                <td><?php echo($xtr['logoDep']); ?></td>
                <td><?php echo($xtr['codeCDFK1']); ?></td>
            <!--<td><?php echo($xtr['codeDCDFK2']); ?></td>-->
                
                <td class="action"><a href="supp_dep.php?codeDep=<?php echo($xtr['codeDep']); ?>" onclick="return confirm('veuillez vraiment suprimer <?php echo($xtr['NomDep']); ?>');" value="<?php echo($xtr['codeDep']); ?>" class="td_button_delete">Delete</a> | <a href="" class="td_button_update" value="<?php echo($xtr['codeDep']); ?>">Update</a></td>
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