<?php
try{
    $serverName = "localhost";
    $databaseName = "test22";
    $user = "root";
    $passwrd = "";
    $connectionString = "mysql:host=$serverName;dbname=$databaseName";
    $cnx = new PDO($connectionString,$user,$passwrd);


}
catch(PDOException $e)
{
    echo("probleme de la connection avec la base de donnes : \n".$e->getMessage()." !!!");
}

$reqInsert = "insert into client values('Cl4','rawya',24),('Cl5','hajar',22)";
$reqSelect = "select * from client";

//mèthode exec peux executer une requete d'insert or update or delete :
$cnx->exec($reqInsert);

//mèthode Query peux executer une requete de SELECT et affecter à un variable $dr (DataReader) : 
$dr = $cnx->query($reqSelect);
//  ! SOS ! --> echo($dr); on peut pas afficher un dr avec echo ;)

//RowCount(); --> cette methode peux compter le nembre ligne selectioner dans le query precedant : 
$countSelect = $dr->rowCount();
echo("\n le nombre des clients = $countSelect client\n");


echo("\n********************fetchAll*********************\n");
//$afficherTous = $dr->fetchAll();
//var_dump($afficherTous);

echo("\n********************fetch*********************\n");
$row = $dr->fetch();
echo("\nle nom du client = ".$row['NomEntr']."\n");
$row = $dr->fetch();
echo("\nle nom du client = ".$row['NomEntr']."\n");
$row = $dr->fetch();
echo("\nle nom du client = ".$row['NomEntr']."\n\n");


echo("\n********************fetchObject*********************\n");
$row = $dr->fetchObject();
echo("\nle nom du client = ".$row->NomEntr." et l'age = ".$row->age."\n\n");
$row = $dr->fetchObject();
echo("\nle nom du client = ".$row->NomEntr."\n\n");

?>