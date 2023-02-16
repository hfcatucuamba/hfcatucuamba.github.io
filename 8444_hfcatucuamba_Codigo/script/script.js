function habilitarCaja() {
    var caja = document.getElementsByName("tipo")[0].value;
    switch (caja) {    
    	case 'cuadrado':
    		for (var i=0; i<=2; i++) {
				if(i == 0) {
					document.getElementsByTagName("input")[i].disabled = false;
					document.getElementsByTagName("input")[i].value = "0";
				} else {
					document.getElementsByTagName("input")[i].disabled = true;
					document.getElementsByTagName("input")[i].value = "";
				}
			}    		    
			break;

		case 'rectangulo':
			for (var i=0; i<=2; i++) {				
				if(i != 2) {
					document.getElementsByTagName("input")[i].disabled = false;
					document.getElementsByTagName("input")[i].value = "0";
				} else {
					document.getElementsByTagName("input")[i].disabled = true;
					document.getElementsByTagName("input")[i].value = "";
				}
			}			
			break;

		case 'triangulo':
			for (var i=0; i<=2; i++) {
				document.getElementsByTagName("input")[i].disabled = false;
				document.getElementsByTagName("input")[i].value = "0";
			}			
			break;

		default:
			for (var i=0; i<=2; i++) {
				document.getElementsByTagName("input")[i].disabled = true;
				document.getElementsByTagName("input")[i].value = "";
			}
			break;
	}
}