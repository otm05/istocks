<?php
require_once("../MyLibrery/connection.php");

class UnitesBD
{
    public $codeUnite;
    public $codeEntrFK;
    public $nomUnit;
    public $typeUnit;

    public function __construct($codeU,$codeE,$nomU,$typeU)
    {
        $this->codeUnite=$codeU;
        $this->codeEntrFK=$codeE;
        $this->nomUnit=$nomU;
        $this->typeUnit=$typeU;
    }

    public function AfficheUnite()
    {
        echo("CodeUnite=$this->codeUnite \nCodeEntreprise=$this->codeEntrFK \nNomUnit=$this->nomUnit \nTypeUnit=$this->typeUnit");
    }
    public function Rechercher()
    {
        $req="select * from Unites where codeUnit like '%$this->codeUnite%' and nomUnit like '%$this->nomUnitU%' and typeUnit like '%$this->typeUnit%'";
    }
   }