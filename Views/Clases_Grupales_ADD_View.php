<?php
 //Declaracion de la clase
class Clases_Grupales_ADD{
	 

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
<!--Formulario para añadir tarea-->
		<div class="form">

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Clases_Grupales_Controller.php" enctype="multipart/form-data" onsubmit="return comprobarTarea(this)">
				<legend><?php echo $strings['Añadir clase'];?>
				<!--Boton para volver atras-->
				<button type="button" type="button" onclick="location.href='../Controllers/Clases_Grupales_Controller.php';" class="volver"></button>
				</legend>

				<div>
					<!--Campo descripcion de la tarea-->
					<label for="descripcion"><?php echo $strings['Descripcion']; ?></label>
					 <textarea name="descripcion" rows="5" cols="40"></textarea>
						
				</div>
				
				
				<div>
					
					<label for="tope"><?php echo $strings['Tope']; ?></label>
					<input type="number" id="tope" name="tope" >
						
				</div>			
				
				<div>
				
				<?php
					$hoy = date('Y-m-d');
					$date=date_create($hoy);
					date_add($date,date_interval_create_from_date_string("1 day"));
					$mañana = date_format($date,"Y-m-d");
				?>

				<label for="fecha_clase"><?php echo $strings['Fecha']; ?></label>
				<input type="date" id="fecha_clase" name="fecha_clase" min="<?php echo "$mañana";?>" onblur=" return comprobarFecha(this)" >
					
				</div>
				
				<label>
					<?php echo $strings['Hora']; ?></label>
					<select name = "hora_clase">
						<option value=""></option>
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
				</select>	<br>
				
				
				<!--Boton para añadir la tarea y pasar a añadir fases-->
				<button type="submit" name="action" value="Confirmar_ADD2" value="Submit" class="aceptar"></button>
				<!--Boton de borrado de texto-->
				<button type="reset" value="Reset" class="cancelar"></button>

			</form> 
		</div> 
<?php
	}
}
?>
