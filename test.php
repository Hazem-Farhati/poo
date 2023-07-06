<?php
class Personne {
private $nom;
private $age;
private $sexe;

public function __construct($nom,$age,$sexe){
    $this->nom =$nom;
    $this->age=$age;
    $this->sexe=$sexe;
}
public function getNom(){
    return $this->nom;
}
public function setNom($nom){
    return $this->nom=$nom;
}

public function getAge(){
    return $this->age;
}
public function setAge($age){
    return $this->age=$age;
}

public function getSexe(){
    return $this->sexe;
}
public function setSexe($sexe){
    return $this->sexe=$sexe;
}
public function ditBonjour(){
    echo "Bonjour, c'est moi ".$this->nom."j'ai ".$this->age;
}
//to string function
public function __toString(){
    $txt = "";
    $txt .="bonjour c'est " .$this->nom."<br/>";
    $txt .="mon age est  " .$this->age."<br/>";
    $txt .=($this->sexe) ? "je suis un homme " :"je suis une femme"."<br/>";
    return $txt;
}

}
$personne1 = new Personne("hazem ",22,true);
// echo $personne1->ditBonjour(). "<br/>";
//  $personne1->setNom("nader ");
// echo $personne1->ditBonjour()."<br/>";
// $personne2 = new Personne("djo ",24,true);
// echo $personne2->ditBonjour();
echo $personne1

?>

