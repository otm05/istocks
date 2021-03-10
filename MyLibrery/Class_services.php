<?php
//                                                pages Des Services 
//otmane015
//*********************************************** class Entreprises : ***************************************************

class Entrprises{
    public $CodeEntr;
    public $NomEntr;
    public $_description;
    public $secteurEntr ;
    public $adresse ;
    public $ville;
    public $codePostal;
    public $pays; 
    public $email; 
    public $fix; 
    public $fax; 
    public $siteWeb; 
    public $fullNameContact; 
    public $gsmContact;
    public $logoEntr; 
    public $codeDGFK1; 
    public $codeDGFK2; 
    public $EtatEntr; 

    
    //constructeur par initial :
    public function Entreprises($CodeEntr,$NomEntr,$_description,$secteurEntr,$adresse,$ville,$codePostal,$pays,$email,$fix,$fax,$siteWeb,$fullNameContact,$gsmContact,$logoEntr,$codeDGFK1,$codeDGFK2,$EtatEntr){
            $this->CodeEntr=$CodeEntr;
            $this->NomEntr=$NomEntr;
            $this->_description=$_description;
            $this->secteurEntr=$secteurEntr;
            $this->adresse=$adresse;
            $this->ville=$ville;
            $this->codePostal=$codePostal;
            $this->pays=$pays;
            $this->email=$email;
            $this->fix=$fix;
            $this->fax=$fax;
            $this->siteWeb=$siteWeb;
            $this->fullNameContact=$fullNameContact;
            $this->gsmContact=$gsmContact;
            $this->logoEntr=$logoEntr;
            $this->codeDGFK1=$codeDGFK1; 
            $this->codeDGFK2=$codeDGFK2; 
            $this->EtatEntr=$EtatEntr;
    }

    //Methode Afficher
    public function afficherEntreprises(){
        echo("CodeEntr = $this->CodeEntr \nNomEntr = $this->NomEntr \n_description = $this->_description \nsecteurEntr = $this->secteurEntr \nadresse = $this->adresse \nville = $this->ville \ncodePostal = $this->codePostal \npays = $this->pays \nemail = $this->email \nfix = $this->fix \nfax = $this->fax \nsiteWeb = $this->siteWeb \nfullNameContact = $this->fullNameContact \ngsmContact = $this->gsmContact \nlogoEntr = $this->logoEntr \ncodeDGFK1 = $this->codeDGFK1 \ncodeDGFK2 = $this->codeDGFK2 \nEtatEntr = $this->EtatEntr");
    }
}


//*********************************************** class Poles : ************************//otmane015***************************
class Poles{
    //1
    public $codePL;
    public $CodeEntrFK;
    public $NomPL;
    public $_description;
    public $secteurPL;
    public $adresse;
    public $ville;
    public $codePostal;
    public $pays;
    public $email;
    public $fix;
    public $fax;
    public $siteWeb;
    public $fullNameContact;
    public $gsmContact;
    public $logoPL;
    public $codeDPLFK1;
    public $codeDPLFK2;

    //Constructeur initial :
    public function Poles($codePL,$CodeEntrFK,$NomPL,$_description,$secteurPL,$adresse,$ville,$codePostal,$pays,$email,$fix,$fax,$siteWeb,$fullNameContact,$gsmContact,$logoPL,$codeDPLFK1,$codeDPLFK2){
            $this->codePL=$codePL;
            $this->CodeEntrFK=$CodeEntrFK;
            $this->NomPL=$NomPL;
            $this->_description=$_description;
            $this->secteurPL=$secteurPL;
            $this->adresse=$adresse;
            $this->ville=$ville;
            $this->codePostal=$codePostal;
            $this->pays=$pays;
            $this->email=$email;
            $this->fix=$fix;
            $this->fax=$fax;
            $this->siteWeb=$siteWeb;
            $this->fullNameContact=$fullNameContact;
            $this->gsmContact=$gsmContact;
            $this->logoPL=$logoPL;
            $this->codeDPLFK1=$codeDPLFK1;
            $this->codeDPLFK2=$codeDPLFK2;
    }
    
    //Methode Affichage
    public function afficherPoles()
    {
        echo("$this->codePL\n$this->CodeEntrFK\n$this->NomPL\n$this->_description\n$this->secteurPL\n$this->adresse\n$this->ville\n$this->codePostal\n$this->pays\n$this->email\n$this->fix\n$this->fax\n$this->siteWeb\n$this->fullNameContact\n$this->gsmContact\n$this->logoPL\n$this->codeDPLFK1\n$this->codeDPLFK2");
    }
    

}

//****************//otmane015******************************* class Departements : ***************************************************
class Departements{

    public $CodeEntrFK;
    public $CodePLFK;
    public $NomDep;
    public $_description;
    public $secteurPL;
    public $adresse;
    public $ville;
    public $codePostal;
    public $pays;
    public $email;
    public $fix;
    public $fax;
    public $siteWeb;
    public $fullNameContact;
    public $gsmContact;
    public $logoDep;
    public $codeCDFK1;
    public $codeDCDFK2;

