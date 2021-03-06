
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
  <form name="Form" id="registerForm" action="../Controllers/Pistas_Controller.php" method="post" onsubmit="return comprobarPista(this)" >
    <legend><?php echo $strings['Añadir pista']; ?>
	<!--Boton para volver atrás -->
    <button type="button" onclick="location.href='../Controllers/Pistas_Controller.php';" class="volver"></button>
    </legend>
	
	
<!--Campo nombre de la pista-->
    <div>	
      <label ><?php echo $strings['Nombre de la pista']; ?></label>
      <input type="text" id="Nombre_Pista" name="Nombre_Pista" size="50" onblur=" return !comprobarVacio(this) && comprobarTextoyNumeros(this,45);">
      
      <label for="techo"><?php echo $strings['Cubierta']; ?></label>
	  <select name="techo" id="techo">
		<option value="Interior"><?php echo $strings['Interior']; ?></option>
		<option value="Exterior"><?php echo $strings['Exterior']; ?></option>
	  </select>
	  
	  <label for="suelo"><?php echo $strings['Suelo']; ?></label>
	  <select name="suelo" id="suelo">
		<option value="Dura"><?php echo $strings['Dura']; ?></option>
		<option value="Blanda"><?php echo $strings['Blanda']; ?></option>
	  </select>
      
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