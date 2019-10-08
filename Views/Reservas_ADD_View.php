<!-- FORMULARIO PARA AÑADIR UNA FASE A UNA TAREA
CREADO POR: Los Cangrejas
Fecha: 26/12/2018-->

<?php
 //Declaracion de la clase 
class Reservas_ADD{
	 //Id de la tarea a la que pertenece la fase a añadir
	var $usuario;
	//Descripcion de la tarea a la que pertenece la fase a añadir
	var $pista;

	//Variable con el enlace al form de ADD fase
	var $enlace;	
	//Constructor de la clase
	function __construct($usuario,$pista,$enlace){
				
		$this -> usuario = $usuario;
		$this -> pista = $pista;
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
				<legend><?php echo $strings['Añadir reserva'];?>
				
				</legend>

				<div>
				<!--Campo descripcion de la fase-->
					
				<!--Campo para seleccionar (o no) los contactos de la fase-->
					<label>
					<?php echo $strings['Pista']; ?></label>
					<select name="pista_ID_Pista">
						<?php
							while($pista=$this->pista->fetch_array()){
						?>
								<option value="<?php echo $pista[0];?>"><?php echo $pista[1];?>

								</option>
						<?php
							}
						?>
					</select>
				<!--Campo para seleccionar (o no) los archivos de la fase-->
				<label>
					<?php echo $strings['Hora']; ?></label>
					<select name = "hora_inicio">
						<option value="08:00">08:00</option>

						<option value="09:30">09:30</option>

						<option value="11:00">11:00</option>

						<option value="12:30">12:30</option>

						<option value="14:00">14:00</option>

						<option value="15:30">15:30</option>

						<option value="17:00">17:00</option>

						<option value="18:30">18:30</option>

						<option value="20:00">20:00</option>

						<option value="21:30">21:30</option>

				</select>

				<label for="fecha_reserva"><?php echo $strings['Fecha']; ?></label>
				<input type="text" name="fecha_reserva" size="18" class="tcal" value=""  onblur=" return comprobarFecha(this)">
					
				</div>
				
				<!--Boton para finalizar-->
				<button type="submit" name="action" value="Confirmar_ADD2" value="Submit" class="aceptar"></button>
				<!--Boton de borrado de texto-->
				<button type="reset" value="Reset" class="cancelar"></button>

			</form> 
		</div> 
<?php
	}
}
?>