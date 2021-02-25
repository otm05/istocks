<?php
try{
    $serverName = "localhost";
    $databaseName = "istocks";
    $user = "root";
    $passwrd = "";
    $connectionString = "mysql:host=$serverName;dbname=$databaseName";
    $cnx = new PDO($connectionString,$user,$passwrd);


}
catch(PDOException $e)
{
    echo("probleme de la connection avec la base de donnes : \n".$e->getMessage()." !!!");
}

function ExecuteNonQuery($pdo,$req)
{
    return $pdo->exec($req);
}

function ExecuteReader($pdo,$req)
{
    return $pdo->query($req);
}

function ExecuteScalar($pdo,$req)
{
    $dr = $pdo->query($req);
    $r = $dr->fetch();
    $dr->closeCursor();
    return $r;
}
?>