
<?php

 //Declaracion de la clase 
class MESSAGE_Pago{

 //Cadena que se muestra como mensaje
	var $string; 
	//Enlace para volver a otra pagina
	var $enlace1;

//Constructor de la clase
	function __construct($string, $enlace1){
		$this->string = $string;
		$this->enlace1 = $enlace1;	
		$this->render();
	}
	//Funcion que "muestra" el contenido de la página
	function render(){
		//Variable de idioma
if(!isset($_SESSION['idioma'])){
            $_SESSION['idioma'] = 'SPANISH';
        }
		//Archivo de idioma
		include '../Locales/Strings_'.$_SESSION['idioma'].'.php';
		//Header
		include_once '../Views/Header.php';
?>
		<div class ="prueba">
		<p>
		<H3 style="text-align:center;margin-top: 15%">
<?php		
		//Aqui se muestra el mensaje
		echo $strings[$this->string];

		
?>
		</H3>
		</p>
		<br>
		<br>
		<br>
<button class="paypal" style="display: inline;"><a style="color:white" href="https://www.paypal.com/es/home" target = "_blank">a</a></button>
<?php			
echo '<button class="volver_centrado" style="display: inline;margin-left:10%;" onclick=location.href=\'' . $this->enlace1 . "'> </button>";
		//Pie
		include_once '../Views/Footer.php';
	} //fin metodo render

}
?>
</div>