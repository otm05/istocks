<?php
require_once("../MyLibrery/connection.php");

class CategoriesBD
{
    public $codeCat;
    public $codeEntrFk;
    public $codeFmlFk;
    public $nomCat;
    public $description;

    public function __construct($_codeCat,$_codeEntrFK,$codeFmlFK,$_nomCat,$_description)
    {
        $this->codeCat=$_codeCat;
        $this->codeEntrFk=$_codeEntrFK;
        $this->codeFmlFk=$codeFmlFK;
        $this->nomCat=$_nomCat;
        $this->description=$_description;
    }
    
    public function afficherCategoeies(){
        echo("CodeCat = $this->codeCat \nCodeEntr = $this->codeEntrFK \nCodeFml = $this->codeFmlFK \nNomCat = $this->nomCat \nadresse = $this->Description \nville = $this->description ");
    }

    // public function Ajouter(){
    //     if($this->GetByCode($this->codeCat)==0){
    //     $req ="insert into Categories values($this->codeCat,'$this->codeEntrFk','$this->codeFmlFk',$this->nomCat,'$this->description')";
    //      echo("\n req=$req\n");
    //     return $GLOBALS["cnx"]->exec($req); }
    //     else{return -1;}        
    // }
}
//$obj=new CategoriesBD('cat6','a1','L','desc6','pays6','Logo6');
//echo($obj);
?>