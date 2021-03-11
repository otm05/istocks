<?php
try{
    $serverName="localhost";
    $db = "istocks";
    $user = "root";
    $passwrd = "";
    $connectionString = "mysql:host=$serverName;dbname=$db";
    $cnx = new PDO($connectionString,$user,$passwrd);
}
catch(PDOException $e){
    echo("Prblm de connection".$e->getMessage()."!!!!");
}

//$cnx->exec("insert into famille values ('A','Z','E','R')");
//$cnx->query("select * from famille");
//$req2 = "select * from Familles";
//$dr1 = $cnx->query($req2);
//$x=$dr1->fetchAll();
//  var_dump($x);//pour afficher All object
//($x['description']);//Echo pour afficher seul fetch()


function ExecuteNonQuery($pdo,$req){
    return $pdo->exec($req);
}

function ExecuteReader($pdo,$req){
    return $pdo->query($req);
}


function ExecuteScalar($pdo,$req){
    $dr =  $pdo->query($req);
    $res = $dr->fetch();
    $dr->closeCursor();
    return $res;
}
?>