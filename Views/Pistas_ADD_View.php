<!-- FORMULARIO PARA AÑADIR UNA PISTA
CREADO POR: Los Cangrejas
Fecha: 20/12/2018-->
 
 <?php
 //Declaracion de la clase 
 class Pistas_ADD{	 
	
	//Variable con el enlace al form de ADD pista
	var $enlace;	
	//Constructor de la clase
	function __construct($enlace){
		
		$this -> enlace = $enlace;
		$this -> mostrar();
	}
	//Funcion que "muestra" el contenido de la página
	function mostrar(){
  //Variable de idioma
  if(!isset($_SESSION['idioma'])){
    $_SESSION['idioma'] = 'SPANISH';
  }
//Archivo del idioma
  include '../Locales/Strings_'. $_SESSION['idioma'] .'.php'; 
	 	 
?>

<!--Formulario para añadir categoria-->
  <form name="Form" id="registerForm" action="../Controllers/Pistas_Controller.php" method="post" onsubmit="return comprobarCategoria(this);" >
    <legend><?php echo $strings['Añadir pista']; ?>
	<!--Boton para volver atrás -->
    <button type="button" onclick="location.href='../Controllers/Pistas_Controller.php';" class="volver"></button>
    </legend>
	
	
<!--Campo nombre de la pista-->
    <div>	
      <label ><?php echo $strings['Nombre de la pista']; ?></label>
      <input type="text" id="Nombre_Pista" name="Nombre_Pista" size="50" onblur=" return !comprobarVacio(this) && comprobarTexto(this,45);">
      
      
      
    </div>
    <!--Boton de confirmar inserción-->
    <button type="submit" name="action" value="Confirmar_ADD2" class="aceptar"></button>
	<!--Boton de borrado de texto-->
    <button type="reset" value="Reset" class="cancelar"></button>

	</form>
 
 
 <?php
  }
}
 ?>