<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "icon" href="../img/logo_title1.png" type ="image/x-icon">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style_contenu.css">

<style>
  body{
background-color: #E6E6E6;
}
.sidenav{
  height: 100%;
  width: 200px;
  position: fixed;
  overflow: hidden;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 0px;
}


.sidenav a{
  user-select: none;
  padding: 10px 8px 10px 16px;
  margin-top: 10px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

.sidenav a:hover{
  color: #111111;
  background-color: #E6E6E6;
}

.active {
  background-color: #E6E6E6;
  color: #111111;
}


.mainGlobal{
  margin-left: 200px; 
  font-size: 20px; 
  padding: 0px 10px;
}

.sidenav #home{
  text-align: left;
  font-family: "RocknRoll One";
  margin-top: 0px;
  margin-bottom: 20px;
  border: 1px solid #E6E6E6;
  color: #111111;
  background-color: #E6E6E6;
  padding: 5px;
  user-select: none;
  font-size: 30px;
  padding-left: 30px;
}

.sidenav #home:hover{
  color: #111111;
  background-color: #E6E6E6;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<div class="sidenav">
  <a id="home" href="../index.php">Istocks</a></h1>
  <a href="#">Entreprises</a>
  <a href="#">Poles</a>
  <a href="../Pages/Cslt_dep.php">departements</a>
  <a href="../Pages/Cslt_Services.php">services</a>
  <a href="../Pages/Cslt_Collabo.php">collaborateurs</a>
  <a href="../pages/GestionFournisseurs.php">Fournisseurs</a>
  <a href="../pages/GestionUnites.php">Unites</a>
  <a href="../pages/GestionCategories.php">Categories</a>
  <a href="../pages/GestionCasiers.php">Casiers</a>
  <a href="../pages/GestionFamilleConsultation.php">Familles</a>
  <a href="../pages/GestionMarquesConsultation.php">Marques</a>
  <a href="../pages/GestionMagasinsConsultation.php">Magasin</a>
  <a href="../pages/GestionRangConsultation.php">rang</a>
</div>
<div class="mainGlobal">
