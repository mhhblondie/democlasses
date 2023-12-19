<?php ///demo_dev_objet/transport.php

class Transport{

	//on liste les propriété de l'objet, elles sont tout en private
	protected $_name;
	protected $_engine;
	protected $_wheels;
	

	/* CONSTRUCTEURS */
	//le constructeur a besoin de 2 parametres obligatoiremetn, un pour la designation et un pour avoir un moteur ou pas
	//ensuite on peut eventuellement ajouter une 3e parametre pour le nombre de roue
	public function __construct($name, $engine, $wheels = null){
	
		//on accede à la propriété $_engine pour lui affecter la valeur du parametre
		$this->_engine = boolval($engine);
		$this->_name = $name;
		
		$this->_wheels = intval($wheels);

	}

	/* SETTERS */
	//on crée des setter pour modifier les propriétés
	public function setName ($t){
		$this->_name = $t;
	}
	public function setEngine ($b){
		$this->_engine = $b;
	}
	public function setWheels ($i){
		$this->_wheels = $i;
	}

	/* GETTERS */
	//on cree un getter pour les propriétés
	public function engine(){
		return $this->_engine;
	}

	public function wheels(){
		return $this->_wheels;
	}

	public function name(){
		return $this->_name;
	}

	/* ACTIONS */
	public function print(){
		if ($this->_engine) 
			$eng = 'possède un';
		else
			$eng = 'ne possède pas de';

		echo '<p>Le transport s\'apelle <strong>'.$this->_name.'</strong>.
		Il a <strong>'.$this->_wheels.'</strong> roues
		Il '.$eng.' moteur.
		</p>';


		/*une autre maniere déecrire le test, en utilisant un operateur terniere*/
		/*echo '<p>
		Le transport s\'apelle <strong>'.$this->_name.'</strong>.
		Il a <strong>'.$this->_wheels.'</strong> roues
		Il '.( ($this->_engine) ? 'possède un' : 'n\'a pas de ').' moteur.
		 </p>';*/
	}
}

//on cree une classe Car qui hérite de la classe Transport
//elle a toutes les caractéristiques de transport et elle peut en avoir un plus
class Car extends Transport{

	protected $_color;
	protected $_km = 0;

	public function __construct($n, $c){
		//on fait au constructeur de la classe parent
		parent::__construct($n, true, 4);

		$this->_color = $c;
	}

	public function drive($n){
		//ajoute la quantité au compteur
		$this->_km += (int) $n;
	}

	public function print(){
		echo '<p>
		<strong>'.$this->_name.'</strong> est une voiture de couleur <strong>'.$this->_color.'</strong>.
		Elle a '.$this->_km.' km au compteur</p>';
	}

}

class Bike extends Transport{

	protected $_color;
	protected $_ndisks;

	public function __construct($n, $c, $d){
		//on fait au constructeur de la classe parent
		parent::__construct($n, false, 2);

		$this->_color = $c;
		$this->_ndisks = intval($d);
	}

    public function setDesignation($d){
        $this->_designation = $d;
    }
    public function setAdress($d){
        $this->_adress = $a;
    }
    

	public function display(){
		echo '<article> 
        <h1>'.$this->_designation.' </h1>
        <p>'.$this->_adress.'</p>
        <h2>Sa flotte</h2>
        <p>Rien à louer</p>
        </article>
        ';
	}

}

$e1 = new Transport ('Camion alpha', true, 6);
$e1->print();
$e2 = new Transport ('Titine', false);
$e2->print();
$e2->setName('Nouveau Nom');
$e2->print();
$e1->setWheels(24);
$e1->setEngine(false);
$e1->print();
$v1 = new Car('Twingo', 'bleue');
$v1->print();
$v1->drive(45);
$v1->print();
$v1->drive(145);
$v1->print();
$b1 = new Bike('VTT','violet', '3');
$b1->print();
``

}
echo '<hr>';

$bob = new Owner('les locations de Bob', 'quelque part');
$bob->display();