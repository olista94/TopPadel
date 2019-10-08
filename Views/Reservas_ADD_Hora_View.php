<!-- FORMULARIO PARA AÑADIR UNA FASE A UNA TAREA
CREADO POR: Los Cangrejas
Fecha: 26/12/2018-->

<?php
 //Declaracion de la clase 
class Reservas_ADD_Hora{


	//Descripcion de la tarea a la que pertenece la fase a añadir
	var $pista;
	var $fecha_reserva;
	var $horasLibres;
	//Variable con el enlace al form de ADD fase
	var $enlace;	
	//Constructor de la clase
	function __construct($pista,$fecha_reserva,$horasLibres,$enlace){
				
		$this -> pista = $pista;
		$this -> fecha_reserva = $fecha_reserva;
		$this -> horasLibres = $horasLibres;
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
					<input type = "hidden" name = "pista_ID_Pista" value = '<?php echo $this->pista; ?>'>
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
				<!--Boton de borrado de texto-->
				<button type="reset" value="Reset" class="cancelar"></button>

			</form> 
		</div> 
<?php
	}
}
?>