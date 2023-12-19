<style>
    article{
        border: 1px solid grey;
        margin-bottom: 10px;
    }
</style>
<?php /*democlasses/index.php */


class User {

    //on liste les propriétés de l'objet, elles sont toutes en private*/
    private $_name;
    private $_firstname;
    private $_email;
    private $_password;
    private $_birthday;

    /* CONSTRUCTEURS */

   //on crée le constructeur qui nous permet de créer une nouvelle instance de l'objet
   public function __construct($email, $pass){
       if(empty($email))
           $email = 'email@vide.fr';

       if(empty($pass))  
         $pass = 'azerty'; 

       //on accede à la propriété $_email pour lui affecter la valeur du paramètre
       $this->_email = $email;
       // a l'initialisation , on pense bien à crypter le mot de passe
       $this->_password = hash('sha512', $pass); 
   }

     
      /* SETTERS */
      
    //on crée des setter pour modifier les propriétés
   public function setName($t){
       $this->_name = $t;
   }
   public function setFirstname($t){
       $this->_firstname = $t;
}
public function setBirthday($d){
    //on creer un objet de type DateTime pour la propriété _birthday
    $this->_birthday = new DateTime($d);
}


   //on crée un gatter pour acceder au contenu de la propriété email
     public function email(){
         return $this->_email;
     }
     public function birthday(){
        return $this->_birthday->format('d/m/Y');
     }
     public function name(){
        return $this->_name;
    }

    public function firstname(){
        return $this->_firstname;
    }

    public function fullname(){
        if(empty($this->_firstname) && empty($this->_name))
        return $this->_email;
        else
       return $this->_firstname. ' '.$this->_name;
    }

    /* ACTIONS */

    //On créé des setters pour modifier les propriétés

    public function hello(){
        return 'Le personnage '.$this->fullname().' dit `Bonjour`';
    }
   
    public function say($t){
        return 'Le personnage '.$this->fullname().' dit `'.$t.'`';
    }
}


function dump($x){
    echo '<article><pre>';
    
   var_dump($x);

    echo '</article></pre>';
}


echo '<p>on cree une instance de l/objet User</p>';
$u1 = new User('toto@toto.fr', '1234');   
dump($u1);

echo '<p>on utilise la methode email() pour acceder au contenu de cette propriété</p>';
dump($u1->email());

echo '<p>on utilise la methode setName() pour lui affecter un name</p>';
$u1->setName('Toto');
dump($u1);


echo '<p>on utilise la methode les setters pour lui affecter les autres propriétés</p>';
$u1->setFirstname('Bob');
$u1->setBirthday('2000-10-03');
dump($u1);

echo '<p>on utilise le getterde birthday</p>';
dump($u1->birthday());

dump($u1->fullname());

dump($u1->hello());

dump($u1->say('Je ne sais pas quoi'));
dump($u1->say('autre chose'));

echo '<p>on cree une instance de l/objet User</p>';
$u2 = new User('jonsno<@got.fr', '1youknownothin');   
dump($u2);

$u2->setName('Snow');
$u2->setFirstname('Jon');
dump($u2->say('You know nothing'));

$nobody = new User('', '');
dump($nobody->say('Rien du tout'));