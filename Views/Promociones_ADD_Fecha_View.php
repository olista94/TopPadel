<!-- FORMULARIO PARA AÑADIR UNA FASE A UNA TAREA
CREADO POR: Los Cangrejas
Fecha: 26/12/2018-->

<?php
 //Declaracion de la clase 
class Promociones_ADD_Fecha{
	 //Id de la tarea a la que pertenece la fase a añadir

	//Variable con el enlace al form de ADD fase
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
<!--Formulario para añadir fase-->
		<div class="form">

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Promociones_Controller.php" enctype="multipart/form-data">
				<legend><?php echo $strings['Añadir promocion'];?>
				
				</legend>

				<div>
				<!--Campo descripcion de la fase-->
					
				

				<label for="fecha"><?php echo $strings['Fecha']; ?></label>
				<input type="date" name="fecha" size="18"  onblur=" return comprobarFecha(this)">
					
				</div>
				
				<!--Boton para finalizar-->
				<button type="submit" name="action" value="Confirmar_ADD_Fecha" value="Submit" class="aceptar"></button>
				<!--Boton de borrado de texto-->
				<button type="reset" value="Reset" class="cancelar"></button>

			</form> 
		</div> 
<?php
	}
}
?>