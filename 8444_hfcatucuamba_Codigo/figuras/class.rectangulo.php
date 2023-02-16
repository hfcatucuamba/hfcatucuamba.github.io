<?php
	class rectangulo extends figura implements formulas{
		private $lado1;   
		private $lado2;  
		private $areaR;     
		private $perR;       
		private $tipo;    

		
		function __construct($l1, $l2) {			
			$this->lado1 = $l1;
			$this->lado2 = $l2;
			$this->tipo = get_class($this);
	    }

		
		public function GetArea() {
			return $this->areR;
		}

		
		public function GetPerimetro() {
			return $this->perR;
		}

		
		public function GetTipo() {
			return $this->tipo;
		}
		
		//Override
		public function area() {
			$this->areaR = $this->lado1 * $this->lado2;
		}
		
	
		public function perimetro() {
			$this->perR = ($this->lado1 + $this->lado2) * 2;
		}		
	}
?>
