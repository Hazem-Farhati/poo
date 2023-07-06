<?php
class Biblio{
    private $romans;
    private $bds;
    private $policiers;

    public function __construct(){  
    }

    public function ajouterLivre($livre){
        if($livre->getType() === "roman"){
            $this->romans[] = $livre;
        } else if ($livre->getType() === "bd"){
            $this->bds[] = $livre;
        } else if ($livre->getType() === "policier"){
            $this->policiers[] = $livre;
        }
    }

    public function __toString()
    {
        $txt ="";
        $txt .= "*********** Romans ************** <br />";
        for($i = 0 ; $i < count($this->romans); $i++){
            $txt .= $this->romans[$i];
        }
        $txt .= "*********** BDS ************** <br />";
        for($i = 0 ; $i < count($this->bds); $i++){
            $txt .= $this->bds[$i];
        }
        $txt .= "*********** Policiers ************** <br />";
        for($i = 0 ; $i < count($this->policiers); $i++){
            $txt .= $this->policiers[$i];
        }
        
        return $txt;
    }
}
class Livre {
    public $titre;
    public $nbPages;
    private $couleurCouverture;
    private $estTraduitEnAnglais;
    private $type;

    public function __construct($nom,$nb,$couleur,$traduction, $type)
    {
        $this->titre = $nom;
        $this->nbPages = $nb;
        $this->couleurCouverture = $couleur;
        $this->estTraduitEnAnglais = $traduction;
        $this->type = $type;
    }

    public function setCouleurCouverture($couleur){
        $this->couleurCouverture = $couleur;
    }

    private function traductionAnglaise(){
        $this->estTraduitEnAnglais = true;
    }

    public function getType(){
        return $this->type;
    }
    public function setType($type){
        $this->type = $type;
    }

    public function __toString(){
        $txt = "";
        $txt .= "Livre : ". $this->titre. "<br />";
        $txt .= "Nb pages : : ". $this->nbPages. "<br />";
        $txt .= "Couverture : ". $this->couleurCouverture. "<br />";
        if($this->estTraduitEnAnglais){
            $txt .= "Livre traduit en anglais";
        } else {
            $txt .= "Livre non traduit en anglais";
        }
        $txt .= "<br />";
        return $txt;
    }

    public function ajouterPages($nbAAjouter){
        $this->nbPages += $nbAAjouter;
    }

    public function basculerEnAnglais(){
        $this->traductionAnglaise();
        $this->ajouterPages(5);
        $this->setCouleurCouverture("verte");
    }
}
//pricipal programe
$livre1 = new Livre ('H2PROG ',500,"noir ",false,"roman");
$livre2 = new Livre ('12 ',500,"noir ",false,"roman");
$livre3 = new Livre ('13 ',500,"noir ",false,"bd");
$livre4 = new Livre ('14 ',500,"noir ",false,"policier");
$livre5 = new Livre ('15 ',500,"noir ",false,"roman");
$livre6 = new Livre ('16 ',500,"noir ",false,"roman");

$biblioMGA = new Biblio();
$biblioMGA ->ajouterLivre($livre1);
$biblioMGA ->ajouterLivre($livre2);
$biblioMGA ->ajouterLivre($livre3);
$biblioMGA ->ajouterLivre($livre4);
$biblioMGA ->ajouterLivre($livre5);
$biblioMGA ->ajouterLivre($livre6);
echo $biblioMGA;

// echo $livre1->afficherLivre()."<br/>";
// $livre1->setTitre('algo H2PROG ');
// echo $livre1->afficherLivre()."<br/>";
//  $livre1->ajouterPages(10);
// $livre1->setCouleurCouverture('rose');
// echo $livre1->afficherLivre()."<br/>";
// $livre1->basculerEnAnglais();
// echo $livre1->afficherLivre()."<br/>";
?>