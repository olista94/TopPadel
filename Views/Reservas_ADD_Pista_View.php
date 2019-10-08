<!-- FORMULARIO PARA AÑADIR UNA FASE A UNA TAREA
CREADO POR: Los Cangrejas
Fecha: 26/12/2018-->

<?php
 //Declaracion de la clase 
class Reservas_ADD_Pista{

	//Descripcion de la tarea a la que pertenece la fase a añadir
	var $pistasLibres;
	var $fecha_reserva;
	//Variable con el enlace al form de ADD fase
	var $enlace;	
	//Constructor de la clase
	function __construct($pistasLibres,$fecha_reserva,$enlace){
				

		$this -> pistasLibres = $pistasLibres;
		$this -> fecha_reserva = $fecha_reserva;
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

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Reservas_Controller.php" enctype="multipart/form-data">
				<input type = "hidden" name = "fecha_reserva" value = '<?php echo $this->fecha_reserva; ?>'>
				<legend><?php echo $strings['Añadir reserva'];?>
				
				</legend>

				<div>
				<!--Campo descripcion de la fase-->
					
				<!--Campo para seleccionar (o no) los contactos de la fase-->
					<label>
					<?php echo $strings['Pista']; ?></label>
					<select name="pista_ID_Pista">
						<?php
							while($pista=$this->pistasLibres->fetch_array()){
						?>
								<option value="<?php echo $pista[0];?>"><?php echo $pista[1];?>

								</option>
						<?php
							}
						?>
					</select>
					<br>

				<!--Boton para finalizar-->
				<button type="submit" name="action" value="Confirmar_ADD_Pista" value="Submit" class="aceptar"></button>
				<!--Boton de borrado de texto-->
				<button type="reset" value="Reset" class="cancelar"></button>

			</form> 
		</div> 
<?php
	}
}
?>