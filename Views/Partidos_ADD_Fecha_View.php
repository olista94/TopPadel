<!-- FORMULARIO PARA AÑADIR UNA FASE A UNA TAREA
CREADO POR: Los Cangrejas
Fecha: 26/12/2018-->

<?php
 //Declaracion de la clase 
class Partidos_ADD_Fecha{
	 //Id de la tarea a la que pertenece la fase a añadir

	var $idpartido;
	var $idtorneo;
	var $enlace;	
	//Constructor de la clase
	function __construct($idpartido,$idtorneo,$enlace){
				
		$this -> idpartido = $idpartido;		
		$this -> idtorneo = $idtorneo;		
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

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Partidos_Controller.php" enctype="multipart/form-data" onsubmit="return comprobarFechaPromo(this)">
			<input type = "hidden" name ="ID_Partido" value ="<?php echo $this->idpartido; ?>">
			<input type = "hidden" name ="ID_Torneo" value ="<?php echo $this->idtorneo; ?>">			
				<legend><?php echo $strings['Fecha partido'];?>
				
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