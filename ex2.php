<?php 
class Personage {
        //declaration de variable 
    private $nom;
    private $classe;
    protected $attaque;
    protected $pv;
    private $forceDuBien;
// contract function
    public function __construct($nom,$classe,$attaque,$pv,$forceDuBien){
        $this->nom = $nom;
        $this->classe = $classe;
        $this->attaque = $attaque;
        $this->pv = $pv;
        $this->forceDuBien = $forceDuBien;
    }
    //function toString
    public function __toString(){
        $result ="";
        $result .= "mon nom est ".$this->nom."<br/>";
        $result .= "mon class est ".$this->classe."<br/>";
        $result .= "mon degat est ".$this->attaque."<br/>";
        $result .= "mon pv est ".$this->pv."<br/>";
        $result .= ($this->forceDuBien) ? "j ai la force " : "j ai pas "."<br/>";
        return $result;
    }
    //show person function
    public function affichePerso(){
        echo "hello ,my name is ". $this->nom."i'm ".$this->classe;
    }
    //calcul 
    private function calculDegat(){
      return $this->pv / 100 * $this->attaque + 1;
    }
    //show degat
    public function afficherDegat(){
        echo "dégats inligé ".$this->calculDegat()." dégats";
    }
}
//heritage
//class humain
class Humain extends Personage{
    private $level;
    
    public function __construct($nom,$classe,$attaque,$pv,$forceDuBien,$level){
        parent::__construct($nom,$classe,$attaque,$pv,$forceDuBien);
        $this->level = $level;
    }
    public function __toString(){
        $txt="";
        $txt .= parent::__toString();
        $txt .= "Level : ". $this->level . "<br/>";
        return $txt;
    }
    public function gangneLevel(){
        $this->level++;
    }
    public function modifStats($attaque,$pv){
        $this->attaque=$attaque;
        $this->pv=$pv;
        $this->afficherDegat();
        echo "<br/> mes pv sont de ".$this->pv;
    }
}
//class zombi
class Zombi extends Personage{
    private $vitesse ; 
    private const DEGATZOMBIE = 10 ;
    // public static $zombies; //tab

  public function __construct($nom,$classe,$pv,$forceDuBien,$vitesse){
        parent::__construct($nom,$classe,self::DEGATZOMBIE,$pv,$forceDuBien);
        $this->vitesse = $vitesse;
        //  self ::$zombies[] = $this;
    }
    public function setVitesse($vitesse){
        $this->vitesse = $vitesse;
    }
    private function calculDegat(){
        return $this->attaque;
    }
       //show degat
    public function afficherDegat(){
        echo "dégats inligé ".$this->calculDegat()." dégats";
    }
    public function __toString(){
        $txt = "zombie en approche !!! <br/>";
        $txt .= parent::__toString();
        $txt .= "Vitesse : " .$this->vitesse."<br/>";
        return $txt;
    }
//     public static function affichierZombies(){
//         echo 'voicie les zombies !! <br/>';
//         for($i = 0;$i <= count(self::$zombies)-1;$i++){
//             echo self::$zombies[$i];
// echo "------------".'<br/>';

//         }
//     }
}

   class Jeu{
    private $nom;
    private $zombies;
    private $humains;

        public function __construct($nom){
        $this->nom = $nom;
        }
        public function ajouterZombie($z){
            $this->zombies[]= $z;
        }
         public function ajouterHumain($h){
            $this->humains[]= $h;
        }
        public function __toString(){
            $txt="nom de jeux".$this->nom."<br/>";
            $txt.="**********************<br/>";
            $txt.="voicie les zombie <br/>";

            for($i = 0;$i<count($this->zombies);$i++){
                $txt .= $this->zombies[$i];
            }
              $txt.="**********************<br/>";
            $txt.="voicie les humain <br/>";
              for($i = 0;$i<count($this->humains);$i++){
                $txt .= $this->humains[$i];
            }
            return $txt;
        }
    }
//princpal program
// $perso1 = new Personage("Milio ","guerrier ",10,100,true);
// $perso2 = new Personage("Tya ","archére ",5,50,true);
// $perso3 = new Personage("Lili ","archére ",10,55,false);
// $perso4 = new Personage("Gael ","voleur ",2,10,false);

$perso1 = new Humain("Milio ","guerrier ",10,100,true,2);
$perso2 = new Humain("Tya ","archére ",5,50,true,3);
$perso3 = new Humain("Lili ","archére ",10,55,false,4);
$perso4 = new Humain("Gael ","voleur ",2,10,false,1);


// echo $perso1-> affichePerso()."<br/>";
// echo $perso2-> affichePerso()."<br/>";
// echo $perso3-> affichePerso()."<br/>";
// echo $perso4-> affichePerso()."<br/>";
// echo $perso1-> afficherDegat()."<br/>";
// echo $perso2-> afficherDegat()."<br/>";
// echo $perso3-> afficherDegat()."<br/>";
// echo $perso4-> afficherDegat()."<br/>";
// echo $perso1.'<br/>';
// echo "------------".'<br/>';
// echo $perso2.'<br/>';
// echo "------------".'<br/>';
// echo $perso3.'<br/>';
// echo "------------".'<br/>';
// echo $perso4;
// echo "------------".'<br/>';

// $perso1->modifStats(10,30)

$zombi1 = new Zombi('z1','zombi',100,false,4);

$zombi2 = new Zombi('z2','zombi',100,false,4);
$zombi3 = new Zombi('z3','zombi',100,false,4);
$zombi4 = new Zombi('z4','zombi',100,false,4);
$zombi5 = new Zombi('z5','zombi',100,false,4);


// echo $zombi1;
// $zombi1->afficherDegat()
// Zombi::affichierZombies();
$jeuMGA = new Jeu("jeu mga");
$jeuMGA -> ajouterZombie($zombi1);
$jeuMGA -> ajouterZombie($zombi2);
$jeuMGA -> ajouterZombie($zombi3);
$jeuMGA -> ajouterZombie($zombi4);
$jeuMGA -> ajouterZombie($zombi5);

$jeuMGA -> ajouterHumain($perso1);
$jeuMGA -> ajouterHumain($perso2);
$jeuMGA -> ajouterHumain($perso3);
$jeuMGA -> ajouterHumain($perso4);
echo $jeuMGA;
?>