<?php
class ParcAuto {
    private $nom;
    private $adresse;
    private $voitures;
    public function __construct($nom,$adresse){
        $this->nom = $nom;
        $this->adresse = $adresse;
    }
    public function ajouterVoiture($v) {
        $this->voitures[]=$v;

    }
    // affichier voiture marque
public  function affichierVoitureMarque($marque){
    echo '------------ <br/>';
    echo 'voicie les voiture de la marque '.$marque ."<br/>";
    for($i=0; $i<count($this->voitures);$i++){
        if($this->voitures[$i]->getMarque() === $marque){
             echo $this->voitures[$i].'<br/>';
        }
     
    }
}
}
class Voiture {
    //declaration de variable 
    private $marque;
    private $modele;
    private $couleur;
    private $nbPortes;
    private $estElectrique;
    private $prixTTC;
    //constantes
    const MINI = 3;
    const NORMALE  =5;
    const TVA =20;
    // public static $voitures;
// contract function
  public function __construct($marque,$modele,$couleur,$nbPortes,$prixHT){
    $this->marque =$marque;
    $this->modele=$modele;
    $this->couleur=$couleur;
    $this->nbPortes;
    $this->estElectrique;
    $this->prixTTC = $prixHT + $prixHT * self ::TVA/100;

    // self ::$voitures[] = $this;
}
//hydrate function
public function hydrate($marque,$modele,$couleur){
    $this->marque = $marque;
    $this->modele = $modele;
    $this->couleur = $couleur;
    $this->nbPortes = 5;
    $this->estElectrique = false;
}
//afficher voiture function
public function __toString(){
    $txt='';
     $txt .= "la marque est ".$this->marque."<br/>";
     $txt .= "la modele est ".$this->modele."<br/>";
     $txt .= "la couleur est ".$this->couleur."<br/>";
     $txt .= "la nbPortes est ".$this->nbPortes."<br/>";
if($this->estElectrique){
    echo 'la voiture est electrique';
}
else{
    echo `la voiture n'est pas electrique`;
}
     $txt .= "la prixTTC est ".$this->prixTTC."<br/>";

return $txt;
}
//get and set  marque 
public function getMarque(){
    return $this->marque;
}
public function setMarque($marque){
     $this->marque=$marque;
}
//get and set  modele 
public function getModele(){
    return $this->marque;
}
public function setModele($modele){
     $this->modele=$modele;
}
//get and set  couleur 
public function getCouleur(){
    return $this->couleur;
}
public function setcouleur($couleur){
     $this->couleur=$couleur;
}
//get and set  NbPortes 
public function getNbPortes(){
    return $this->nbPortes;
}
public function setNbPortes($nbPortes){
     $this->nbPortes=$nbPortes;
}

//get and set  NbPortes 
public function getEstElectrique(){
    return $this->estElectrique;
}
public function setEstElectrique($estElectrique){
     $this->estElectrique=$estElectrique;
}
//get and set  NbPortes 
public function getPrix(){
    return $this->prix;
}
public function setPrix($prix){
     $this->prix=$prix;
}

}
//pricipal programe
//v1
$v1 = new Voiture('yota',"ryas","noir",Voiture::NORMALE,18000);
$v1 ->setEstElectrique(true);
//v2
$v2 = new Voiture('raisu',"ryas","rouge",Voiture::MINI,15000);
$v2-> setNbPortes('4');

//v3
$v3 = new Voiture('troen',"5C","rouge",Voiture::NORMALE,19000);
$v1 ->setEstElectrique(true);
 $parcMga = new ParcAuto('parc MGA',"12 rue...");
 $parcMga ->ajouterVoiture($v1);
 $parcMga ->ajouterVoiture($v2);
 $parcMga ->ajouterVoiture($v3);
 $parcMga ->affichierVoitureMarque("yota");
//show 3 cars in one table
// $tab =[$v1,$v2,$v3];
// for($i = 0; $i < count(Voiture::$voitures);$i++){
//     // echo $tab[$i];
//    echo Voiture::$voitures[$i];
//    echo '----------------.<br/>';
// }
// affichierVoitureMarque($tab,"raisu");
// Voiture::affichierVoitureMarque('raisu')

?>