

<?php
 //Declaracion de la clase
class Clases_Particulares_ADD_Entrenador{
	 
	var $entrenadores;
	var $fecha_clase;
	var $hora_clase;
	var $pista;
	var $enlace;	
	//Constructor de la clase
	function __construct($entrenadores,$fecha_clase,$hora_clase,$ID_Pista,$enlace){
				

		$this -> entrenadores = $entrenadores;
		$this -> fecha_clase = $fecha_clase;
		$this -> hora_clase = $hora_clase;
		$this -> ID_Pista = $ID_Pista;
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

			<form name="registerForm" id="registerForm" method="post" action="../Controllers/Clases_Particulares_Controller.php" enctype="multipart/form-data">
				<legend><?php echo $strings['Escoger entrenador'];?>
				<!--Boton para volver atras-->
				
				</legend>
				<div>
					
						
					
					<label>
					<?php echo $strings['Entrenador']; ?></label>
					<select name = "login_entrenador">
					
						<?php
						foreach ($this->entrenadores as $entrenadores){
							echo "<option value = '".$entrenadores."'>".$entrenadores."</option>";
						}
						?>

				</select>
					<input type = "hidden" name = "fecha_clase" value = '<?php echo $this->fecha_clase; ?>'>
					<input type = "hidden" name = "hora_clase" value = '<?php echo $this->hora_clase; ?>'>
					<input type = "hidden" name = "ID_Pista" value = '<?php echo $this->ID_Pista; ?>'>
					
				</div>
				<!--Boton para añadir la tarea y pasar a añadir fases-->
				<button type="submit" name="action" value="Confirmar_ADD_Entrenador" value="Submit" class="aceptar"></button>
				

			</form> 
		</div> 
<?php
	}
}
?>