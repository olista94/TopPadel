
<?php
 //Declaracion de la clase 
class Reservas_ADD_Hora{
	//Descripcion de la tarea a la que pertenece la fase a añadir
	var $horasLibres;
	var $fecha_reserva;
	
	//Variable con el enlace al form de ADD fase
	var $enlace;	
	//Constructor de la clase
	function __construct($horasLibres,$fecha_reserva,$enlace){
				
		$this -> horasLibres = $horasLibres;
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
					<input type = "hidden" name = "hora_inicio" value = '<?php echo $this->hora_inicio; ?>'>
				<legend><?php echo $strings['Añadir reserva'];?>
				</legend>

				<div>
				<!--Campo descripcion de la fase-->


				<label>
					<?php echo $strings['Hora']; ?></label>
					<select name = "hora_inicio">
					
						<?php
						foreach ($this->horasLibres as $horas){
							echo "<option value = '".$horas."'>".$horas."</option>";
						}
						?>

				</select>

				</div>

				<!--Boton para finalizar-->
				<button type="submit" name="action" value="Confirmar_ADD_Hora" value="Submit" class="aceptar"></button>
				

			</form> 
		</div> 
<?php
	}
}
?> 