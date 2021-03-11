<?php
require_once("../MyLibrery/connection.php");

class CasierBD
{
    public $numCas;
    public $codeEntrFK;
    public $codeRangFk;
    public $form;
    public $descr;

    public function __construct($numC,$codeE,$codeR,$form,$descr)
    {
        $this->numCas=$numC;
        $this->codeEntrFK=$codeE;
        $this->codeRangFk=$codeR;
        $this->form=$form;
        $this->descr=$descr;
    }

    public function AfficherRang()
    {
        echo("NumCasier=$this->codeUnite \nCodeEntreprise=$this->codeEntrFK \CodeRang=$this->nomUnit \nForme=$this->forme \nDescription=$this->descr");
    }
    public function Rechercher()
    {
        $req="select * from Casiers where numCasier like '%$this->numCas%' and codeEntrfK like '%$this->codeEntrFK%' and codeRangFk like '%$this->codeRangFk%' and forme like '%$this->form%' and description like '%$this->descr%'";
    }
   }