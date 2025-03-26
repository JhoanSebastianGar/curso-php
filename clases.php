<?php
/**
 * 
 */
class SuperHero 
{
/* propiedades */
	public function __construct(
	 	private  string $name,
		private array $powers,
		private string $planet	
	){
	}

	public function showall(){
		return get_object_vars($this);
	}

	public function attack(){
		return "$this->name";
	}
	//metodos
		public function descripcion(){
			$powers=implode( ",", $this->powers);
		return "$this->name,$powers,$this->planet
		";
	
	}

//generar un heroe aleatorio y crear instancia del objeto	
	public static function random(){
		$names=["super","batman"];
		$powers=[
		["volar","fuerza"],
		["volar","otro"],
		["volar","ninguno"]
	];
		$planets=["tierra","casa"];
		$name=$names[array_rand($names)];
		$power=$powers[array_rand($powers)];
		$planet=$planets[array_rand($planets)];
		echo $name." ,".$planet." ,".implode( ", ", $power);
		return  new self($name,$planet,$power);
	}
}

//metodo estaticos
$hero =SuperHero::random();
$hero->$hero->descripcion();

/* metodo publicos
$hero= new SuperHero("SUPERMAN",["RAYOS","FUERZA"],"TIERRA");
echo $hero->descripcion();
var_dump($hero->showall());
*/
?>