    //constructeur par initial :
    public function Departements($codeDep,$CodeEntrFK,$CodePLFK,$NomDep,$_description,$secteurPL,$adresse,$ville,$codePostal,$pays,$email ,$fix,$fax,$siteWeb,$fullNameContact,$gsmContact,$logoDep,$codeCDFK1,$codeDCDFK2 ){
        $this->codeDep=$codeDep;
        $this->CodeEntrFK=$CodeEntrFK;
        $this->CodePLFK=$CodePLFK;
        $this->NomDep=$NomDep;
        $this->_description=$_description;
        $this->secteurPL=$secteurPL;
        $this->adresse=$adresse;
        $this->ville=$ville;
        $this->codePostal=$codePostal;
        $this->pays=$pays;
        $this->email=$email;
        $this->fix=$fix;
        $this->fax=$fax;
        $this->siteWeb=$siteWeb;
        $this->fullNameContact=$fullNameContact;
        $this->gsmContact=$gsmContact;
        $this->logoDep=$logoDep;
        $this->codeCDFK1=$codeCDFK1;
        $this->codeDCDFK2=$codeDCDFK2;//otmane015
    }

    //Methode Afficher
    public function afficherDeppartements(){
        echo("$this->codeDep\n$this->CodeEntrFK\n$this->CodePLFK\n$this->NomDep\n$this->_description\n$this->secteurPL\n$this->adresse\n$this->ville\n$this->codePostal\n$this->pays\n$this->email\n$this->fix\n$this->fax\n$this->siteWeb\n$this->fullNameContact\n$this->gsmContact\n$this->logoDep\n$this->codeCDFK1\n$this->codeDCDFK2\n");
    }
}
    

//****************//otmane015******************************* class Services : ***************************************************
class Services{
    public $codeSrv; 
    public $CodeEntrFK;
    public $CodeDepFK; 
    public $NomSrv; 
    public $_description; 
    public $fix; 
    public $fax; 
    public $codeCDFK1;
    public $codeCDFK2;

    //constructeur par initial :
    function Services($codeSrv,$CodeEntrFK,$CodeDepFK,$NomSrv,$_description,$fix,$fax,$codeCDFK1,$codeCDFK2){
        $this->codeSrv=$codeSrv;
        $this->CodeEntrFK=$CodeEntrFK;
        $this->CodeDepFK=$CodeDepFK;
        $this->NomSrv=$NomSrv;
        $this->_description=$_description;
        $this->fix=$fix;
        $this->fax=$fax;
        $this->codeCDFK1=$codeCDFK1;
        $this->codeCDFK2=$codeCDFK2;
    }

    //Methode Afficher : 
    function afficherServices(){
        echo("$this->codeSrv\n$this->CodeEntrFK\n$this->CodeDepFK\n$this->NomSrv\n$this->_description\n$this->fix\n$this->fax\n$this->codeCDFK1\n$this->codeCDFK2");
    }
}


//*********************************************** class Services : ***********************************//otmane015****************

class Collaborateurs{
    //1
    public $matricule;
    public $CodeEntrFK;
    public $nom;
    public $prenom;
    public $nomArabe;
    public $prenomArabe;
    public $cin;
    public $civilite;
    public $nationalite;
    public $email;
    public $gsm;
    public $adresse;
    public $ville;
    public $codePostal;
    public $pays;
    public $photo;
    public $fonction;
    public $grade;
    public $echelle;
    public $echellon;
    public $_description;
    public $codeSrvFK1;
    public $codeEntrFK2;
    public $typeContrat;
    public $numContrat;
    public $etatColabo;


    //Constructeur initial :
    function Collaborateurs($matricule,$CodeEntrFK,$nom,$prenom,$nomArabe,$prenomArabe,$cin,$civilite,$nationalite,$email,$gsm,$adresse,$ville,$codePostal,$pays,$photo,$fonction,$grade,$echelle,$echellon,$_description,$codeSrvFK1,$codeEntrFK2,$typeContrat,$numContrat,$etatColabo){
        $this->matricule=$matricule;
        $this->CodeEntrFK=$CodeEntrFK;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->nomArabe=$nomArabe;
        $this->prenomArabe=$prenomArabe;
        $this->cin=$cin;
        $this->civilite=$civilite;//otmane015
        $this->nationalite=$nationalite;
        $this->email=$email;
        $this->gsm=$gsm;
        $this->adresse=$adresse;
        $this->ville=$ville;
        $this->codePostal=$codePostal;
        $this->pays=$pays;
        $this->photo=$photo;
        $this->fonction=$fonction;
        $this->grade=$grade;
        $this->echelle=$echelle;
        $this->echellon=$echellon;
        $this->_description=$_description;
        $this->codeSrvFK1=$codeSrvFK1;
        $this->codeEntrFK2=$codeEntrFK2;
        $this->typeContrat=$typeContrat;
        $this->numContrat=$numContrat;
        $this->etatColabo=$etatColabo;
    }

    //Methode Afficher
    function afficherCollaborateurs()
    {
        echo("$this->matricule\n$this->CodeEntrFK\n$this->nom\n$this->prenom\n$this->nomArabe\n$this->prenomArabe\n$this->cin\n$this->civilite\n$this->nationalite\n$this->email\n$this->gsm\n$this->adresse\n$this->ville\n$this->codePostal\n$this->pays\n$this->photo\n$this->fonction\n$this->grade\n$this->echelle\n$this->echellon\n$this->_description\n$this->codeSrvFK1\n$this->codeEntrFK2\n$this->typeContrat\n$this->numContrat\n$this->etatColabo\n");
    }
}
?>