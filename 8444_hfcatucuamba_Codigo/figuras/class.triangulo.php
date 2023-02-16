<?php
	class triangulo extends figura implements formulas{
		private $lado1;  
		private $lado2;   
		private $lado3;   
		private $areaT;       
		private $perT;       
		private $tipo;    


		function __construct($l1, $l2, $l3) {
			$this->lado1 = $l1;
			$this->lado2 = $l2;
			$this->lado3 = $l3;
			$this->tipo = get_class($this);
	    }

	
		public function GetArea() {
			return $this->areaT;
		}


		public function GetPerimetro() {
			return $this->perT;
		}


		public function GetTipo() {
			return $this->tipo;
		}
		
	
		public function area() {
			$this->perimetro(); 						//Perimetro
			$semi = $this->GetPerimetro()/2;            //Semiperimetro
			$this->areaT = number_format(sqrt($semi * ($semi - $this->lado1) * ($semi - $this->lado2) * ($semi - $this->lado3)), 2);
		}
		

		public function perimetro() {
			$this->perT = $this->lado1 + $this->lado2 + $this->lado3;
		}
	}
?>

